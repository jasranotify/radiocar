<?php
//$datenow=date("Y-m-d H:i:s");
####mysql_query("update tbl_param set value_1='$datenow' where param_name='cronjob'");

require_once("dompdf/dompdf_config.inc.php");
spl_autoload_register('DOMPDF_autoload');


echo $datenow;
echo "<br>";

$date = strtotime("+7 day", strtotime($datenow));
echo $datedhincrease= date("Y-m-d", $date);



$q="SELECT value_2 FROM tbl_param WHERE param_name='user_annual_fee' AND id='1'";
list($fee)=mysql_fetch_row(mysql_query($q));	
$q="SELECT value_2 FROM tbl_param WHERE param_name='account_no' AND id='4'";
list($account)=mysql_fetch_row(mysql_query($q));




echo $q="SELECT a.* FROM tbl_user a WHERE a.status_user='3' AND a.flag='1' and a.cron_check_expireddate_flag='0' AND a.expired_on < '$datedhincrease' limit 2";
$r=mysql_query($q);
$i=0;
while($data=mysql_fetch_array($r)){
	echo "<br>";
	echo "send email";
	echo "<br>";
	echo $q2="update tbl_user set cron_check_expireddate_flag='1' where id='$data[id]'";
	mysql_query($q2);
	
	
	

	
	//0=belum dinilai,1=dah bayar,2=approved,3=rejected
	
	//insert invoice
	echo $qx1="select inv_id from tbl_inv where user_id='$data[codeuser]' and (inv_status='0' or inv_status='1')";
	list($dhkelaurinvkebelum)=mysql_fetch_row(mysql_query($qx1));	
	
	if($dhkelaurinvkebelum==""){//KALAU INV X KELAUR LAGI
	
		  $qc1="insert into tbl_inv set user_id='$data[codeuser]',price='$fee',inv_status='0',flag='1',date_issued='$datenow',invfor='RENEWAL'";
		  mysql_query($qc1);
			  
		  $qc2="select id from tbl_inv where user_id='$data[codeuser]' and flag='1' order by id desc limit 1";
		  list($inv_id)=mysql_fetch_row(mysql_query($qc2));
		  
		  $code_inv="INV".sprintf('%08d', $inv_id);
		  mysql_query("update tbl_inv set inv_id='$code_inv' where id='$inv_id'");
		  
	}///inv dikeluARKAN DI SINI SAHAJA
	
	
		
		//KELUARKAN EMAIL
		//generate gambar pdf ni dh jadi...cuma perlu tukar ke invoice jer rather than sijil
		/*$dompdf = new DOMPDF();
		$dompdf->set_paper('A4','landscape');
		$content = file_get_contents("$site/pdf_control/sijil_ahli_pdfview/$data[codeuser]");
		$dompdf->load_html($content);
		$dompdf->render();
		$output = $dompdf->output();
		unset($dompdf);
		file_put_contents("invoice/$data[codeuser].pdf", $output);*/
		
		
		
		$yronly=date("Y");
		
		$ci = get_instance();
		$ci->load->library('../controllers/email_control');
		$penghantar="Admin";
		$penerima=$data["email"];
		$expired_on=$data["expired_on"];
		$tajuk="Account Renewal $data[noahli]-$yronly";
		$mesej="Akaun akan tamat tempoh pada $expired_on .Anda perlu membuat bayaran RM $fee ke PUBLIC BANK account no $account .Sila log in di $base untuk memuat naikkan resit bayaran.";
		//$ci->email_control->sendmail_dgnattachment($penghantar, $penerima,$tajuk,$mesej,$data["codeuser"]);
		$ci->email_control->sendmail($penghantar, $penerima,$tajuk,$mesej);
		
		
		  
		  $qc3=" insert into tbl_email_keluar set kategori='Account Renewal',subjek='Account Renewal $data[noahli]-$yronly',uid='$data[codeuser]',recipient_name='$data[nama]',receipent='$penerima',sender='$penghantar',cc='',content='Akaun akan tamat tempoh pada $expired_on.Anda perlu membuat bayaran RM $fee ke PUBLIC BANK account no $account .Sila log in di $base untuk memuat naikkan resit bayaran.',date_submit='$datenow',status='0'";
		 mysql_query($qc3);
	
	
	
	
$i++;	
	}//while


?>