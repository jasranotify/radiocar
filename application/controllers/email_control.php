<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();

class Email_control extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('main_model');
		$this->load->database();
		$this->load->helper('url');
		$site=base_url();
		$base=base_url();
		date_default_timezone_set ( 'Asia/Kuala_Lumpur' );
	}

	public function testsendmail()
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
		$ci->email->from("hadi@gaska.com", 'JASRA');
		$ci->email->to("hadidin4423@gmail.com");
		$ci->email->subject("tajuk");
		$ci->email->message("mesej");
		$ci->email->send();
		echo $ci->email->print_debugger();
	}

	public function sendmail($penghantar,$penerima,$tajuk,$mesej)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
		$ci->email->from($penghantar, 'JASRA');
		$ci->email->to($penerima);
		$ci->email->subject($tajuk);
		$ci->email->message($mesej);
		// $ci->email->send();
		// echo $ci->email->print_debugger();
	}


	public function sendmail_dgnattachment($penghantar, $penerima,$tajuk,$mesej,$pdfoutput)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
		$ci->email->from($penghantar, 'JASRA');
		$ci->email->to($penerima);
		$ci->email->subject($tajuk);
		$ci->email->message($mesej);
		//$ci->email->attach($pdfoutput, 'Application/pdf', "sss.pdf", false);
		$ci->email->attach("invoice/$pdfoutput.pdf");
		$ci->email->send();
		echo $ci->email->print_debugger();
	}

	public function sendmail_daftarbaru($penghantar, $penerima,$codeuser,$namaahli,$cc)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej="Pendaftaran $codeuser $namaahli berjaya dihantar.Butiran anda akan disemak oleh pentadbir.Anda akan dimaklumkan setelah butiran anda disahkan.";
		$ci->email->from($penghantar, 'JASRA');
		$ci->email->to($cc);
		$ci->email->cc($penerima);
		$ci->email->subject("New Registration $codeuser");
		$ci->email->message($mesej);
		$ci->email->send();
		//echo $ci->email->print_debugger();
	}

	public function sendmail_1stintroducerverified($penghantar, $penerima,$codeuser,$nama,$cc)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej="Butiran $namaahli telah disahkan oleh pentadbir pertama.";
		$ci->email->from($penghantar, 'JASRA');
		$ci->email->to($penerima);
		$ci->email->cc($cc);
		$ci->email->subject("1st Introducer $codeuser");
		$ci->email->message($mesej);
		$ci->email->send();
		//echo $ci->email->print_debugger();
	}
	public function sendmail_2ndintroducerverified($penghantar, $penerima,$codeuser,$nama,$emailpentadbir,$aid,$fee,$account,$username,$password,$datenow,$aname)
	{
		$base=base_url();
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej="Butiran anda telah disahkan.Anda perlu membuat bayaran RM $fee ke PUBLIC BANK account no $account .Sila log in di $base menggunakan $username sebagai Username dan $password sebagai  password untuk memuat naikkan resit bayaran.tq <br> Verify on: $datenow by $aname";
		$ci->email->from($penghantar, 'JASRA');
		$ci->email->to($penerima);
		//$ci->email->cc($emailpentadbir);
		$ci->email->subject("2nd Introducer $codeuser");
		$ci->email->message($mesej);
		$ci->email->send();
		//echo $ci->email->print_debugger();
	}

	public function sendmail_1stintroducerrejected($penghantar, $email,$codeuser,$nama,$cc,$noted)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej="Butiran $nama telah di buang daripada system oleh pentadbir.Sila hubungi pentadbir.<br>
		notes: $noted";
		$ci->email->from($penghantar, 'JASRA');
		$ci->email->to($email);
		$ci->email->cc($cc);
		$ci->email->subject("Introducer rejected $codeuser");
		$ci->email->message($mesej);
		$ci->email->send();
		//echo $ci->email->print_debugger();
	}

	public function sendmail_userbayar($penghantar, $emailahli,$codeuser,$namaahli,$emailbendahari,$inv_id)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej="Invoice $inv_id telah dibayar oleh $namaahli.Sila tunggu pihak pentadbir meluluskan permohonan anda";
		$ci->email->from($penghantar, 'JASRA');
		$ci->email->to($emailahli);
		$ci->email->cc($emailbendahari);
		$ci->email->subject("Bayaran untuk $inv_id");
		$ci->email->message($mesej);
		$ci->email->send();
		//echo $ci->email->print_debugger();
	}

	public function sendmail_approvepayment($email,$codeuser,$nama,$emailcc,$id)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej="Hi $nama<br> Invoice $inv_id telah disahkan.Sila perrmohonan anda akan di proses.Kami akan memaklumkan kepada $nama setelah permohonan anda diluluskan.";
		$ci->email->from("jasranotify@gmail.com", 'JASRA');
		$ci->email->to($email);
		$ci->email->cc($emailcc);
		$ci->email->subject("Bayaran untuk $id Diluluskan");
		$ci->email->message($mesej);
		$ci->email->send();
		#echo $ci->email->print_debugger();
	}

	public function sendmail_approverenewal($email,$codeuser,$nama,$emailcc,$id)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej="Hi $nama<br> Bayaran bagi Invoice $inv_id telah disahkan.Terima kasih atas kesetian anda bersama persatuan kami.";
		$ci->email->from("jasranotify@gmail.com", 'JASRA');
		$ci->email->to($email);
		$ci->email->cc($emailcc);
		$ci->email->subject("Bayaran untuk $id Diluluskan");
		$ci->email->message($mesej);
		$ci->email->send();
		#echo $ci->email->print_debugger();
	}




	public function sendmail_rejectpayment($email,$codeuser,$nama,$emailcc,$id)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej="Hi $nama<br> Invoice $inv_id telah di rejected oleh admin.Sila re-upload resit pembayaran yang sah.Untuk pertanyaan lanjut bolehlah menghubungi admin..";
		$ci->email->from("jasranotify@gmail.com", 'JASRA');
		$ci->email->to($email);
		$ci->email->cc($emailcc);
		$ci->email->subject("Bayaran untuk $id GAGAL");
		$ci->email->message($mesej);
		$ci->email->send();
		#echo $ci->email->print_debugger();
	}

	public function sendmail_presidenapproved($penghantar, $email,$codeuser,$nama,$cc,$namafile)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'jasranotify@gmail.com',
		'smtp_pass' => 'jasranotify123',
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");
	 	$mesej=" Tahniah Permohonan $nama telah di terima oleh presiden.<br>";
		$ci->email->from($penghantar, 'JASRA');
		$ci->email->to($email);
		$ci->email->cc($cc);
		$ci->email->subject("Permohonan Berjaya.$codeuser");
		$ci->email->message($mesej);
		$ci->email->attach("sijil/$namafile.pdf");
		$ci->email->send();
		//echo $ci->email->print_debugger();
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
