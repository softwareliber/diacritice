<?php

$prod_name = "Glosar traduceri";
$prod_ver = "2.02";

$base_path = dirname(__FILE__);
$file_glossary = $base_path."/data/glosar.txt";
$file_history = $base_path."/data/history.txt";

/*
 * $username is the global the variable hosting 
 * the name of the authenticated user
 *
 * This code relies on externat authentication
 * Do your magic to get this variable from an external source.
 */
if (
    ( isset ( $_REQUEST['i18n_dev_wikiUserID'] )) &&
    ( isset ( $_REQUEST['i18n_dev_wikiUserName'] ))
    )  {
    $username = $_REQUEST['i18n_dev_wikiUserName'];
} else {
    $username = "";
}

# 0 - deny anonymous editing
# 1 - permit anonymous editing
$permit_anon_edit = 1;


$base_path = dirname(__FILE__);
$file_glossary = $base_path."/data/glosar.txt";
$file_history = $base_path."/data/history.txt";

?>