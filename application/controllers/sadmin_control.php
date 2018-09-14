<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Sadmin_control extends CI_Controller {

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
		if($leveluser!=1){
		echo "Your account are not allowed to view this page <a href='$base'>Login</a> semula.";
		die();
		}
		
		
	} 
	
	
		public function list_admins()
	{
		
		
		$site=base_url();
		$base=base_url();
		$data=array(
					'page' => "List Admin",
					'site' => site_url(),
					'base' => base_url()
					);
		
	
		
		
		$this->load->view('template/banner_2',$data);
		$this->load->view('sadmin/menu',$data);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('sadmin/list_admins',$data);
		$this->load->view('template/footer');

	}
	
	public function register_admins()
	{
		
		
		$site=base_url();
		$base=base_url();
		$data=array(
					'page' => "Register Admin",
					'site' => site_url(),
					'base' => base_url()
					);
		
	
		
		
		$this->load->view('template/banner_2',$data);
		$this->load->view('sadmin/menu',$data);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('sadmin/register_admins',$data);
		$this->load->view('template/footer');

	}
	
	public function insert()
	{
		#print_r($_POST);
		$site=site_url();
		$base=base_url();
		
		
	$fname = $_POST['fname'];
	
	
	$ic_no = $_POST['ic_no'];
	
	
	$tel_no = $_POST['tel_no'];
	$email = $_POST['email'];
	
	$date = $_POST['date'];
	$jenisadmin=$_POST['jenisadmin'];
	
	if($jenisadmin==2){$leveladmin="introducer";}
	if($jenisadmin==22){$leveladmin="bendahari";}
	if($jenisadmin==222){$leveladmin="president";}
	
	$datefull=date("Y-m-d H:i:s");


//check disni sekiranya user dh ada

//check ic dh berdaftar
$q="select count(*) from tbl_admin a where a.ic='$ic_no' and a.flag='1'";
list($adatak)=mysql_fetch_row(mysql_query($q));
if($adatak!=0){	
	die("ic dah berdaftar");
}//

//check email dh berdaftar
$q="select count(*) from tbl_admin a where a.email='$email' and a.flag='1'";
list($adatak)=mysql_fetch_row(mysql_query($q));
if($adatak!=0){	
	die("email dah berdaftar");
}//


//$encrypt_pswd=md5('sha512',$pswd);	
	echo $sql= "INSERT INTO tbl_admin set nama='$fname',ic='$ic_no', phone='$tel_no', email='$email', datecreate='$datefull',flag='1',leveladmin='$leveladmin',lvladmin_id='$jenisadmin'"; // insert data arahan sql ke dalam table
	mysql_query($sql);
	
	$q="select a.id from tbl_admin a where a.ic='$ic_no' and a.flag='1'";
	list($user_id)=mysql_fetch_row(mysql_query($q));
	
	$codeuser="AID".sprintf('%08d', $user_id);
	mysql_query("update tbl_admin set code_admin='$codeuser' where id='$user_id' and flag='1'");
	
	echo $q2="insert into tbl_login set user_id='$codeuser',username='$email',passwordd='$ic_no',lvl_user='$jenisadmin'";
	mysql_query($q2);
	//die();
	?>
    <script language="javascript">
	alert("Adding Admin Success");
	
	window.location.replace("<?php echo $site; ?>/sadmin_control/list_admins?ref=list_admins");
	
	</script>
  	<?php
	 
	}
	
	
		public function delete_admin()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$id=$this->uri->segment(3);
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id
					);	
		
	
		$this->load->view('sadmin/delete_admin',$data);

	}
	
	
	public function status_admin()
	{
		
		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		//echo $table=$this->uri->segment(3);
		$id=$this->uri->segment(3);
		$statuss=$this->uri->segment(4);
		

		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'statuss' => $statuss,
					'id' => $id
					);	
		
	
		$this->load->view('sadmin/status_admin',$data);

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