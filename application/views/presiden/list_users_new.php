<script type="text/javascript">
      var baseUrl='<?php echo $base."" ?>';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=baseUrl+'/deleteRecord.php';
      }
  </script>



<h1>New User</h1>
<br>
Sort By : 
<a href="?ref=list_users&sort=nama">Name</a> : 
<a href="?ref=list_users&sort=codeuser">Code</a> : 
<a href="?ref=list_users&sort=datesubmit">Date Submit</a> 
<table border="1" width="90%">
  <tr>
    <th>Bil</th>
    <th>Pic</th>
    <th>Code</th>
    <th>Name</th>
    <th>IC</th>
    <th>Phone</th>
    <th>Email</th>
    <th>DateSubmit</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
<?php
if(isset($_GET["sort"])){
$q="select * from tbl_user where status_user='0' and flag='1' order by $_GET[sort] asc";	
	}//if($_GET["sort"])
else{
$q="select * from tbl_user where status_user='0' and flag='1'";	
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
    <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['gambar'] ).'" width="100" height="100"/>'; ?></td>
    <td><?php echo "<a href='$site/admin_control/detail_ahli/$data[codeuser]' target='_blank'>$data[codeuser]</a>"; ?></td>
    <td><?php echo $data["nama"]; ?></td>
    <td><?php echo $data["ic"]; ?></td>
    <td><?php echo $data["handphone"]; ?></td>
    <td><?php echo $data["email"]; ?></td>
    <td><?php echo $data["datesubmit"]; ?></td>
    <td>
      <?php echo $statususer; ?>
    </td>
    <td>   


<a href="javascript:window.open('<?php echo $site; ?>/admin_control/verify_user_action/<?php echo $data["codeuser"]."/1"; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Verified user will need to pay membership fee.Verify the user?')" title="Verify"><button style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:3px">Verify</button></a>

<a href="javascript:window.open('<?php echo $site; ?>/admin_control/verify_user_action/<?php echo $data["codeuser"]."/0"; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Rejected this user with notes?')" title="Delete"><button style="font-size:7pt;color:black;background-color:yellow;border:2px solid #336600;padding:3px">Reject</button></a>

<a href="javascript:window.open('<?php echo $site; ?>/admin_control/verify_user_action/<?php echo $data["codeuser"]."/99"; ?>','width=200,height=100')" target="_blank" onclick="return confirm('Delete this user information from database.Are you sure?')" title="Delete"><button style="font-size:7pt;color:white;background-color:red;border:2px solid #336600;padding:3px">Delete</button></a>


    
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

  