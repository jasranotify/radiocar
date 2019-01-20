<style>

/* Starter CSS for Menu */
#cssmenu {
  padding: 0;
  margin: 0;
  border: 0;
  width: auto;
}
#cssmenu ul,
#cssmenu li {
  list-style: none;
  margin: 0;
  padding: 0;
}
#cssmenu ul {
  position: relative;
  z-index: 597;
}
#cssmenu ul li {
  float: left;
  min-height: 1px;
  vertical-align: middle;
}
#cssmenu ul li.hover,
#cssmenu ul li:hover {
  position: relative;
  z-index: 599;
  cursor: default;
}
#cssmenu ul ul {
  visibility: hidden;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 598;
  width: 100%;
}
#cssmenu ul ul li {
  float: none;
}
#cssmenu ul ul ul {
  top: 0;
  left: 190px;
  width: 190px;
}
#cssmenu ul li:hover > ul {
  visibility: visible;
}
#cssmenu ul ul {
  bottom: 0;
  left: 0;
}
#cssmenu ul ul {
  margin-top: 0;
}
#cssmenu ul ul li {
  font-weight: normal;
}
#cssmenu a {
  display: block;
  line-height: 1em;
  text-decoration: none;
}
/* Custom CSS Styles */
#cssmenu {
  background: #333333;
  border-bottom: 4px solid #006600;
  font-family: 'Oxygen Mono', Tahoma, Arial, sans-serif;
  font-size: 12px;
}
#cssmenu > ul {
  *display: inline-block;
}
#cssmenu:after,
#cssmenu ul:after {
  content: '';
  display: block;
  clear: both;
}
#cssmenu ul {
  text-transform: uppercase;
}
#cssmenu ul ul {
  border-top: 4px solid #1b9bff;
  text-transform: none;
  min-width: 190px;
}
#cssmenu ul ul a {
  background: #006600;
  color: #ffffff;
  border: 1px solid #003300;
  border-top: 0 none;
  line-height: 150%;
  padding: 16px 20px;
  font-size: 12px;
}
#cssmenu ul ul ul {
  border-top: 0 none;
}
#cssmenu ul ul li {
  position: relative;
}
#cssmenu ul ul li:first-child > a {
  border-top: 1px solid #006600;
}
#cssmenu ul ul li:hover > a {
  background: #4eb1ff;
  color: #ffffff;
}
#cssmenu ul ul li:last-child > a {
  -moz-border-radius: 0 0 3px 3px;
  -webkit-border-radius: 0 0 3px 3px;
  border-radius: 0 0 3px 3px;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  -moz-box-shadow: 0 1px 0 #1b9bff;
  -webkit-box-shadow: 0 1px 0 #1b9bff;
  box-shadow: 0 1px 0 #1b9bff;
}
#cssmenu ul ul li:last-child:hover > a {
  -moz-border-radius: 0 0 0 3px;
  -webkit-border-radius: 0 0 0 3px;
  border-radius: 0 0 0 3px;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
}
#cssmenu ul ul li.has-sub > a:after {
  content: '+';
  position: absolute;
  top: 50%;
  right: 15px;
  margin-top: -8px;
}
#cssmenu ul li:hover > a,
#cssmenu ul li.active > a {
  background: #1b9bff;
  color: #ffffff;
}
#cssmenu ul li.has-sub > a:after {
  content: '+';
  margin-left: 5px;
}
#cssmenu ul li.last ul {
  left: auto;
  right: 0;
}
#cssmenu ul li.last ul ul {
  left: auto;
  right: 99.5%;
}
#cssmenu a {
  background: #333333;
  color: #CBCBCB;
  padding: 0 20px;
}
#cssmenu > ul > li > a {
  line-height: 48px;
  font-size: 12px;
}











.firstTable
{
    /*border: 1px solid black;*/
	border-collapse: collapse;
}
.firstTable td
{
    border: 1px solid black;
}
.firstTable th
{
    border: 1px solid black;
    background: #00003f;
    color: white;
}
.firstTable tr:nth-child(even) {
    background-color: #f2f2f2;
}



.firstTable tr:hover {background-color: yellow}






.secondTable
{
    border: 1px solid red;
}
.secondTable td
{
    border: 1px solid red;
    font-family: sans-serif;
}
.secondTable th
{
    border: 1px solid red;
    background: #cfffff;
    color: #00003f;
}













</style>
<?php
#print_r($_SESSION);
$level_user=$_SESSION["logs"]["user_level"];

?>

<body>
<div style="
	width: 100%; 
	height: 43px;
	background-image:url(<?php echo $base;?>include/images/black_band.jpg);
	background-repeat: repeat-x;
	">
    
    
    
    
    </div>
    <div align="center">
    <table border="0" width="80%">
    <tr>
    <td align="left"><img src="<?php echo $base;?>include/images/web-logo.png" width="100" height="100"></td>
    <td align="center"><h1>Jasra Online</h1></td>
    <td align="right"><img src="<?php echo $base;?>include/images/web-logo.png" width="100" height="100"></td>
    
    </tr>
    </table>
    </div>
  


<div id='cssmenu'>
<ul>
		    
            
			<?php if($level_user==1){ ?>
            <li><a href="<?php echo $site ?>/sadmin_control/list_admins?ref=list_admins"><span>List Admin</span></a></li>
            <li><a href="<?php echo $site ?>/sadmin_control/register_admins?ref=registration"><span>Register Admin</span></a></li>
            <?php
			}//superadmin
			?>

			
			
			<?php if($level_user==1 || $level_user==2 || $level_user==22 || $level_user==222){ ?>
            <li><a href="<?php echo $site; ?>/admin_control/profile?ref=profile"><span>Profile</span></a></li>                   
            <li><a href="<?php echo $site ?>/admin_control/list_users_new?ref=list_users"><span>Introducer View</span></a></li>
            <li><a href="<?php echo $site ?>/admin_control/list_users_verified?ref=list_users_verified"><span>Bendahari View</span></a></li>
            <li><a href="<?php echo $site ?>/admin_control/list_users_approved?ref=list_users_approved"><span>Presiden View</span></a></li>
            <li><a href="<?php echo $site ?>/admin_control/list_users_berdaftar"><span>Active User</span></a></li>
            <li><a href="<?php echo $site ?>/admin_control/list_users_existing"><span>User Existing</span></a></li>
            <?php
			}//admin
			?>
            
            
            
            <?php if($level_user==22 || $level_user==22){ ?>
            <li><a href="<?php echo $site; ?>/bendahari_control/invoice?ref=invoice"><span>Invoice</span></a></li>
            <?php
			}//bendahari dan president
			?>
            

            
            
            <?php if($level_user==3){ ?>
             <li><a href="<?php echo $site ?>/user_control/profile?ref=profile" ><span>Profile</span></a></li>
			 <li><a href="<?php echo $site ?>/user_control/payment?ref=payment" ><span>Payment</span></a></li>
            <?php
			}//ahli biasa
			?>
            
   
  
   			<li class='last'><a href='<?php echo $site; ?>/main_control/logout'><span>Log Keluar</span></a></li> 
            
            
			
			
			
            
            
</ul>
</div>
<?php

if($level_user==1){$lname="Superadmin";}
if($level_user==2){$lname="Setiausaha";}
if($level_user==22){$lname="Bendahari";}
if($level_user==222){$lname="Presiden";}
if($level_user==3){$lname="Ahli";}

?>

<strong><font color="green"><i>Welcome <?php echo $lname."--".$_SESSION["logs"]["nama"];?></i></font></strong>


