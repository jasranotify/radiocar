<script type="text/javascript">
      var baseUrl='<?php echo $base."" ?>';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=baseUrl+'/deleteRecord.php';
      }
  </script>


<h1>Admin LIST</h1>


<table border="1">
  <tr>
    <th>Bil</th>
    <th>Code</th>
    <th>Level</th>
    <th>Name</th>
    <th>IC</th>
    <th>Email</th>
    <th>Username</th>
    <th>Password</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
<?php
$a=0;
$q="select a.*,b.passwordd,b.username from tbl_admin a,tbl_login b where b.user_id=a.code_admin and b.flag='1'";
$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
	
	if($data["aktif"]==1){
		$statususer="Aktif";
		}//
	if($data["aktif"]==0){
		$statususer="Pasif";
		}//
?> 
  <tr>
    <td><?php echo $a+1; ?></td>
    <td><?php echo $data["code_admin"]; ?></td>
    <td><?php echo $data["leveladmin"]; ?></td>
    <td><?php echo $data["nama"]; ?></td>
    <td><?php echo $data["ic"]; ?></td>
    <td><?php echo $data["email"]; ?></td>
    <td><?php echo $data["username"]; ?></td>
    <td><?php echo $data["passwordd"]; ?></td>
    <td>
	<a href="<?php echo $site."/sadmin_control/status_admin/$data[code_admin]/$data[aktif]"; ?>" title="Active/Pasive" rel="gb_page_center[400, 100]"><?php echo $statususer; ?></a>
	</td>
    <td>   



<a onclick="return confirm('Pasti Untuk Padam?')" href="<?php echo $site; ?>/sadmin_control/delete_admin/<?php echo $data["code_admin"] ?>" title="Delete User" rel="gb_page_center[400, 300]" >
[DELETE]</a>


    
    </td>
  </tr>
  
<?php
$a++;
}//while
?>
</table>

<a href="http://somewhere_else" onclick="return confirm()">asa</a>
