<script type="text/javascript">
      var baseUrl='<?php echo $base."" ?>';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=baseUrl+'/deleteRecord.php';
      }
  </script>



<h1>Approved User</h1>
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
    <th>IC</th>
    <th>Phone</th>
    <th>Email</th>
    <th>DateSubmit</th>
    <th>Date Approve payment</th>
  </tr>
<?php
if(isset($_GET["sort"])){
$q="select * from tbl_user where status_user='2' order by $_GET[sort] asc";	
	}//if($_GET["sort"])
else{
$q="select * from tbl_user where status_user='2'";	
	}
//echo $q;
$a=0;

$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
	
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
    <td><?php echo $data["ic"]; ?></td>
    <td><?php echo $data["handphone"]; ?></td>
    <td><?php echo $data["email"]; ?></td>
    <td><?php echo $data["datesubmit"]; ?></td>
    <td><?php echo $data["date_approve"]; ?></td>
  </tr>
  
<?php
$a++;
}//while

//print_r($_SESSION);
?>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

  