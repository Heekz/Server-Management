<?php 

$servername = "localhost";
$username = "ITC";
$password = "itc123";
$dbname = "testing";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$lan = $_POST['wlan'];
if ($lan == 0) {
$output = shell_exec('iwlist wlan0 scan | egrep "Channel|Address|ESSID|Encryption|BitRates|Quality|Signal level"');

$fornow = str_replace("                    "," ",$output);

$array_wifi = explode( "Cell" , $fornow);

$length = count($array_spaces);
$wifilist = count($array_wifi);
$counter = $wifilist;
$counter2 = $counter-1;
						
						echo "<table class = 'table table-bordered table-hover'>";
						echo "<thead>";
						echo "<tr>";
						echo "<th>" . 'Cell' . "</th>";
						echo "<th>" . 'Mac Address' . "</th>";
						echo "<th>" . 'Channel' . "</th>";
						echo "<th>" . 'Frequency' . "</th>";
						echo "<th>" . 'Quality' . "</th>";
						echo "<th>" . 'Signal level' . "</th>";
						echo "<th>" . 'Encryption' . "</th>";
						echo "<th>" . 'ESSID' . "</th>";						
						echo "<tbody>";
						
						$firstpart="<html><head></head><body><table class = 'table table-bordered table-hover'>
						<thead>
						<tr>
						<th>Cell #</th>
						<th>Mac Address</th>
						<th>Channel</th>
						<th>Frequency</th>
						<th>Quality</th>
						<th>Signal level</th>
						<th>Encryption Key</th>
						<th>ESSID</th>
						<tbody>";

if ($wifilist == 1) {
	$flag=1;
	while ($flag==1){
		$output = shell_exec('iwlist wlan0 scan | egrep "Channel|Address|ESSID|Encryption|BitRates|Quality|Signal level"');
		$fornow = str_replace("                    "," ",$output);
		$array_wifi = explode( "Cell" , $fornow);
		$wifilist = count($array_wifi);
		if ($wifilist == 1){
			$flag=1;
		} else {
			$flag=0;
			header("Refresh:0");
		}
	}
}

$blll = ' connections nearby';

echo "<caption>" . $counter2 . $blll . "</caption>";
	for($i=1;$i<$counter2;$i++){
	
		$array_counter = explode( " " , $array_wifi[$i]);
		$numitems = count($array_counter); //number of spaces in each cell output from array_wifi
		$array_spaces = explode( " " , $array_wifi[$i]);
		$length = count($array_spaces);
		
		echo "<tr>";

		for($j=0;$j<$numitems;$j++){
		
			if($j==1) 
			{
			echo "<td>" . $array_counter[$j] . "</td>";
			}
			elseif($j==4)
			{
				$mac = $array_counter[$j];
				echo "<td>" . $mac . "</td>";
			}
			elseif($j==5)
			{
				$channel=str_replace("Channel:","",$array_counter[$j]);
				echo "<td>" . $channel . "</td>";
			}
			elseif($j==6)
			{
				$frequency=str_replace("Frequency:","",$array_counter[$j]);
				echo "<td>" . $frequency . "</td>";
			}
			elseif($j==10)
			{
				$quality=str_replace("Quality=","",$array_counter[$j]);
				echo "<td>" . $quality . "</td>";
			}
			elseif($j==13)
			{
				$level=str_replace("level=","",$array_counter[$j]);
				echo "<td>" . $level . "</td>";
			}
			elseif($j==18)
			{
				$key=str_replace("key:","",$array_counter[$j]);
				echo "<td>" . $key . "</td>";
			}
			elseif($j==19)
			{
				if($length==18){
				
				$essid=str_replace("ESSID:","",$array_counter[$j]);
				echo "<td class='clickable-row' data-href='reboot.php'>" . $essid . "</td>";
				} else {					
				$difference = $length-18;
				$x=0;
				$essid=str_replace("ESSID:","",$array_counter[$j]);		
				echo "<td class='clickable-row' data-href='reboot.php'>" . $essid . " ";
				$j++;
				while ($x < $difference) {
						echo $array_counter[$j+$x];
						echo " ";
						$x++;
					}
					echo "</td>"; 			
				}  
			}
		
		}
		$sql = "INSERT INTO essid (mac, frequency, channel, encrypt, sigquality, quality, essid, date)
				VALUES ('$mac', '$frequency', '$channel', '$key', '$level', '$quality', '$essid', NOW())";

			if ($conn->query($sql) === TRUE) {
				$good=1;
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				$good=0;
			}	
	} 
	
	if($i==$counter2) {
		
		$array_counter = explode( " " , $array_wifi[$counter2]);
		$numitems = count($array_counter); //number of spaces in each cell output from array_wifi
		$array_spaces = explode( " " , $array_wifi[$i]);
		$length = count($array_spaces);
		
		echo "<tr>";
		for($j=0;$j<$numitems;$j++){
		
			if($j==1)
			{
			echo "<td>" . $array_counter[$j] . "</td>";
			}
			elseif($j==4)
			{
				echo "<td>" . $array_counter[$j] . "</td>";
			}
			elseif($j==5)
			{
				$channel=str_replace("Channel:","",$array_counter[$j]);
				echo "<td>" . $channel . "</td>";
			}
			elseif($j==6)
			{
				$frequency=str_replace("Frequency:","",$array_counter[$j]);
				echo "<td>" . $frequency . "</td>";
			}
			elseif($j==10)
			{
				$quality=str_replace("Quality=","",$array_counter[$j]);
				echo "<td>" . $quality . "</td>";
			}
			elseif($j==13)
			{
				$level=str_replace("level=","",$array_counter[$j]);
				echo "<td>" . $level . "</td>";
			}
			elseif($j==18)
			{
				$key=str_replace("key:","",$array_counter[$j]);
				echo "<td>" . $key . "</td>";
			}
			elseif($j==19)
			{
				if($length==18){
				
				$essid=str_replace("ESSID:","",$array_counter[$j]);
				echo "<td class='clickable-row' data-href='reboot.php'>" . $essid . "</td>";
				} else {	
				$length++;
				$difference = $length-18;
				$x=0;
				$essid=str_replace("ESSID:","",$array_counter[$j]);		
				echo "<td class='clickable-row' data-href='reboot.php'>" . $essid . " ";
				$j++;
				while ($x < $difference) {
						echo $array_counter[$j+$x];
						echo " ";
						$x++;
					}
					echo "</td>";  
					
				}  
			}
		
		}
		$sql = "INSERT INTO essid (mac, frequency, channel, encrypt, sigquality, quality, essid, date)
				VALUES ('$mac', '$frequency', '$channel', '$key', '$level', '$quality', '$essid', NOW())";

			if ($conn->query($sql) === TRUE) {
				$good=1;
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				$good=0;
			}
		echo "</td>";
		
	}
	if ($good == 1) {
		echo "";
	}
	$counter--; 
	$counter2--;
	
	$lastpart = "</body></html>";
	$wlan0 = fopen("/var/www/html/wlan0.html", "w") or die("Unable to open file!");
	fwrite($wlan0, $firstpart);
	fwrite($wlan0, $lastpart);
	fclose($wlan0);
	echo "<a href='wlan0.html' download='logs.html'>" . Download . "</a>";
	
} else {
						echo "<table class = 'table table-bordered' class ='table table-hover'>";
						echo "<thead>";
						echo "<tr>";
						echo "<th>" . 'Cell' . "</th>";
						echo "<th>" . 'Mac Address' . "</th>";
						echo "<th>" . 'Frequency' . "</th>";
						echo "<th>" . 'Channel' . "</th>";
						echo "<th>" . 'Encryption' . "</th>";
						echo "<th>" . 'Signal level' . "</th>";
						echo "<th>" . 'Quality' . "</th>";
						echo "<th>" . 'ESSID' . "</th>";						
						echo "<tbody>";
						
						$firstpart2 = "<html><head></head><body><<table class = 'table table-bordered' class ='table table-hover'>>
						<thead>
						<tr>
						<th>Cell #</th>
						<th>Mac Address</th>
						<th>Channel</th>
						<th>Frequency</th>
						<th>Quality</th>
						<th>Signal level</th>
						<th>Encryption Key</th>
						<th>ESSID</th>
						
						<tbody>";
			
	$wifitxt = shell_exec('iwlist wlan1 scan > wifi.txt'); // store list of wifi data as wifi.txt
	$essid = shell_exec('cat wifi.txt | egrep "ESSID"'); // filters wifi.txt for essid's
	$essid = str_replace("                    "," ",$essid);	
	$other = shell_exec('cat wifi.txt | egrep "Channel|Address|Encryption|BitRates|Quality|Signal level"'); // filters wifi.txt for everything else
	$other = str_replace("                    "," ",$other);
	$rem = shell_exec('rm wifi.txt'); //because data is already stored, we reset wifi.txt
	$array_essid = explode("ESSID", $essid); //splits the essid's by the ESSID tag
	$array_essid = str_replace("                    "," ",$array_essid);	
	$array_other = explode("Cell", $other); //splits all information based on cell tag
	$array_other = str_replace("                    "," ",$array_other);
	$countessid = count($array_other); //counts the amount of wifis
	$realessid = $countessid-1; // the real number
	$blll = ' connections nearby';

echo "<caption>" . $realessid . $blll . "</caption>";
	for($i=1;$i<$countessid;$i++){
	
		$array_used = explode(" ", $array_other[$i]); // splits the information of wifi with spaces 
			$array_used = str_replace("                    "," ",$array_used);
		$used = count($array_used); // counts the amount of spaces
		
		echo "<tr>";
	
		for($j=0;$j<$used;$j++){ 
		
			if($j==1) //cell number
			{
			echo "<td>" . $array_used[$j] . "</td>";
		
			}
			elseif($j==4) //mac address
			{
				$mac = $array_used[$j];
				echo "<td>" . $mac . "</td>";
			}
			
			elseif($j==8) //frequency
			{
				$channel=str_replace(")","",$array_used[$j]);
				echo "<td>" . $channel . "</td>";
			}
			
			elseif($j==5) //channel
			{
				$frequency=str_replace("Frequency:","",$array_used[$j]);
				echo "<td>" . $frequency . "</td>";
			}
			elseif($j==10) //encryption key
			{
				$key=str_replace("key:","",$array_used[$j]);
				echo "<td>" . $key . "</td>";
			}
			elseif($j==12) //signal level
			{
				$level=str_replace("level:","",$array_used[$j]);
				echo "<td>" . $level . "</td>";
			}
			elseif($j==13) //quality
			{
				$quality="driver does not support";
				echo "<td>" .$quality . "</td>";
			}			
		
		}	
		$barbam=str_replace(":","",$array_essid[$i]);
		
		echo "<td>" . $barbam . "</td></tr>";
			$sql = "INSERT INTO essid (mac, frequency, channel, encrypt, sigquality, quality, essid, date)
				VALUES ('$mac', '$frequency', '$channel', '$key', '$level', '$quality', '$barbam', NOW())";

			if ($conn->query($sql) === TRUE) {
				$good=1;
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				$good=0;
			}
	} 
	$countessid--;
	$realessid--;
	if ($good == 1){
		echo "";
	}
	
	$lastpart2 = "</body></html>";
	$wlan1 = fopen("/var/www/html/wlan1.html", "w") or die("Unable to open file!");
	fwrite($wlan1, $firstpart2);
	fwrite($wlan1, $lastpart2);
	fclose($wlan1);
	
	echo "<a href='wlan1.html' download='logs2.html'>" . Download . "</a>";
} 

$conn->close();

?>