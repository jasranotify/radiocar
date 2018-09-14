<script>

function validateform()
          {
             //alert("ok");
			 var uname=document.forms["mylogin"]["uname"].value;
             if(uname==""){alert("Please insert username.");return false;}
          } 	

</script>


<body>

<?php
$url= $base."include/templatemo/";
?>

<?php
if(isset($_POST["submit"])){
$uname=$_POST["uname"];
$pswd=$_POST["pswds"];


$q="select lvl_user,user_id from tbl_login where username='$uname' and passwordd='$pswd' and flag='1'";
list($lvl_user,$user_id)=mysql_fetch_row(mysql_query($q));

/*----------------------------------------------------sadmin------------------------------------------------------------------------*/


if($lvl_user==1){
//$id="-2";
$_SESSION["logs"]["user_level"]=1;
$_SESSION["logs"]["user_id"]=$user_id;

?>
<script language="javascript">
	
	window.location.replace("<?php echo $site; ?>/sadmin_control/list_admins?ref=list_admins");
	
	</script>

<?php
//header( 'Location: http://localhost/eKST/admin.php' ) ;

die();
}//if($lvl_user==1)

/*----------------------------------------------------sadmin end------------------------------------------------------------------------*/



/*----------------------------------------------------admin------------------------------------------------------------------------*/

if($lvl_user==2){
	
$q="select nama,ic,phone,email,aktif from tbl_admin where code_admin='$user_id'";
list($nama,$ic,$phone,$email,$flag)=mysql_fetch_row(mysql_query($q));

if($flag==0){
	echo "<script>alert('$nama account is not active');</script>";
	die("Your account is not active");	
	}//if


//$id="-2";
$_SESSION["logs"]["user_level"]=2;
$_SESSION["logs"]["user_id"]=$user_id;
$_SESSION["logs"]["nama"]=$nama;
$_SESSION["logs"]["ic"]=$ic;
$_SESSION["logs"]["phone"]=$phone;
$_SESSION["logs"]["email"]=$email;


//print_r($_SESSION);
//die();

?>
<script language="javascript">
	
	window.location.replace("<?php echo $site; ?>/admin_control/list_users_new?ref=list_users");
	
	</script>

<?php

die();
}//if($lvl_user==2)

/*----------------------------------------------------admin end------------------------------------------------------------------------*/


/*----------------------------------------------------bendahari------------------------------------------------------------------------*/

if($lvl_user==22){
	
$q="select nama,ic,phone,email,aktif from tbl_admin where code_admin='$user_id'";
list($nama,$ic,$phone,$email,$flag)=mysql_fetch_row(mysql_query($q));

if($flag==0){
	echo "<script>alert('$nama account is not active');</script>";
	die("Your account is not active");	
	}//if


//$id="-2";
$_SESSION["logs"]["user_level"]=22;
$_SESSION["logs"]["user_id"]=$user_id;
$_SESSION["logs"]["nama"]=$nama;
$_SESSION["logs"]["ic"]=$ic;
$_SESSION["logs"]["phone"]=$phone;
$_SESSION["logs"]["email"]=$email;


//print_r($_SESSION);
//die();

?>
<script language="javascript">
	
	window.location.replace("<?php echo $site; ?>/bendahari_control/invoice?ref=invoice");
	
	</script>

<?php

die();
}//if($lvl_user==22)

/*----------------------------------------------------bendahari end------------------------------------------------------------------------*/


/*----------------------------------------------------president------------------------------------------------------------------------*/

if($lvl_user==222){
	
$q="select nama,ic,phone,email,aktif from tbl_admin where code_admin='$user_id'";
list($nama,$ic,$phone,$email,$flag)=mysql_fetch_row(mysql_query($q));

if($flag==0){
	echo "<script>alert('$nama account is not active');</script>";
	die("Your account is not active");	
	}//if


//$id="-2";
$_SESSION["logs"]["user_level"]=222;
$_SESSION["logs"]["user_id"]=$user_id;
$_SESSION["logs"]["nama"]=$nama;
$_SESSION["logs"]["ic"]=$ic;
$_SESSION["logs"]["phone"]=$phone;
$_SESSION["logs"]["email"]=$email;


//print_r($_SESSION);
//die();

?>
<script language="javascript">
	
	window.location.replace("<?php echo $site; ?>/admin_control/list_users_berdaftar?ref=list_users");
	
	</script>

<?php

die();
}//if($lvl_user==22)

/*----------------------------------------------------president end------------------------------------------------------------------------*/


/*----------------------------------------------------user------------------------------------------------------------------------*/

if($lvl_user==3){
//$id="-2";

echo $q="select nama,ic,handphone,email  from tbl_user where codeuser='$user_id'";
list($nama,$ic,$phone,$email)=mysql_fetch_row(mysql_query($q));
$_SESSION["logs"]["user_level"]=3;
$_SESSION["logs"]["user_id"]=$user_id;
$_SESSION["logs"]["nama"]=$nama;
$_SESSION["logs"]["ic"]=$ic;
$_SESSION["logs"]["phone"]=$phone;
$_SESSION["logs"]["email"]=$email;

//die();


?>
<script language="javascript">
	
	window.location.replace("<?php echo $site; ?>/user_control/profile?ref=Profile");
	
	</script>

<?php

die();
}//if($lvl_user==2)



/*----------------------------------------------------user end------------------------------------------------------------------------*/




if($lvl_user==""){
echo "<script>alert('Salah Username Atau Password.');</script>";
}




#print_r($_POST);
}//if isset

?>









<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JASRA</title>
	<link rel='stylesheet' type='text/css' href='include/home.css' />
	<script type='text/javascript' src='include/jquery-1.7.1.min.js'></script>
 	<script type="text/javascript">
$(document).ready(function() {
    $('#resowidth').val(screen.width);
    $('#resoheight').val(screen.height);
});
	</script>
</head>
<body>
<div style="
	width: 100%; 
	height: 43px;
	background-image:url(<?php echo $base;?>include/images/black_band.jpg);
	background-repeat: repeat-x;
	"></div>
<table border="0" width="100%" height="100%" class="main">
  <tr>
    <td class="gradient">&nbsp;</td>
  </tr>
  <tr>

    <td align='center'>

    <table border='0' width='60%' class='centerbox'>
      <tr>
        <td width='50%' align='center'>
<div class="infoboxx">

<table border="0">
  <tr align="center">
    <td><span class="gradient"><img src="<?php echo $base;?>include/images/web-logo.png" width="200" height="170"></span></td>
    </tr>
  <tr>
    <td style="border-left: 0px solid #c4c8cc; padding: 5px;"><form name="mylogin" action="" method="post" onSubmit="return validateform()">

				

<table border="0" class="main" style="margin-top:5%">
  <tr>
    <td rowspan="2"><img src="<?php echo $base;?>include/images/lock-icon.png" width="64" height="64" border="0" alt="" /></td>
    <td align="left" >LOGIN ID</td>
    <td >:</td>
    <td ><input type="text" name="uname" id="uname" /></td>
  </tr>
  <tr>
    <td align="left" >PASSWORD</td>
    <td >:</td>
    <td ><input type="password" name="pswds" id="pswds" /> </td>
  </tr>
  <tr>
    <td colspan="3" valign="bottom">
    
	<br>
    <i><font size="2">
	<a href="#">Can't access your account?</a>
    <br>
    <a href="<?php echo $site."/main_control/register"; ?>">Pendaftaran baru</a>
    
    
    </font></i></td>
    <td align="right"><br /><input type="submit" name="submit" id="submit" value="ENTER" /></td>
  </tr>
</table>

<input type="hidden" name="resowidth" id="resowidth" />
<input type="hidden" name="resoheight" id="resoheight" />
</form></td>
  </tr>
</table>
</div>        </td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td class="gradient" align='center' valign="center">
<font color="#000">Copyright &copy; <?php echo date("Y"); ?> All Rights Reserved.</font>    </td>
  </tr>
</table>












</body>
</html>