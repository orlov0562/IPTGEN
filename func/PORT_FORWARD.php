<?php function _PORT_FORWARD($from, $to) { ?>
iptables -t nat -A PREROUTING -p tcp --dst <?=$from['ip']?> --dport <?=$from['port']?> -j DNAT --to-destination <?=$to['ip']?>:<?=$to['port']?><?=PHP_EOL?>
iptables -t nat -A POSTROUTING -p tcp --dst <?=$to['ip']?> --dport <?=$from['port']?> -j SNAT --to-source <?=$to['gw']?><?=PHP_EOL?>
iptables -t nat -A OUTPUT -p tcp --dst <?=$from['ip']?> --dport <?=$from['port']?> -j DNAT --to-destination <?=$to['ip']?>:<?=$to['port']?><?=PHP_EOL?>
<?php } // end of function