
<?php
//error_reporting(E_ERROR | E_PARSE);
if(isset($_GET["ref"])){
  $ref=$_GET["ref"];
}//if isset

else{
  $ref="home";
	
}
$activepayment="";$activeregistration="";$activekid="";$activeacces="";$activeparts="";$activeprofile="";
$activecarts="";$activeinvoice="";


if($ref=="list_admins"){$activelist_admins="class='selected'";}
if($ref=="registration"){$activeregistration="class='selected'";}
if($ref=="payment"){$activepayment="class='selected'";}
if($ref=="acces"){$activeacces="class='selected'";}
if($ref=="parts"){$activeparts="class='selected'";}
if($ref=="profile"){$activeprofile="class='selected'";}
if($ref=="carts"){$activecarts="class='selected'";}
if($ref=="invoice"){$activeinvoice="class='selected'";}


?><body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
	  <p class="style3">&nbsp;</p>
	  <p class="style3">XXX</p>
  </div>
	<!-- END of templatemo_header -->
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            
          
          
<?php
if($_SESSION["logs"]["user_level"]){
?>	
	  
             <li><a href="<?php echo $site ?>/user_control/profile?ref=profile" <?php echo $activeprofile; ?>>Profile</a></li>
			 <li><a href="<?php echo $site ?>/user_control/payment?ref=payment" <?php echo $activepayment; ?> >Payment</a></li>
			 
			
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
$code_user=$_SESSION["logs"]["user_id"];	
$q="select nama from tbl_user where codeuser='$code_user'";
list($namauser)=mysql_fetch_row(mysql_query($q));
?>


<div align="right">
<font color="green" size="+1">
User:<?php echo $namauser; ?> &nbsp;
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