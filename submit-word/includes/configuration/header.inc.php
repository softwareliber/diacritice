<?php
	// This example header.inc.php is intended to be modfied for your application.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
<?php if (isset($strPageTitle)) { ?>
		<title><?php _p($strPageTitle); ?></title>
<?php } ?>
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/styles.css");</style>
	</head>
	<body>
		<div id="page">
            <div>
            <a href="<?php echo __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/word_list.php'?>">Lista de cuvinte</a> |
            <a href="<?php echo __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/word_status_log_list.php'?>">Jurnal de schimbări</a> |
            <a href="<?php echo __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/sent_log_list.php'?>">Jurnal de trimiteri</a>
            <?php
            if (QApplication::$User) {
                echo sprintf(' | <b>Autentificat ca <i>%s</i> | <a href="word_list.php?logout">Ieșire</a></b>', QApplication::$User);
            }
            ?>
            </div>
			<div id="content">
