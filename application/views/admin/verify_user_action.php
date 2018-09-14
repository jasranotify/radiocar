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
		
		$q1=" insert into tbl_email_keluar set kategori='VERIFY_USER',subjek='User Verified Failed ',uid='$id',aid='$aid',recipient_name='$nama',receipent='$email',sender='admin@mydomain.com',cc='',content='$_POST[rejectednoted] <br> Rejected on: $datenow by $aname',date_submit='$datenow',status='0'";
		$q2="delete from tbl_user where codeuser='$id'";
	
		mysql_query($q1);
		mysql_query($q2);	
		//die();
		//hantar email
	 $penghantar="Admin";
	 $penerima=$emailahlibaru;		
	 $ci->email_control->sendmail_1stintroducerrejected($penghantar, $email,$codeuser,$nama,$emailpentadbir,$_POST["rejectednoted"]);

		
		
		echo "<script>opener.location.reload(true);self.close();</script>";	
		
	}//if(isset($_POST["submit"]))
	
	
	
	
	
	
}//if($statuss==0)




	
//verify
if($statuss==1){
	
	
	$q="SELECT value_2 FROM tbl_param WHERE param_name='user_annual_fee' AND id='1'";
	list($fee)=mysql_fetch_row(mysql_query($q));	
	$q="SELECT value_2 FROM tbl_param WHERE param_name='account_no' AND id='4'";
	list($account)=mysql_fetch_row(mysql_query($q));
	
	
	$q="select a.status_user,a.email from tbl_user a where a.codeuser='$id'";
	list($status_user,$emailahlibaru)=mysql_fetch_row(mysql_query($q));
	
	echo $status_user;
	//1st verify by introducer
	if($status_user==0){
		echo $q2="update tbl_user set status_user='11',date_verify1='$datenow',aid_verify1='$aid' where codeuser='$id'";
		mysql_query($q2);	
		
		
	//hantar email
	 $penghantar="Admin";
	 $penerima=$emailahlibaru;		
	 $ci->email_control->sendmail_1stintroducerverified($penghantar, $penerima,$codeuser,$nama,$emailpentadbir);

        		
		
			
		}
	//2nd verify by introducer
	if($status_user==11){
		
		
		 
		
		  //insert invoice
		  $qc1="insert into tbl_inv set user_id='$id',price='$fee',inv_status='0',flag='1',date_issued='$datenow',invfor='REGISTRATION'";
		  mysql_query($qc1);
			  
		  $qc2="select id from tbl_inv where user_id='$id' and flag='1' order by id desc limit 1";
		  list($inv_id)=mysql_fetch_row(mysql_query($qc2));
		  
		  $code_inv="INV".sprintf('%08d', $inv_id);
		  mysql_query("update tbl_inv set inv_id='$code_inv' where id='$inv_id'");
	
	
	
	
	
	
	
		//KELUARKAN EMAIL
		
		
		$ci = get_instance();
		$ci->load->library('../controllers/email_control');
		$penghantar="Admin";
		$penerima=$emailahlibaru;
		$tajuk="Account Verified";
		$mesej="Akaun anda telah disahkan.Anda perlu membuat bayaran RM $fee ke PUBLIC BANK account no $account .Sila log in di $base menggunakan $username sebagai Username dan $password sebagai  password untuk memuat naikkan resit bayaran.tq <br> Verify on: $datenow by $aname";
		$ci->email_control->sendmail($penghantar, $penerima,$tajuk,$mesej);
		
		
		  
		  $q1=" insert into tbl_email_keluar set kategori='VERIFY_USER',subjek='Account Verified',uid='$id',aid='$aid',recipient_name='$nama',receipent='$penerima',sender='$penghantar',cc='',content='Akaun anda telah disahkan.Anda perlu membuat bayaran RM $fee ke maybank account no $account .Sila log in di $base menggunakan $username sebagai Username dan $password sebagai  password untuk memuat naikkan resit bayaran.tq <br> Verify on: $datenow by $aname',date_submit='$datenow',status='0'";
		  

	 
	 	
	 	
		    
		  
		  $q2="update tbl_user set status_user='1',date_verify2='$datenow',aid_verify2='$aid',inv_code='$code_inv' where codeuser='$id'";
		  
		  $q3="insert into tbl_login set user_id='$id',username='$username',passwordd='$password',lvl_user='3',flag='1'";
		   //die();
		  mysql_query($q1);
		  mysql_query($q2);
		  mysql_query($q3);
		  
		 //hantar email
		 $penghantar="Admin";
		 $penerima=$emailahlibaru;		
		 $ci->email_control->sendmail_2ndintroducerverified($penghantar, $penerima,$codeuser,$nama,$emailpentadbir,$aid,$fee,$account,$username,$password,$datenow,$aname);
		
				
		}//if($status_user==11)
	
	
	
	
	
	
	
	echo "<script>opener.location.reload(true);self.close();</script>";
	
	
	
	
}//if($statuss==1)











//Delete
if($statuss==99){
	
	
	$q1="delete from tbl_user where codeuser='$id'";
	mysql_query($q1);
	echo "<script>opener.location.reload(true);self.close();</script>";
	
	
	
}//if($statuss==99)

?>

