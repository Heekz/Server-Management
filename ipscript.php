<?php

$servername = "localhost";
$username = "ITC";
$password = "itc123";
$dbname = "testing";
$test = $_SERVER['REMOTE_ADDR'];



$host = $_POST["ip"];
$wait = $_POST["wait"];
$repeat = $_POST["iternations"];
$community = 'public';

while ($repeat > 0) {

$oid_sysdescr_g = '1.3.6.1.2.1.1.1.0';
$snmp = snmp2_get($host, $community, $oid_sysdescr_g);
echo "<br>Query: ".$snmp; 
$repeat--; 

}

			
?>




							
							
				
