<?php

$ip = $_POST['rebootIP'];
$community = 'private';
$oid_sysdescr_g = '1.3.6.1.2.1.1.1.0';
$snmp = snmp2_get($ip, $community, $oid_sysdescr_g);

$reboot = shell_exec('/var/www/html/rebootshell.bash '.$ip);
$array_reboot = explode('Device back online', $reboot);


echo $ip . " took" . $array_reboot[1] . " to reboot"; 
echo "<br>" . $snmp;
?>