<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Presiden_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('main_model');
		$this->load->database();
		$this->load->helper('url');
		$site=site_url();
		$base=base_url();
		date_default_timezone_set ( 'Asia/Kuala_Lumpur' );
		
		
		$leveluser=$_SESSION["logs"]["user_level"];
		if($leveluser!=222){
		echo "Your account are not allowed to view this page <a href='$base'>Login</a> semula.";
		die();
		}
		
	} 
	
	public function index()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Admin Utama",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('template/div_open',$data);
		$this->load->view('presiden/approve_ahli_action',$data);
		$this->load->view('template/div_close',$data);
		//$this->load->view('template/footer');
	}
	
	public function profile()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "profile",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('template/div_open',$data);
		//$this->load->view('admin/profail',$data);
		$this->load->view('template/div_close',$data);
		//$this->load->view('template/footer');
	}
	
	public function invoice()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "invoice",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('template/div_open',$data);
		$this->load->view('presiden/invoice',$data);
		$this->load->view('template/div_close',$data);
		//$this->load->view('template/footer');
	}
	
	
	
	public function approve_ahli_action()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$id=$this->uri->segment(3);
		$statuss=$this->uri->segment(4);
		$codeuser=$this->uri->segment(5);
		
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'statuss' => $statuss,
					'id' => $id,
					'codeuser' => $codeuser,
					'datenow' => $datenow
					);	
		
	
		$this->load->view('presiden/approve_ahli_action',$data);

	}
	
		
}
