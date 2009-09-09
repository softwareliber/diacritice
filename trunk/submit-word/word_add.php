<?php
	// Load the QCubed Development Framework
	require('qcubed.inc.php');
    if (QApplication::QueryString('word')) {
        $strWord = QApplication::QueryString('word');
        $strWord = str_replace(array('ş', 'ţ', 'Ş', 'Ţ'), array('ș', 'ț', 'Ș', 'Ț'), $strWord);

        if (preg_match('/[a-zA-Z\-ăîâșțĂÎÂȘȚ]+/', $strWord) !== false) {
            $objWord = Word::LoadByWord($strWord);
            if ($objWord instanceof Word) {
                $objWord->ProposalCount = $objWord->ProposalCount + 1;
                $objWord->LastSent = QDateTime::Now();
                $objWord->Save();
            }
            else {
                $objWord = new Word();
                $objWord->Word = $strWord;
                $objWord->StatusTypeId = StatusType::Pending;
                $objWord->ProposalCount = 1;
                $objWord->LastSent = QDateTime::Now();
                $objWord->Save();
            }

            $objSentLog = new SentLog();
            $objSentLog->WordId = $objWord->WordId;
            $objSentLog->IpAddress = $_SERVER['REMOTE_ADDR'];
            $objSentLog->UserAgent = $_SERVER['HTTP_USER_AGENT'];
            $objSentLog->DateSent =  QDateTime::Now();
            $objSentLog->Save();
        }
        else
            echo 'Too many words';
    }
    else {
        echo 'Not enough parameters';
    }
?>