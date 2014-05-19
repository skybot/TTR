<?php
include "../php/mysql_connect.php";
include "../php/check_size.php";

IF ($_GET['what']=='server_stop') {

shell_exec("sudo drbl-ocs stop");
shell_exec("sudo dcs -nl local");
shell_exec("sudo dcs -nl clean-dhcpd-lease");
shell_exec("sudo rm /var/log/clonezilla/clonezilla-jobs.log");
//echo "1";
exit;
}

IF ($_GET['what']=='save_start') {

//Daten vom Formular empfangfen
$image_name_from_form 		= htmlentities($_GET["image_name"]);
$user 						=($_GET['restore_user']);
$image_name 				= str_replace(" ","_",$image_name_from_form);
$part 						= htmlentities($_GET["part"]);
$os 						= htmlentities($_GET["os"]);
$hw_type 					= htmlentities($_GET["hw_type"]);
$date 						= date("Y-m-d H:i:s");
$description 				= htmlentities($_GET["image_description"]);
$image_type 				= $_GET["image_type"];
//Daten in Datenbank schreiben
$eintrag 					= "INSERT INTO images (image_name, part, os, hw_type, date, description, image_type) VALUES ('$image_name', '$part', '$os', '$hw_type', '$date', '$description', '$image_type')";
$eintragen 					= mysql_query($eintrag);
$eintrag_log 				= "INSERT INTO log_server (log_image, log_count, log_room, log_ip , log_date, log_user, log_type ) VALUES ('$image_name', '1', '', '$hw_type', '$date', '$user', 'save')";
$eintragen_log 				= mysql_query($eintrag_log);
mysql_close();
//Server starten
shell_exec("sudo drbl-ocs --debug=7 -b -q2 -j2 -fsck-src-part-y -p reboot -z1p -i 1000000 -l en_US.UTF-8 startdisk save $image_name sda > /dev/null");
exit;
}
IF ($_GET['what']=='restore_start') {
//Daten vom Formular empfangfen
$image 						=trim($_GET['restore_name']);
$COUNT 						=trim($_GET['count']);
$eth 						=($_GET['eth']);
$user 						=($_GET['restore_user']);
$date 						= date("Y-m-d H:i:s");
//Abfrage welcher Raum zu dieser Schnittstelle passt und welche IP`s zurückgesetzt werden sollen
$abfrage_raum 				= mysql_query("SELECT * FROM room WHERE iface = '".$eth."'");
while($row 					= mysql_fetch_array($abfrage_raum)) {
$room 						= "". $row["room_name"] ."" ;

																}
$result 					= mysql_query("SELECT computer_ip FROM computer WHERE computer_room = '".$room."'");
$ip_address 				= array();
while($row 					= mysql_fetch_array($result)){
if($row['computer_ip'] != '')
$ip_address[] 				= $row['computer_ip'];
}
$ip 						=serialize($ip_address);
//Daten in Datenbank schreiben
$eintrag_log 					= "INSERT INTO log_server (log_image, log_count, log_room, log_ip , log_date, log_user, log_type) VALUES ('$image', '$COUNT', '$room', '$ip', '$date', '$user', 'restore')";
$eintragen_log 					= mysql_query($eintrag_log);
mysql_close();
//Server starten
shell_exec("sudo drbl-ocs --mcast-iface ".$eth."  -b -g auto -e1  auto -e2 -x -hn0 PC -r -j2  -p reboot --clients-to-wait ".$COUNT." -h '".implode( " ", $ip_address )."' -l en_US.UTF-8 startdisk multicast_restore ".$image." sda > /dev/null");
exit;
}
// ======================================== Restore GET from room_*_restore_form.php
IF ($_GET['what']=='restore_room_control') {

$image 						=($_POST['restore_name']);
$ip1						= $_POST['ip'];
$ip2 						=serialize($ip1);
$COUNT 						=count($ip1, COUNT_RECURSIVE);
$eth 						=($_POST['eth']);
$room_page					=($_POST['room_page']);
$room_name					=($_POST['room_name']);
$room_device				=($_POST['room_device']);
$date 						= date("Y-m-d H:i:s");
ob_start();
foreach ($_POST['ip'] as $Element) {
echo $Element." ";
}
$ip3 = ob_get_contents();
ob_end_clean();

$eintrag_log 					= "INSERT INTO log_server (log_image, log_count, log_room, log_ip , log_date, log_user, log_type ) VALUES ('$image', '$COUNT', '$room_name', '$ip3', '$date', '$room_device', 'restore')";
$eintragen_log 					= mysql_query($eintrag_log);
mysql_close();

shell_exec("sudo drbl-ocs --mcast-iface ".$eth."  -b -g auto -e1  auto -e2 -x -hn0 PC -r -j2  -p reboot --clients-to-wait ".$COUNT." -h '".$ip3."' -l en_US.UTF-8 startdisk multicast_restore ".$image." sda > /dev/null");

//header("Location:/".$room_page.".php");
exit;
}

// ======================================== Setup USER GET from setup_user.php
IF ($_GET['what']=='add_user') {

$user_name 						=trim($_GET['user_name']);
$user_pasword 					=trim($_GET['user_pasword']);
$first_name 					=trim($_GET['first_name']);
$last_name 						=trim($_GET['last_name']);
$email 							=trim($_GET['email']);
$user_level 					=trim($_GET['user_level']);
$date 							=date("Y-m-d H:i:s");

$eintrag 						= "INSERT INTO login_usernamen (username, passwort, first_name, last_name , user_email, user_access_level, add_user_date ) VALUES ('$user_name', '$user_pasword', '$first_name', '$last_name', '$email', '$user_level', '$date')";
$eintragen 						= mysql_query($eintrag);
if (!$eintragen) {
die('Ungültige Anfrage: ' . mysql_error());
}
mysql_close();
echo "1";
exit;
}



// ======================================== Setup ROOM GET from setup_rooms.php
IF ($_GET['what']=='add_room') {

$room_name 						=trim($_GET['room_name']);
$count_pc 						=trim($_GET['count_pc']);
$room_admin 					=trim($_GET['room_admin']);
$room_port 						=trim($_GET['room_port']);
$date 							=date("Y-m-d H:i:s");

$eintrag 						= "INSERT INTO room (room_name, count_room_pc, room_admin, add_room_date, iface) VALUES ('$room_name', '$count_pc', '$room_admin', '$date', '$room_port')";
$eintragen 						= mysql_query($eintrag);
if (!$eintragen) {
die('Ungültige Anfrage: ' . mysql_error());
}
mysql_close();
echo "1";
exit;
}


// ======================================== Setup HARDWARE GET from setup_hardware.php
IF ($_GET['what']=='add_hardware') {

$hardware_name = htmlentities($_GET["hardware_name"]);
$hardware_producer = htmlentities($_GET["hardware_producer"]);
$hardware_ram = htmlentities($_GET["hardware_ram"]);
$hardware_disk = htmlentities($_GET["hardware_disk"]);
$hardware_date = date("Y-m-d H:i:s");
//$hardware_pic = ("uploads/resized_$fileName");


$eintrag_hardware = "INSERT INTO hardware (hardware_name, hardware_producer, hardware_ram, hardware_disk, hardware_date) VALUES ('$hardware_name', '$hardware_producer', '$hardware_ram', '$hardware_disk' ,'$hardware_date')";
$eintragen = mysql_query($eintrag_hardware);
if (!$eintragen) {
die('Ungültige Anfrage: ' . mysql_error());
}
mysql_close();
echo "1";
exit;
}
// ======================================== Setup COMPUTER GET from setup_computer.php
IF ($_GET['what']=='add_computer') {
$computer_name = htmlentities($_GET["computer_name"]);
$computer_mac = htmlentities($_GET["computer_mac"]);
$computer_ip = htmlentities($_GET["computer_ip"]);
$computer_room = htmlentities($_GET["computer_room"]);
$computer_hardware = htmlentities($_GET["computer_hardware"]);
$computer_visible = $_GET["computer_visible"];
$eintrag_computer = "INSERT INTO computer (computer_name, computer_mac, computer_ip, computer_room, computer_hardware, computer_visible) VALUES ('$computer_name', '$computer_mac', '$computer_ip', '$computer_room' ,'$computer_hardware','$computer_visible')";
mysql_query($eintrag_computer);
mysql_close();
echo "1";
exit;
}

// ======================================== Setup NEW COMPUTER Configuration from setup_computer.php
IF ($_GET['what']=='reconfigure_mac') {

$room1 = mysql_query("SELECT computer_mac FROM computer WHERE computer_room='Partners'");
$room2 = mysql_query("SELECT computer_mac FROM computer WHERE computer_room='Ideas'");
$room3 = mysql_query("SELECT computer_mac FROM computer WHERE computer_room='Productivity'");
if($room1 === FALSE) {
    die(mysql_error());
}
if($room2 === FALSE) {
    die(mysql_error());
}
if($room3 === FALSE) {
    die(mysql_error());
}


$variabele1 = array();
while($row = mysql_fetch_array($room1))
  {
    if($row['computer_mac'] != '')
        $variabele1[] = $row['computer_mac'];
  }
$variabele2 = array();
while($row = mysql_fetch_array($room2))
  {
    if($row['computer_mac'] != '')
        $variabele2[] = $row['computer_mac'];
  }
$variabele3 = array();
while($row = mysql_fetch_array($room3))
  {
    if($row['computer_mac'] != '')
        $variabele3[] = $row['computer_mac'];
  }

$fp1 = fopen('/etc/drbl/macadr-eth1.txt', 'w');
foreach($variabele1 as $values) fputs($fp1, $values."\n");
fclose($fp1);

$fp2 = fopen('/etc/drbl/macadr-eth2.txt', 'w');
foreach($variabele2 as $values) fputs($fp2, $values."\n");
fclose($fp2);

$fp3 = fopen('/etc/drbl/macadr-eth3.txt', 'w');
foreach($variabele3 as $values) fputs($fp3, $values."\n");
fclose($fp3);

exec(" yes '' | sudo drblpush -c /etc/drbl/drblpush.conf > /dev/null");
echo "1";
exit;
}

// ======================================== Get Image Info for restore_page.php
IF ($_GET['what']=='get_image_info') {
$image 					=($_GET['image']);
$imageinfos			 	= array ();
$abfrage_image 			= mysql_query(
"SELECT hw_type, os, date, image_size, hardware_pic, hardware_disk

FROM images INNER JOIN hardware  ON hw_type = hardware_name



WHERE image_name = '".$image."'");
while($row 				= mysql_fetch_array($abfrage_image)) {

$imageinfos[hw_type] 			= $row['hw_type'];
$imageinfos[os] 				= $row['os'];
$imageinfos[date] 				= $row['date'];
$imageinfos[image_size_gb] 		= $row['image_size'];
//$imageinfos[image_size]  		= substr($imageinfos[image_size_gb], 0, -3);
$imageinfos[hardware_pic] 		= $row['hardware_pic'];
$imageinfos[hardware_disk] 		= $row['hardware_disk'];
//$imageinfos[image_size_PERCENT] = ($imageinfos[image_size] * 100) / $imageinfos[hardware_disk];

}
echo json_encode($imageinfos);

exit;
}

// ======================================== Get user for
IF ($_GET['what']=='get_user') {
$sql="SELECT last_name FROM login_usernamen ORDER BY id ASC";
$result = mysql_query($sql);
$stack=array();
    while($row = mysql_fetch_array($result))
          {
            array_push($stack,array($row['last_name'],$row['last_name']));
          }

echo json_encode($stack);

exit;
}
// ======================================== Get rooms for setup_computer.php
IF ($_GET['what']=='get_rooms') {
$sql="SELECT room_name FROM room ORDER BY id ASC";
$result = mysql_query($sql);
$stack=array();
    while($row = mysql_fetch_array($result))
          {
            array_push($stack,array($row['room_name'],$row['room_name']));
          }

echo json_encode($stack);

exit;
}

// ======================================== Get PC form room setup_wakeup.php
IF ($_GET['what']=='get_pc_room') {

function ping( $obj ){
        $res = array();
        $ret = 0;
        exec( "ping -c 1 -w 1 ".$obj, $res, $ret );
        if( $ret == 0 ) return true;
        return false;
}
$room 					=($_GET['room']);
$arr 	= array();
$rs 	= mysql_query("SELECT * FROM computer WHERE computer_room = '".$room."' AND computer_visible = 'yes'");
while($obj = mysql_fetch_object($rs)) {
	    $obj->ping = ping( $obj->computer_ip )  ?  "1"  :  "0";
		$arr[]  = $obj;
}
echo json_encode($arr);
exit;
}

// ======================================== Get PC form room setup_vnc.php
IF ($_GET['what']=='get_pc_room') {

function ping( $obj ){
        $res = array();
        $ret = 0;
        exec( "ping -c 1 -w 1 ".$obj, $res, $ret );
        if( $ret == 0 ) return true;
        return false;
}
$room 					=($_GET['room']);
$arr 	= array();
$rs 	= mysql_query("SELECT * FROM computer WHERE computer_room = '".$room."' AND computer_visible = 'yes'");
while($obj = mysql_fetch_object($rs)) {
	    $obj->ping = ping( $obj->computer_ip )  ?  "1"  :  "0";
		$arr[]  = $obj;
}
echo json_encode($arr);
exit;
}


// ======================================== Action for wakeup_pc.php
IF ($_GET['what']=='wakeup') {
$mac 					=($_GET['mac']);

$room = mysql_query("SELECT computer_room FROM computer WHERE computer_mac = '".$mac."'");

while($row 				= mysql_fetch_array($room)) {

$wake_up_room = $row['computer_room'];
}

$eth = mysql_query("SELECT iface FROM room WHERE room_name = '".$wake_up_room."'");

while($row 				= mysql_fetch_array($eth)) {

$wake_up_eth = $row['iface'];
}


//wakup magic packet senden starten
shell_exec("sudo etherwake $mac -i $wake_up_eth" );
echo "1";




exit;
}

// ======================================== Action for power_off_pc.php
IF ($_GET['what']=='poweroff') {
$ip 					=($_GET['ip']);


//wakup magic packet senden starten
shell_exec("net rpc shutdown -C 'TAC-RECOVERY - will power of this PC now!' -I $ip -U Administrator%spe2028!" );
echo "1";


exit;
}

// ======================================== Action for vnc_active.php
IF ($_GET['what']=='vnc_active') {
$ip 					=$_GET['ip'];



shell_exec("/home/server/novnc/noVNC-master/utils/launch.sh --vnc $ip:5900 --listen 8888 > /tmp/logfile.txt");
echo "1";
exit;
}

// ======================================== Action for vnc_active.php (kill)
IF ($_GET['what']=='kill_active') {

shell_exec("sudo killall -u www-data python");
echo "1";

exit;
}

?>