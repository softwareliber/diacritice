<?php
ini_alter("log_errors", "on");
error_reporting(E_ALL);

header("Content-Type: text/html; charset=UTF-8");

require_once 'JPSpan.php';
require_once JPSPAN . 'Server/PostOffice.php';
require_once 'Glossary.php';

$server =& new JPSpan_Server_PostOffice();
$glosar = new Glossary();
$server->addHandler($glosar);

#print "zuzu" . $_SERVER['QUERY_STRING'];

if (isset($_SERVER['QUERY_STRING']) &&
        strcasecmp($_SERVER['QUERY_STRING'], 'client')==0) {
    #define('JPSPAN_INCLUDE_COMPRESS',TRUE);
    $server->displayClient();
} elseif (isset($_GET['search'])) {
        print $glosar->search_txt($_GET['search']);
#    print "cucu";
}
else {
	require_once JPSPAN . 'ErrorHandler.php';
    $server->serve();
}

?>