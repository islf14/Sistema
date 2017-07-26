<!DOCTYPE html>
<html>
	<head>
		<title>REGISTRO DE ESTUDIANTES</title>
		<link rel="stylesheet" type="text/css" href="css/ma_agregar_alumno.css">
		<script type="text/javascript" src="js/ma_agr_com_escu.js"></script>
		<script type="text/javascript" src="js/ma_agr_com_validar.js"></script>
		<?php include("conexion.php");
		$con= conectar();?>	
	</head>

	<body>
		<div class="form">
			<!--formulario-->
			<?php
				$query = $con->query("SELECT IFNULL(MAX(CAST(tarjeta AS UNSIGNED)), 0)+1 codigoExterno FROM alumno");
				if($query->num_rows > 0){ 
				while($row = $query->fetch_assoc()){ 
				$postID = $row["codigoExterno"];
				//echo "<script>alert('Código: $postID')</script>"; 					
				}}
			?>
			<form action="ma_agregar_alumno_validar.php" method="POST"  onSubmit="return validacion();" >				
				<br>
				<label for="tarjeta">Numero de tarjeta</label><br><td width=80>
				<input type="text" name="tarjeta" id="tarjeta" value="<?php echo $postID;?>" maxlength="3" placeholder="" required><br><br></td>
				<label for="codigo">Codigo del estudiante</label><br>
				<input type="text" name="codigo" id="codigo" maxlength="11" placeholder="" required><br><br>
				<label for="nombres">Nombres</label><br>
				<input type="text" style="border-radius:15px;"  name="nombres" id="nombres" maxlength="26" placeholder="" required><br><br>
				<label for="apellidos">Apellidos</label><br>
				<input type="text" style="border-radius:15px;"  name="apellidos" id="apellidos" maxlength="30" placeholder="" required><br><br>

				<label for="tipobeca">Tipo beca</label><br>
				<select id="beca" name="beca" onchange='pagobeca(this.value);'>
					<option value="0">Seleccione opción</option>
					<option value="1">a</option>
					<option value="2">b</option>
					<option value="3">c</option>
				</select> <br><br>
				<!--<input type="text" name="tipobeca" placeholder="" required><br><br>-->
				<label for="pagos">Monto de pago</label><br>
				<input type="text" name="pagos" id="pagos" value="" class="field left" readonly maxlength="4" placeholder="" required><br><br>
				<label for="direccion">Direccion</label><br>
				<input type="text" name="direccion" id="direccion" maxlength="43" placeholder="" required><br><br>
				<label for="telefono">Telefono</label><br>
				<input type="text" name="telefono" maxlength="15" placeholder="" required><br><br>

				<label for="facultad">Facultad</label><br>
				<select id="facultad" name="facultad" onchange='cargarEscuelas(this.value);' required>
					<option value="0">Seleccione opción</option>
					<option value="Ingeniería">Ingeniería</option>
					<option value="Ciencias Jurídicas y Empresariales">Ciencias Jurídicas y Empresariales</option>
					<option value="Ciencias Agropecuarias">Ciencias Agropecuarias</option>
					<option value="Ciencias de la Salud">Ciencias de la Salud</option>
					<option value="Educación, Comunicación y Humanidades">Educación, Comunicación y Humanidades</option>
					<option value="Ciencias">Ciencias</option>
					<option value="Ingeniería Civil Geotecnia y Arquitectura">Ingeniería Civil Geotecnia y Arquitectura</option>				
				</select><br><br>
				<!--<input type="text" name="facultad" placeholder="" required><br><br>-->
				<label for="escuela">Escuela Profesional</label><br>
				<select id="escuela" name="escuela" onchange='seleccinado_escuela();' disabled>
					<option value='0'>Selecciona una opcion</option>
				</select>

				<br><br><br>
				<!--<input type="text" name="escuela" placeholder="" required><br><br>-->
				<input type="submit" value="Enviar">
			</form>
		</div>	
	</body>
</html>

