<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Guest_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('main_model');
		$this->load->database();
		$this->load->helper('url');
		$site=site_url();
		$base=base_url();
		//error_reporting(E_ERROR | E_PARSE);
		
		
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
		$this->load->view('template/banner_2',$data);
		$this->load->view('guest/menu',$data);
		//$this->load->view('guest/utama',$data);
		$this->load->view('template/footer');
	}
	
	public function home()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('template/banner_2',$data);
		$this->load->view('guest/menu',$data);
		$this->load->view('guest/utama',$data);
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
		$this->load->view('template/banner_2',$data);
		$this->load->view('user/menu',$data);
		$this->load->view('user/profile',$data);
		$this->load->view('template/footer');
	}
	public function updateprofail()
	{
		
		
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		
		$data=array(
					'page' => "updateprofail",
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		//$this->load->view('template/bannerpopup',$data);
		//$this->load->view('auditor/menu',$data);
		$this->load->view('user/updateprofail',$data);
		//$this->load->view('template/footer');
	}
		
	
	public function registration()
	{
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Registration",
					'site' => site_url(),
					'base' => base_url(),
					'gb_width' => $gb_width,
					'gb_height' => $gb_height
					);
				
		
		
		
		//die();
					
		//echo "sajsasjd";
		//$this->load->view('template/banner_2',$data);
		//$this->load->view('guest/menu',$data);
		$this->load->view('guest/registration',$data);
		//$this->load->view('template/footer');
	}
	
	public function accessory()
	{
		$cat_id=3;
		//cat_id=2 adalah cat kid basikal..boleh rujuk table product	
		$q="SELECT COUNT(*) FROM product WHERE cat_id='$cat_id' and flag='1'";
		list($bil)=mysql_fetch_row(mysql_query($q));
		
		//echo $bil;
		//echo "<br>";
		//bahagi dgn 3 sebab satu row div dalam viewer adalah 3 produk.
		$tot_div=$bil/3;
		
		$gb_width=500;
		$gb_height=400;
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Bicycle",
					'site' => site_url(),
					'base' => base_url(),
					'tot_div' => $tot_div,
					'cat_id' => $cat_id,
					'gb_width' => $gb_width,
					'gb_height' => $gb_height
					);
				
		
		
		
		//die();
					
		//echo "sajsasjd";
		$this->load->view('template/banner_2',$data);
		$this->load->view('user/menu',$data);
		$this->load->view('user/bicycle',$data);
		$this->load->view('template/footer');
	}
	
	public function parts()
	{
		$cat_id=4;
		//cat_id=2 adalah cat kid basikal..boleh rujuk table product	
		$q="SELECT COUNT(*) FROM product WHERE cat_id='$cat_id' and flag='1'";
		list($bil)=mysql_fetch_row(mysql_query($q));
		
		//echo $bil;
		//echo "<br>";
		//bahagi dgn 3 sebab satu row div dalam viewer adalah 3 produk.
		$tot_div=$bil/3;
		
		$gb_width=500;
		$gb_height=400;
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Bicycle",
					'site' => site_url(),
					'base' => base_url(),
					'tot_div' => $tot_div,
					'cat_id' => $cat_id,
					'gb_width' => $gb_width,
					'gb_height' => $gb_height
					);
				
		
		
		
		//die();
					
		//echo "sajsasjd";
		$this->load->view('template/banner_2',$data);
		$this->load->view('user/menu',$data);
		$this->load->view('user/bicycle',$data);
		$this->load->view('template/footer');
	}
	
	
	public function buythis()
	{
		
		
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		
		$data=array(
					'page' => "buythis",
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		//$this->load->view('template/bannerpopup',$data);
		//$this->load->view('auditor/menu',$data);
		$this->load->view('user/buythis',$data);
		//$this->load->view('template/footer');
	}
	
	public function cartoverview()
	{
		
		
		$site=site_url();
		$base=base_url();
		//$id=$this->uri->segment(3);
		
		$data=array(
					'page' => "cartoverview",
					'site' => site_url(),
					'base' => base_url()
					//'id'   => $id
					);
		//$this->load->view('template/bannerpopup',$data);
		//$this->load->view('auditor/menu',$data);
		$this->load->view('user/cartoverview',$data);
		//$this->load->view('template/footer');
	}
	
	public function empty_cart(){
		//
		
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		unset($_SESSION["order"]);
		echo "<body onLoad=\"self.setTimeout('parent.parent.location.reload().GB_hide()', 60);\">";
		
		
	}
	
	public function empty_cart2(){
		//
		
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		unset($_SESSION["order"]);
		//echo "<body onLoad=\"self.setTimeout('parent.parent.location.reload().GB_hide()', 60);\">";
		?>
    <script language="javascript">
	//alert("Sign up successfully.You may access your account using your email as username.");
	
	window.location.replace("<?php echo $site; ?>");
	
	</script>
  	<?php
		
		 
	}
	
	public function cartdetail()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "cartdetail",
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('template/banner_2',$data);
		$this->load->view('user/menu',$data);
		$this->load->view('user/cartdetail',$data);
		$this->load->view('template/footer');
	}
	
	public function updatecartitem(){
		//
		
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('user/updatecartitem',$data);
		
		
	}
	
	public function submit_cart()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "submit_cart",
					'site' => site_url(),
					'base' => base_url()
					);
		
		if(!$_SESSION["user_level"]){
		header("Location: $site/main_control");
		}
		else{
		$this->load->view('template/banner_2',$data);
		$this->load->view('user/menu',$data);
		$this->load->view('user/submit_cart',$data);
		$this->load->view('template/footer');
		}
			
		
	}
	
	public function invoice()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Invoice",
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('template/banner_2',$data);
		$this->load->view('user/menu',$data);
		$this->load->view('user/invoice',$data);
		$this->load->view('template/footer');
	}
	
	public function print_inv()
	{
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Print _invoice",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		//$this->load->view('user/menu',$data);
		$this->load->view('user/print_inv',$data);
		//$this->load->view('template/footer');
	}
	
	public function result()
	{
		
		
		$site=site_url();
		$base=base_url();
		$ic=$this->uri->segment(3);
		$data=array(
					'page' => "Soalan",
					'site' => site_url(),
					'base' => base_url(),
					'ic' => $ic
					);
		list($userid)=mysql_fetch_row(mysql_query("select id from auditor where ic='$ic'"));
					
		$q="select count(*) from ulasan where auditor_id='$userid'";
		list($checkulasan)=mysql_fetch_row(mysql_query($q));
		//echo $checkulasan;
					
		$this->load->view('template/bannerpopup',$data);
		//$this->load->view('admin/menu',$data);
		if($checkulasan==1){
		$this->load->view('admin/result',$data);
		}//if
		
		if($checkulasan==0){
		$this->load->view('admin/noresult',$data);
		}//if
		
		
		//$this->load->view('template/footer');
	}
	
	public function resetans()
	{
		
		
		$site=site_url();
		$base=base_url();
		$ic=$this->uri->segment(3);
		$data=array(
					'page' => "Soalan",
					'site' => site_url(),
					'base' => base_url(),
					'ic' => $ic
					);
		$this->load->view('template/bannerpopup',$data);
		//$this->load->view('admin/menu',$data);
		$this->load->view('admin/resetans',$data);
		$this->load->view('template/footer');
	}
		
}
