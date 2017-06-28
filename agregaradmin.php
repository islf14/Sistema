<!DOCTYPE html>
<html>

		<head>

	<meta charset="utf-8">
			<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
			<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
			<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
	<title>Registro de Administrador </title>
</head>
<body background="images/imagen3.jpg" style="background-attachment: fixed" >
	<center><div class="tit"><h2 style="color: #0000FF; ">Regristro de Administrador</h2>
		<center><div class="Ingreso">

	<table border="0" align="center" valign="middle">
		<tr>
		<td rowspan=2>
			<!-- formulario validacion -->
		<!--<form action="validar.php" method="post">

			<table border="0">

				<tr><td><label style="font-size: 14pt"><b>Usuario: </b></label></td>
					<td width=80> <input class="form-group has-success" style="border-radius:15px;" type="text" name="mail"></td></tr>
				<tr><td><label style="font-size: 14pt"><b>Contraseña: </b></label></td>
					<td witdh=80><input style="border-radius:15px;" type="password" name="pass"></td></tr>
				<tr><td></td>
					<td width=80 align=center><input class="btn btn-primary" type="submit" value="Aceptar"></td>
					</tr>
				</tr>
			</table>
		</form>-->
<br>
<!-- formulario registro -->

<form method="post" action="" >
	<fieldset>
  	<legend  style="font-size: 18pt"><b>Registro</b></legend>
    <div class="form-group">
    	<label style="font-size: 14pt"><b>Ingresa Usuario</b></label>
      <input type="text" name="usuario" class="form-control" required placeholder="ID usuario" />
    </div>
		<div class="form-group">
    	<label style="font-size: 14pt"><b>Ingresa tu nombre</b></label>
      <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu nombre" />
    </div>
		<div class="form-group">
    	<label style="font-size: 14pt"><b>Ingresa tu Apellido</b></label>
      <input type="text" name="apellido" class="form-control" placeholder="Ingresa tu apellido" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa tu DNI</b></label>
      <input type="text" name="dni" class="form-control"  required placeholder="Ingresa DNI"/>
    </div>
		<div class="form-group">
    	<label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa turno</b></label>
      <input type="text" name="turno" class="form-control" placeholder="Ingresa turno" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa tu Password</b></label>
      <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #FFFFFF;"><b>Repite tu contraseña</b></label>
      <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" />
    </div>
      
    </div>
   
    <input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>

  </fieldset>
</form>
</div>
	<?php
			if(isset($_POST['submit'])){
				require("registro.php");
			}
		?>
	<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
</div>
</center>
</div></center>

	
</body>
</html>