
<style>

      @page {
        size: a4 landscape; 
        margin:0.9;padding:0.9; // you can set margin and padding 0 
      } 
      body {
        font-family: Times New Roman;
        font-size: 33px;
        text-align: center;
        border: thin solid black;  
		background-image:url("<?php echo $base."include/images/bcsijil.jpg"; ?>");
   		background-repeat: no-repeat;
   		background-size: 100% 100%;
      }
  




html {
    height: 100%
}
p {
    display: block;
    margin-top:0em;
    margin-bottom:0em;
    margin-left: 0;
    margin-right: 0;
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
<p>pada tarikh  <?php echo $newDate; ?>   dengan Nombor Keahlian < <?php echo $data["noahli"]; ?> </p>
<p>untuk tahun  &nbsp; <?php echo date("Y"); ?></p>
</font>

</div>
</body>









