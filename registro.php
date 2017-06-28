<?php

	$usuario=$_POST['usuario'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$dni=$_POST['dni'];
	$turno=$_POST['turno'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];

	include("connect_db.php");
	$con= conectar();
	
	$checkemail= $con->query("SELECT * FROM administrador WHERE usuario='$usuario'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el usuario, Ingrese otro");</script> ';
			}else{
				
				//require("connect_db.php");
				//$con->query("INSERT INTO administrador(user,password,email,pasadmin) VALUES('$realname','$pass','$mail','')");
				$con->query("INSERT INTO administrador(usuario,dni,nombres_adm,apellidos_adm,turno,contrasenia) VALUES ('$usuario','$dni','$nombre','$apellido','$turno','$pass')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				$con->close();
				echo "<script>location.href='menuadmin.html'</script>";
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>