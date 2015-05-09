<?php 
function _UNIQUE($string) { 
	if (!isset($GLOBALS['_UNIQUE']) OR !isset($GLOBALS['_UNIQUE'][md5($string)])) {
		$GLOBALS['_UNIQUE'][md5($string)] = '';
		echo trim($string).PHP_EOL;
	}
} // end of function