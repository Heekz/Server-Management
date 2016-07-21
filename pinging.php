<?php 

$ipget = $_POST["ip2"];



function ping($ipget) {
	
	exec(sprintf('ping -c 1 -w 3 %s', escapeshellarg($ipget)), $res, $rval);
	return $rval === 0;

}
$up = ping($ipget);
	echo $up ? 'online' : 'offline';
	
	
?>