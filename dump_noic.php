<?php
include "db.php";

$q="SELECT * FROM tbl_ahlilama WHERE c_ic=1";
$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
//echo $data["daerah"];
$noic=$data["ic"];

$noic=str_replace(".","",$noic);

echo $q="update tbl_ahlilama set ic='$noic' where id='$data[id]'";
##mysql_query("insert into tbl_daerah set negeri='JOHOR',daerah='$data[daerah]'");
mysql_query($q);
echo "<br>";
}//while
?>