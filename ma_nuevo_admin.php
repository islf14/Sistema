<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap_ma_nuevo_admin.css">
		<title>Registro de Administrador </title>
		<script languaje="javascript" src="js/ma_nuevo_admin_validar.js"></script>
	</head>

	<body background="images/imagen3.jpg" style="background-attachment: fixed" >
		<center>
			<div class="tit">
				<h2 style="color: #0000FF; ">Regristro de Administrador</h2>
				<center>
					<div class="Ingreso">

						<table border="0" align="center" valign="middle">
							<tr>
								<td rowspan=2>
								<br>
							
								<form method="post" action="" onSubmit="return validacion();" >
									<fieldset>
										<legend  style="font-size: 18pt"><b>Registro</b></legend>
										<div class="form-group">
											<label style="font-size: 14pt"><b>Ingresa Usuario</b></label>
											<input type="text" name="usuario" id="idusuario" class="form-control" placeholder="ID usuario" />
										</div>
										<div class="form-group">
											<label style="font-size: 14pt"><b>Ingresa tu nombre</b></label>
											<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresa tu nombre" />
										</div>
										<div class="form-group">
											<label style="font-size: 14pt"><b>Ingresa tu Apellido</b></label>
											<input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingresa tu apellido" />
										</div>
										<div class="form-group">
											<label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa tu DNI</b></label>
											<input type="text" name="dni" class="form-control" id="dni" placeholder="Ingresa DNI"/>
										</div>
										<div class="form-group">
											<label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa turno</b></label>
											<input type="text" name="turno" class="form-control" id="turno" placeholder="Ingresa turno" />
										</div>
										<div class="form-group">
											<label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa tu Password</b></label>
											<input type="password" name="pass" class="form-control" id="password" placeholder="Ingresa contraseña" />
										</div>
										<div class="form-group">
											<label style="font-size: 14pt; color: #FFFFFF;"><b>Repite tu contraseña</b></label>
											<input type="password" name="rpass" class="form-control" id="password2"  placeholder="repite contraseña" />
										</div>
									
										<input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>

									</fieldset>
								</form>								
								<?php
									if(isset($_POST['submit'])){
										require("ma_nuevo_admin_validar.php");
									}
								?>								
								</td>
							</tr>
						</table>
					</div>
				</center>
			</div>
		</center>
	</body>
</html>