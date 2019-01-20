
<?php
//$url= $base."include/templatemo/";
date_default_timezone_set("Asia/Kuala_Lumpur");
?>







<script language="javascript" type="text/javascript">



function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}











function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
             return true;
          }    









</script>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-size: 36px;
}
.style3 {font-size: 36px; font-family: Arial, Helvetica, sans-serif; color: #FFFFFF;}
.style4 {
	color: #FF0000;
	font-weight: bold;
}
.style5 {
	color: #FF0000;
	font-size: 10px;}
-->
</style>

</head>
<body>


<script language="javascript">
function validateForm()
{

var fname=document.forms["register"]["fname"].value;
if (fname==null || fname==""){alert("Please insert first name");return false;}

var ic_no=document.forms["register"]["ic_no"].value;
if (ic_no==null || ic_no==""){alert("Please insert i/c no");return false;}

var jenisadmin=document.forms["register"]["jenisadmin"].value;
if (jenisadmin==null || jenisadmin==""){alert("Please select level admin");return false;}
//return false;

var tel_no=document.forms["register"]["tel_no"].value;
if (tel_no==null || tel_no==""){alert("Please insert tel no");return false;}

var email=document.forms["register"]["email"].value;
if (email==null || email==""){alert("Please insert email");return false;}

var re = /\S+@\S+\.\S+/;
//alert(email);
    var emailvalid=re.test(email);
	//if(emailvalid){alert("ok cun");}
	if(!emailvalid){alert("wrong email format");return false;} 


var date=document.forms["register"]["date"].value;
if (date==null || date==""){alert("Please insert date of registration");return false;}

}//validateForm
</script>

</script>
    	
        <h2 align="center"><strong>	Register Admin</strong></h2>
        <?php /*?><p align="center"><img src="<?php echo $url; ?>icon profile/User.png" width="240" height="240" /></p><?php */?>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                    <form name="register" onSubmit="return validateForm()" method="post" action="<?php echo $site; ?>/sadmin_control/insert">
                      <table width="100%">
                        <tr>
                          <td><strong>Name</strong></td>
            <td>:</td>
            <td><input type="text" name="fname" size="20"></td>
            </tr>
                        <tr>
                          <td><strong>I/C No.</strong></td>
            <td>:</td>
            <td><input type="text" name="ic_no" maxlength="12" size="20" onKeyPress="return isNumberKey(this.value)" >               
              <span class="style5"> * Example : 890124144567</span></td>
            </tr>
                        <tr>
                          <td><strong>Level</strong></td>
            <td>:</td>
            <td>
              <input type="radio" name="jenisadmin" value="2"/>
              Setiausaha </br>
              <input type="radio" name="jenisadmin" value="22"/>
              Bendahari </br>
              <input type="radio" name="jenisadmin" value="222"/>
              Presiden </br>
              
              <span class="style5">*</span></td>
            </tr>
                        <tr>
                          <td><strong>Tel No.</strong></td>
            <td>:</td>
            <td><input type="text" name="tel_no" size="20" onKeyPress="return isNumberKey(this.value)"> 
              <span class="style5">* Example : 0123456789</span></td>
            </tr>
                        <tr>
                          <td><strong>Email</strong></td>
            <td>:</td>
            <td><input type="text" name="email" size="20"> 
              <span class="style5">*</span></td>
            </tr>
			<?php 
			$datenow=date("Y-m-d");
			$dateview=date("d/m/Y");
			?>
                        <tr>
                          <td><strong>Date of Registration</strong></td>
              <td>:</td>
              <td>
                <input type="hidden" name="date"  value="<?php echo $datenow; ?>" />
				<?php echo $dateview; ?>                 </td>
            </tr>
                        <tr>
                          <td></td>
            <td></td>
            <td>
              
              <div align="center">
                <p align="center">
                  <input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;
                  <input type="reset" name="Submit2" value="Reset" />
                  </p>
                  </div></td>
            </tr>
                      </table>
                    </form>
                  
				  
				  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
    