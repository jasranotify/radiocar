<?php
$url= $base."include/templatemo/";
?>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	color: #FF0000;
}
-->
</style>


<div id="templatemo_main">
    <!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images">
<ul>
<?php
$q="SELECT * FROM product WHERE flag='1'";
$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
?>
<li>
<a href="<?php echo $site."/user_control/buythis/$data[id]"; ?>" title="<?php echo $data["product_name"];  ?>" rel="gb_page_center[<?php echo $gb_width.",".$gb_height; ?>]">
<img src="<?php echo $site."/main_control/view_img/product/$data[id]";?>" width="200" height="500" alt="bmx1" title="bmx1" id="wows1_0"/></a></li>

<?php
}//while
?>

	
	

</ul></div>
<div class="ws_bullets"><div>

<?php
$q="SELECT * FROM product WHERE flag='1'";
$r=mysql_query($q);
$bil=1;
while($data=mysql_fetch_array($r)){
?>
<a href="<?php echo $site."/user_control/buythis/$data[id]"; ?>" title="<?php echo $data["product_name"];  ?>" rel="gb_page_center[<?php echo $gb_width.",".$gb_height; ?>]">
<img src="<?php echo $site."/main_control/view_img/product/$data[id]";?>" alt="<?php echo $data["product_name"]; ?>" width="300" height="250"/><?php echo $bil;?>
</a>


<?php
$bil++;
}//while
?>

</div></div>
<span class="wsl"><a href="http://wowslider.com">jQuery Slideshow</a> <!--by WOWSlider.com v4.7--></span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="<?php echo $url; ?>engine1/wowslider.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	<!-- END of templatemo_main -->
<span class="style1">WELCOME TO eKST bicycle</span></div>
