
<?php
//error_reporting(E_ERROR | E_PARSE);
  $activehome="";$activeregistration="";$activekid="";$activeacces="";$activeparts="";$activeprofile="";
  $activelogin="";$activeinvoice="";


if(isset($_GET["ref"])){
  $ref=$_GET["ref"];
}//if isset

else{
  $ref="home";
	
}


if($ref=="home"){$activehome="class='selected'";}
if($ref=="registration"){$activeregistration="class='selected'";}
if($ref=="kid"){$activekid="class='selected'";}
if($ref=="acces"){$activeacces="class='selected'";}
if($ref=="parts"){$activeparts="class='selected'";}
if($ref=="profile"){$activeprofile="class='selected'";}
if($ref=="carts"){$activecarts="class='selected'";}
if($ref=="login"){$activelogin="class='selected'";}


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
            <li><a href="<?php echo $site ?>/guest_control/home?ref=home" <?php echo $activehome; ?> >Home</a></li>
          <li>
		  <a href="<?php echo $site ?>/main_control/register?ref=registration" <?php echo $activeregistration; ?>>Registration</a>
          </li>
           <li><a href="<?php echo $site ?>/main_control/?ref=login" <?php echo $activelogin; ?> >Login</a></li>
          


           
        </ul>
        <br style="clear: left" />
</div> <!-- end of templatemo_menu -->


<br>
<pre>
<?php
#print_r($_SESSION);
?>
</pre>





<pre>
<?php
//print_r($_SESSION);
?>
</pre>