<?php	
	$username=$_POST['mail'];
	$pass=$_POST['pass'];

	include("conexion.php");
	$con= conectar();
	$sql2=$con->query("SELECT * FROM administrador WHERE usuario='$username'");
	if($f2=mysqli_fetch_array($sql2))
	{
		if($pass==$f2[5]){
			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';		
			echo "<script>location.href='admin_menu.html'</script>";		
		}
		else{
				echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
				echo "<script>location.href='admin_login.php'</script>";
		}
	}
	else{
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		echo "<script>location.href='admin_login.php'</script>";
	}
?>