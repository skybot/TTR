<?php
header('Content-type: application/json; charset=utf-8');
include "/var/www/assets/php/mysql_connectinfo.php";
$feedback = array ();
exec("ps aux | grep -i 'ocsmgrd' | grep -v grep", $pids1);
exec("ps aux | grep -i 'drblpush' | grep -v grep", $pids2);
if(empty($pids1)) 					//Recover-Server aus
{
$feedback["ocsmgrd"] = 0;
}
else
{
$feedback["ocsmgrd"] = 1;			//Recover-Server an
$feedback["ocsmgrd_log"] 	=nl2br(file_get_contents('/var/log/clonezilla/clonezilla-jobs.log'));
$abfrage 			= mysql_query("SELECT log_image,log_count, log_room FROM log_server ORDER BY log_date DESC LIMIT 1");
$feedback["log"] 		= mysql_fetch_row($abfrage);


//schauen wenn server fertig ist
$data = file_get_contents("/var/log/clonezilla/clonezilla-jobs.log");
$count = count(preg_split("/client/", $data));

$count1 = ($count-1);
if ($count1 == $feedback['log']['1'])
{
shell_exec("sudo drbl-ocs stop");
shell_exec("sudo dcs -nl local");
shell_exec("sudo dcs -nl clean-dhcpd-lease");
shell_exec("sudo rm /var/log/clonezilla/clonezilla-jobs.log");
}
}

if(empty($pids2))
{
$feedback["drblpush"] = 0;			//Reconfig-Server aus
}
else
{
$feedback["drblpush"] = 1;			//Reconfig-Server an
}
echo json_encode($feedback);
die();
?>



