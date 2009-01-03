<?php
require_once ('config.inc.php');

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
<table class="clickable"><tr><th>Dată</th><th>Termen</th><th></th><th>Traducere</th><th>Utilizator / IP</th></tr>
<?php
$fcontents = file($file_history);
$len = strlen($term);
$result['term'] = $term;
$result['definition'] = $definition;

$class = "light";
$fcontents = array_reverse($fcontents);

$maxItems = 50;
foreach ($fcontents as $line) {
	if ($maxItems-- == 0) break;
        $line = rtrim($line);
	list ($term, $definition, $context, $mdate, $ip) = split("\t", $line);
	$term = htmlentities($term, ENT_QUOTES, 'UTF-8');
	$definition = htmlentities($definition, ENT_QUOTES, 'UTF-8');

	print "<tr class=$class><td class=date onClick=\"edit('" . $term . "')\">$mdate</td>" .
		"<td onClick=\"edit('" . $term . "')\">" . $term . "</td><td>$context</td>" .
		"<td onClick=\"edit('" . $term . "')\">$definition</td><td>$ip</td></tr>";
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
