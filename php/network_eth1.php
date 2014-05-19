<?php
$time = time();
while ($time + (5*60) > time()){
    $eth1_status = array ();
    $eth1_status["eth1_in"] 	= exec("ifstat -i eth1 -b -n 0.8 1| awk 'NR>2 {print $1}'");
    $eth1_status["eth1_out"] 	= exec("ifstat -i eth1 -b -n 0.8 1| awk 'NR>2 {print $2}'");
    $fp = fopen('/var/www/version2/php/results_eth1.json', 'w');
    fwrite($fp, json_encode($eth1_status));
    fclose($fp);
  sleep(0.1); //pause for 0.1 seconds
  }
?>