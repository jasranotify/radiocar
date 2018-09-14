<style type="text/css">
<!--
body {
  font-family:Tahoma;
}

img {
  border:0;
}

#page {
  width:800px;
  margin:0 auto;
  padding:15px;

}

#logo {
  float:left;
  margin:0;
}

#address {
  height:181px;
  margin-left:250px; 
}

table {
  width:80%;
}

td {
padding:5px;
}

tr.odd {
  background:#e1ffe1;
}
-->
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
</script>

<pre>

<?php
function scaleImageFileToBlob($file) {

   //echo $source_pic = $file;
    $max_width = 500;
    $max_height = 500;
	//list($width, $height, $type, $attr) = getimagesize($file);
    list($width, $height, $image_type) = getimagesize($file);
	//$dsas = getimagesize(trim($file));
	//echo $image_type;
	//print_r(getimagesize($file));
    switch ($image_type)
    {
        case 1: $src = imagecreatefromgif($file); break;
        case 2: $src = imagecreatefromjpeg($file);  break;
        case 3: $src = imagecreatefrompng($file); break;
        default: return '';  break;
    }

    $x_ratio = $max_width / $width;
    $y_ratio = $max_height / $height;

    if( ($width <= $max_width) && ($height <= $max_height) ){
        $tn_width = $width;
        $tn_height = $height;
        }elseif (($x_ratio * $height) < $max_height){
            $tn_height = ceil($x_ratio * $height);
            $tn_width = $max_width;
        }else{
            $tn_width = ceil($y_ratio * $width);
            $tn_height = $max_height;
    }

    $tmp = imagecreatetruecolor($tn_width,$tn_height);

    /* Check if this image is PNG or GIF, then set if Transparent*/
    if(($image_type == 1) OR ($image_type==3))
    {
        imagealphablending($tmp, false);
        imagesavealpha($tmp,true);
        $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
        imagefilledrectangle($tmp, 0, 0, $tn_width, $tn_height, $transparent);
    }
    imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);

    /*
     * imageXXX() only has two options, save as a file, or send to the browser.
     * It does not provide you the oppurtunity to manipulate the final GIF/JPG/PNG file stream
     * So I start the output buffering, use imageXXX() to output the data stream to the browser,
     * get the contents of the stream, and use clean to silently discard the buffered contents.
     */
    ob_start();

    switch ($image_type)
    {
        case 1: imagegif($tmp); break;
        case 2: imagejpeg($tmp, NULL, 100);  break; // best quality
        case 3: imagepng($tmp, NULL, 0); break; // no compression
        default: echo ''; break;
    }

    $final_image = ob_get_contents();

    ob_end_clean();

    return $final_image;
}





if(isset($_POST["submit"])){
	
	//print_r($_FILES);
	
	//tgk files error x
	if($_FILES["resitbayaran"]["error"]==1){die("something wrong with your images..maybe too large size..or corrupted files");}//if
	
	
	/*$target_file="resit_bayaran/";
	
	//move upload file
	if (move_uploaded_file($_FILES["resitbayaran"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["resitbayaran"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }*/
	
	
	$file_content = scaleImageFileToBlob($_FILES["resitbayaran"]["tmp_name"]);
	$file_content = addslashes($file_content);
	
	mysql_query("update tbl_inv set img_resit='$file_content',date_payment='$datenow',inv_status='1' where inv_id='$_POST[inv_id]'");
	
	
	
	$q="SELECT a.id,a.nama,a.codeuser,a.email FROM tbl_user a,tbl_inv b WHERE a.codeuser=b.user_id AND b.inv_id='$_POST[inv_id]'";
	list($user_id,$namaahli,$codeuser,$emailahli)=mysql_fetch_row(mysql_query($q));
	
	$ci = get_instance();
	$ci->load->library('../controllers/email_control');
	$penghantar="Admin";
	
	 //$tajuk="New Registration";
	
	
	
	$qemaibendahari="SELECT email FROM tbl_admin WHERE leveladmin='bendahari'";
	$remailbendahari=mysql_query($qemaibendahari);
	$emailbendahari="";
	while($dataemailbendahari=mysql_fetch_array($remailbendahari)){
		$emailbendahari.=$dataemailbendahari["email"].",";
		
		}//while
		$emailbendahari.="bendahari@mydomain.aaasa";
	 
	 	
	 //$ci->email_control->sendmail($penghantar, $penerima,$tajuk,$mesej);
	 
	 $ci->email_control->sendmail_userbayar($penghantar, $emailahli,$codeuser,$namaahli,$emailbendahari,$_POST["inv_id"]);
	
	
	
	}//if(isset($_POST["submit"]))


?>
</pre>

<h1>Payment</h1>
<br>





<table border="1" cellpadding="1" cellspacing="0" width="80%">
  
  <tr>
    <th>Bil</td>
    <th>Inv No </th>
    <th>Customer</th>
    <th> Price </th>
    <th>Date Inv </th>
    <th>Status</th>
  </tr>




<?php

//echo $qq="SELECT a.*,b.price,b.inv_id,b.date_issued,b.inv_status,b.img_resit  FROM tbl_user a,tbl_inv b WHERE b.user_id='$uid' AND b.user_id=a.codeuser AND b.flag='1' and (b.inv_status=0 or b.inv_status=3)";
$qq="SELECT a.*,b.price,b.inv_id,b.date_issued,b.inv_status,b.img_resit  FROM tbl_user a,tbl_inv b WHERE b.user_id='$uid' AND b.user_id=a.codeuser AND b.flag='1'";

$rr=mysql_query($qq);
$bil=1;
while($dataaa=mysql_fetch_array($rr)){



?>
  <tr>
    <td><?php echo $bil; ?></td>
    <td><a href="?ref=invoice&refid=<?php echo $dataaa["inv_id"];?>"><?php echo $dataaa["inv_id"];?></a></td>
    <td><?php echo $dataaa["nama"]; ?></td>
    <td><?php echo $dataaa["price"]; ?></td>
    <td><?php echo $dataaa["date_issued"]; ?></td>
    <td width="30%">
    <?php
	//inv xbayar lagi
	if($dataaa["inv_status"]==0 || $dataaa["inv_status"]==3){
		echo "Not Paid <font size='1' color='green'>(Upload Image for payment Receipt Prove Only)</font>";
		?>
		<form action="" method="post" onSubmit="return validateform()" name="payment" id="payment" enctype="multipart/form-data">
        <!--<input type="file"  id="resitbayaran" name="resitbayaran" accept="image/*" />-->
        <input type="file" id="resitbayaran"  name="resitbayaran" accept="image/x-png,image/gif,image/jpeg" />
        <input type="hidden" name="inv_id" value="<?php echo $dataaa["inv_id"];?>"/>
        <input type="submit" name="submit" value="Upload">
        </form>
        <?php
		}//if($dataaa["inv_status"]==0)
	//inv xbayar lagi end
	
	
	//inv dah bayar.tggu approval
	if($dataaa["inv_status"]==1){
		echo "Paid";
		echo '<img width="300" height="200" src="data:image/jpeg;base64,'.base64_encode( $dataaa['img_resit'] ).'"/>';
		}//if($dataaa["inv_status"]==1)
	//inv dah bayar.tggu approval end
	
	//inv dah approve
	if($dataaa["inv_status"]==2){
		echo "Paid Approved";
		}//if($dataaa["inv_status"]==2)
	//inv dah approve end
	?>
	 
    </td>
  </tr>


<?php
$bil++;
}//while
?>
</table>




<?php
if(isset($_GET["refid"])){
$qq2="SELECT a.*,b.price,b.inv_id,b.date_issued,b.inv_status  FROM tbl_user a,tbl_inv b WHERE b.user_id='$uid' AND b.user_id=a.codeuser AND b.flag='1' and b.inv_id='$_GET[refid]'";
$r=mysql_query($qq2);
$dataaaaa=mysql_fetch_array($r);
?>


<div id="page">
  <div id="logo">
    <!--<a href="http://www.danifer.com/"><img src="http://www.danifer.com/images/invoice_logo.jpg"></a>-->
	
	  <a href=""><img src="<?php echo $base."include/images/web-logo.png"; ?>" width="150" height="150"></a>
	
  </div><!--end logo-->
  
  <div id="address">
<?php
$init_code=$_GET["refid"];
?>
    <p>http://www.jasra.org.my/ <br />
    <a href="#">info@jasra.org.my</a><br />
    <br />
    Invoice No <?php echo $init_code; ?><br />
    Created on <?php echo $dataaaaa["date_issued"]; ?><br />
    </p>
  </div><!--end address-->

  <div id="content">
    <p>
      <strong>Customer Details</strong><br />
      Name: <?php echo $dataaaaa["nama"];?><br />
       Address: <?php echo "$dataaaaa[alamatrumah] , $dataaaaa[pokskodrumah] $dataaaaa[bandarnegerirumah]";?><br />
	  Contact: <?php echo $dataaaaa["handphone"]." / ".$dataaaaa["email"];?>    </p>
    <hr>
    <table>
      <tr>
        <td><strong>Bil</strong></td>
	    <td><strong>Nama</strong></td>
	    <td><strong>Description</strong></td>
	  <td><strong>Qty</strong></td>
	  <td><strong>Unit Price</strong></td>
	  <td><strong>Amount</strong></td>
	  </tr>
	  
      
	  
      <tr class="odd">
      <td><?php echo 1; ?></td>
	  <td><?php echo $dataaaaa["inv_id"];?></td>
	  <td><?php echo "Registration Fee";?></td>
	  <td><?php echo "1 Year";?></td>
	  <td><?php echo $dataaaaa["price"];?></td>
	  <td><?php echo $dataaaaa["price"];?></td>
	  </tr>
  
	   
	  
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td><strong>Total</strong></td>
	  <td><?php #echo $grandtotal;?></td>
	  </tr>
    </table>
    <hr>
    <p>
      Thank you for your order!  <br />
      If you have any questions, please feel free to contact us at<a href="#"> info@jasra.org.my</a></p>
    <p style=" font-size:14px; color:red; font-weight:bold;" align="center">
	<!--<blink>-->
	
	
	
	
	<!--</blink>-->
	</p>
    <hr>
    <p>
      <center><small>This communication is for the exclusive use of the addressee and may contain proprietary, confidential or privileged information. If you are not the intended recipient any use, copying, disclosure, dissemination or distribution is strictly prohibited.
      <br /><br />
      &copy; Jasra All Rights Reserved
      </small>
      </center>
    </p>
  </div><!--end content-->
</div><!--end page-->








<div align="center">
<?php /*?><a onclick="window.open ('<?php echo $site."/user_control/print_inv?refid=$init_code&id=$uid"; ?>', 'mywindow','location=3,status=1,scrollbars=1, width=600,height=600');" href="#" title="Print"><img src="<?php echo $base; ?>include/images/printer.png" width="100" height="100"/></a><?php */?>


<?php
}//isset


?>


