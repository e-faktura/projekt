<?php
	require_once(APP . 'Vendor' . DS . 'mpdf' . DS . 'mpdf.php');
	$mpdf = new mPDF();
	$mpdf->WriteHTML($this->fetch('content'));
	$mpdf->Output();
?>