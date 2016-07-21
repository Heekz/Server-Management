#!/bin/bash
echo "IP address of device?"


flag=0
counter=0
finish=0
fail=0

snmpget -c private -v 2c $1 1.3.6.1.2.1.1.1.0 | awk '{print $4,$5,$6,$7,$8 "\t" $11,$12,$13}'

echo "Do you want to restart this device? 1 for yes" 
read reboot

	
		snmpset -c private -v 2c $1 1.3.6.1.2.1.69.1.1.3.0 i 1
		echo Device rebooting.
			while [ $flag -eq 0 ]; do
				ping -c1 $1
				t1=$?
				clear
				if [ $t1 -eq 0 ]; then
					flag=0
				else
					while [ $fail -lt 3 ]; do
						ping -c1 $1
						t1=$?
						clear
							if [ $t1 -ne 0 ]; then
								let fail=fail+1
							else
								flag=0
							fi
					done
					if [ $fail -eq 3 ]; then
						flag=1
					else
						flag=0
					fi
					let counter=counter+1
				clear
				fi
			done
			start=$(date +%s)
			echo Device is now offline.
			while [ $flag -eq 1 ]; do
				ping -c1 $1
				t2=$?
				clear
				echo Device is coming online.
				if [ $t2 -ne 0 ]; then
					let counter=counter+1
				else
					finish=$counter
					flag=0
					echo Device back online.
					end=$(date +%s)
					timepassed=$(($end-$start))
				fi
			done
			echo $timepassed seconds
	
	
	
	 



