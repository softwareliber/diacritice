<?php

header("Content-Type: text/html; charset=UTF-8");

?>
<html>
<head>
<title>Glosar - Modificări recente</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script>
function email(name) {
	document.write("<a href=\"mailto:" + name + "@codemonkey.ro\">" + name + "@codemonkey.ro</a>");
}

function edit(term) {
	window.location.href = "index.php?edit=1&keyword=" + term;
}
</script>
</head>
<body>
<center>

<div id="content">
<h1>Modificări recente</h1>
<table width=490 class="clickable"><tr><th>Dată</th><th>Termen</th><th>Traducere</th></tr>
<?php
$fcontents = file('history.txt');
$len = strlen($term);
$result['term'] = $term;
$result['definition'] = $definition;

$class = "light";
$fcontents = array_reverse($fcontents);

$maxItems = 50;
foreach ($fcontents as $line) {
	if ($maxItems-- == 0) break;

	list ($term, $definition, $date, $ip) = split("\t", $line);
	$term = htmlentities($term, ENT_QUOTES, 'UTF-8');
	$definition = htmlentities($definition, ENT_QUOTES, 'UTF-8');

	print "<tr class=$class><td width=120 class=date onClick=\"edit('" . $term . "')\">$date</td>" .
		"<td width=120 onClick=\"edit('" . $term . "')\">" . $term . "</td>" .
		"<td width=250 onClick=\"edit('" . $term . "')\">$definition</td></tr>";
	$class = ($class == 'light') ? 'dark' : 'light';
}

?>
</table>

<?php
$omitted = count($fcontents) - $maxItems;
if ($omitted > 1) {
	print"($omitted revizii omise)";
} elseif ($omitted == 1) {
	print"($omitted revizie omisă)";
}
?>
<br>
<a href="index.php">&laquo; Înapoi</a>
</div>
</center>

</body>
</html>
