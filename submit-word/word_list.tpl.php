<?php
	// This is the HTML template include file (.tpl.php) for the word_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Words') . ' - ' . QApplication::Translate('List All');
	require(__CONFIGURATION__ . '/header.inc.php');
    $this->RenderBegin();
    if (!QApplication::$User) {
	   $this->lblMessage->Render();
	   $this->txtOpenIdUrl->Render();
	   $this->btnLogin->Render();
    }
	$this->dtgWords->Render();
	$this->RenderEnd();
	require(__CONFIGURATION__ . '/footer.inc.php');