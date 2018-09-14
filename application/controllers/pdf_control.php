<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Pdf_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('main_model');
		$this->load->database();
		$this->load->helper('url');
		$site=site_url();
		$base=base_url();
		date_default_timezone_set ( 'Asia/Kuala_Lumpur' );
		
		
		
		
	} 
	
	
	public function sijil_ahli()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$codeuser=$this->uri->segment(3);
		//$statuss=$this->uri->segment(4);
		//$codeuser=$this->uri->segment(5);
		
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'codeuser' => $codeuser,
					'datenow' => $datenow,
					'codeuser' => $codeuser
					);	
			
		$this->load->view('user/sijil_ahli',$data);

	}	
	
	
	
	public function sijil_ahli_pdf()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$codeuser=$this->uri->segment(3);
		//$statuss=$this->uri->segment(4);
		//$codeuser=$this->uri->segment(5);
		
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'codeuser' => $codeuser,
					'datenow' => $datenow,
					'codeuser' => $codeuser
					);	
			
		$this->load->view('user/sijil_ahli_pdf',$data);

	}	
	public function sijil_ahli_pdfview()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$codeuser=$this->uri->segment(3);
		//$statuss=$this->uri->segment(4);
		//$codeuser=$this->uri->segment(5);
		
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'codeuser' => $codeuser,
					'datenow' => $datenow,
					'codeuser' => $codeuser
					);	
			
		$this->load->view('user/sijil_ahli_pdfview',$data);

	}	
	
	public function cronjob()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$codeuser=$this->uri->segment(3);
		//$statuss=$this->uri->segment(4);
		//$codeuser=$this->uri->segment(5);
		
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'codeuser' => $codeuser,
					'datenow' => $datenow,
					'codeuser' => $codeuser
					);	
			
		$this->load->view('user/cronjob',$data);

	}	
	
	public function cronjob2()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$codeuser=$this->uri->segment(3);
		//$statuss=$this->uri->segment(4);
		//$codeuser=$this->uri->segment(5);
		
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'codeuser' => $codeuser,
					'datenow' => $datenow,
					'codeuser' => $codeuser
					);	
			
		$this->load->view('user/cronjob2',$data);

	}
	
	
	
	
	
	
	
	
}
