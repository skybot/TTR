<?php
$time = time();
while ($time + (5*60) > time()){
	$eth3_status = array ();
    $eth3_status["eth3_in"] 	= exec("ifstat -i eth3 -b -n 0.8 1| awk 'NR>2 {print $1}'");
    $eth3_status["eth3_out"] 	= exec("ifstat -i eth3 -b -n 0.8 1| awk 'NR>2 {print $2}'");
    $fp = fopen('/var/www/version2/php/results_eth3.json', 'w');
    fwrite($fp, json_encode($eth3_status));
    fclose($fp);
  sleep(0.1); //pause for 0.1 seconds
  }
?>