<?php
require_once('functions/misc.php');

/*
 * $prod_name - a string for this glosary name
 * $prod_ver - a string for the code version
 */
$prod_name = "Terminologie traduceri programe în limba română";
$prod_ver = "2.03";


/*
 * this variables defines the location of the glosary code
 * togheter with it's data
 */
$base_path = dirname(__FILE__);
$file_glossary = $base_path."/data/glosar.txt";
$file_history = $base_path."/data/history.txt";

/*
 * $base_url - URL of this glosary installation
 */
$base_url = str_replace(currentPageName(), "", currentPageURL());

/*
 * $base_url_wiki - the root URL of the wiki installation, ending with slash
 *                - leave empty to ignore it
 */
$base_url_wiki = "http://www.i18n.ro/";

/*
 * $base_url_open_trans
 *      the root URL of the open-trans for your language
 *      term will be appended to this string
 *      leave empty to ignore it
 */
$base_url_open_trans = "http://en.ro.open-tran.eu/suggest/";


/*
 * $username is the global variable hosting 
 * the name of the authenticated user
 *
 * This glosary relies on external authentication
 * Do your magic to get this variable from an external source.
 */
if (
    ( isset ( $_REQUEST['i18n_wikiUserID'] )) &&
    ( isset ( $_REQUEST['i18n_wikiUserName'] ))
    )  {
    $username = $_REQUEST['i18n_wikiUserName'];
} else {
    $username = "";
}

# 0 - deny anonymous editing
# 1 - permit anonymous editing
$permit_anon_edit = 0;

?>
