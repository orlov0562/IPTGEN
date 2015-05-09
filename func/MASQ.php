<?php 

function _MASQ($fromArr, $to) { 

	if (isset($fromArr['int'])) $fromArr = [$fromArr];

	_UNIQUE('iptables -A FORWARD -i '.$to['int'].' -m state --state ESTABLISHED,RELATED -j ACCEPT');	
	
	foreach($fromArr as $from) { ?>
			iptables -A FORWARD -i <?=$from['int']?> -o <?=$to['int']?> -j ACCEPT<?=PHP_EOL?>
			iptables -t nat -A POSTROUTING -o <?=$to['int']?> -s <?=$from['net']?> -j MASQUERADE<?=PHP_EOL?>
	<?php }
} // end of function