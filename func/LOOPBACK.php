<?php function _LOOPBACK() { ?>
iptables -A INPUT -i lo -j ACCEPT<?=PHP_EOL?>
<?php } // end of function