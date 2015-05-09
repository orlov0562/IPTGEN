Author: Vitaliy S. Orlov, orlov0562@gmail.com | Version: 0.1

Iptables Generator - Generator, that generates iptables rules set from rule-wrappers.

For example this simple rule-wrappers:
```php
$wan = ['int' => 'ppp0'];
$lan = [ 
	'int' => 'eth2',
	'net' => '192.168.100.0/24',
];

_BEGIN();
_CLEANUP;
_MASQ($lan, $wan);
_END();

```
generates next sh file:
```
#!/bin/sh
PATH=/usr/sbin:/sbin:/bin:/usr/bin

iptables -F
iptables -t nat -F
iptables -t mangle -F
iptables -X
iptables -A FORWARD -i ppp0 -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -A FORWARD -i eth2 -o ppp0 -j ACCEPT
iptables -t nat -A POSTROUTING -o ppp0 -s 192.168.100.0/24 -j MASQUERADE
echo 1 > /proc/sys/net/ipv4/ip_forward
```

For more examples see rules and functions in relevant dirs

Keep in mind that it is just core that allows creating your own rule-wrappers for iptables command.
So do not use generated rules if you do not understand what they really will do.

You can find information about iptables here:
```
+ http://www.brennan.id.au/06-Firewall_Concepts.html
+ http://www.opennet.ru/docs/RUS/iptables/
+ https://ru.wikipedia.org/wiki/Iptables
```