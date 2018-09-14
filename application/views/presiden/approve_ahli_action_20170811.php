<?php
//print_r($_SESSION);
#echo $id;
#echo $statuss;
$aid=$_SESSION["logs"]["user_id"];
$aname=$_SESSION["logs"]["nama"];
$ci = get_instance();
$ci->load->library('../controllers/email_control');

$emailpentadbir=$_SESSION["logs"]["email"];
$q="select a.nama,a.ic,a.handphone,a.email,a.username,a.password,a.codeuser from tbl_user a where a.codeuser='$id'";
list($nama,$ic,$phone,$email,$username,$password,$codeuser)=mysql_fetch_row(mysql_query($q));



//rejected
if($statuss==0){
	?>
	<form action="" method="post">
    <textarea name="rejectednoted"></textarea>
    <input type="submit" name="submit" value="Send" />
    </form>
	<?php
	if(isset($_POST["submit"])){
		
		echo $q1=" insert into tbl_email_keluar set kategori='President Approval',subjek='Approval Failed ',uid='$id',aid='$aid',recipient_name='$nama',receipent='$email',sender='admin@jasra.org',cc='',content='$_POST[rejectednoted] <br> Rejected on: $datenow by $aname',date_submit='$datenow',status='0'";
		echo $q2="delete from tbl_user where codeuser='$id'";
	
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
	
	//die();
	
	
	//1st verify by introducer
	
		echo $q2="update tbl_user set status_user='3',approved_by_presiden='$datenow',expired_on='$newexpdate' where codeuser='$id'";
		mysql_query($q2);	
	
	
	
	
	
	
	
	
	
	
	
	$penghantar="Admin";
	$penerima=$email;		
	$ci->email_control->sendmail_presidenapproved($penghantar, $email,$codeuser,$nama,$emailpentadbir);
	
	
  
    //$from = $this->config->item("email_from");
    //$this->email->from($from["from"], $from["from_name"]);
    //$this->email->to($to);
    //$this->email->subject('Sample');
    //$this->email->message('Sample message');
	 ###ci->email_control->sendmail_presidenapproved($penghantar, $email,$codeuser,$nama,$emailpentadbir,$pdf);
	
    //$this->email->attach($pdf, 'application/pdf', "Pdf File " . date("m-d H-i-s") . ".pdf", false);
	
	
	//die();
	
	echo "<script>opener.location.reload(true);self.close();</script>";
	
	
	
	
}//if($statuss==1)




?>

