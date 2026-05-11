<?php
	//use Dompdf\Dompdf;
	use Dompdf\Dompdf;

	require_once 'dompdf-2.0.7/dompdf/autoload.inc.php';

	//$dompdf = new Dompdf();
	$dompdf = new DOMPDF();


	$dompdf->loadhtml('Olá Dani!');

	$dompdf->set_option('defaultFont', 'times');

	$dompdf->setPaper('A4', 'portrait');

	$dompdf->render();

	$dompdf->stream();


?>