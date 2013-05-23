<?php
	require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php');
	spl_autoload_register('DOMPDF_autoload');
	$dompdf = new DOMPDF();
	$dompdf->set_paper = 'A4';
	$dompdf->load_html( $this->fetch('content') );
	$dompdf->render();
	echo $dompdf->output();
?>