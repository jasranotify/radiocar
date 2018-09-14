
<style>
@page {
    size: A4;
    margin-top:0.5cm;
    margin-bottom:0;
    margin-left:0;
    margin-right:0;
    padding: 0;
  }
  body {
    font-family: helvetica !important;
    font-size: 10pt;
    position: relative;
  }
  #overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-image: url('http://www.showhousesoftware.com/pd-direct.png');
    background-position: center top;
    background-repeat: no-repeat;
    z-index: -1;
}
  #content{
    padding: 3.5cm 0.50cm 5.00cm 0.50cm;
  }
  #postal-address {
      margin: 0cm;
      margin-left: 1.50cm;
      margin-top: 0.00cm;
      margin-bottom: 1.00cm;
      font-size: 10pt;
  }
  #date {
    font-weight: bold;
  }
</style>
<?php
$q="select * from tbl_user where codeuser='$codeuser'";
$r=mysql_query($q);
$data=mysql_fetch_array($r);


$newDate = date("d-m-Y", strtotime($data["approved_by_presiden"]));
?>



<body>
<div style="top:48%;position:absolute; width:100%" align="center">
<font size="+1">
<p>Dengan ini diperakukan bahawa</p>
<p><strong><?php echo strtoupper($data["nama"]); ?></strong></p>
<p><strong><?php echo $data["ic"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data["callsign"]; ?> </strong></p>
<br />
<p>telah diterima dan diiktiraf sebagai ahli</p>
<p>Persatuan Jalur Selatan Radio Amatur, Johor</p>
<p>dengan kelulusan Ahli Jawatankuasa Tertinggi Persatuan</p>
<p>pada tarikh  <?php echo $newDate; ?>   dengan Nombor Keahlian  <?php echo $data["noahli"]; ?> </p>
<p>untuk tahun  &nbsp; <?php echo date("Y"); ?></p>
</font>

</div>
</body>









