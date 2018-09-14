
<?php
//error_reporting(E_ERROR | E_PARSE);
if(isset($_GET["ref"])){
  $ref=$_GET["ref"];
}//if isset

else{
  $ref="home";
	
}
$activelist_admins="";$activeregistration="";$activelist_users="";$activelist_verified="";$activelist_approved="";$activeprofile="";
$activecarts="";$activeinvoice="";


if($ref=="list_users"){$activelist_users="class='selected'";}
if($ref=="list_users_verified"){$activelist_verified="class='selected'";}
if($ref=="list_users_approved"){$activelist_approved="class='selected'";}
if($ref=="acces"){$activeacces="class='selected'";}
if($ref=="parts"){$activeparts="class='selected'";}
if($ref=="profile"){$activeprofile="class='selected'";}
if($ref=="carts"){$activecarts="class='selected'";}
if($ref=="invoice"){$activeinvoice="class='selected'";}


?><body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
	  <p class="style3">&nbsp;</p>
	  <p class="style3">Radio Amatur
	  </p>
  </div>
	<!-- END of templatemo_header -->
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="<?php echo $site; ?>/admin_control/profile?ref=profile" <?php echo $activeprofile; ?>>Profile</a></li>
            <li><a href="<?php echo $site ?>/admin_control/list_users_new?ref=list_users" <?php echo $activelist_users; ?> >Introducer</a></li>
            <li><a href="<?php echo $site ?>/admin_control/list_users_verified?ref=list_users_verified" <?php echo $activelist_verified; ?> >Bendahari</a></li>
            <li><a href="<?php echo $site ?>/admin_control/list_users_approved?ref=list_users_approved" <?php echo $activelist_approved; ?> >Presiden</a></li>

          
<?php
if($_SESSION["logs"]["user_level"]){
?>	
	  
             
			 <li><a href="<?php echo $site; ?>/admin_control/invoice?ref=invoice" <?php echo $activeinvoice; ?>>Invoice</a></li>
			 
			
<?php
}//jika login
else{
?>
<li><a href="<?php echo $site; ?>/main_control">Login</a></li>
<?php
}//
?>
			


           
        </ul>
        <br style="clear: left" />
</div> <!-- end of templatemo_menu -->


<br>
<pre>
<?php
#print_r($_SESSION);
$userlevel=$_SESSION["logs"]["user_level"];
if($userlevel==1){$namalevel="Superadmin";}
if($userlevel==2){$namalevel="Introducer";}
if($userlevel==22){$namalevel="Bendahari";}
if($userlevel==222){$namalevel="Presiden";}
if($userlevel==3){$namalevel="Ahli";}
?>
</pre>




<?php
if($_SESSION["logs"]["user_level"]){
$code_admin=$_SESSION["logs"]["user_id"];	
$q="select nama from tbl_admin where code_admin='$code_admin'";
list($namaadmin)=mysql_fetch_row(mysql_query($q));
?>


<div align="right">
<font color="green" size="+1">
<?php echo "$namalevel:". $namaadmin; ?> &nbsp;
</font>
<a href="<?php echo $site; ?>/main_control/logout"><strong>LOGOUT</strong></a>
</div>


<?php
}//jika login
?>

<pre>
<?php
//print_r($_SESSION);
?>
</pre>
</div>