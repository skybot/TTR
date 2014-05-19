<?php
$time = time();
while ($time + (5*60) > time()){
    $eth0_status = array ();
    $eth0_status["eth0_in"] 	= exec("ifstat -i eth0 -b -n 0.8 1| awk 'NR>2 {print $1}'");
    $eth0_status["eth0_out"] 	= exec("ifstat -i eth0 -b -n 0.8 1| awk 'NR>2 {print $2}'");
    $fp = fopen('/var/www/version2/php/results_eth0.json', 'w');
    fwrite($fp, json_encode($eth0_status));
    fclose($fp);
  sleep(0.1); //pause for 0.1 seconds
  }
?>