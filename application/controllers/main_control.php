<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Main_control extends CI_Controller {

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
		$site=site_url();
		$base=base_url();
		date_default_timezone_set ( 'Asia/Kuala_Lumpur' );

	}

	public function index()
	{


		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Log In",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);
		$this->load->view('login',$data);
		//$this->load->view('template/footer');
	}

		public function register()
	{


		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);





		$this->load->view('register',$data);

	}


	public function scaleImageFileToBlob($file) {

   //echo $source_pic = $file;
    $max_width = 500;
    $max_height = 500;
	//list($width, $height, $type, $attr) = getimagesize($file);
    list($width, $height, $image_type) = getimagesize($file);
	//$dsas = getimagesize(trim($file));
	//echo $image_type;
	//print_r(getimagesize($file));
    switch ($image_type)
    {
        case 1: $src = imagecreatefromgif($file); break;
        case 2: $src = imagecreatefromjpeg($file);  break;
        case 3: $src = imagecreatefrompng($file); break;
        default: return '';  break;
    }

    $x_ratio = $max_width / $width;
    $y_ratio = $max_height / $height;

    if( ($width <= $max_width) && ($height <= $max_height) ){
        $tn_width = $width;
        $tn_height = $height;
        }elseif (($x_ratio * $height) < $max_height){
            $tn_height = ceil($x_ratio * $height);
            $tn_width = $max_width;
        }else{
            $tn_width = ceil($y_ratio * $width);
            $tn_height = $max_height;
    }

    $tmp = imagecreatetruecolor($tn_width,$tn_height);

    /* Check if this image is PNG or GIF, then set if Transparent*/
    if(($image_type == 1) OR ($image_type==3))
    {
        imagealphablending($tmp, false);
        imagesavealpha($tmp,true);
        $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
        imagefilledrectangle($tmp, 0, 0, $tn_width, $tn_height, $transparent);
    }
    imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);

    /*
     * imageXXX() only has two options, save as a file, or send to the browser.
     * It does not provide you the oppurtunity to manipulate the final GIF/JPG/PNG file stream
     * So I start the output buffering, use imageXXX() to output the data stream to the browser,
     * get the contents of the stream, and use clean to silently discard the buffered contents.
     */
    ob_start();

    switch ($image_type)
    {
        case 1: imagegif($tmp); break;
        case 2: imagejpeg($tmp, NULL, 100);  break; // best quality
        case 3: imagepng($tmp, NULL, 0); break; // no compression
        default: echo ''; break;
    }

    $final_image = ob_get_contents();

    ob_end_clean();

    return $final_image;
}


	public function insert()
	{
		print_r($_POST);
		$site=site_url();
		$base=base_url();


		//die();
	$fname = $_POST['fname'];
	//$lname = $_POST['lname'];
	//$uname = $_POST['uname'];
	$pswd = $_POST['pswd'];
	$ic_no = $_POST['ic_no'];


	$handphone = $_POST['handphone'];
	$email = $_POST['email'];
	$alamatrumah = $_POST['alamatrumah'];
	$jeniskeahlian = $_POST['jeniskeahlian'];
	$datefull=date("Y-m-d H:i:s");

	//$file_content = scaleImageFileToBlob($_FILES["gambar"]["tmp_name"]);
	$file_content = $this->scaleImageFileToBlob($_FILES["gambar"]["tmp_name"]);
	//$this->abc();
	$file_content = addslashes($file_content);

	//echo $file_content;

	//die();


if($email==""){
	die("Please make Sure data is correct");

	}


//check ic dh berdaftar
$q="select count(*) from tbl_user a where a.ic='$ic_no' and flag='1'";
list($adatak)=mysql_fetch_row(mysql_query($q));
if($adatak!=0){
	die("ic dah berdaftar");
}//


//check email dh berdaftar
$q="select count(*) from tbl_user a where a.email='$email' and flag='1'";
list($adatak)=mysql_fetch_row(mysql_query($q));
if($adatak!=0){
	die("email dah berdaftar");
}//


//$encrypt_pswd=md5('sha512',$pswd);
	if($jeniskeahlian==1){
	$sql= "INSERT INTO tbl_user set jeniskeahlian='$_POST[jeniskeahlian]',nama='$_POST[fname]', username='$ic_no', password='$pswd', dob='$_POST[dob]', ic='$_POST[ic_no]', email='$_POST[email]', alamatrumah='$_POST[alamatrumah]',pokskodrumah='$_POST[pokskodrumah]',bandarnegerirumah='$_POST[bandarnegerirumah]',alamatsurat='$_POST[alamatsurat]',poskodsurat='$_POST[poskodsurat]' ,bandarnegerisurat='$_POST[bandarnegerisurat]' ,telefonrumah='$_POST[telefonrumah]', faxrumah='$_POST[faxrumah]', handphone='$_POST[handphone]', pekerjaan='$_POST[pekerjaan]',
	alamatkerja='$_POST[alamatkerja]', poskodkerja='$_POST[poskodkerja]', bandarnegerikerja='$_POST[bandarnegerikerja]',

	tarikhlulusrae='$_POST[tarikhlulusrae]' ,callsign='$_POST[callsign]', tarikhluluscw='$_POST[tarikhluluscw]', kelasab='$_POST[kelasab]', cmcclientid='$_POST[cmcclientid]',
	tarikhtamatlesen='$_POST[tarikhtamatlesen]' ,alamatstesyen='$_POST[alamatstesyen]', poskodstesyen='$_POST[poskodstesyen]', bandarnegeristesyen='$_POST[bandarnegeristesyen]', datum='$_POST[datum]',
	kawasanoperasipancar='$_POST[kawasanoperasipancar]' ,latitut='$_POST[latitut]', longitud='$_POST[longitud]', noflat='$_POST[noflat]', jeniskenderaan='$_POST[jeniskenderaan]',
	mobilerigjenama1='$_POST[mobilerigjenama1]' ,mobilerignosiri1='$_POST[mobilerignosiri1]', mobilerigmodel1='$_POST[mobilerigmodel1]', mobilerigjenama2='$_POST[mobilerigjenama2]', mobilerignosiri2='$_POST[mobilerignosiri2]',
	mobilerigmodel2='$_POST[mobilerigmodel2]' ,mobilerigjenama3='$_POST[mobilerigjenama3]', mobilerignosiri3='$_POST[mobilerignosiri3]', mobilerigmodel3='$_POST[mobilerigmodel3]', handyjenama1='$_POST[handyjenama1]',
	handynosiri1='$_POST[handynosiri1]' ,handymodel1='$_POST[handymodel1]', handyjenama2='$_POST[handyjenama2]', handynosiri2='$_POST[handynosiri2]', handymodel2='$_POST[handymodel2]',
	handyjenama3='$_POST[handyjenama3]' ,handynosiri3='$_POST[handynosiri3]', handymodel3='$_POST[handymodel3]',gambar='$file_content',

	 datesubmit='$datefull',flag='1'"; // insert data arahan sql ke dalam table
	}

	if($jeniskeahlian==2){
	$sql= "INSERT INTO tbl_user set jeniskeahlian='$_POST[jeniskeahlian]',nama='$_POST[fname]', username='$ic_no', password='$pswd', dob='$_POST[dob]', ic='$_POST[ic_no]', email='$_POST[email]', alamatrumah='$_POST[alamatrumah]',pokskodrumah='$_POST[pokskodrumah]',bandarnegerirumah='$_POST[bandarnegerirumah]',alamatsurat='$_POST[alamatsurat]',poskodsurat='$_POST[poskodsurat]' ,bandarnegerisurat='$_POST[bandarnegerisurat]' ,telefonrumah='$_POST[telefonrumah]', faxrumah='$_POST[faxrumah]', handphone='$_POST[handphone]', pekerjaan='$_POST[pekerjaan]', alamatkerja='$_POST[alamatkerja]', poskodkerja='$_POST[poskodkerja]', bandarnegerikerja='$_POST[bandarnegerikerja]',gambar='$file_content', datesubmit='$datefull',flag='1'"; // insert data arahan sql ke dalam table
	}

	// echo $sql;

	mysql_query($sql);



	$q="select a.id,a.nama from tbl_user a where a.ic='$ic_no' and flag='1'";
	list($user_id,$namaahli)=mysql_fetch_row(mysql_query($q));

	$codeuser="UID".sprintf('%08d', $user_id);
	mysql_query("update tbl_user set codeuser='$codeuser' where id='$user_id' and flag='1'");
	//die();


	$qemailintroducer="SELECT email FROM tbl_admin WHERE leveladmin='introducer' or leveladmin='bendahari' or leveladmin='president'";
	$remailintroducer=mysql_query($qemailintroducer);
	$emailintroducer="";
	while($dataemailintroducer=mysql_fetch_array($remailintroducer)){
		$emailintroducer.=$dataemailintroducer["email"].",";

		}//while
		$emailintroducer.="introducer@mydomain.aaasa";
	//echo $emailintroducer;

	//email to admin goes here
	$qemail=" insert into tbl_email_keluar set kategori='New Applicant',subjek='New Applicant ',uid='$codeuser', recipient_name='Introducer',receipent='$emailintroducer',sender='admin@mydomain.com',cc='',content='Apply On on: $datefull by $_POST[fname]', date_submit='$datefull',status='0'";
	mysql_query($qemail);
	//die();




	 $ci = get_instance();
	 $ci->load->library('../controllers/email_control');
	 $penghantar="Admin";
	 $penerima=$emailintroducer;
	 //$tajuk="New Registration";
	 $mesej="Pendaftaran baru daripada Usercode $codeuser $namaahli.Sila semak di system..";


	 //$ci->email_control->sendmail($penghantar, $penerima,$tajuk,$mesej);

	 $ci->email_control->sendmail_daftarbaru($penghantar, $penerima,$codeuser,$namaahli,$_POST["email"]);

	//die();

	?>
    <script language="javascript">
	alert("Pendaftaran Berjaya.Anda akan dimaklumkan melalui email setelah maklumat anda disahkan oleh pentadbiran.");

	window.location.replace("<?php echo $site; ?>");

	</script>
  	<?php

	}


		public function view_img()
	{

		//$ic=$this->uri->segment(3)
		$site=site_url();
		$base=base_url();
		$table=$this->uri->segment(3);
		$id=$this->uri->segment(4);


		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'table' => $table,
					'id' => $id
					);





		$this->load->view('view_img',$data);

	}



	public function logout()
	{

		$site=site_url();
		$base=base_url();

		session_destroy();
		header("Location: $base");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
