


<h1>
User Ini akan di integrasikan ke dalam sistem Baru setelah Admin update maklumat berkenaan.</h1>
<h2>Admin perlu memastikan tarikh expired adalah betul bagi semua ahli sedia ada dari sistem lama bagi membolehkan data lama di gunapakai ke dalam sistem pendaftaran baru secara online..</h2>

<!--------------------------------calendar---------------------------------------------->
    <script type="text/javascript" src="<?php echo $base ?>include/calendar/calendar.js"></script>
    <script type="text/javascript" src="<?php echo $base ?>include/calendar/calendar-setup.js"></script>
    <script type="text/javascript" src="<?php echo $base ?>include/calendar/calendar-en.js"></script>
    <style type="text/css"> @import url("<?php echo $base ?>include/calendar/calendar-blue2.css"); </style>
<!--------------------------------calendar---------------------------------------------->



<script type="text/javascript">
function validateForm()
{
	
	
	
var dateexpired=document.forms["transfer"]["dateexpired"].value;
if (dateexpired==null || dateexpired==""){alert("Sila pilih tarikh expired");return false;}

var dateapprove=document.forms["transfer"]["dateapprove"].value;
if (dateapprove==null || dateapprove==""){alert("Sila pilih tarikh kelulusan");return false;}
}//function validateForm

</script>


<?php
//print_r($_SESSION);
echo $codeuser;
$qq="SELECT a.* FROM tbl_user a WHERE a.codeuser='$codeuser'";

$rr=mysql_query($qq);
$data=mysql_fetch_array($rr);
?>
<form action="" method="post" onsubmit="return validateForm()" name="transfer">
<table border="1">
  <tr>
    <td>Name/No Ahli</td>
    <td><?php echo $data["nama"]." / ".$data["noahli"]?></td>
  </tr>
  <tr>
    <td>Latest Expiring/expired date</td>
    <td>
    <input name="dateexpired" type="text" id="dateexpired" value="" size="10" readonly/>
          <a style="padding:0;border:1px solid #CACACA;width:18px;height:19px;background-image:url('<?php echo $base; ?>include/images/cal.jpg');background-repeat:no-repeat;" type="submit" onMouseOver="this.style.cursor='pointer';"  id="dateexpired-1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <script type="text/javascript">
            Calendar.setup({
              inputField    : "dateexpired",
              button        : "dateexpired-1",
              align         : "Tr"
              
            });
          </script>	
    
    </td>
  </tr>
  <tr>
    <td>Approved by presiden</td>
    <td>
     <input name="dateapprove" type="text" id="dateapprove" value="" size="10" readonly/>
          <a style="padding:0;border:1px solid #CACACA;width:18px;height:19px;background-image:url('<?php echo $base; ?>include/images/cal.jpg');background-repeat:no-repeat;" type="submit" onMouseOver="this.style.cursor='pointer';"  id="dateapprove-1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <script type="text/javascript">
            Calendar.setup({
              inputField    : "dateapprove",
              button        : "dateapprove-1",
              align         : "Tr"
              
            });
          </script>	
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Transfer" /></td>
  </tr>
</table>
</form>


<?php
if(isset($_POST["submit"])){
	
	$datenowww=date("Y-m-d H:i:s");
	print_r($_POST);
	$aid=$_SESSION["logs"]["user_id"];
	
	$q="update tbl_user set expired_on='$_POST[dateexpired]',approved_by_presiden='$_POST[dateapprove]',status_user='3',aid_verify1='$aid',date_verify1='$datenowww',aid_verify2='$aid',date_verify2='$datenowww',datesubmit='$datenowww',transfer_by='$aid @ $datenowww' where codeuser='$codeuser'";
	//die();
	
	mysql_query($q);
	echo "<script language='javascript'> 
opener.location.reload(true);
   self.close();
</script>
";
	
	}

?>