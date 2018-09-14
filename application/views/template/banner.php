<html>
<head>
	<title><?php echo $page;?></title>
	
	
<link rel="stylesheet" href="<?php echo $base; ?>include/blueprint/screen.css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $base; ?>include/blueprint/print.css" media="print" />


<script type="text/javascript">
    var GB_ROOT_DIR = "<?php echo $base; ?>include/greybox/";
</script>

<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/gb_scripts.js"></script>
<link href="<?php echo $base; ?>include/greybox/gb_styles.css" rel="stylesheet" type="text/css" />

<?php /*?>background-image:url(<?php echo $base; ?>images/images.jpg)<?php */?>

<?php
echo "<pre>";
//print_r($_SESSION);
date_default_timezone_set ("Asia/Kuala_Lumpur");
$date=date("d/m/Y H:i:s");
echo "</pre>";

$url= $base."include/templatemo/";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Radio Amatur</title>
<meta name="keywords" content="contact, maps, form, titanium, free theme, web design, templatemo 372" />
<meta name="description" content="Titanium, Contact Form, Maps, free template from templatemo.com" />
<link href="<?php echo $url; ?>templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo $url; ?>css/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $url; ?>css/nivo-slider.css" type="text/css" media="screen" />	

<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/ddsmoothmenu.css" />

<script type="text/javascript" src="<?php echo $url; ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/ddsmoothmenu.js">

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

<link rel="stylesheet" href="<?php echo $url; ?>css/slimbox2.css" type="text/css" media="screen" /> 
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
<pre>
<?php
#print_r($_SESSION);
?>
</pre>


