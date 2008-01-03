<?php

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
<script type='text/javascript' src='server.php?client'></script>
<script type='text/javascript' src='glossary.js'></script>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<div id="content">

<h1>Glosar traduceri 2.0 (beta)</h1>
<div id="count"></div>

Termen: <input type="text" id="keywordField" value="<?php print $keyword; ?>" autocomplete="off">
<input type="button" id="editButton" value="Editează" onClick="showDefinitionDiv()">

<div id="definitionDiv" style="display:none">
<table>
<tr><th>Editare traducere</th></tr>
<tr><td class="hint">Ordine: <i>verb inf.</i>, <i>substantiv</i> (ex: a edita, editare)</td></tr>
<tr><td><input type="text" id="definitionField"></td></tr>
<tr><td class="hint">
Meta informatii: 
<ul>
<li><tt>[[paginawiki]]</tt> creeaza un link catre pagina paginawiki din wiki, locul unde se discuta si voteaza despre termenul respectiv</li>
<li><tt>!</tt> - marcheaza termenul ca avand traducere stabila (lock)</li>
<li><tt>?</tt> - marcheaza termenul ca ne-avand traducere stabila, adica la care se cauta traducere</li>
Ideal ar trebui ca toţi termenii să aibă un marcator de stare, pentru a-i putea diferenţia de cei vechi şi care nu au fost reevaluaţi la creeare versiunii 2.0
</ul>
</td></tr>
<tr><td><input type="text" id="metaField"></td></tr>
<tr>
<td align="right">
<input type="button" value="Renunţă" onClick="cancel()">
<input type="button" value="Salvează" onClick="save()">
</td></tr>
</table>

</div>

<div id="results"></div>

<div id="help"><a href="recent.php">Modificări recente</a> &middot; <a href="help.php">Ajutor</a></div>

</div>

<script>
setup();
</script>

</body>
</html>
