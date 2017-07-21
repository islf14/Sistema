<!DOCTYPE html>
<html>
<head>
<!-- comedor -->
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap_login.css">
	<script languaje="javascript" src="js/admin_validar_sesion.js"></script>
	<title>Ingreso de Administrador </title>
</head>
<body background="images/imagen3.jpg" style="background-attachment: fixed" >
	<center><div class="tit"><h2 style="color: #0000FF; ">Inicio de sesión</h2>
		<center><div class="Ingreso">
			<table border="0" align="center" valign="middle">
				<tr><td rowspan=2>
					
					<form action="admin_login_validar.php" method="post" onSubmit="return validacion();">
						<table border="0">
							<tr><td><label style="font-size: 14pt"><b>Usuario: </b></label></td>
								<td width=80> <input class="form-group has-success" id="usuario" style="border-radius:15px;" type="text" name="mail"></td></tr>
							<tr><td><label style="font-size: 14pt"><b>Contraseña: </b></label></td>
								<td witdh=80><input style="border-radius:15px;" id="pass" type="password" name="pass"></td></tr>
							<tr><td></td>
								<td width=80 align=center><input class="btn btn-primary" type="submit" value="Aceptar"></td></tr>
						</table>
					</form>					
				</td></tr>
			</table>
		</div></center>
	</div></center>
</body>
</html>