#!/bin/sh
PATH=/usr/sbin:/sbin:/bin:/usr/bin
iptables -F
iptables -t nat -F
iptables -t mangle -F
iptables -X
iptables -A INPUT -i lo -j ACCEPT
iptables -A FORWARD -i ppp0 -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -A FORWARD -i eth2 -o ppp0 -j ACCEPT
iptables -t nat -A POSTROUTING -o ppp0 -s 192.168.100.0/24 -j MASQUERADE
iptables -A FORWARD -i eth3 -o ppp0 -j ACCEPT
iptables -t nat -A POSTROUTING -o ppp0 -s 192.168.101.0/24 -j MASQUERADE
iptables -t nat -A PREROUTING -p tcp --dst 8.8.8.8 --dport 80 -j DNAT --to-destination 192.168.101.60:80
iptables -t nat -A POSTROUTING -p tcp --dst 192.168.101.60 --dport 80 -j SNAT --to-source 192.168.101.1
iptables -t nat -A OUTPUT -p tcp --dst 8.8.8.8 --dport 80 -j DNAT --to-destination 192.168.101.60:80
iptables -t nat -A PREROUTING -p tcp --dst 8.8.8.8 --dport 10021 -j DNAT --to-destination 192.168.101.60:21
iptables -t nat -A POSTROUTING -p tcp --dst 192.168.101.60 --dport 10021 -j SNAT --to-source 192.168.101.1
iptables -t nat -A OUTPUT -p tcp --dst 8.8.8.8 --dport 10021 -j DNAT --to-destination 192.168.101.60:21
echo 1 > /proc/sys/net/ipv4/ip_forward
