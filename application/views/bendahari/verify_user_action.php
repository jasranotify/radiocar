<?php
//print_r($_SESSION);
echo $id;
echo $statuss;
$aid=$_SESSION["logs"]["user_id"];
$aname=$_SESSION["logs"]["nama"];
//$aname=$_SESSION["logs"]["nama"];
$q="select a.nama,a.ic,a.phone,a.email,a.username,a.password from tbl_user a where a.codeuser='$id'";
list($nama,$ic,$phone,$email,$username,$password)=mysql_fetch_row(mysql_query($q));



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
		$q2="update tbl_user set flag='0' where codeuser='$id'";
	
		mysql_query($q1);
		mysql_query($q2);	
		//die();
		echo "<script>opener.location.reload(true);self.close();</script>";	
		
	}//if(isset($_POST["submit"]))
	
	
	
	
	
	
}//if($statuss==0)




	
//verified
if($statuss==1){
	
	
	$q="SELECT value_2 FROM tbl_param WHERE param_name='user_annual_fee' AND id='1'";
	list($fee)=mysql_fetch_row(mysql_query($q));	
	$q="SELECT value_2 FROM tbl_param WHERE param_name='account_no' AND id='4'";
	list($account)=mysql_fetch_row(mysql_query($q));
	
	
	
	//insert invoice
	$qc1="insert into tbl_inv set user_id='$id',price='$fee',inv_status='0',flag='1',date_issued='$datenow'";
	mysql_query($qc1);
		
	$qc2="select id from tbl_inv where user_id='$id' and flag='1' order by id desc limit 1";
	list($inv_id)=mysql_fetch_row(mysql_query($qc2));
	
	$code_inv="REG".sprintf('%08d', $inv_id);
	mysql_query("update tbl_inv set inv_id='$code_inv' where id='$inv_id'");
	
	
	
	
	
	
	
	
	
	$q1=" insert into tbl_email_keluar set kategori='VERIFY_USER',subjek='User Verified Success',uid='$id',aid='$aid',recipient_name='$nama',receipent='$email',sender='admin@mydomain.com',cc='',content='Your Account is veried.You need to pay RM $fee to maybank account no $account .Please log in at $base using $username as Username and $password as the password to upload payment receipt.tq <br> Verify on: $datenow by $aname',date_submit='$datenow',status='0'";
	
	
	
	
	
	
	$q2="update tbl_user set status_user='1',date_verify='$datenow',aid_verify='$aid',inv_code='$code_inv' where codeuser='$id'";
	
	$q3="insert into tbl_login set user_id='$id',username='$username',passwordd='$password',lvl_user='3',flag='1'";
	 //die();
	mysql_query($q1);
	mysql_query($q2);
	mysql_query($q3);
	
	echo "<script>opener.location.reload(true);self.close();</script>";
	
	
	
	
}//if($statuss==1)











//Delete
if($statuss==99){
	
	
	$q1="delete from tbl_user where codeuser='$id'";
	mysql_query($q1);
	echo "<script>opener.location.reload(true);self.close();</script>";
	
	
	
}//if($statuss==99)

?>

