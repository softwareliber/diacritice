<?php
require_once ('config.inc.php');

header("Content-Type: text/html; charset=UTF-8");
$term_unfixed = 0;
$term_fixed = 0;
$term_unsorted = 0;
$term_type = "nefixați";

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'unsorted' ){
        $term_type = "nesortați";
        $term_unsorted = "1";
    } elseif ($_GET['type'] == 'fixed' ){
        $term_type = "fixați";
        $term_fixed = 1;

    } else {
        $term_type = "nefixați";
        $term_unfixed = 1;
    }

} else {
    $term_unfixed = 1;
}

$lines = file($file_glossary);

$fcontents = array();
foreach ($lines as $line_num => $line) {
    if ($term_unfixed && strstr($line,'?')) {
        array_push($fcontents,$line);
    } elseif ($term_fixed && strstr($line,'!')) {
        array_push($fcontents,$line);
    } elseif ($term_unsorted && !strstr($line,'?') && !strstr($line,'!')) {
        array_push($fcontents,$line);
    }
}

?>
<html>
<head>
<title>Glosar - Raport termeni <?php print $term_type; ?></title>
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
<h1>Raport termeni <?php print $term_type; ?></h1>
<table class="clickable"><tr><th>Termen</th><th>Context</th><th>Traducere</th></tr>
<?php
$class = "light";


foreach ($fcontents as $line) {
    $line = rtrim($line);
	list ($term, $definition, $context) = split("\t", $line);
	$term = htmlentities($term, ENT_QUOTES, 'UTF-8');
	$definition = htmlentities($definition, ENT_QUOTES, 'UTF-8');

	print "<tr class=$class>" .
		"<td onClick=\"edit('" . $term . "')\">" . $term . "</td><td>$context</td>" .
		"<td onClick=\"edit('" . $term . "')\">$definition</td></tr>";
	$class = ($class == 'light') ? 'dark' : 'light';
}

?>
</table>

<?php
$lines_count = count($fcontents);
print $lines_count .' termeni '.$term_type ;
?>
<br>
<a href="index.php">&laquo; Înapoi</a>
</div>
</center>

</body>
</html>
