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
.style4 {color: #000000}
.style7 {
	color: #555;
	font-weight: bold;
}
-->
</style>
</head>
<body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
	  <h1 class="style1">&nbsp;</h1>
	  <h1 class="style3">e - KST Bike Sales</h1>
    </div>
	<!-- END of templatemo_header -->
    <div id="templatemo_menu" class="ddsmoothmenu">      
    <ul>
            <li><a href="index.html">Home</a></li>
          <li><a href="bicycles.html".html">Bicycles</a>
                <ul>
                    <li><a href="mountain.html">Mountain Bike</a></li>
                    <li><a href="roadbike.html">Road Bike</a></li>
                    <li><a href="bmx.html">BMX</a></li>
                    <li><a href="fixie.html">Fixie Bike</a></li>
              	</ul>
      </li>
           <li><a href="kid's bike.html">Kid's Bike</a>
                <ul>
                    <li><a href="tolocar.html">Tolocar</a></li>
                    <li><a href="scooter.html">Scooter</a></li>
                    <li><a href="tricycles.html">Tricycles</a></li>
              	</ul>
          </li>
            <li><a href="accessories.html">Accessories</a>
                <ul>
                    <li><a href="helmet.html">Helmet</a></li>
                    <li><a href="cycling clothing.html">Cycling Clothing</a></li>
                    <li><a href="cycling shoes.html">Cycling Shoes</a></li>
                    <li><a href="gloves.html">Gloves</a></li>
              	</ul>
          </li>
			<li><a href="parts.html">Parts</a>
                <ul>
                    <li><a href="chain.html">Chain</a></li>
                    <li><a href="paddle.html">Paddle</a></li>
                    <li><a href="tyres.html">Tyres</a></li>
                    <li><a href="saddle.html">Saddle</a></li>
              	</ul>
          </li>
            <li><a href="profile.php" class="selected">Profile</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div id="templatemo_main">
    	<?php
		$iduser=$_SESSION["id"];
		$q="select * from customer where id='$iduser'";
		$data=mysql_fetch_array(mysql_query($q));
		
		
		?>
        
        
        <h2 align="center"><strong>PROFILE</strong></h2>
      <p align="center"><img src="icon profile/User.png" width="240" height="240" /></p>
      <table width="304" align="center" bordercolor="#333333"><tr><td width="339"><table width="304" align="center" bordercolor="#333333">
        <tr>
          <td width="47"><strong>Name</strong></td>
          <td width="5">:</td>
          <td width="339"><span class="style4"><?php echo $data["fname"]." ".$data["lname"]; ?></span></td>
        </tr>
        <tr>
          <td><strong>I/C No.</strong></td>
          <td>:</td>
          <td><span class="style4"><?php #echo $data["fname"] ?><</span><;/td>
        </tr>
        <tr>
          <td><strong>Gender</strong></td>
          <td>:</td>
          <td><span class="style4">FEMALE</span></td>
        </tr>
        <tr>
          <td><strong>Race</strong></td>
          <td>:</td>
          <td><span class="style4">MALAY</span></td>
        </tr>
        <tr>
          <td><strong>Tel No.</strong></td>
          <td>:</td>
          <td><span class="style4">0122805260</span></td>
        </tr>
        <tr>
          <td><strong>Email</strong></td>
          <td>:</td>
          <td><span class="style4">siti.aisyah87@gmail.com</span></td>
        </tr>
        <tr>
          <td><span class="style7">Address</span></td>
          <td><span class="style4">:</span></td>
          <td><span class="style4">No, 10 Jalan Permata 5/12 <br />
            Blok 26, Alor Gajah, Melaka.</span></td>
        </tr>
        <tr>
          <td><strong>Date </strong></td>
          <td>:</td>
          <td><span class="style4">5/10/2013</span></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>&nbsp;</td>
        </tr>
      </table>        <span class="style4"></span></td>
</tr>
      </table>
     <p align="center">
     <?php
	 print_r($_SESSION);
	 ?>
     
       <input type="Submit" name="Submit" value="Edit" />
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