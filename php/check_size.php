<?
include "../php/mysql_connect.php";
function folderSize($dir){
$count_size = 0;
$count = 0;
$dir_array = scandir($dir);
  foreach($dir_array as $key=>$filename){
    if($filename!=".." && $filename!="."){
       if(is_dir($dir."/".$filename)){
          $new_foldersize = foldersize($dir."/".$filename);
          $count_size = $count_size+ $new_foldersize;
        }else if(is_file($dir."/".$filename)){
          $count_size = $count_size + filesize($dir."/".$filename);
          $count++;
        }
   }
 }
return $count_size;
}




function sizeFormat($bytes){
$kb = 1024;
$mb = $kb * 1024;
$gb = $mb * 1024;
$tb = $gb * 1024;

if (($bytes >= 0) && ($bytes < $kb)) {
return $bytes . ' B';

} elseif (($bytes >= $kb) && ($bytes < $mb)) {
return ceil($bytes / $kb) . ' KB';

} elseif (($bytes >= $mb) && ($bytes < $gb)) {
return ceil($bytes / $mb) . ' MB';

} elseif (($bytes >= $gb) && ($bytes < $tb)) {
return ceil($bytes / $gb) ;

} elseif ($bytes >= $tb) {
return ceil($bytes / $tb) . ' TB';
} else {
return $bytes . ' B';
}
}


$iparray=array();
$sql="SELECT image_name FROM images";
$result = mysql_query($sql);

$ergebniss=array();

while($row = mysql_fetch_array($result))
{
   $name[] = $row['image_name'];
}


foreach ($name as $name1):
$name2 = $name1;
$name1 = "/home/partimage/$name1";
$image_size = sizeFormat(folderSize($name1));
$eintrag = "UPDATE images SET image_size='$image_size' WHERE image_name='$name2'";
$eintragen 					= mysql_query($eintrag);
endforeach;
?>

