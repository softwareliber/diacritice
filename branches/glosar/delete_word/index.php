<?php
require ('config.inc.php');
header("Content-Type: text/html; charset=UTF-8");
header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header( "Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" );

$keyword = $_GET['keyword'];
?>
<html>
<head>
<title>Glosar traduceri</title>
<meta http-equiv="generator" content="glosar-0.2">
<script type='text/javascript' src='js/server.php?client'></script>
<script type='text/javascript' src='js/glossary.js'></script>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

<div id="content">

<h1><?echo "$prod_name $prod_ver"; ?></h1>


<?php

if(!$username) {
    if ($permit_anon_edit){
	echo "<p style='color: green;'>Modificarea glosarului este liberă. Pentru a îmbunățății comunicarea, vă rugăm să vă autentificați.</p>";
    } else {
        echo "<p style='color: red;'>Pentru a putea face modificări trebuie să fiti conectat. Puteti opta si pentru pastrarea login-ului de la o sesiune la alta.</p>";
    }
} else {
    echo "<p style='color: green;'>Modificările în glosar vor fi efectuate sub numele de utilizator: <i>".$username."</i>.</p>";
}

?>


<div id="count"></div>

Termen: <input type="text" id="keywordField" value="<?php print $keyword; ?>" autocomplete="off">

<input type="button" id="editButton" value="Caută" onClick="showDefinitionDiv()">

<div id="definitionDiv" style="display:none">
<table>
<tr><th>Editare traducere</th></tr>
<tr><td class="hint">Ordine: <i>verb inf.</i>, <i>substantiv</i> (ex: a edita, editare)</td></tr>
<tr><td><input type="text" id="definitionField"></td></tr>
<tr><td class="hint">
Meta informatii: 
<ul>
<li><tt>[[paginawiki]]</tt> creeaza un link catre pagina paginawiki din wiki, locul unde se discuta si voteaza despre termenul respectiv</li>
<li><tt  class='term_locked'>!</tt> - marcheaza termenul ca avand traducere <span class='term_locked'>stabila (lock)</span></li>
<li><tt class='term_debate'>?</tt> - marcheaza termenul ca avand traducere in <span class='term_debate'>dezbatere</span></li>
Ideal ar trebui ca toţi termenii să aibă un marcator de stare, pentru a-i putea diferenţia de cei vechi şi care nu au fost reevaluaţi la creearea versiunii 2.0
</ul>
</td></tr>
<tr><td><input type="text" id="metaField"></td></tr>
<tr>
<td align="right">
<input type="button" value="Renunţă" onClick="cancel()">
<input type="button" value="Șterge" onClick="delete_word();">
<?php
/*
 * Show save button only when allowed
 */
if (($username)||($permit_anon_edit)) { 
?>
<input type="button" value="Salvează" onClick="save()">
<?php 
} 
?>

</td></tr>
</table>

</div>

<div id="results"></div>

<div id="help"><a href="recent.php">Modificări recente</a> &middot; <a href="help.php">Ajutor</a> &middot;  <a href="changelog.php">Changelog</a></div>

</div>

<script>
setup();
</script>

</body>
</html>
