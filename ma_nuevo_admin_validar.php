<?php
	$usuario=$_POST['usuario'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$dni=$_POST['dni'];
	$turno=$_POST['turno'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];
	////////
	include("conexion.php");
	$con= conectar();	
	$checkemail= $con->query("SELECT * FROM administrador WHERE usuario='$usuario'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el usuario, Ingrese otro");</script> ';
			}else{		
				$con->query("INSERT INTO administrador(usuario,dni,nombres_adm,apellidos_adm,turno,contrasenia) VALUES ('$usuario','$dni','$nombre','$apellido','$turno','$pass')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				$con->close();
				echo "<script>location.href='admin_menu.html'</script>";
			}			
		}else{echo 'Las contraseñas son incorrectas';}
?>