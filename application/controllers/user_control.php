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

	public function uploadprofilepic(){
        $site=site_url();
        $base=base_url();
        $user_id=$_POST["userid"];
//        echo $user_id;die;

        //$file_content = scaleImageFileToBlob($_FILES["gambar"]["tmp_name"]);
        $file_content = $this->scaleImageFileToBlob($_FILES["gambar"]["tmp_name"]);
        //$this->abc();
        $file_content = addslashes($file_content);
        $q="update tbl_user set gambar='$file_content' where codeuser='$user_id'";

        mysql_query($q);
        header("Location: $site/user_control/profile?ref=Profile");

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

    public function editborang()
    {


        $site=site_url();
        $base=base_url();

        $data=array(
            'page' => "Editborang",
            'site' => site_url(),
            'base' => base_url()
        );
        //$this->load->view('template/banner_2',$data);


        //$this->load->view('template/menu',$data);
        //$this->load->view('template/div_open',$data);
        $this->load->view('user/editborang',$data);
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

	public function printsijil()
	{


		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "printsijil",
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('template/banner_2',$data);


		//$this->load->view('template/menu',$data);
		//$this->load->view('template/div_open',$data);
		$this->load->view('user/printsijil',$data);
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
