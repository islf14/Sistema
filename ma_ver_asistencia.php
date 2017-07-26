<?php
	include('conexion.php');
	$conexion=conectar();
	//$where=" where 1";
	$where="";
	$tarjeta="";	
	////////////////////// BOTON BUSCAR //////////////////////////////////////
	if (isset($_POST['buscar']))
	{
		$tarjeta=$_POST['numero'];
		$fecha1=$_POST['fecha1'];
		$fecha2=$_POST['fecha2'];
		$where="where alumno_tarjeta like '".$tarjeta."' and fecha BETWEEN '$fecha1' AND '$fecha2'";		
	}
	/////////////////////// CONSULTA A LA BASE DE DATOS /////////////////////////
	//$alumnos="SELECT * FROM v_asis $where ";
	$alumnos="SELECT * FROM asistencia $where ";
	$resAlumnos=$conexion->query($alumnos);
	//$usuarios=$conexion->query("SELECT *  FROM v_asis where alumno_tarjeta='$numero' and fecha BETWEEN '$fecha1' AND '$fecha2'");
	if(mysqli_num_rows($resAlumnos)==0)
	{
		$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
	}
?>
<html lang="es">
	<head>
		<title>Reporte de Asistencias</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/ma_ver_asistencia.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Asistencias por Comensal</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Escriba numero de tarjeta" name="numero"/>
				<input type="date" name="fecha1">
				<input type="date" name="fecha2">
				<button name="buscar" type="submit">Buscar</button>
			</form>
			<!--<h3>Comensal</h3>-->
			<?php
				//$reg = $resAlumnos->fetch_array(MYSQLI_BOTH);
				//$tarj=$reg['alumno_tarjeta'];
				$tarj=$tarjeta;
				echo "Tarjeta: ".$tarj;
			?>
			<table class="table">
				<tr class="bg-primary">
				
					<th>Fecha</th>
					<th>Desayuno</th>
					<th>Almuerzo</th>
					<th>Cena</th>
					<th>Domingo</th>
				</tr>				
				<br><br>
				<?php
					while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
					{
						echo'<tr>						
							<td>'.$registroAlumnos['fecha'].'</td>
							<td>'.$registroAlumnos['desayuno'].'</td>
							<td>'.$registroAlumnos['almuerzo'].'</td>
							<td>'.$registroAlumnos['cena'].'</td>
							<td>'.$registroAlumnos['domingo'].'</td>						 
							</tr>';
					}
				?>
			</table>
			<?
				echo $mensaje;
			?>
		</section>
	</body>
</html>