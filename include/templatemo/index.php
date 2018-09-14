<?php
include "db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e - KST Bike Sales</title>
<meta name="keywords" content="contact, maps, form, titanium, free theme, web design, templatemo 372" />
<meta name="description" content="Titanium, Contact Form, Maps, free template from templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />	

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script language="javascript" type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 
<!--  t e m p l a t e m o  372  t i t a n i u m  -->
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-size: 36px;
}
.style3 {font-size: 36px; font-family: Arial, Helvetica, sans-serif; color: #FFFFFF;}
.style5 {font-size: 24px}
-->
</style>
</head>
<body>
<?php
if(isset($_POST["submit"])){
$uname=$_POST["uname"];
$pswd=$_POST["pswds"];


echo $q="SELECT id FROM customer WHERE uname='$uname' AND password_cust='$pswd'";
list($id)=mysql_fetch_row(mysql_query($q));


if($uname=="admin" && $pswd=="azah"){
$id="-2";
$_SESSION["user_level"]=1;
$_SESSION["id"]=$id;

?>
<script language="javascript">
	
	window.location.replace("http://localhost/eKST/admin.html");
	
	</script>

<?php
//header( 'Location: http://localhost/eKST/admin.php' ) ;

die();
}

if($id==""){
echo "<script>alert('Salah Username Atau Password.');</script>";
}
if($id>0){
$_SESSION["user_level"]=2;
$_SESSION["id"]=$id;

?>
<script language="javascript">
	
	window.location.replace("http://localhost/eKST/index2.html");
	
	</script>

<?php


die();
echo "<script>alert('Sini  user biasa.');</script>";
}



print_r($_POST);
}//if isset

?>






<div id="templatemo_wrapper">
	<div id="templatemo_header">
	  <h1 class="style1">&nbsp;</h1>
	  <h1 class="style3">e - KST Bike Sales</h1>
    </div>
	<!-- END of templatemo_header -->
    <div id="templatemo_menu" class="ddsmoothmenu">      <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div id="page">
    	
        <h2>&nbsp;</h2>

     <div class="col two-third">
         
         <p><img src="logopage.png" width="630" height="288" />       </p>
       <p><a href="register.html"></a></p>
      </div>
  <form name="mylogin" action="" method="post">
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
             <input type="submit" name="submit" value="Login"/>
               
               
              
             <br />
			  <br />
			  <a href="register.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="sign up.png" alt="" width="223" height="59" /></a><br />
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
<div id="templatemo_bottom_wrapper">
	<div id="templatemo_bottom">
    	<div class="col one_fourth">
            <h4>About</h4>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus porttitor lacus vel risus ullamcorper tempor. Pellentesque vestibulum vulputate odio sit amet adipiscing.</p>
        </div>
    	<div class="col one_fourth">
            <h4>Photo Gallery</h4>
            <ul class="footer_gallery">
            	<li><a href="images/templatemo_image_06_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_06.jpg" alt="image 6" /></a></li>
                <li><a href="images/templatemo_image_07_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_07.jpg" alt="image 7" /></a></li>
                <li><a href="images/templatemo_image_08_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_08.jpg" alt="image 8" /></a></li>
                <li><a href="images/templatemo_image_09_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_09.jpg" alt="image 9" /></a></li>
                <li><a href="images/templatemo_image_10_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_10.jpg" alt="image 10" /></a></li>
                <li><a href="images/templatemo_image_11_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_11.jpg" alt="image 11" /></a></li>
                <li><a href="images/templatemo_image_12_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_12.jpg" alt="image 12" /></a></li>
                <li><a href="images/templatemo_image_13_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_13.jpg" alt="image 13" /></a></li>
                <li><a href="images/templatemo_image_14_l.jpg"  rel="lightbox[portfolio]"><img src="images/templatemo_image_14.jpg" alt="image 14" /></a></li>
            </ul>
            <div class="clear"></div>
            <a href="gallery.html" class="more">more</a>
        </div>
    	<div class="col one_fourth">
    	<h4>Recent <a href="http://de.onlyimage.com/" title="OnlyImage" rel="nofollow" class="recent_post" target="_blank">Posts</a></h4>
        <ul class="no_bullet">
            <li>
                <span class="header"><a href="#">Etiam suscipit bibendum scelerisque</a></span>
                Aliquam erat volutpat vivamus accumsan magna sit amet.
            </li>
            <li>
                <span class="header"><a href="#">Aliquam at felis odio</a></span>
                Rhoncus purus, in pretium libero ut libero molestie nec lacinia mi fringilla. 
            </li>
                <li>
                <span class="header"><a href="#">Sed vel justo ut sodales nulla</a></span>
                Duis posuere ipsum quis arcu gravida  tincidunt eget ante gravid eu odio.
            </li>
		</ul>
    </div>
    <div class="col one_fourth no_margin_right">
    	<h4>Twitter</h4>
        <ul class="no_bullet">
        	<li><a href="#">@templatemo</a> at scelerisque urna in tellus varius ultricies.</li>
            <li>Suspendisse enean <a href="#">#FREE</a> tincidunt massa in tellus varius ultricies.</li>
            <li> Aenean tincidunt massa in tellus varius ultricies. <a href="#">http://bit.ly/13IwZO</a></li>
        </ul>
    </div>
        
        <div class="clear"></div>
    </div><!-- END of templatemo_bottom -->
    </div><!-- END of templatemo_bottom_wrapper -->    
<div id="templatemo_footer_wrapper">    
    <div id="templatemo_footer">
    	<p>Copyright © 2072 <a href="#">Company Name</a> |
        	<a href="http://www.templatemo.com/preview/templatemo_372_titanium">Titanium</a> by <a href="http://www.templatemo.com">templatemo</a></p>
    </div><!-- END of templatemo_footer -->
</div><!-- END of templatemo_footer_wrapper -->
</body>
</html>