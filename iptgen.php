<?php
	
	chdir(dirname(__FILE__));

	// Load functions
	foreach(glob('func/*.php') as $file) include_once($file);
	
	// Load rules
	$rules = array();
	foreach(glob('rules/*.php') as $file) $rules[] = $file;
	sort($rules);

	// Execute rules
	ob_start();
	
	foreach($rules as $rule) include($rule);
	
	$out = ob_get_clean();
	
	// Remove extra spaces
	$out = preg_replace('~^\s+(\S)~m', '$1', $out);
	
	file_put_contents('iptgen.sh', $out);
	
	if (isset($argv[1]) && strtolower($argv[1])=='print') {
		echo $out;	
	}
	
	
	