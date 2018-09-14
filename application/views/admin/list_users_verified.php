<script type="text/javascript">
      var baseUrl='<?php echo $base."" ?>';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=baseUrl+'/deleteRecord.php';
      }
  </script>



<h1>Bendahari View</h1>
<br>
Sort By : 
<a href="?ref=list_users&sort=inv_id">Invoice Number</a> : 
<a href="?ref=list_users&sort=user_id">Code User</a> : 
<a href="?ref=list_users&sort=date_bayar">Date payment</a> 

<table class="firstTable" width="90%">
  <tr>
    <th>Bil</th>
    <th>No Ahli</th>
    <th>Name</th>
    <th>Type</th>
    <th>DatePayment</th>
    <th>Invoice</th>
    <th>Payment Receipt</th>
    <th>Action</th>
  </tr>
<?php
$ci=get_instance();
if(isset($_GET["sort"])){
$q="SELECT a.*,b.nama,b.noahli,b.email FROM tbl_inv a,tbl_user b WHERE a.inv_status=1 and a.user_id=b.codeuser order by a.$_GET[sort] asc";	
	}//if($_GET["sort"])
else{
$q=" SELECT a.*,b.nama,b.noahli,b.email FROM tbl_inv a,tbl_user b WHERE a.inv_status=1 and a.user_id=b.codeuser";	
	}
//echo $q;
$a=0;

$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
	
	$inv_status=$data["inv_status"];
	if($inv_status==0){
		$Payment="Not Paid";
		}//
	if($inv_status==1){
		$Payment="Paid";
		}//
	if($inv_status==2){
		$Payment="Paid Approved";
		}//
	if($inv_status==3){
		$Payment="Payment Reject. Waitng For User reupload receipt.";
		}//
	
	
	
	

		

?> 
  <tr>
    <td><?php echo $a+1; ?></td>
    <td><?php echo "<a href='$site/admin_control/detail_ahli/$data[user_id]' target='_blank'>$data[user_id]</a>"; ?></td>
    <td><?php echo $data["nama"]; ?></td>
    <td><?php echo $data["invfor"]; ?></td>
    <td><?php echo $data["date_payment"]; ?></td>
    <td>
    <?php echo $data["inv_id"]."-".$Payment; ?></td>
    
    <td>
      <?php 
	  if($inv_status==1){
	  echo '<img width="200" height="150" src="data:image/jpeg;base64,'.base64_encode( $data["img_resit"] ).'"/>'; 
	  }//if
	  ?>
    </td>
    <td>   
<?php
if($inv_status==1 && $_SESSION["logs"]["user_level"]==22){
		

?>


<a href="javascript:window.open('<?php echo $site; ?>/bendahari_control/approve_payment_action/<?php echo $data["inv_id"]."/1/".$data["user_id"]."/$data[invfor]"; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Approve this payment?')" title="Payment"><button style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:3px">Approve Payment</button></a>

<a href="javascript:window.open('<?php echo $site; ?>/bendahari_control/approve_payment_action/<?php echo $data["inv_id"]."/0/".$data["user_id"]."/$data[invfor]"; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Reject the payment?')" title="Payment"><button style="font-size:7pt;color:white;background-color:red;border:2px solid #336600;padding:3px">Reject Payment</button></a>
<?php

}//if($inv_status==1)
?>

    
    </td>
  </tr>
  
<?php
$a++;
}//while

//print_r($_SESSION);
?>
</table>

<br><br><br><br>
<?php /*?>

<h1>List Email Keluar(Paparan Sementara Email engine Belum ada)</h1>
<table border="1" width="90%">
  <tr>
    <td>Bil</td>
    <td>Receipant name</td>
    <td>Receipant email</td>
    <td>Subject/Title</td>
    <td>Message</td>
    <td>Sender</td>
  </tr>
  
<?php
$q="select * from tbl_email_keluar where flag='1'";	
//echo $q;
$a=0;

$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
  
  ?>
  
  <tr>

    <td><?php echo $a+1; ?></td>
    <td><?php echo $data["recipient_name"]; ?></td>
    <td><?php echo $data["receipent"]; ?></td>
    <td><?php echo $data["subjek"]; ?></td>
    <td><?php echo $data["content"]; ?></td>
    <td><?php echo $data["sender"]; ?></td>
  </tr>
 <?php
 $a++;
}//while
//echo "xcvxvc 2016-12-23 15:16:10";
//echo "<br>";
//echo "xcvxvc 2016-12-23 15:16:10";

 ?> 
 
  
</table>
<br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

  <?php */?>