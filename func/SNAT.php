<?php 

function _SNAT($fromArr, $to) { 

	if (isset($fromArr['int'])) $fromArr = [$fromArr];
	
	foreach($fromArr as $from) {
		?>
			iptables -t nat -A POSTROUTING -o <?=$from['int']?> -s <?=$from['net']?> -j SNAT --to-source <?=$to['ip']?><?=PHP_EOL?>
		<?php
	}

} // end of function