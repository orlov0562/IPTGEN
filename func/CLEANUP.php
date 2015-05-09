<?php function _CLEANUP() { ?>
iptables -F<?=PHP_EOL?>
iptables -t nat -F<?=PHP_EOL?>
iptables -t mangle -F<?=PHP_EOL?>
iptables -X<?=PHP_EOL?>
<?php } // end of function