<script type="text/javascript">
      var baseUrl='<?php echo $base."" ?>';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=baseUrl+'/deleteRecord.php';
      }
  </script>



<h1>Presiden View</h1>
<br>
Sort By : 
<a href="?ref=list_users&sort=nama">Name</a> : 
<a href="?ref=list_users&sort=codeuser">Code</a> : 
<a href="?ref=list_users&sort=datesubmit">Date Submit</a> 
<table class="firstTable" width="90%">
  <tr>
    <th>Bil</th>
    <th>Code</th>
    <th>Name</th>
    <th>DateSubmit</th>
    <th>1st Verified</th>
    <th>2nd Verified</th>
    <th>Date Payment</th>
    <th>Payment Approved</th>
    <th>Action</th>
  </tr>
<?php
$ci =get_instance();
if(isset($_GET["sort"])){
$q="select a.*,b.date_approve as datepayapprove,b.admin_yg_approve as bendahariygapprove from tbl_user a,tbl_inv b where a.codeuser=b.user_id and (b.inv_status=2) and  a.status_user='2' and a.flag='1' order by a.$_GET[sort] asc";
//$q="select a.* from tbl_user a where a.status_user='1' order by a.$_GET[sort] asc";	
	}//if($_GET["sort"])
else{
$q="select a.*,b.date_approve as datepayapprove,b.admin_yg_approve as bendahariygapprove from tbl_user a,tbl_inv b where a.codeuser=b.user_id and (b.inv_status=2) and  a.status_user='2' and a.flag='1' and b.invfor='REGISTRATION'";	
	}
//echo $q;
$a=0;

$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
	
	
	$qinv="SELECT inv_status,img_resit FROM tbl_inv WHERE inv_id='$data[inv_code]'";
	list($inv_status,$img_resit)=mysql_fetch_row(mysql_query($qinv));
	
	if($data["status_user"]==0){
		$statususer="New";
		}//
	if($data["status_user"]==1){
		$statususer="Verified";
		}//
	if($data["status_user"]==2){
		$statususer="Approved";
		}//
	
	
	//$ci->load->library('../controllers/admin_control');
	$nama_admin1=$ci->get_namaadmin($data["aid_verify1"]);
	$nama_admin2=$ci->get_namaadmin($data["aid_verify2"]);
	$nama_bendahari=$ci->get_namaadmin($data["bendahariygapprove"]);
	//echo $nama_admin1;
	
?> 
  <tr>
    <td><?php echo $a+1; ?></td>
    <td><?php echo "<a href='$site/admin_control/detail_ahli/$data[codeuser]' target='_blank'>$data[codeuser]</a>"; ?></td>
    <td><?php echo $data["nama"]; ?></td>
    <td><?php echo $data["datesubmit"]; ?></td>
    <td><?php echo $data["date_verify1"]." by $nama_admin1"; ?></td>
    <td><?php echo $data["date_verify2"]." by $nama_admin2"; ?></td>
    <td><?php echo $data["datesubmit"]; ?></td>
    <td><?php echo $data["datepayapprove"]." by $nama_bendahari"; ?></td>
    <td>
    <?php
	if($inv_status==2 && $_SESSION["logs"]["user_level"]==222){
			
	
	?>
	
	
	<a href="javascript:window.open('<?php echo $site; ?>/presiden_control/approve_ahli_action/<?php echo $data["codeuser"]."/1/".$data["codeuser"]; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Approve this user?')" title="Payment"><button style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:3px">Approve Ahli</button></a>
	
	<a href="javascript:window.open('<?php echo $site; ?>/presiden_control/approve_ahli_action/<?php echo $data["codeuser"]."/0/".$data["codeuser"]; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Reject this user?')" title="Payment"><button style="font-size:7pt;color:white;background-color:red;border:2px solid #336600;padding:3px">Reject Ahli</button></a>
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

<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

  