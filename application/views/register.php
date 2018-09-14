
<?php
$url= $base."include/templatemo/";
date_default_timezone_set("Asia/Kuala_Lumpur");
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JASRA</title>
	<link rel='stylesheet' type='text/css' href='include/home.css' />
	<script type='text/javascript' src='include/jquery-1.7.1.min.js'></script>
 	<script type="text/javascript">
$(document).ready(function() {
    $('#resowidth').val(screen.width);
    $('#resoheight').val(screen.height);
});
	</script>
</head>
<body>
<div style="
	width: 100%; 
	height: 43px;
	background-image:url(<?php echo $base;?>include/images/black_band.jpg);
	background-repeat: repeat-x;
	"></div>



</script>


<script language="javascript" type="text/javascript">


function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}











function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
             return true;
          }    






function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }




</script>

<link rel="stylesheet" href="<?php echo $url; ?>css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="<?php echo $url; ?>js/slimbox2.js"></script> 
<!--  t e m p l a t e m o  372  t i t a n i u m  -->
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-size: 36px;
}
.style3 {font-size: 36px; font-family: Arial, Helvetica, sans-serif; color: #FFFFFF;}
.style4 {
	color: #FF0000;
	font-weight: bold;
}
.style5 {color: #FF0000}
-->
</style>
</head>
<body>


	
    <?php
	#print_r($_POST);
	?>
    
    
	<!-- END of templatemo_header -->
	<!-- end of templatemo_menu -->
<div id="templatemo_main" align="center">
<br />
<br />


<script language="javascript">




window.datedis = function() {
	if(document.getElementById("kenaisi").checked) {
		//MAKLUMAT MENGENAI LESEN
		document.getElementById("tarikhlulusrae").disabled = false;
		document.getElementById("callsign").disabled = false;
		document.getElementById("tarikhluluscw").disabled = false;
		document.getElementById("kelasab").disabled = false;
		document.getElementById("cmcclientid").disabled = false;
		document.getElementById("tarikhtamatlesen").disabled = false;
		
		//MAKLUMAT MENGENAI STESYEN RADIO
		document.getElementById("alamatstesyen").disabled = false;
		document.getElementById("poskodstesyen").disabled = false;
		document.getElementById("bandarnegeristesyen").disabled = false;
		document.getElementById("datum").disabled = false;
		document.getElementById("kawasanoperasipancar").disabled = false;
		document.getElementById("latitut").disabled = false;
		document.getElementById("longitud").disabled = false;
		document.getElementById("noflat").disabled = false;
		document.getElementById("jeniskenderaan").disabled = false;
		
		document.getElementById("mobilerigjenama1").disabled = false;
		document.getElementById("mobilerignosiri1").disabled = false;
		document.getElementById("mobilerigmodel1").disabled = false;
		document.getElementById("mobilerigjenama2").disabled = false;
		document.getElementById("mobilerignosiri2").disabled = false;
		document.getElementById("mobilerigmodel2").disabled = false;
		document.getElementById("mobilerigjenama3").disabled = false;
		document.getElementById("mobilerignosiri3").disabled = false;
		document.getElementById("mobilerigmodel3").disabled = false;
		document.getElementById("handyjenama1").disabled = false;
		document.getElementById("handynosiri1").disabled = false;
		document.getElementById("handymodel1").disabled = false;
		document.getElementById("handyjenama2").disabled = false;
		document.getElementById("handynosiri2").disabled = false;
		document.getElementById("handymodel2").disabled = false;
		document.getElementById("handyjenama3").disabled = false;
		document.getElementById("handynosiri3").disabled = false;
		document.getElementById("handymodel3").disabled = false;
	} else {
		//MAKLUMAT MENGENAI LESEN
		document.getElementById("tarikhlulusrae").disabled = true;
		document.getElementById("callsign").disabled = true;
		document.getElementById("tarikhluluscw").disabled = true;
		document.getElementById("kelasab").disabled = true;
		document.getElementById("cmcclientid").disabled = true;
		document.getElementById("tarikhtamatlesen").disabled = true;
		
		//MAKLUMAT MENGENAI STESYEN RADIO
		document.getElementById("alamatstesyen").disabled = true;
		document.getElementById("poskodstesyen").disabled = true;
		document.getElementById("bandarnegeristesyen").disabled = true;
		document.getElementById("datum").disabled = true;
		document.getElementById("kawasanoperasipancar").disabled = true;
		document.getElementById("latitut").disabled = true;
		document.getElementById("longitud").disabled = true;
		document.getElementById("noflat").disabled = true;
		document.getElementById("jeniskenderaan").disabled = true;
		
		document.getElementById("mobilerigjenama1").disabled = true;
		document.getElementById("mobilerignosiri1").disabled = true;
		document.getElementById("mobilerigmodel1").disabled = true;
		document.getElementById("mobilerigjenama2").disabled = true;
		document.getElementById("mobilerignosiri2").disabled = true;
		document.getElementById("mobilerigmodel2").disabled = true;
		document.getElementById("mobilerigjenama3").disabled = true;
		document.getElementById("mobilerignosiri3").disabled = true;
		document.getElementById("mobilerigmodel3").disabled = true;
		document.getElementById("handyjenama1").disabled = true;
		document.getElementById("handynosiri1").disabled = true;
		document.getElementById("handymodel1").disabled = true;
		document.getElementById("handyjenama2").disabled = true;
		document.getElementById("handynosiri2").disabled = true;
		document.getElementById("handymodel2").disabled = true;
		document.getElementById("handyjenama3").disabled = true;
		document.getElementById("handynosiri3").disabled = true;
		document.getElementById("handymodel3").disabled = true;
	}
}
















function validateForm()
{
	
	
	
var jeniskeahlian=document.forms["register"]["jeniskeahlian"].value;
if (jeniskeahlian==null || jeniskeahlian==""){alert("Sila pilih jenis keahlian");return false;}

var gambar=document.forms["register"]["gambar"].value;
if (gambar==null || gambar==""){alert("Sila pilih gambar");return false;}


var fname=document.forms["register"]["fname"].value;
if (fname==null || fname==""){alert("Sila masukkan nama penuh");return false;}

var dob=document.forms["register"]["dob"].value;
if (dob==null || dob==""){alert("Sila masukkan tarikh lahir");return false;}


var ic_no=document.forms["register"]["ic_no"].value;
if (ic_no==null || ic_no==""){alert("Sila masukkan i/c no");return false;}

var alamatrumah=document.forms["register"]["alamatrumah"].value;
if (alamatrumah==null || alamatrumah==""){alert("Sila masukkan alamat rumah");return false;}

var pokskodrumah=document.forms["register"]["pokskodrumah"].value;
if (pokskodrumah==null || pokskodrumah==""){alert("Sila masukkan poskod rumah");return false;}

var bandarnegerirumah=document.forms["register"]["bandarnegerirumah"].value;
if (bandarnegerirumah==null || bandarnegerirumah==""){alert("Sila masukkan bandar & negeri rumah");return false;}

var handphone=document.forms["register"]["handphone"].value;
if (handphone==null || handphone==""){alert("Sila masukkan no handphone anda");return false;}

var email=document.forms["register"]["email"].value;
if (email==null || email==""){alert("Sila masukkan email anda");return false;}

var re = /\S+@\S+\.\S+/;
//alert(email);
    var emailvalid=re.test(email);
	//if(emailvalid){alert("ok cun");}
	if(!emailvalid){alert("wrong email format");return false;} 






//ahli biasa maklumat lesen
//alert(jeniskeahlian);
var tarikhlulusrae=document.forms["register"]["tarikhlulusrae"].value;
if (jeniskeahlian==1 && (tarikhlulusrae==""|| tarikhlulusrae==null)){alert("Sila masukkan tarikh lulus RAE");return false;}



var callsign=document.forms["register"]["callsign"].value;
if (jeniskeahlian==1 && (callsign==""|| callsign==null)){alert("Sila masukkan callsign");return false;}

var res = callsign.substring(0, 3);
//alert(res);
if (res=="9W2" || res=="9M2" || res=="9w2" || res=="9m2"){var sss="sas";}
else{alert("sila pastikan no callsign bermula dengan 9W2 @ 9M2");return false;}



/////////////////var tarikhluluscw=document.forms["register"]["tarikhluluscw"].value;
//////////////if (jeniskeahlian==1 && (tarikhluluscw==""|| tarikhluluscw==null)){alert("Sila masukkan tarikh lulus cw");return false;}

var kelasab=document.forms["register"]["kelasab"].value;
if (jeniskeahlian==1 && (kelasab==""|| kelasab==null)){alert("Sila masukkan kelas lesen");return false;}

///////////////var cmcclientid=document.forms["register"]["cmcclientid"].value;
///////////////if (jeniskeahlian==1 && (cmcclientid==""|| cmcclientid==null)){alert("Sila masukkan cmc client id");return false;}

var tarikhtamatlesen=document.forms["register"]["tarikhtamatlesen"].value;
if (jeniskeahlian==1 && (tarikhtamatlesen==""|| tarikhtamatlesen==null)){alert("Sila masukkan tarikh tamat lesen");return false;}





var pswd=document.forms["register"]["pswd"].value;
if (pswd==null || pswd==""){alert("Please insert password");return false;}

var password1=document.forms["register"]["pswd"].value;
var password2=document.forms["register"]["pswd2"].value;

//alert(password1);
//alert(password2);

if(password1 != password2){
alert("Password did not match");
return false;
}//if



//var address=document.forms["register"]["address"].value;
//if (address==null || address==""){alert("Please insert address");return false;}

//var date=document.forms["register"]["date"].value;
//if (date==null || date==""){alert("Please insert date of registration");return false;}

}//validateForm























</script>

</script>




<img src="<?php echo $base;?>include/images/web-logo.png" width="200" height="170">



<script class="jsbin" src="<?php echo $base."include/js/jquery_min_previewpic.js"; ?>"></script>
<script class="jsbin" src="<?php echo $base."include/js/jquery-ui.min.js_previewpic.js"; ?>"></script>

<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>
    
        <?php /*?><p align="center"><img src="<?php echo $url; ?>icon profile/User.png" width="240" height="240" /></p><?php */?>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                              
                  
                  
                  
                  
                    <form name="register" onSubmit="return validateForm()" method="post" action="<?php echo $site; ?>/main_control/insert" enctype="multipart/form-data">
                    <!--<form name="register" onsubmit="return validateForm()" method="post" action="">-->
                      <table width="700">
                      
                      	<tr>
                          <td colspan="3" align="right"><a href="<?php echo $site."/main_control"; ?>"><img src="<?php echo $base;?>include/images/decisions-ce-browse-login-button.png" width="110" height="60"></a></td>
                        </tr>
                        
                         <tr>
                          <td colspan="3"></td>
                        </tr>
                        
                        <tr>
                          <td colspan="3"><h2 align="center"><strong>PENDAFTARAN BARU</strong></h2></td>
                        </tr>
                        <tr>
                          <td colspan="3"></td>
                        </tr>
                        <tr>
                          <td colspan="3"></td>
                        </tr>
                        
                        
                        
                        <tr>
                          <td colspan="3" bgcolor="#6699FF"><strong>PERMOHONAN MENJADI AHLI</strong></td>
                        </tr>
                      
                      
                      
                        
                        <tr>
                          <td><strong>Jenis Keahlian</strong></td>
                          <td>&nbsp;</td>
                          <td>
              
                            <table width="100%">
                            <tr>
                            <td width="50%">
                            
                            <input type="radio" name="jeniskeahlian" value="1" id="kenaisi"  onclick="datedis()"/>Ahli Biasa(Pemancar)
                            <br />
                            <input type="radio" name="jeniskeahlian" value="2" id="jgnisi" onClick="datedis()"/>Ahli Bersekutu(SWL)
                            </td>
                            <td align="center">
                            <h4>Sila kepilkan gambar anda</h4>
                            <input type='file' name="gambar" id="gambar" accept="image/x-png,image/gif,image/jpeg" onChange="readURL(this);" />
    <img id="blah" src="#" alt="your image" />
                            
                           
                            </td>
                            </tr>
                            </table>
                          
                          
                          
                          
                          
                         
                          
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" bgcolor="#6699FF"><strong>MAKLUMAT PERIBADI PEMOHON</strong></td>
                        </tr>
                        <tr>
                          <td><strong>Nama Penuh</strong></td>
            <td>:</td>
            <td><input type="text" name="fname" size="20">
              <span class="style5">*</span></td>
            </tr>
                        <tr>
                          <td><strong>Nama Suami/Isteri</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="namasuamiisteri" size="20" /></td>
                        </tr>
                        <tr>
                          <td><strong>Tarikh Lahir</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="date" name="dob"/>
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td><strong>Tempat Lahir</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="tempatlahir" size="20" /></td>
                        </tr>
                        <tr>
                          <td><strong>I/C No.</strong></td>
            <td>:</td>
            <td><input type="text" name="ic_no" maxlength="12" size="20" onKeyPress="return isNumberKey(this.value)" >               
              <span class="style5"> * Example : 890124144567</span></td>
            </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Alamat Rumah</strong></td>
                          <td>:</td>
                          <td><textarea rows="5" cols="30" name="alamatrumah" wrap="physical"></textarea>
                            <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td><strong>Poskod</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="pokskodrumah" size="20" />
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td><strong>Bandar &amp; Negeri</strong></td>
                          <td>&nbsp;</td>
                          <td>
                          <select name="bandarnegerirumah">
                          <option value="">Sila pilih</option>
                          <?php
						  $q="SELECT * FROM tbl_daerah";
						  $r=mysql_query($q);
						  while($data=mysql_fetch_array($r)){
						  echo $data["daerah"];
						  echo "<option value='$data[daerah]-$data[negeri]'>$data[negeri]-$data[daerah]</option>";
						  }//while
						  ?>
                          </select>
                           
                          <!--<input type="text" name="bandarnegerirumah" size="20" />-->
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Alamat Surat Menyurat</strong></td>
                          <td>:</td>
                          <td><textarea rows="5" cols="30" name="alamatsurat" wrap="physical"></textarea></td>
                        </tr>
                        <tr>
                          <td><strong>Poskod</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="poskodsurat" size="20" /></td>
                        </tr>
                        <tr>
                          <td><strong>Bandar &amp; Negeri</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="bandarnegerisurat" size="20" /></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>No Telefon Rumah</strong></td>
            <td>:</td>
            <td><input type="text" name="telefonrumah" size="20" onKeyPress="return isNumberKey(this.value)"></td>
            </tr>
                        <tr>
                          <td><strong>No Fax Rumah</strong></td>
                          <td>:</td>
                          <td><input type="text" name="faxrumah" size="20" onKeyPress="return isNumberKey(this.value)" /></td>
                        </tr>
                        <tr>
                          <td><strong>No Handphone</strong></td>
                          <td>:</td>
                          <td><input type="text" name="handphone" size="20" onKeyPress="return isNumberKey(this.value)" />
                            <span class="style5">* Example : 0123456789</span></td>
                        </tr>
                        <tr>
                          <td><strong>Email</strong></td>
            <td>:</td>
            <td><input type="text" name="email" size="20"> 
              <span class="style5">*</span></td>
            </tr>
                        <tr>
                          <td><strong>Pekerjaan</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="pekerjaan" size="20" /></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Alamat Tempat Bertugas</strong></td>
                          <td>:</td>
                          <td><textarea rows="5" cols="30" name="alamatkerja" wrap="physical"></textarea></td>
                        </tr>
                        <tr>
                          <td><strong>Poskod</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="poskodkerja" size="20" /></td>
                        </tr>
                        <tr>
                          <td><strong>Bandar &amp; Negeri</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="bandarnegerikerja" size="20" /></td>
                        </tr>
                        <tr>
                          <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" bgcolor="#6699FF"><strong>MAKLUMAT MENGENAI LESEN</strong></td>
                        </tr>
                        <tr>
                          <td><strong>Tarikh Lulus RAE</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="date" name="tarikhlulusrae" id="tarikhlulusrae" size="20" disabled/>
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td><strong>Callsign</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="callsign" id="callsign" size="20" disabled />
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td><strong>Tarikh Lulus CW(Morse Code)</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="date" name="tarikhluluscw" id="tarikhluluscw" size="20" disabled/></td>
                        </tr>
                        <tr>
                          <td><strong>Kelas (A/B)</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="kelasab" id="kelasab" size="20" disabled />
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td><strong>CMC Client ID </strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="cmcclientid" id="cmcclientid" size="20" disabled />
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td><strong>Tarikh Tamat Lesen</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="date" name="tarikhtamatlesen" id="tarikhtamatlesen" size="20" disabled />
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" bgcolor="#6699FF"><strong>MAKLUMAT MENGENAI STESYEN RADIO</strong></td>
                        </tr>
                        <tr>
                          <td><strong>Lokasi (Alamat Stesyen)</strong></td>
                          <td>:</td>
                          <td><textarea rows="5" cols="30" name="alamatstesyen" wrap="physical" id="alamatstesyen" size="20" disabled></textarea></td>
                        </tr>
                        <tr>
                          <td><strong>Poskod</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="poskodstesyen" id="poskodstesyen" size="20" disabled /></td>
                        </tr>
                        <tr>
                          <td><strong>Bandar &amp; Negeri</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="bandarnegeristesyen" id="bandarnegeristesyen" size="20" disabled /></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Ketinggian dari paras laut </strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="datum" id="datum" size="20" disabled />
                            meter</td>
                        </tr>
                        <tr>
                          <td><strong>Kaw. Operasi Memancar</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="kawasanoperasipancar" id="kawasanoperasipancar" size="20" disabled /></td>
                        </tr>
                        <tr>
                          <td><strong>Latitude (oN) </strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="latitut" id="latitut" size="20" disabled /></td>
                        </tr>
                        <tr>
                          <td><strong>Longiture (o  E) </strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="longitud" id="longitud" size="20" disabled /></td>
                        </tr>
                        <tr>
                          <td><strong>No. Kenderaan</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="noflat" id="noflat" size="20" disabled /></td>
                        </tr>
                        <tr>
                          <td><strong>Jenis Kenderaan</strong></td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="jeniskenderaan" id="jeniskenderaan" size="20" disabled /></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Mobile Rig</strong></td>
                          <td>&nbsp;</td>
                          <td>
                          
                          <table width="300" border="1" cellspacing="0" cellpadding="3">
                          <tr bgcolor="#CCCCCC">
                          <td><strong>Bil</strong></td>
                          <td><strong>Jenama</strong></td>
                          <td><strong>No Siri</strong></td>
                          <td><strong>Model</strong></td>
                          </tr>
                          
                          <tr>
                          <td>1</td>
                          <td><input type="text" name="mobilerigjenama1" id="mobilerigjenama1" size="20" disabled/></td>
                          <td><input type="text" name="mobilerignosiri1" id="mobilerignosiri1" size="20" disabled/></td>
                          <td><input type="text" name="mobilerigmodel1" id="mobilerigmodel1" size="20" disabled/></td>
                          </tr>
                          
                           <tr>
                          <td>2</td>
                           <td><input type="text" name="mobilerigjenama2" id="mobilerigjenama2" size="20" disabled/></td>
                          <td><input type="text" name="mobilerignosiri2" id="mobilerignosiri2" size="20" disabled/></td>
                          <td><input type="text" name="mobilerigmodel2" id="mobilerigmodel2" size="20" disabled/></td>
                          </tr>
                          
                           <tr>
                          <td>3</td>
                           <td><input type="text" name="mobilerigjenama3" id="mobilerigjenama3" size="20" disabled/></td>
                          <td><input type="text" name="mobilerignosiri3" id="mobilerignosiri3" size="20" disabled/></td>
                          <td><input type="text" name="mobilerigmodel3" id="mobilerigmodel3" size="20" disabled/></td>
                          </tr>
                          
                          </table>
                          
                          
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Handy</strong></td>
                          <td>&nbsp;</td>
                          <td><table width="300" border="1" cellspacing="0" cellpadding="3">
                            <tr bgcolor="#CCCCCC">
                              <td><strong>Bil</strong></td>
                              <td><strong>Jenama</strong></td>
                              <td><strong>No Siri</strong></td>
                              <td><strong>Model</strong></td>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td><input type="text" name="handyjenama1" id="handyjenama1" size="20" disabled/></td>
                              <td><input type="text" name="handynosiri1" id="handynosiri1" size="20" disabled/></td>
                              <td><input type="text" name="handymodel1" id="handymodel1" size="20" disabled/></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td><input type="text" name="handyjenama2" id="handyjenama2" size="20" disabled/></td>
                              <td><input type="text" name="handynosiri2" id="handynosiri2" size="20" disabled/></td>
                              <td><input type="text" name="handymodel2" id="handymodel2" size="20" disabled/></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td><input type="text" name="handyjenama3" id="handyjenama3" size="20" disabled/></td>
                              <td><input type="text" name="handynosiri3" id="handynosiri3" size="20" disabled/></td>
                              <td><input type="text" name="handymodel3" id="handymodel3" size="20" disabled/></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Password</strong></td>
                          <td>:</td>
                          <td><input name="pswd" type="password" size="20" maxlength="10" />
                          <span class="style5">*</span></td>
                        </tr>
                        <tr>
                          <td><strong>Confirm Password</strong></td>
                          <td>:</td>
                          <td><input name="pswd2" type="password" size="20" maxlength="10" />
                          <span class="style5">*</span></td>
                        </tr>
			<?php 
			$datenow=date("Y-m-d");
			$dateview=date("d/m/Y");
			?>
                        <tr>
                          <td><strong>Date of Application</strong></td>
              <td>:</td>
              <td>
                <input type="hidden" name="date"  value="<?php echo $datenow; ?>" />
				<?php echo $dateview; ?>                 </td>
            </tr>
                        <tr>
                          <td></td>
            <td></td>
            <td>
              
              <div align="center">
                <p align="center">
                  <input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;
                  <input type="reset" name="Submit2" value="Reset" />
                  </p>
                  </div></td>
            </tr>
                      </table>
                    </form>
                  <button onClick="javascript:window.location.href = '<?php echo $base; ?>'"><b>CANCEL</b></button>
				  
				  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      <p>&nbsp;</p>
     <div class="clear"></div> 
  </div><!-- END of templatemo_main -->
</div><!-- END of templatemo_wrapper -->
<!-- END of templatemo_bottom_wrapper -->
<div id="templatemo_footer_wrapper">    
    <div id="templatemo_footer">
    	
    </div><!-- END of templatemo_footer -->
</div><!-- END of templatemo_footer_wrapper -->
</body>
</html>
<pre>
<?php 
//print_r($_GET);
print_r($_POST);

//echo "<br>";

//echo $var=$_GET["acc"];

?>
</pre>
