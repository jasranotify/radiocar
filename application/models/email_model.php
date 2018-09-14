<?php
class Email_model extends CI_Model {
	
	public function config(){
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'fikriwafa@gmail.com',
		'smtp_pass' => 'cs747871',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'
		);
		$ci = get_instance();
		$ci->load->library('email', $config);
		$ci->email->initialize($config);		
		$ci->email->set_newline("\r\n");
	}
	
}
?>