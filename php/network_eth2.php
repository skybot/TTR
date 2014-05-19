<?php
$time = time();
while ($time + (5*60) > time()){
    $eth2_status = array ();
    $eth2_status["eth2_in"] 	= exec("ifstat -i eth2 -b -n 0.8 1| awk 'NR>2 {print $1}'");
    $eth2_status["eth2_out"] 	= exec("ifstat -i eth2 -b -n 0.8 1| awk 'NR>2 {print $2}'");
    $fp = fopen('/var/www/version2/php/results_eth2.json', 'w');
    fwrite($fp, json_encode($eth2_status));
    fclose($fp);
  sleep(0.1); //pause for 0.1 seconds
  }
?>