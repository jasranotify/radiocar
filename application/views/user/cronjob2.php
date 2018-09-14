<?php
//$datenow=date("Y-m-d H:i:s");
mysql_query("update tbl_user set cron_check_expireddate_flag='0'");
mysql_query("update tbl_param set value_1='$datenow' where param_name='cronjob2'");


/*require_once("dompdf/dompdf_config.inc.php");
spl_autoload_register('DOMPDF_autoload');


$lang_array = array("chi","eng");
$i = 0;
foreach($lang_array as $lang)
{
  //$html = "<!DOCTYPE html><html><body>M</body></html>";
  
  $dompdf = new DOMPDF();
  $dompdf->set_paper('A4','landscape');
  $content = file_get_contents("$site/pdf_control/sijil_ahli_pdfview/$data[codeuser]");
  $dompdf->load_html($content);
  $dompdf->render();
  
  
  //$dompdf = new DOMPDF();
  //$dompdf->load_html($html);
  //$dompdf->set_paper("A4", 'portrait');
  //$dompdf->render();
  $output = $dompdf->output();
  unset($dompdf);
  file_put_contents($i.".pdf", $output);
  $i++;
}*/


?>