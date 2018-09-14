<?php

//echo $id;

//echo $table;
header('Content-type: image/png');

$q="SELECT img FROM $table WHERE id='$id'";
list($img)=mysql_fetch_row(mysql_query($q));






echo $img;




?>