<head>
	<title>Detail User</title>
	<link rel="shortcut icon" href="<?php echo $base;?>include/images/icon.jpg"/>
</head>

<style type="text/css">
<!--
table, tr, td {
  /*border: 1px solid black;*/
}
tr.noBorder td {
  border: 0;
}
</style>


<script type="text/javascript">
<!--
    function validateForm () {
        // alert("sss");

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
    }
</script>


<?php
//echo "<pre>";
//print_r($_SESSION);die;
$codeuser=$_SESSION["logs"]["user_id"];
$submitbutton="<input type=\"submit\" name=\"updateborang\" value=\"UPDATE\" style=\"background-color: #4eb1ff;font-size: large;font-weight: bold\">";


#$qq="SELECT a.*,b.price,b.inv_id,b.date_issued,b.inv_status,b.img_resit,b.*  FROM tbl_user a,tbl_inv b WHERE b.flag='1' AND b.user_id=a.codeuser AND b.flag='1' and a.codeuser='$codeuser'";
$qq="SELECT a.* FROM tbl_user a WHERE a.codeuser='$codeuser'";

$rr=mysql_query($qq);
$bil=1;
while($dataaa=mysql_fetch_array($rr)){
?>
<style type="text/css">
.centertable {
	text-align: center;
}
</style>
<div align="center">
<!--    <form name="register" onSubmit="return validateForm()" action="" method="post">-->
        <form name="register" onSubmit="return validateForm()" method="post" action="<?php echo $site."/user_control/updateborang"; ?>" enctype="multipart/form-data">
<table width="80%" border="1" cellpadding="4" cellspacing="0">
  <tr>
    <td colspan="4" align="center" bgcolor="#6699FF"><strong>PERMOHONAN MENJADI AHLI</strong></td>
  </tr>
  <tr>
    <td colspan="3">Ahli Biasa(Pemancar) <?php if($dataaa["jeniskeahlian"]==1){echo "<img src='$base\include/images/right.png' width='30' height='30'>";}?></td>
    <td rowspan="6" align="center"><?php echo '<img width="300" height="200" src="data:image/jpeg;base64,'.base64_encode( $dataaa['gambar'] ).'"/>';  ?></td>
  </tr>
  <tr>
    <td colspan="3">Ahli Bersekutu(SWL)<?php if($dataaa["jeniskeahlian"]==2){echo "<img src='$base\include/images/right.png' width='30' height='30'>";}?></td>
  </tr>
  <tr class="noBorder">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="noBorder">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
    <?php 
	if($dataaa["status_user"]==3){
		echo "<strong>Code Ahli :$dataaa[codeuser]</strong>";
		} 
	else{
		echo "<strong>Code Ahli : Not Assign Yet By President</strong>";
		}
		
		
	?>
    
    
    </td>
  </tr>
  <tr class="noBorder">
    <td><?php echo $submitbutton; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr class="noBorder">
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center" bgcolor="#6699FF"><strong>MAKLUMAT PERIBADI PEMOHON </strong></td>
  </tr>
  <tr>
    <td><strong>Nama Penuh</strong></td>
    <td colspan="3"><?php echo $dataaa["nama"]; ?></td>
  </tr>
  <tr>
    <td><strong>Nama Suami/Isteri</strong></td>
    <td colspan="3"><input type="text" name="namapasangan" value="<?php echo $dataaa["namasuamiisteri"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>Tarikh Lahir</strong></td>
    <td><?php echo $dataaa["dob"]; ?></td>
    <td><strong>Tempat Lahir</strong></td>
    <td><?php echo $dataaa["tempatlahir"]; ?></td>
  </tr>
  <tr>
    <td><strong>No K/P</strong></td>
    <td><?php echo $dataaa["ic"]; ?></td>
    <td><strong>No K/P Lama</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Alamat Rumah</strong></td>
    <td colspan="3"><textarea name="alamatrumah" cols="70" rows="3"><?php echo $dataaa["alamatrumah"]; ?></textarea></td>
  </tr>
  <tr>
    <td><strong>Poskod</strong></td>
    <td><input type="text" name="pokskodrumah" value="<?php echo $dataaa["pokskodrumah"]; ?>" ></td>
    <td><strong>Bandar &amp; Negeri</strong></td>
    <td>
<!--        <input type="text" name="bandarnegerirumah" value="--><?php //echo $dataaa["bandarnegerirumah"]; ?><!--" >-->
        <select name="bandarnegerirumah">
            <option value="">Sila pilih</option>
            <?php
            $q="SELECT * FROM tbl_daerah";
            $r=mysql_query($q);
            while($data=mysql_fetch_array($r)){
                #echo $data["daerah"];
                $value="$data[daerah]-$data[negeri]";
                if($value==$dataaa["bandarnegerirumah"]){$selected="selected";}
                else{$selected="";}
                echo "<option value='$value' $selected>$data[negeri]-$data[daerah]</option>";
            }//while
            ?>
        </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Alamat Surat Menyurat</strong></td>
    <td colspan="3"><textarea name="alamatsurat" cols="70" rows="3"><?php echo $dataaa["alamatsurat"]; ?></textarea></td>
  </tr>
  <tr>
    <td><strong>Poskod</strong></td>
    <td><input type="text" name="poskodsurat" value="<?php echo $dataaa["poskodsurat"]; ?>" ></td>
    <td><strong>Bandar &amp; Negeri</strong></td>
    <td><input type="text" name="bandarnegerisurat" value="<?php echo $dataaa["bandarnegerisurat"]; ?>" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>No. Telefon Rumah</strong></td>
    <td><input type="text" name="telefonrumah" value="<?php echo $dataaa["telefonrumah"]; ?>" ></td>
    <td><strong>No. Handphone</strong></td>
    <td><input type="text" name="handphone" value="<?php echo $dataaa["handphone"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>No. Fax Rumah </strong></td>
    <td><input type="text" name="faxrumah" value="<?php echo $dataaa["faxrumah"]; ?>" ></td>
    <td><strong>Email </strong></td>
    <td><input type="text" name="email" value="<?php echo $dataaa["email"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>Pekerjaan</strong></td>
    <td colspan="3"><input type="text" name="pekerjaan" value="<?php echo $dataaa["pekerjaan"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>Alamat Tempat Bertugas</strong></td>
    <td colspan="3"><textarea name="alamatkerja" cols="70" rows="3"><?php echo $dataaa["alamatkerja"]; ?></textarea></td>
  </tr>
  <tr>
    <td><strong>Poskod</strong></td>
    <td><input type="text" name="poskodkerja" value="<?php echo $dataaa["poskodkerja"]; ?>" ></td>
    <td><strong>Bandar &amp; Negeri</strong></td>
    <td><input type="text" name="bandarnegerikerja" value="<?php echo $dataaa["bandarnegerikerja"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>No. Telefon Pejabat</strong></td>
    <td>&nbsp;</td>
    <td><strong>No. Fax Pejabat </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr class="noBorder">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center" bgcolor="#6699FF"><strong>MAKLUMAT MENGENAI LESEN </strong></td>
  </tr>
  <tr>
    <td><strong>Tarikh Lulus RAE</strong></td>
    <td><input type="date" name="tarikhlulusrae" value="<?php echo $dataaa["tarikhlulusrae"]; ?>"> </td>
    <td><strong>Callsign</strong></td>
    <td><input type="text" name="callsign" value="<?php echo $dataaa["callsign"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>Tarikh Lulus CW </strong></td>
    <td><input type="date" name="tarikhluluscw" value="<?php echo $dataaa["tarikhluluscw"]; ?>"></td>
    <td><strong>Kelas (A/B) </strong></td>
    <td><input type="text" name="kelasab" value="<?php echo $dataaa["kelasab"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>CMC Client ID </strong></td>
    <td><input type="text" name="cmcclientid" value="<?php echo $dataaa["cmcclientid"]; ?>" ></td>
    <td><strong>Tarikh Tamat Lesen</strong></td>
    <td><input type="date" name="tarikhtamatlesen" value="<?php echo $dataaa["tarikhtamatlesen"]; ?>"></td>
  </tr>
  <tr class="noBorder">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center" bgcolor="#6699FF"><strong>MAKLUMAT MENGENAI STESYEN RADIO </strong></td>
  </tr>
  <tr>
    <td><strong>Lokasi (Alamat Stesyen)</strong></td>
    <td colspan="3"><textarea name="alamatstesyen" cols="70" rows="3"><?php echo $dataaa["alamatstesyen"]; ?></textarea></td>
  </tr>
  <tr>
    <td><strong>Poskod</strong></td>
    <td><input type="text" name="poskodstesyen" value="<?php echo $dataaa["poskodstesyen"]; ?>" ></td>
    <td><strong>Bandar & Negeri</strong></td>
    <td><input type="text" name="bandarnegeristesyen" value="<?php echo $dataaa["bandarnegeristesyen"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>Ketinggian dari paras laut</strong></td>
    <td><input type="text" name="datum" value="<?php echo $dataaa["datum"]; ?>" ></td>
    <td><strong>Kaw. Operasi Memancar</strong></td>
    <td><input type="text" name="kawasanoperasipancar" value="<?php echo $dataaa["kawasanoperasipancar"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>Latitude (oN)</strong></td>
    <td><input type="text" name="latitut" value="<?php echo $dataaa["latitut"]; ?>" ></td>
    <td><strong>Longiture (o  E) </strong></td>
    <td><input type="text" name="longitud" value="<?php echo $dataaa["longitud"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>No. Kenderaan </strong></td>
    <td><input type="text" name="noflat" value="<?php echo $dataaa["noflat"]; ?>" ></td>
    <td><strong>Jenis Kenderaan </strong></td>
    <td><input type="text" name="jeniskenderaan" value="<?php echo $dataaa["jeniskenderaan"]; ?>" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Jenama</strong></td>
    <td><strong>No. Siri Radio </strong></td>
    <td><strong>Model</strong></td>
  </tr>
  <tr>
    <td><strong>Mobile Rig</strong></td>
    <td>1.<input type="text" name="mobilerigjenama1" value="<?php echo $dataaa["mobilerigjenama1"]; ?>" ></td>
    <td>S/N<input type="text" name="mobilerignosiri1" value="<?php echo $dataaa["mobilerignosiri1"]; ?>" ></td>
    <td><input type="text" name="mobilerigmodel1" value="<?php echo $dataaa["mobilerigmodel1"]; ?>" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2.<input type="text" name="mobilerigjenama2" value="<?php echo $dataaa["mobilerigjenama2"]; ?>" ></td>
    <td>S/N<input type="text" name="mobilerignosiri2" value="<?php echo $dataaa["mobilerignosiri2"]; ?>" ></td>
    <td><input type="text" name="mobilerigmodel2" value="<?php echo $dataaa["mobilerigmodel2"]; ?>" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.<input type="text" name="mobilerigjenama3" value="<?php echo $dataaa["mobilerigjenama3"]; ?>" ></td>
    <td>S/N<input type="text" name="mobilerignosiri3" value="<?php echo $dataaa["mobilerignosiri3"]; ?>" ></td>
    <td><input type="text" name="mobilerigmodel3" value="<?php echo $dataaa["mobilerigmodel3"]; ?>" ></td>
  </tr>
  <tr>
    <td><strong>Handy </strong></td>
    <td>1.<input type="text" name="handyjenama1" value="<?php echo $dataaa["handyjenama1"]; ?>" ></td>
    <td>S/N<input type="text" name="handynosiri1" value="<?php echo $dataaa["handynosiri1"]; ?>" ></td>
    <td><input type="text" name="handymodel1" value="<?php echo $dataaa["handymodel1"]; ?>" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2.<input type="text" name="handyjenama2" value="<?php echo $dataaa["handyjenama2"]; ?>" ></td>
    <td>S/N<input type="text" name="handynosiri2" value="<?php echo $dataaa["handynosiri2"]; ?>" ></td>
    <td><input type="text" name="handymodel2" value="<?php echo $dataaa["handymodel2"]; ?>" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.<input type="text" name="handyjenama3" value="<?php echo $dataaa["handyjenama3"]; ?>" ></td>
    <td>S/N<input type="text" name="handynosiri3" value="<?php echo $dataaa["handynosiri3"]; ?>" ></td>
    <td><input type="text" name="handymodel3" value="<?php echo $dataaa["handymodel3"]; ?>" ></td>
  </tr>
</table>

        <?php echo $submitbutton; ?>
    </form>



<?php
}//while
?>

</div>

