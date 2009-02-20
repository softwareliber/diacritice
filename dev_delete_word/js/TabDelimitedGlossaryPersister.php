<?php
require ('../config.inc.php');
class TabDelimitedGlossaryPersister {
	var $filename = null;
	var $historyFilename = null;


	function TabDelimitedGlossaryPersister($filename, $historyFilename) {
		$this->filename = $filename;
		$this->historyFilename = $historyFilename;
	}


	function load() {
		if (is_file($this->filename) == false ||
			is_readable($this->filename) == false) {
			return error('Could not open file "' . $this->filename . '" for reading.');
		}

		return $this->_parse(file($this->filename));
	}


	function _parse($lines) {
		$definitions = array();

		if (count($lines) < 1) {
			return $definitions;
		}

		foreach ($lines as $line) {
			$line = trim($line);
			if (empty($line) == true) continue;
			@list ($term, $definition, $meta) = split("\t", $line);
			$definitions[$term] = $definition . "\t" . $meta;
		}

		return $definitions;
	}


	function save($definitions) {
		if (is_file($this->filename) == false ||
			is_writable($this->filename) == false) {
			return error('Could not open file "' . $this->filename . '" for writing.');
		}

		ksort($definitions);

		$results = "";
		foreach ($definitions as $term => $def) {
			$results .= "$term\t$def\n";
		}

		$fd = fopen($this->filename, 'w');
		fwrite($fd, $results);
		fclose($fd);
	}


	function saveHistory($term, $definition) {
		if (is_file($this->historyFilename) == false ||
			is_writable($this->historyFilename) == false) {
			return error('Could not open file "' . $this->historyFilename . '" for writing.');
		}
		
		if (!$GLOBALS['username']) {
		    $ip = "Semnat Anonim (".$_SERVER['REMOTE_ADDR'].")";
		} else {
		    $ip = $GLOBALS['username']." (".$_SERVER['REMOTE_ADDR'].")";
		}
		$date = date("Y-m-d H:i:s");

		$fd = fopen($this->historyFilename, 'a');
		fwrite($fd, "$term\t$definition\t$date\t$ip\n");
		fclose($fd);
	}


	function deleteLinesWithPrefix($fname, $prefix) {
		if (is_file($fname) == false ||
			is_writable($fname) == false) {
			return error('Could not open file "' . $fname . '" for writing.');
		}
		$lines = file($fname);

		// writeback all lines exept the ones that begin with the prefix
		$results = "";
		foreach ($lines as $line) {
			if (stristr($line, $prefix) != FALSE)
				continue;
			$results .= "$line";
		}

		$fd = fopen($fname, 'w');
		fwrite($fd, $results);
		fclose($fd);
	}

	
	function deleteDefinition($term) {
		$prefix = $term . "\t";
		return $this->deleteLinesWithPrefix($this->filename, $prefix);
	}


	function deleteFromHistory($term) {
		$prefix = $term . "\t";
		return $this->deleteLinesWithPrefix($this->historyFilename, $prefix);
	}
}

?>
