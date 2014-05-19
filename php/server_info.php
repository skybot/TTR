<?php
	$server_status = array ();
    $server_status["mem"] 		= exec("free -m | grep Mem | awk '{print $3}'");
    $server_status["cpu"] 		= exec("top -b -n 1 |awk 'NR>7&&NR<30 {s+=$9} END {printf(\"%2.1f\",s)}'");
    $server_status["sda2_size"] = exec("df -h | awk 'NR>6 {print $3}'");
    $server_status["sda2_use"]  = exec("df  | awk 'NR>6 {print $3}'");
    $server_status["sda1_size"] = exec("df -h | awk 'NR<3&&NR>1 {print $3}'");
    $server_status["sda1_use"]  = exec("df  | awk 'NR<3&&NR>1 {print $3}'");
    echo json_encode($server_status);
	die();
?>