<?php
require_once ('config.inc.php');
require_once ('functions/misc.php');

print '<?xml version="1.0" encoding="UTF-8"?>';
?>

<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	>

<channel>
	<title><?php print $prod_name; ?> - Recent</title>
	<atom:link href="<?php print currentPageURL(); ?>" rel="self" type="application/rss+xml" />
	<link><?php print $base_url; ?></link>
	<description>Ultimii 15 termeni modificați</description>
	<pubDate><?php print date("r");?></pubDate>
	<language>ro</language>
<?php
$lines = file($file_history);
$lines_num = count($lines);

$last_lines = array();
$added_terms = array();
$matches = array();
$terms_count = 0;
$i = $lines_num - 1;
while ( $terms_count < 15 && $i > 0 ) {
    array_push($last_lines, $lines[$i]);
    list ( $term['name'], $term['translation'], $term['context'], $term['date'], $term['author']) = split("\t", $lines[$i--], 5);
    if (!in_array( $term['name'], $added_terms )) {
        $terms_count++;
        array_push($added_terms,$term['name']);
        $term['name_escaped'] = str_replace(" ", "+", $term['name']);
        //configuration	configurare [dacă e vorba de acțiunea de configurare a sistemului], configurație [dacă e vorba de un sumă de opțiuni de sistem)	! [[configuration-options-preferences-settings]]	2009-01-03 20:40:06	Semnat Anonim (194.54.128.86)
        list ( $date['year'], $date['month'], $date['day'], $date['hour'], $date['minute'], $date['second'] ) = split ('[ \:\-]',$term['date'],6);
        $term['link_glosary'] = '<p><a href="'.$base_url.'index.php?keyword='.$term['name_escaped'].'">Legătură glosar</a></p>';
        if ( $base_url_wiki && ( preg_match ('/.*\[\[(.*)\]\].*/', $term['context'], $matches) ) ){
            $term['link_wiki'] = '<p><a href="'.$base_url_wiki.$matches[1].'">Legătură wiki</a></p>';
        } else {
            $term['link_wiki'] = "";
        }

        $term['link_open_trans'] = ($base_url_open_trans) ? '<p><a href="'.$base_url_open_trans.$term['name_escaped'].'">Legătură Open-trans.eu</a></p>' : '';

?>
	  <item>
		<title><?php print $term['name']; ?></title>
		<link><?php print $base_url; ?>index.php?keyword=<?php print $term['name_escaped']; ?></link>
		<guid><?php print $base_url; ?>index.php?keyword=<?php print $term['name_escaped']; ?></guid>
        <pubDate><?php print date("r", mktime  ($date['hour'], $date['minute'], $date['second'], $date['month'], $date['day'], $date['year'])); ?></pubDate>
		<dc:creator><?php print $term['author']; ?></dc:creator>
		<description><![CDATA[
        <?php 
        print '<p>Termen: '.$term['name'].'</br></p>';
        print '<p>Traducere: '.$term['translation'].'</p>';
        print '<p>Context: '.$term['context'].'</p>';
        print '<p>Data: '.$term['date'].'</p>';
        print '<p>Autor: '.$term['author'].'</p>';
        print $term['link_wiki'];
        print $term['link_open_trans'];
        print $term['link_glosary'];
        ?>
        ]]></description>
	  </item>
<?php
    }
}
?>
	</channel>
</rss>


