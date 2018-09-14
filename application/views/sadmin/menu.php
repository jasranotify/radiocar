
<?php
//error_reporting(E_ERROR | E_PARSE);
if(isset($_GET["ref"])){
  $ref=$_GET["ref"];
}//if isset

else{
  $ref="home";
	
}
$activelist_admins="";$activeregistration="";$activekid="";$activeacces="";$activeparts="";$activeprofile="";
$activecarts="";$activeinvoice="";


if($ref=="list_admins"){$activelist_admins="class='selected'";}
if($ref=="registration"){$activeregistration="class='selected'";}
if($ref=="kid"){$activekid="class='selected'";}
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
            <li><a href="<?php echo $site ?>/sadmin_control/list_admins?ref=list_admins" <?php echo $activelist_admins; ?> >List Admin</a></li>
          <li>
		  <a href="<?php echo $site ?>/sadmin_control/register_admins?ref=registration" <?php echo $activeregistration; ?>>Register Admin</a>
          </li>
          
<?php
if($_SESSION["logs"]["user_level"]){
?>	
	  
             <li><a href="?ref=profile" <?php echo $activeprofile; ?>>Profile</a></li>
			 <li><a href="?ref=invoice" <?php echo $activeinvoice; ?>>Invoice</a></li>
			 
			
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
?>
</pre>




<?php
if($_SESSION["logs"]["user_level"]){
?>


<div align="right">
<font color="green" size="+1">
SuperAdmin&nbsp;
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