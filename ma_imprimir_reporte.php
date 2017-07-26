<?php
	include('conexion.php');
	$conexion=conectar();
	$alumnos="SELECT * FROM v_asis";
	$resAlumnos=$conexion->query($alumnos);
?>
<html lang="es">
	<head>
		<title>REPORTES</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/ma_imprimir_reporte.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>REPORTE DE ASISTENCIAS </h2>
			</div>
		</header>
		<form method="post" class="form" action="ma_imprimir_reporte_generar.php">
			<input type="date" name="fecha1">
			<input type="date" name="fecha2">
			<input type="text" placeholder="Escriba numero de tarjeta" name="numero"/>
			<input type="hidden" name="reporte_name" value="<?php echo 'Reporte de asistencias de alumnos' ?>">
			<input type="submit" name="generar_reporte">
		</form>
	</body>
</html>