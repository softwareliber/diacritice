<?php
require_once ('config.inc.php');

header("Content-Type: text/html; charset=UTF-8");

?>
<html>
<head>
<title>Glosar - Changelog</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<div id="content">
<h1>Changelog</h1>
<pre>
<?php
include ('ChangeLog');
?>
</pre>
<br>
<a href="index.php">&laquo; Înapoi</a>
</div>

</body>
</html>
