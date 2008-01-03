<?php

require_once JPSPAN . 'Types.php';

function error($msg) {
	return new JPSpan_Error(1, "Application error", $msg);
}

function is_error($var) {
	return (is_object($var) && is_a($var, 'JPSpan_Error'));
}

?>
