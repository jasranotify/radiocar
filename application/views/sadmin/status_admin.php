<?php


if($statuss==0){
  $checked0="checked='checked'";
  $checked1="";	
}//ifstatus0

if($statuss==1){
  $checked1="checked='checked'";
  $checked0="";	
}//ifstatus0

?>



<h3><?php echo $id; ?> STATUS</h3>


<form action="" method="post">
<input type="radio" name="status" value="1" <?php echo $checked1; ?> />Active
<input type="radio" name="status" value="0" <?php echo $checked0; ?> />Passive
<input type="submit" name="submit" value="UPDATE" />
</form>

<?php
if(isset($_POST["submit"])){
	
	//echo $id;
	$q="update tbl_admin set aktif='$_POST[status]' where code_admin='$id'";
	mysql_query($q);
	//parent.parent.GB_hide();
	?>
    <body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
    <?php
	}


?>