<script type="text/javascript">
      var baseUrl='<?php echo $base."" ?>';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=baseUrl+'/deleteRecord.php';
      }
  </script>



<h1>Active User</h1>
<br>
Sort By : 
<a href="?ref=list_users&sort=nama">Name</a> : 
<a href="?ref=list_users&sort=codeuser">Code</a> : 
<a href="?ref=list_users&sort=datesubmit">Date Submit</a>
<a href="?ref=list_users&sort=expired_on">Expiring</a> 
<table class="firstTable" width="90%">
  <tr>
    <th>Bil</th>
    <th>Code</th>
    <th>Name</th>
    <th>DateSubmit</th>
    <th>1st Verified</th>
    <th>2nd Verified</th>
    <th>Approved By presiden</th>
    <th>Expired On</th>
    <th>Sijil</th>
  </tr>
<?php
$ci =get_instance();

$qq="select a.* from tbl_user a where a.status_user='3' and a.flag='1'";
$nodata=mysql_num_rows(mysql_query($qq));

$config['base_url'] = "$site/admin_control/list_users_berdaftar/";
$config['total_rows'] = $nodata;
$config['per_page'] = 10;
if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
$nkberapaperpage=$config['per_page'];
//echo "asa";
$startpage=$this->uri->segment(3);
if($startpage==""){$startpage=0;}
$this->pagination->initialize($config);
echo $this->pagination->create_links();



$qq="SELECT a.*,b.price,b.inv_id,b.date_issued,b.inv_status,b.img_resit,b.*  FROM tbl_user a,tbl_inv b WHERE b.flag='1' AND b.user_id=a.codeuser AND b.flag='1' order by b.id asc limit $startpage,$nkberapaperpage";










if(isset($_GET["sort"])){
$q="select a.* from tbl_user a where a.status_user='3' and a.flag='1' order by a.$_GET[sort] asc limit $startpage,$nkberapaperpage";
//$q="select a.* from tbl_user a where a.status_user='1' order by a.$_GET[sort] asc";	
	}//if($_GET["sort"])
else{
$q="select a.* from tbl_user a where a.status_user='3' and a.flag='1' limit $startpage,$nkberapaperpage";	
	}
//echo $q;
$a=$startpage;

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
	//$nama_bendahari=$ci->get_namaadmin($data["bendahariygapprove"]);
	//echo $nama_admin1;
	
?> 
  <tr>
    <td><?php echo $a+1; ?></td>
    <td><?php echo "<a href='$site/admin_control/detail_ahli/$data[codeuser]' target='_blank'>$data[codeuser]</a>"; ?></td>
    <td><?php echo $data["nama"]; ?></td>
    <td><?php echo $data["datesubmit"]; ?></td>
    <td><?php echo $data["date_verify1"]." by $nama_admin1"; ?></td>
    <td><?php echo $data["date_verify2"]." by $nama_admin2"; ?></td>
    <td><?php echo $data["approved_by_presiden"]; ?></td>
    <td><?php echo $data["expired_on"]; ?></td>
    <td>
	<?php 
	
	//echo "<a href='$site/admin_control/sijil_ahli/$data[codeuser]' target='_blank'>View</a>"; 
	echo "<a href='$site/admin_control/sijil_ahli_pdf/$data[codeuser]' target='_blank'><img src='$base/include/images/pdf.png' width='30' height='30'></a>"; 
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

  