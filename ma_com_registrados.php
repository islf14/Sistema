<?php
	require_once('conexion.php');
	$con= conectar();
	$usuario = 'SELECT * FROM alumno ';	
	$usuarios=$con->query($usuario);
	
	if(isset($_POST['create_pdf'])){
		require_once('tcpdf/tcpdf.php');
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('ESIS');
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
				<th>TARJETA</th>
				<th>CODIGO</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>TIPO DE BECA</th>
				<th>PAGO</th>
				<th>DIRECCION</th>
				<th>TELEFONO</th>
				<th>FACULTAD</th>
				<th>ESCUELA</th>
			</tr>
			</thead>
		';
		while ($user=$usuarios->fetch_assoc()) {				
		$content .= '
			<tr>
				<td>'.$user['tarjeta'].'</td>
				<td>'.$user['cod_alumno'].'</td>
				<td>'.$user['nombres'].'</td>
				<td>'.$user['apellidos'].'</td>
				<td>'.$user['tipo_beca'].'</td>
				<td>'.$user['pago'].'</td>
				<td>'.$user['direccion'].'</td>
				<td>'.$user['telefono'].'</td>
				<td>'.$user['facultad'].'</td>
				<td>'.$user['escuela'].'</td>
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
	}
?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Comensales Registrados - Exportar a PDF</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap1.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
        <div class="row padding">
        	<div class="col-md-12">
            	<?php $h1 = "Comensales Registrados";  
            	 echo '<h1>'.$h1.'</h1>'
				?>
            </div>
        </div>
    	<div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>TARJETA</th>
            <th>CODIGO</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>TIPO BECA</th>
            <th>PAGO</th>
			<th>DIRECCION</th>
			<th>TELEFONO</th>
			<th>FACULTAD</th>
			<th>ESCUELA</th>
          </tr>
        </thead>
        <tbody>
        <?php
			while ($user=$usuarios->fetch_assoc()) {   ?>
          <tr >
            <td><?php echo $user['tarjeta']; ?></td>
            <td><?php echo $user['cod_alumno']; ?></td>
            <td><?php echo $user['nombres']; ?></td>
            <td><?php echo $user['apellidos']; ?></td>
            <td><?php echo $user['tipo_beca']; ?></td>
			<td><?php echo $user['pago']; ?></td>
			<td><?php echo $user['direccion']; ?></td>
			<td><?php echo $user['telefono']; ?></td>
			<td><?php echo $user['facultad']; ?></td>
			<td><?php echo $user['escuela']; ?></td>
            
          </tr>
         <?php } ?>
        </tbody>
      </table>
              <div class="col-md-12">
              	<form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>
              </div>
      	</div>
    </div>
</body>
</html>