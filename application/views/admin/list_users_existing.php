<script type="text/javascript">
      var baseUrl='<?php echo $base."" ?>';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=baseUrl+'/deleteRecord.php';
      }
  </script>



<h1>Existing User(dari sistem lama)</h1>
<br>
Sort By : 
<a href="?ref=list_users&sort=nama">Name</a> : 
<a href="?ref=list_users&sort=codeuser">Code</a> : 
<a href="?ref=list_users&sort=callsign">Callsign</a> 
<table border="1" width="90%" class="firstTable">
  <tr>
    <th>Bil</th>
    <th>Code</th>
    <th>Name</th>
    <th>No ahli</th>
    <th>Callsign</th>
    <th>Action</th>
  </tr>
<?php
$ci =get_instance();
if(isset($_GET["sort"])){
$q="select a.* from tbl_user a where a.status_user='4' and a.flag='1' order by a.$_GET[sort] asc";
//$q="select a.* from tbl_user a where a.status_user='1' order by a.$_GET[sort] asc";	
	}//if($_GET["sort"])
else{
$q="select a.* from tbl_user a where  a.status_user='4' and a.flag='1'";	
	}
//echo $q;
$a=0;

$r=mysql_query($q);
while($data=mysql_fetch_array($r)){
	
	

	
?> 
  <tr>
    <td><?php echo $a+1; ?></td>
    <td><?php echo "<a href='$site/admin_control/detail_ahli/$data[codeuser]' target='_blank'>$data[codeuser]</a>"; ?></td>
    <td><?php echo $data["nama"]; ?></td>
    <td><?php echo $data["noahli"]; ?></td>
    <td><?php echo $data["callsign"]; ?></td>
    <td><a onclick="window.open ('transfertonewsystem/<?php echo $data["codeuser"]; ?>', 'mywindow','location=3,status=1,scrollbars=1, width=600,height=600');" href="#">
      Transfer >></a>
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

  