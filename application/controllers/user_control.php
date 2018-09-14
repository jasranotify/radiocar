<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class User_control extends CI_Controller {

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
		
		
		$leveluser=$_SESSION["logs"]["user_level"];
		if($leveluser!=3){
		echo "Your account are not allowed to view this page <a href='$base'>Login</a> semula.";
		die();
		}
		
		
	}
	
	
	
	public function index()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('template/menu',$data);
		//$this->load->view('guest/utama',$data);
		$this->load->view('template/footer');
	}
	
	
	
	public function profile()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Profail",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		
		
		$this->load->view('template/menu',$data);
		$this->load->view('template/div_open',$data);
		$this->load->view('user/profail',$data);
		$this->load->view('template/div_close',$data);
		
		
		//$this->load->view('template/footer');
	}
	
	
	public function viewborang()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Profail",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		
		
		//$this->load->view('template/menu',$data);
		//$this->load->view('template/div_open',$data);
		$this->load->view('user/viewborang',$data);
		//$this->load->view('template/div_close',$data);
		
		
		//$this->load->view('template/footer');
	}
	
	public function viewsijil()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "viewsijil",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		
		
		//$this->load->view('template/menu',$data);
		//$this->load->view('template/div_open',$data);
		$this->load->view('user/viewsijil',$data);
		//$this->load->view('template/div_close',$data);
		
		
		//$this->load->view('template/footer');
	}
	
	
	public function payment()
	{
		
		
		$site=site_url();
		$base=base_url();
		$datenow=date("Y-m-d H:i:s");
		//print_r($_SESSION);
		
		$uid=$_SESSION["logs"]["user_id"];
		$data=array(
					'page' => "Profail",
					'site' => site_url(),
					'base' => base_url(),
					'uid' => $uid,
					'datenow' => $datenow
					);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('template/menu',$data);
		
		$this->load->view('template/div_open',$data);
		$this->load->view('user/payment',$data);
		$this->load->view('template/div_close',$data);
		
	}
		
	
	
	 
	public function logout()
	{
		
		$site=site_url();
		$base=base_url();
		
		session_destroy();
		header("Location: $site");
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */