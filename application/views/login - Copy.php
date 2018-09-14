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
	
	window.location.replace("<?php echo $site; ?>/presiden_control/list_users_new?ref=list_users");
	
	</script>

<?php

die();
}//if($lvl_user==22)

/*----------------------------------------------------president end------------------------------------------------------------------------*/


/*----------------------------------------------------user------------------------------------------------------------------------*/

if($lvl_user==3){
//$id="-2";
$_SESSION["logs"]["user_level"]=3;
$_SESSION["logs"]["user_id"]=$user_id;

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





<div id="templatemo_wrapper">
	<div id="templatemo_header">
	  <h1 class="style1">&nbsp;</h1>
	  <h1 class="style3">JASRA</h1>
    </div>
	<!-- END of templatemo_header -->
    <div id="templatemo_menu" class="ddsmoothmenu">      <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div id="page">
    	
        <h2>&nbsp;</h2>

     <div class="col two-third">
         
         <p>
		 <a href="<?php echo $site; ?>">
		 <img src="<?php echo $base; ?>include/images/radioamaturicon.png" width="630" height="288" />
		 </a>
		 </p>
       <p><a href="register.html"></a></p>
      </div>
  <form name="mylogin" action="" method="post" onSubmit="return validateform()">
      <h4><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style5">LOGIN</span></strong></h4>
	        <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IC. No :</strong></p>
      
			  <label>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="uname" id="textfield" />
			  </label>
	 <br />
			<p>
		      <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password :</strong></p>
		   
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pswds" id="textfield2" />    
           
			
			  <label><br />
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <button type="submit" name="submit" style="border: 0; background: transparent">
    <img src="<?php echo $url ?>login.png" width="90" height="50" alt="submit" />
</button>
               
               
              
             <br />
			  <br />
			  <a href="<?php echo $site; ?>/main_control/register">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $url; ?>sign up.png" alt="" width="223" height="59" /></a><br />
			  <br />
			  </label>
      </form>
			<p><br/>
      </p>
		    <h4>&nbsp;</h4>
            <h4>&nbsp;</h4>
            <h4>&nbsp;</h4>
            <h4>&nbsp;</h4>
            <h4>&nbsp;</h4>
            <h4>&nbsp;</h4>
            <h4><br/>
      </h4>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><br />
      </p>
         
        <div class="clear"></div> 
    </div><!-- END of templatemo_main -->
</div><!-- END of templatemo_wrapper -->
<!-- END of templatemo_bottom_wrapper -->
