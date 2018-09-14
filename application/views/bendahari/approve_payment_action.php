<?php
//print_r($_SESSION);
$ci = get_instance();
$ci->load->library('../controllers/email_control');
echo $id;
echo $statuss;
$aid=$_SESSION["logs"]["user_id"];
$aname=$_SESSION["logs"]["nama"];
//$aname=$_SESSION["logs"]["nama"];
$q="select a.nama,a.ic,a.handphone,a.email,a.username,a.password from tbl_user a where a.codeuser='$codeuser'";
list($nama,$ic,$phone,$email,$username,$password)=mysql_fetch_row(mysql_query($q));


echo $invfor;


//die();


$datenowwww=date("Y-m-d H:i:s");


$qemailcc="SELECT email FROM tbl_admin WHERE leveladmin='president' or leveladmin='bendahari'";
$remailcc=mysql_query($qemailcc);
$emailcc="";
while($dataemailcc=mysql_fetch_array($remailcc)){
$emailcc.=$dataemailcc["email"].",";
		
}//while
$emailcc.="admin@jasra.org.my";



//rejected
if($statuss==0){
	?>
	<form action="" method="post">
    <textarea name="rejectednoted"></textarea>
    <input type="submit" name="submit" value="Send" />
    </form>
	<?php
	if(isset($_POST["submit"])){
		
		$q1=" insert into tbl_email_keluar set kategori='Payment Verify',subjek='User Payment Failed ',uid='$id',aid='$aid',recipient_name='$nama',receipent='$email',sender='admin@mydomain.com',cc='',content='$_POST[rejectednoted] <br> Rejected on: $datenow by $aname',date_submit='$datenow',status='0'";
		//$q2="update tbl_user set flag='0' where codeuser='$id'";
		echo $q2="update tbl_inv set inv_status='3' where inv_id='$id'";
		echo $q3="insert into tbl_reject set rejectcode='$id' ,admin_code='$aid' ,user_code='$codeuser',user_name='$nama',message='$_POST[rejectednoted]',datereject='$datenowwww',flag='1'";
	
		mysql_query($q1);
		mysql_query($q2);	
		mysql_query($q3);
		//die();
		
		$ci->email_control->sendmail_rejectpayment($email,$codeuser,$nama,$emailcc,$id);
		echo "<script>opener.location.reload(true);self.close();</script>";	
		
	}//if(isset($_POST["submit"]))
	
	
	
	
	
	
}//if($statuss==0)




	
//approve
if($statuss==1){
	
	
	
	$q="SELECT value_2 FROM tbl_param WHERE param_name='user_annual_fee' AND id='1'";
	list($fee)=mysql_fetch_row(mysql_query($q));	
	$q="SELECT value_2 FROM tbl_param WHERE param_name='account_no' AND id='4'";
	list($account)=mysql_fetch_row(mysql_query($q));
	
	
	$dateskrgtanpatahun=date("m-d");
	$dateskrgtahunsaja=date("Y");
	$tahundepan=$dateskrgtahunsaja+1;
	
	$date_expired="$tahundepan-$dateskrgtanpatahun";
	
	
	
	
	
	
	
	//renew tahunan--------------------------------------------------------------------------------------------------------------------
	if($invfor=="RENEWAL"){
	
	
		$expdate = strtotime("+1 year", strtotime($datenow));
		$newexpdate=date("Y-m-d", $expdate);
				
		echo $q2="update tbl_user set expired_on='$newexpdate' where codeuser='$codeuser'";
		mysql_query($q2);	
		
		
		//die();
		
		
		$ci->email_control->sendmail_approverenewal($email,$codeuser,$nama,$emailcc,$id);	
	
		$q1=" insert into tbl_email_keluar set kategori='Renewal Payment Approved',subjek='User Payment Success',uid='$codeuser',aid='$aid',recipient_name='$nama',receipent='$email',sender='admin@jasra.org.my',cc='$emailcc',content='Your Payment is Approved.Please log in at $base to Access to your account.Tq For Join us <br> Approved on: $datenow by $aname',date_submit='$datenow',status='0'";
			
		mysql_query($q1);
		

		
	
		}//if($invfor=="RENEWAL")
		////renew tahunan end--------------------------------------------------------------------------------------------------------------------
		
	
	
	
	
	
	
	
	//registration escalated ke presiden --------------------------------------------------------------------------------------------------------------------	
	if($invfor=="REGISTRATION"){
		
		$ci->email_control->sendmail_approvepayment($email,$codeuser,$nama,$emailcc,$id);	
	
		$q1=" insert into tbl_email_keluar set kategori='Payment Verify',subjek='User Payment Success',uid='$codeuser',aid='$aid',recipient_name='$nama',receipent='$email',sender='admin@mydomain.com',cc='$emailcc',content='Your Payment is Approved.Please log in at $base using $username as Username and $password as the password to Access to your account.Tq For Join us <br> Approved on: $datenow by $aname',date_submit='$datenow',status='0'";
	
		//ini kerja president
		echo $q2="update tbl_user set status_user='2',date_approve='$datenow',aid_approve='$aid',expired_on='$date_expired' where codeuser='$codeuser'";
		mysql_query($q1);
		mysql_query($q2);
			
		
		}//if($invfor=="REGISTRATION")
		////registration escalated ke presiden end --------------------------------------------------------------------------------------------------------------------	
	
	
	
	
	//insert invoice
	$qc1="update tbl_inv set inv_status='2',date_approve='$datenow',admin_yg_approve='$aid' where inv_id='$id'";
	mysql_query($qc1);
		
	echo "<script>opener.location.reload(true);self.close();</script>";
	
	
	
	
}//if($statuss==1)


?>

