<?php
$userid=$_SESSION["logs"]["user_id"];
$quser="SELECT a.*,b.username,b.passwordd FROM tbl_admin a,tbl_login b WHERE a.code_admin='$userid' AND a.code_admin=b.user_id";
$r=mysql_query($quser);
$data=mysql_fetch_array($r);

?><head>
	<title>Detail User</title>
	<link rel="shortcut icon" href="<?php echo $base;?>include/images/icon.jpg"/>
</head>




<style type="text/css">
<!--
table, tr, td {
  /*border: 1px solid black;*/
}
tr.noBorder td {
  border: 0;
}
</style>


<script type="text/javascript">
<!--
function validateform(){
	
var empt = document.forms["payment"]["resitbayaran"].value;  
if (empt == "")  
{  
alert("Please Select receipt image");  
return false;  
}  
	
	
	
}//function validateform()









function validateFormupdateprofile()
{
	
  var oldpass=document.forms["updateee"]["oldpass"].value;
  if (oldpass==null || oldpass==""){alert("Sila masuk oldpass");return false;}
  if (oldpass!="<?php echo $data["passwordd"]; ?>"){alert("password lama x betul");return false;}
  
  
  
  var pswd=document.forms["updateee"]["pswd"].value;
  if (pswd==null || pswd==""){alert("Please insert new password");return false;}
  
  var password1=document.forms["updateee"]["pswd"].value;
  var password2=document.forms["updateee"]["pswd2"].value;
  
  //alert(password1);
  //alert(password2);
  
  if(password1 != password2){
  alert("Password did not match");
  return false;
  }//if
  
  
  
  var email=document.forms["updateee"]["email"].value;
  if (email==null || email==""){alert("Sila masukkan email anda");return false;}
  
  var re = /\S+@\S+\.\S+/;
  //alert(email);
	  var emailvalid=re.test(email);
	  //if(emailvalid){alert("ok cun");}
	  if(!emailvalid){alert("wrong email format");return false;}




}//function validateForm















</script>



<style type="text/css">
.centertable {
	text-align: center;
}
</style>
<div align="center">

<?php
##print_r($_SESSION);
?>






<!--_______________________user profile_________________________________________________-->



<form method="post" name="updateee" action="" onsubmit="return validateFormupdateprofile()">
<table border="0" width="30%">
  <tr>
    <td colspan="3" bgcolor="#E0F3E2">Profile</td>
  </tr>
  <tr>
    <td>Full Name </td>
    <td>:</td>
    <td><?php echo $data["nama"] ?></td>
  </tr>
  <tr>
    <td>Id No </td>
    <td>:</td>
    <td><?php echo $data["ic"] ?></td>
  </tr>
  <tr>
    <td>Phone </td>
    <td>:</td>
    <td><input type="text" name="phone" value="<?php echo $data["phone"] ?>" /></td>
  </tr>
  <tr>
    <td>Level </td>
    <td>:</td>
    <td><?php echo $data["leveladmin"] ?></td>
  </tr>
  <tr>
    <td>Code</td>
    <td>:</td>
    <td>
	<?php echo $data["code_admin"] ?>
    </td>
  </tr>
  <tr>
    <td>Email</td>
    <td>:</td>
    <td><input type="text" name="email" value="<?php echo $data["email"] ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>




<!--_______________________user profile_________________________________________________-->
	
	
	</td>
    <td>
<!--_______________________uchanged password_________________________________________________-->
	

<input type="hidden" name="updatetype" value="updatepassword" />
<table width="30%">
<tr>
  <td colspan="3" bgcolor="#E0F3E2">Change password</td>
  </tr>
<tr>
  <td>Old password</td>
  <td>:</td>
  <td><input type="password" name="oldpass" id="oldpass" /></td>
</tr>
<tr>
  <td>New password</td>
  <td>:</td>
  <td><input type="password" name="pswd" id="pswd" /></td>
</tr>
<tr>
  <td>Confirm new password</td>
  <td>:</td>
  <td><input type="password" name="pswd2" id="pswd2" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><strong></strong>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
<td><input type="submit" name="update" id="update" value="Update" /></td>
</tr>
</table>

	
	
<!--_______________________uchanged password_________________________________________________-->
	


</form>


</div>

<div align="right">
<a href="<?php echo $site."/email_control/testsendmail"; ?>">.</a>
</div>

