<?php
//include('conexion_reporte.php');//CONEXION A LA BD
include('ma_imprimir_reporte.php');

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$numero=$_POST['numero'];
echo "<script>alert('generar');</script>";

$usuarios=$conexion->query("SELECT *  FROM v_asis where alumno_tarjeta='$numero' and fecha BETWEEN '$fecha1' AND '$fecha2'");

if(isset($_POST['generar_reporte']))
{
	require_once('tcpdf/tcpdf.php');

	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	ob_clean();
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Miguel Caro');
	$pdf->SetTitle($_POST['reporte_name']);

	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 6);
	$pdf->addPage();

	$content = '';

	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'.$_POST['reporte_name'].'</h1>

      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>FECHA</th>
            <th>DESAYUNO</th>
            <th>ALMUERZO</th>
            <th>CENA</th>
            <th>DOMINGO</th>
          </tr>
        </thead>
	';
	while ($user=$usuarios->fetch_assoc()) { 		
	$content .= '
		<tr>
			<td>'.$user['fecha'].'</td>
            <td>'.$user['desayuno'].'</td>
            <td>'.$user['almuerzo'].'</td>
            <td>'.$user['cena'].'</td>
            <td>'.$user['domingo'].'</td>
        </tr>
	';
	}
	$content .= '</table>';
	$content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>Creado por </span><a href="#"> ESIS</a>
            </div>
        </div>
	';
	$pdf->writeHTML($content, true, 0, true, 0);
	$pdf->lastPage();
	// D para descargar e I para mostrar
	$pdf->output('Report.pdf', 'I');
	// QUERY PARA CREAR EL REPORTE
}
?>