<script type="text/javascript">
      var baseUrl='<?php echo $base."" ?>';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=baseUrl+'/deleteRecord.php';
      }
  </script>



<h1>Verified User</h1>
<br>
Sort By : 
<a href="?ref=list_users&sort=nama">Name</a> : 
<a href="?ref=list_users&sort=codeuser">Code</a> : 
<a href="?ref=list_users&sort=datesubmit">Date Submit</a> 

<table border="1" width="90%">
  <tr>
    <th>Bil</th>
    <th>Code</th>
    <th>Name</th>
    <th>Email</th>
    <th>Uname</th>
    <th>Pswd</th>
    <th>DateSubmit</th>
    <th>Date Verified</th>
    <th>Invoice</th>
    <th>Payment Receipt</th>
    <th>Action</th>
  </tr>
<?php

if(isset($_GET["sort"])){
$q="select a.* from tbl_user a where a.status_user='1' and a.flag='1' order by a.$_GET[sort] asc";	
	}//if($_GET["sort"])
else{
$q="select a.* from tbl_user a where a.status_user='1' and a.flag='1'";	
	}
//echo $q;
$a=0;

$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
	
	$qinv="SELECT inv_status,img_resit FROM tbl_inv WHERE inv_id='$data[inv_code]'";
	list($inv_status,$img_resit)=mysql_fetch_row(mysql_query($qinv));
	if($inv_status==0){
		$Payment="Not Paid";
		}//
	if($inv_status==1){
		$Payment="Paid";
		}//
	
	
	
	
	
	if($data["status_user"]==0){
		$statususer="New";
		}//
	if($data["status_user"]==1){
		$statususer="Verified";
		}//
	if($data["status_user"]==2){
		$statususer="Approved";
		}//
?> 
  <tr>
    <td><?php echo $a+1; ?></td>
    <td><?php echo "<a href='$site/admin_control/detail_ahli/$data[codeuser]' target='_blank'>$data[codeuser]</a>"; ?></td>
    <td><?php echo $data["nama"]; ?></td>
    <td><?php echo $data["email"]; ?></td>
    <td><?php echo $data["username"]; ?></td>
    <td><?php echo $data["password"]; ?></td>
    <td><?php echo $data["datesubmit"]; ?></td>
    <td>
	<?php
	
	
	if($data["date_verify"]!=""){
		echo "Verify By $data[aid_verify] at $data[date_verify]"; 
	}// if($data["datesubmit"]!="")
	
	?>
    </td>
    <td>
	<?php echo $data["inv_code"]."-".$Payment; ?></td>
    
    <td>
      <?php 
	  if($inv_status==1){
	  echo '<img width="200" height="150" src="data:image/jpeg;base64,'.base64_encode( $img_resit ).'"/>'; 
	  }//if
	  ?>
    </td>
    <td>   
<?php
if($inv_status==1){
		

?>


<a href="javascript:window.open('<?php echo $site; ?>/admin_control/approve_user_action/<?php echo $data["inv_code"]."/1/".$data["codeuser"]; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Approve this user?')" title="Verify"><button style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:3px">Approve Payment</button></a>

<a href="javascript:window.open('<?php echo $site; ?>/admin_control/approve_user_action/<?php echo $data["inv_code"]."/0/".$data["codeuser"]; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Approve this user?')" title="Verify"><button style="font-size:7pt;color:white;background-color:red;border:2px solid #336600;padding:3px">Reject Payment</button></a>
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

  