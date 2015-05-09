<?php

	// Configuration

	$pf_wan_80 = [
			'from' => [
				'ip' => '8.8.8.8',
				'port' => 80,
			],
			'to' => [
				'ip' => '192.168.101.60',
				'gw' => '192.168.101.1',
				'port' => 80,
			]
	];
	
	
	$pf_wan_10021 = [
			'from' => [
				'ip' => '8.8.8.8',
				'port' => 10021,
			],
			'to' => [
				'ip' => '192.168.101.60',
				'gw' => '192.168.101.1',
				'port' => 21,
			]
	];
	
	// Rules
	
	_PORT_FORWARD($pf_wan_80['from'], $pf_wan_80['to']);	
	_PORT_FORWARD($pf_wan_10021['from'], $pf_wan_10021['to']);