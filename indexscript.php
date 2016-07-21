<?php

$output = shell_exec("top -b -n 1 | grep Cpu");
$cool_array = explode(' ', $output);

//echo $cool_array[2] . '% Cpu usage' ;
//echo $cool_array[10];

$free = $cool_array[10];
$used = 100-$free;



$output2 = shell_exec("top -b -n 1 | grep Mem");
$cool_array2 = explode(' ', $output2);

$usedm = $cool_array2[9];
$freem = $cool_array2[13];

?>