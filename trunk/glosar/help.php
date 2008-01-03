<?php
header("Content-Type: text/html; charset=UTF-8");
function path() {
    $basePath = explode('/',$_SERVER['SCRIPT_NAME']);
    $script = array_pop($basePath);
    $basePath = implode('/',$basePath);
    if ( isset($_SERVER['HTTPS']) ) {
        $scheme = 'https';
    } else {
        $scheme = 'http';
    }
    echo $scheme.'://'.$_SERVER['SERVER_NAME'].$basePath;
}
?>
<html>
<head>
<title>Ajutor glosar traduceri</title>
<style>
body, td, th { font-family: arial; font-size: 13px; }
#content { width:400px; text-align:left }
h1 { color: #aaa; font-weight: normal; font-size: 26px; text-align: center}
h2 { color: #aaa; font-weight: normal; font-size: 18px; margin-bottom: 5px}
ul { margin-top: 1px }
table { background: #ccc }
td { background: #eee; padding: 3px; font-size: 12px;}
a, a:visited { color: #00a }
</style>
<script>
function email(name) {
	document.write("<a href=\"mailto:" + name + "@codemonkey.ro\">" + name + "@codemonkey.ro</a>");
}
</script>
</head>
<body>
<center>
<div id="content">

<h1>Ajutor glosar traduceri</h1>

Acest glosar este destinat echipelor de traducere a proiectelor „free” şi „open source”.
Oricine este încurajat să contribuie la el, fiind gândit să funcţioneze ca un sistem
<a href="http://wiki.org/wiki.cgi?WhatIsWiki">Wiki</a> (fiecare modificare este stocată într-o nouă revizie).
<p>
Glosarul necesită suportul de Javascript activat, fiind testat pe Firefox 1.0.x
şi Internet Explorer 6.0. Din păcate Opera nu are suport pt. XmlHttpRequest,
deci glosarul nu este utilizabil sub acest browser.

<h2>Descărcare termeni în format „tab delimited”</h2>
Conţinutul glosarului poate fi descărcat sub licenţă <a
href="http://www.gnu.org/copyleft/gpl.html">GPL</a> ca fişier text de aici: <a
href="glosar.txt">glosar.txt</a>.

<h2>Quicksearch în Firefox</h2>
În <a href="http://www.mozilla.org">Firefox</a> puteţi folosi glosarul prin
intermediul facilităţii „Quicksearch”, adăugând în Bookmarks -&gt; Quick
Searches un nou bookmark cu următoarele proprietăţi:
<p>
<table>
<tr><th>Name:</th><td>Glosar traduceri</td></tr>
<tr><th>Location:</th><td><?=path()?>?keyword=%s</td></tr>
<tr><th>Keyword:</th><td>glosar</td></tr>
<tr><th>Description:</th><td>Introduceţi „glosar &lt;termen&gt;” în locaţie pentru a căuta în glosarul de
traduceri</td></tr>
</table>

<h2>Echipe româneşti de localizare</h2>
<a href="http://wiki.debian.net/?RomanianL10N">Debian</a>,
<a href="http://www.rofug.ro/projects/ro-l10n/">FreeBSD</a>,
<a href="http://gnomero.sf.net">GNOME</a>,
<a href="http://ro.kde.org/i18n/index.html">KDE</a>,
<a href="http://groups.yahoo.com/group/mozilla-ro/">Mozilla</a>,
<a href="http://oo-ro.sourceforge.net/">OpenOffice.org</a>,
<a href="https://launchpad.ubuntu.com/people/ubuntu-l10n-ro">Ubuntu</a>

<h2>Codul sursă</h2>
Codul sursă este disponibil sub licenţă <a
href="http://www.gnu.org/copyleft/gpl.html">GPL</a>, ultima versiune putând fi descărcată <a
href="http://www.tmlug.ro/download/glosar/releases">de aici</a>.

<h2>Contact</h2>
Autorul poate fi contactat prin email la adresa <script>email("dand")</script>.
<hr noshade size=1>
</div>
<a href="index.php">&laquo; Înapoi</a>
</center>
</body>
</html>
