<?php
include "db.php";

$q="SELECT * FROM tbl_ahlilama WHERE c_ic=1 and c_transfer=0 limit 100";
$r=mysql_query($q);
$a=0;
while($data=mysql_fetch_array($r)){
//echo $data["daerah"];
$noic=$data["ic"];

$noic=str_replace(".","",$noic);

$noahli= $data["idahli"];
//$wnn=explode($noahli,"-");
$wnn=explode("-",$noahli);

echo $runningno=$wnn[1];
echo "<br>";


echo $q="INSERT INTO tbl_user SET jeniskeahlian=1,runningno='$runningno',noahli='$data[idahli]',nama='$data[nama]',ic='$data[ic]',dob='$data[dob]',alamatrumah='$data[addressjalan],$data[bandar]',pokskodrumah='$data[poskod]',bandarnegerirumah='$data[daerah]-$data[negeri]',handphone='$data[phone]',callsign='$data[callsign]',username='$data[ic]',PASSWORD='$data[ic]',status_user=4,flag=1,user_system_lama='1',email='$data[email]'
";
mysql_query($q);

echo $qinv="SELECT id FROM tbl_user WHERE ic='$data[ic]'";
list($idcodeuser)=mysql_fetch_row(mysql_query($qinv));

$codeuser="UID".sprintf('%08d', $idcodeuser);
mysql_query("update tbl_user set codeuser='$codeuser' WHERE ic='$data[ic]'");



mysql_query("INSERT INTO tbl_login SET user_id='$codeuser',username='$data[ic]',passwordd='$data[ic]',lvl_user=3,ahli=1,flag=1");

echo "<br>";
mysql_query("update tbl_ahlilama set c_transfer='1' WHERE id='$data[id]'");

echo $a;
echo "<br>";
$a++;
}//while


?>

