<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Bendahari_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('main_model');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('pagination');
		$site=site_url();
		$base=base_url();
		date_default_timezone_set ( 'Asia/Kuala_Lumpur' );
		
		
		$leveluser=$_SESSION["logs"]["user_level"];
		if($leveluser==22 || $leveluser==222){
		echo "";
		}
		else{
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
		$this->load->view('template/banner_2',$data);
		$this->load->view('bendahari/menu',$data);
		$this->load->view('template/div_open',$data);
		$this->load->view('bendahari/utama',$data);
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
					
					
		//$config['base_url'] = 'http://example.com/index.php/test/page/';
		
					
		//$this->load->view('template/banner_2',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('template/div_open',$data);
		$this->load->view('bendahari/invoice',$data);
		$this->load->view('template/div_close',$data);
		//$this->load->view('template/footer');
	}
	
	
	public function list_users_new()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "New User",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('bendahari/menu',$data);
		$this->load->view('template/div_open',$data);
		$this->load->view('bendahari/list_users_new',$data);
		$this->load->view('template/div_close',$data);
		//$this->load->view('template/footer');
	}
	
	public function list_users_verified()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Verified User",
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('template/banner_2',$data);
		$this->load->view('bendahari/menu',$data);
		$this->load->view('template/div_open',$data);
		$this->load->view('bendahari/list_users_verified',$data);
		$this->load->view('template/div_close',$data);
		//$this->load->view('template/footer');
	}
	
	public function list_users_approved()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Approved User",
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('template/banner_2',$data);
		$this->load->view('bendahari/menu',$data);
		$this->load->view('template/div_open',$data);
		$this->load->view('bendahari/list_users_approved',$data);
		$this->load->view('template/div_close',$data);
		//$this->load->view('template/footer');
	}
	
	
	public function verify_user_action()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$id=$this->uri->segment(3);
		$statuss=$this->uri->segment(4);
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'statuss' => $statuss,
					'id' => $id,
					'datenow' => $datenow
					);	
		
	
		$this->load->view('bendahari/verify_user_action',$data);

	}
	public function approve_payment_action()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$id=$this->uri->segment(3);
		$statuss=$this->uri->segment(4);
		$codeuser=$this->uri->segment(5);
		$invfor=$this->uri->segment(6);
		
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'statuss' => $statuss,
					'id' => $id,
					'codeuser' => $codeuser,
					'datenow' => $datenow,
					'invfor' => $invfor
					);	
		
	
		$this->load->view('bendahari/approve_payment_action',$data);

	}
	
	public function view_image()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$invid=$this->uri->segment(3);
		
		
		$datenow=date("Y-m-d H:i:s");
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'invid' => $invid
					);	
		
	
		$this->load->view('bendahari/view_image',$data);

	}
	
	
	
		
}
