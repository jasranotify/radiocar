<?php
session_start();
$conn=mysql_connect("localhost","root","");


if(!$conn){die("salah connection kot..cer check");}


$database=mysql_select_db("e_kst_bike_sales");
if(!$database){die("xjumpa databse nama tu");}

?>


