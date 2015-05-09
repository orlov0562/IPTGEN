<?php
	
	// Configuration
	
	$wan1 = [
		'int' => 'ppp0',
	];

	$wan2 = [
		'int' => 'eth1',
		'ip' => '8.8.8.8',
	];
	
	$lan1 = [
		'int' => 'eth2',
		'ip' => '192.168.100.1',
		'net' => '192.168.100.0/24',
	];
	
	$lan2 = [
		'int' => 'eth3',
		'ip' => '192.168.101.1',
		'net' => '192.168.101.0/24',
	];	
	
	// Rules
	
	//_SNAT([$lan1, $lan2], $wan2); 	
	_MASQ([$lan1, $lan2], $wan1);
	