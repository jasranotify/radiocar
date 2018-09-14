<?php
include "db.php";

$q="SELECT daerah,negeri FROM tbl_ahlilama WHERE daerah IS NOT NULL AND daerah <>'' AND negeri='johor' GROUP BY daerah ORDER BY daerah ASC";
$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
echo $data["daerah"];

##mysql_query("insert into tbl_daerah set negeri='JOHOR',daerah='$data[daerah]'");
echo "<br>";
}//while
?>