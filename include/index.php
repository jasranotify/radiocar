<?php
	require_once("dompdf/dompdf_config.inc.php");
	spl_autoload_register('DOMPDF_autoload');
	function pdf_create($html, $filename, $paper, $orientation, $stream=TRUE)
	{
		$dompdf = new DOMPDF();
		$dompdf->set_paper($paper,$orientation);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream($filename.".pdf");
	}
	$filename = 'nama_filex';
	$dompdf = new DOMPDF();
	$html = file_get_contents('http://localhost/rtexa/index.php/admin_control/sijil_ahli/UID00000001'); 
	//pdf_create($html,$filename,'A4','portrait');
	pdf_create($html,$filename,'A4','landscape');
?>