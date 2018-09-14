<?php
//print_r($_SESSION);
#echo $id;
#echo $statuss;
$aid=$_SESSION["logs"]["user_id"];
$aname=$_SESSION["logs"]["nama"];
$ci = get_instance();
$ci->load->library('../controllers/email_control');
require_once("dompdf/dompdf_config.inc.php");
spl_autoload_register('DOMPDF_autoload');


function getnoahli($bandarnegeriii,$newrunningno){
	$q="SELECT runningno FROM tbl_user WHERE runningno<>0 ORDER BY runningno DESC LIMIT 1";
		
	$wnn=explode("-",$bandarnegeriii);
	$daerah=$wnn[0];
	$negeri=$wnn[1];
	
	$q="SELECT code FROM tbl_daerah WHERE negeri='$negeri' and daerah='$daerah'";
	list($code)=mysql_fetch_row(mysql_query($q));
	
	$newnoahli=$code."-".sprintf('%04d', $newrunningno)."-".date("y");
	return $newnoahli;
	}
	
	
function getnewrunningno($bandarnegeriii){
	$q="SELECT runningno FROM tbl_user WHERE runningno<>0 ORDER BY runningno DESC LIMIT 1";
	list($lastno)=mysql_fetch_row(mysql_query($q));
	if($lastno==""){
		$lastno=0;
		}
	$newrunningno=$lastno+1;
	
	return $newrunningno;
	}




$emailpentadbir=$_SESSION["logs"]["email"];
$q="select a.nama,a.ic,a.handphone,a.email,a.username,a.password,a.codeuser,a.bandarnegerirumah from tbl_user a where a.codeuser='$id'";
list($nama,$ic,$phone,$email,$username,$password,$codeuser,$bandarnegerirumah)=mysql_fetch_row(mysql_query($q));



//rejected
if($statuss==0){
	?>
	<form action="" method="post">
    <textarea name="rejectednoted"></textarea>
    <input type="submit" name="submit" value="Send" />
    </form>
	<?php
	if(isset($_POST["submit"])){
		
		$q1=" insert into tbl_email_keluar set kategori='President Approval',subjek='Approval Failed ',uid='$id',aid='$aid',recipient_name='$nama',receipent='$email',sender='admin@jasra.org',cc='',content='$_POST[rejectednoted] <br> Rejected on: $datenow by $aname',date_submit='$datenow',status='0'";
		$q2="delete from tbl_user where codeuser='$id'";
	
		mysql_query($q1);
		mysql_query($q2);	
		//die();
		//hantar email
	 $penghantar="Admin";
	 $penerima=$email;		
	 $ci->email_control->sendmail_1stintroducerrejected($penghantar, $email,$codeuser,$nama,$emailpentadbir,$_POST["rejectednoted"]);

		//die();
		
		echo "<script>opener.location.reload(true);self.close();</script>";	
		
	}//if(isset($_POST["submit"]))
	
	
	
	
	
	
}//if($statuss==0)




	
//approved
if($statuss==1){
	
	
	$q="SELECT value_2 FROM tbl_param WHERE param_name='user_annual_fee' AND id='1'";
	list($fee)=mysql_fetch_row(mysql_query($q));	
	$q="SELECT value_2 FROM tbl_param WHERE param_name='account_no' AND id='4'";
	list($account)=mysql_fetch_row(mysql_query($q));
	
	
	
	
	$expdate = strtotime("+1 year", strtotime($datenow));
	$newexpdate=date("Y-m-d", $expdate);
	
	echo $newrunningno=getnewrunningno($bandarnegerirumah);
	echo "<br>";
	
	echo $noahli=getnoahli($bandarnegerirumah,$newrunningno);
	
	
	//die();
	
	
	//1st verify by introducer
	
		$q2="update tbl_user set status_user='3',approved_by_presiden='$datenow',expired_on='$newexpdate',noahli='$noahli',runningno='$newrunningno' where codeuser='$id'";
		mysql_query($q2);	
	
	
	
	
	
		$dompdf = new DOMPDF();
		$dompdf->set_paper('A4','landscape');
		$content = file_get_contents("$site/pdf_control/sijil_ahli_pdfview/$id");
		$dompdf->load_html($content);
		$dompdf->render();
		
		
		//$dompdf = new DOMPDF();
		//$dompdf->load_html($html);
		//$dompdf->set_paper("A4", 'portrait');
		//$dompdf->render();
		$output = $dompdf->output();
		unset($dompdf);
		file_put_contents("sijil/$id.pdf", $output);
	
	
	
	
	
	$penghantar="Admin";
	$penerima=$email;		
	$ci->email_control->sendmail_presidenapproved($penghantar, $email,$codeuser,$nama,$emailpentadbir,$id);
	
	

	
	/*echo "<script>opener.location.reload(true);self.close();</script>";*/
	/**/
	
	
	
}//if($statuss==1)




?>
<style>

body {
    background-image:url("<?php echo $base."include/images/bcsijil.jpg"; ?>");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
html {
    height: 100%
}
p {
    display: block;
    margin-top:0em;
    margin-bottom:0em;
    margin-left: 0;
    margin-right: 0;
}



</style>
<?php
$q="select * from tbl_user where codeuser='$id'";
$r=mysql_query($q);
$data=mysql_fetch_array($r);


$newDate = date("d-m-Y", strtotime($data["approved_by_presiden"]));
?>



<body>
<div style="top:48%;position:absolute; width:100%" align="center">
<font size="+1">
<p>Dengan ini diperakukan bahawa</p>
<p><strong><?php echo strtoupper($data["nama"]); ?></strong></p>
<p><strong>< <?php echo $data["ic"]; ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< <?php echo $data["callsign"]; ?> ></strong></p>
<br />
<p>telah diterima dan diiktiraf sebagai ahli</p>
<p>Persatuan Jalur Selatan Radio Amatur, Johor</p>
<p>dengan kelulusan Ahli Jawatankuasa Tertinggi Persatuan</p>
<p>pada tarikh < <?php echo $newDate; ?> >  dengan Nombor Keahlian < <?php echo $data["noahli"]; ?> ></p>
<p>untuk tahun  &nbsp; <?php echo date("Y"); ?></p>
</font>

</div>
</body>









