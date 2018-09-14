<?php

$q="select img_resit from tbl_inv where inv_id='$invid'";
list($img)=mysql_fetch_row(mysql_query($q));


echo '<img width="100%" height="100%" src="data:image/jpeg;base64,'.base64_encode( $img ).'"/>'; 

?>

