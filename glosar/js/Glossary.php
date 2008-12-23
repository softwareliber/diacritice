<?php

require_once ('../config.inc.php');
require_once 'error-handling.php';
require_once 'TabDelimitedGlossaryPersister.php';

class Glossary {
	var $persister;
	var $definitions;

	function Glossary() {
		$this->persister =& new TabDelimitedGlossaryPersister($GLOBALS['file_glossary'], $GLOBALS['file_history']);
		$this->definitions = $this->persister->load();
	}

	function search($keyword) {
		if (is_error($this->definitions)) return $this->definitions;

		$results = '<table class=clickable><th width="25%">Termen</th><th width="50%">Traducere</th><th>Dezbatere</th>';

		$keyword = trim($keyword);
		if (empty($keyword)) {
			return '';
		}

		$class = "light";
		$class2 = "";
		$resultCnt = 0;

		$searchKwd = preg_quote($keyword, "#");
		foreach ($this->definitions as $term => $definition) {
			if (preg_match("#^" . $searchKwd . "#i", $term)) {
				$resultCnt++;
				$arr = split("\t", $definition, 2);
				$term = $this->_encode($term);
				$link = array();
				
				if(!$arr[1]) $arr[1] = "";
				if (preg_match("/!/i", $arr[1])) {
				    $class2 = $class . " term_locked";
				    } 
				elseif (preg_match("/\?/i", $arr[1])) {
				    $class2 = $class . " term_debate";
				} else {
				    $class2 = $class . " term_old";
				    ;
				    };
				        
				if (preg_match('/\[\[(.+)\]\]/', $arr[1], $link))
				    $link = "<a target=\"_top\" href=\"http://www.i18n.ro/$link[1]\">$link[1]</a>";
				else
				    $link ="";
				$definition = $this->_encode($definition);
				$results .= "<tr class=\"$class2\"><td onClick=\"edit('" . $term . "')\">$term</td>" .
				"<td onClick=\"edit('" . $term . "')\">$arr[0]</td><td>$link</td></tr>";
				$class = ($class == 'light') ? 'dark' : 'light';
			}
		}

		if ($resultCnt < 1) {
			$results .= '<tr><td colspan=2 align=center>0 rezultate.</td></tr>';
		}

		$results .= '</table>';

		return $results;
	}

	function search_txt($keyword) {
		if (is_error($this->definitions)) return $this->definitions;

		$results = '';

		$keyword = trim($keyword);
		if (empty($keyword)) {
			return '';
		}

		$resultCnt = 0;

		$searchKwd = preg_quote($keyword, "#");
		foreach ($this->definitions as $term => $definition) {
			if (preg_match("#^" . $searchKwd . "#i", $term)) {
				$resultCnt++;
				$term = $this->_encode($term);
				$link = array();
				if (preg_match('/\[\[(.+)\]\]/', $definition, $link))
				    $link = "http://www.i18n.ro/$link[1]";
				else
				    $link ="";
				$definition = $this->_encode($definition);
				$results .= "$term = $definition $link\n";
			}
		}

		if ($resultCnt < 1) {
			$results .= 'nu am gasit nimic';
		}

		$results .= '';

		return $results;
	}

	function get($keyword) {
		if (is_error($this->definitions)) return $this->definitions;

		$result = array();

		$keyword = trim($keyword);
		$searchKwd = preg_quote($keyword, "#");
		foreach ($this->definitions as $term => $definition) {
			if (preg_match("#^" . $searchKwd . "$#i", $term)) {
				return $this->_getWithHistory($term, $definition);
			}
		}

		return $result;
	}

	function _getWithHistory($term, $definition) {
		$fcontents = file($GLOBALS['file_history']);
		$len = strlen($term);
		$result['term'] = $term;
		$result['definition'] = $definition;

		$history = "<table class=clickable><tr><th>Termen</th><th>Context</th><th>Dată revizie</th><th>Traducere</th><th>Utilizator / IP</th></tr>";
		$class = "light";
		$fcontents = array_reverse($fcontents);
		foreach ($fcontents as $line) {
			if (substr($line, 0, $len + 1) == "$term\t") {
				$line .= "\t\t\t\t\t"; // just to be sure we don't get an error on next line
				list ($term, $oldDefinition, $context, $date, $ip) = split("\t", $line);

				$term = $this->_encode($term);
				$oldDefinition = $this->_encode($oldDefinition);

				$history .= "<tr class=$class>" .
						"<td>$term</td><td>$context</td><td class=date onClick=\"revert('" . $oldDefinition . "')\">$date</td>" .
						"<td  onClick=\"revert('" . $oldDefinition . "')\">$oldDefinition</td><td>$ip</td></tr>";
				$class = ($class == 'light') ? 'dark' : 'light';
			}
		}

		$result['history'] = $history . "</table>";
		return $result;
	}

	function save($term, $definition) {
		
		$tmp = 'save(' . $term . ',' . $definition . ')';
		error_log($tmp);
//		fwrite(STDERR, $tmp);
		$term = strtolower($this->_filterSpecialChars(trim($term)));
		$definition = $this->_filterSpecialChars($definition);
//		$meta = $this->_filterSpecialChars($meta);

		if (isset($this->definitions[$term]) && $this->definitions[$term] == $definition) {
			return;
		}

		$this->definitions[$term] = $definition; //# + "###" + $meta;

		$result = $this->persister->saveHistory($term, $definition);
		if (is_error($result)) return $result;

		return $this->persister->save($this->definitions);
	}

	function getStats() {
		
		 $locked = 0;
		 $debate = 0;
		 $count = 0;
		 $others = 0;
		foreach ($this->definitions as $key => $value) {
		    if (strstr($value,'!')) { $locked += 1; }
		    elseif (strstr($value,'?')) { $debate += 1; }
		    else {$others += 1;};
		    $count += 1;
		    }
		    
		return sprintf("<span class='term_locked'>%.1f%% stabili</span>, <span class='term_debate'>%.1f%% în dezbatere</span>, <span class='term_old'>%.1f%% nesortati</span>", $locked*100.0/$count, $debate*100.0/$count, $others*100.0/$count);
	}

	function getCount() {
		if (is_error($this->definitions)) return $this->definitions;

		return " (" . count($this->definitions) . " termeni înscrişi) " . $this->getStats();
	}


	function _filterSpecialChars($str) {
		// we already concatenating the meta field with \t prefix
		return strtr($str, "\n", " ");	
#		return strtr($str, "\t\n", "  ");
	}

	function _encode($str) {
		return htmlentities($str, ENT_QUOTES, 'UTF-8');
	}
}

?>