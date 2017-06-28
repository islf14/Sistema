<?php
	include("connect_db.php");
	$username=$_POST['mail'];
	$pass=$_POST['pass'];
	$con= conectar();
	$sql2=$con->query("SELECT * FROM administrador WHERE usuario='$username'");
	if($f2=mysqli_fetch_array($sql2))
	{
		//if($pass==$f2[4])
		if($pass==$f2[5])
		{
			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';		
			echo "<script>location.href='menuadmin.html'</script>";		
		}
		else
		{
			/*if($pass==$f2[2])
			{
				header("Location: index2.php");
			}
			else
			{*/
				echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
				echo "<script>location.href='loginadmin.php'</script>";		
			//}
		}
	}
	else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='loginadmin.php'</script>";
	
	}

	
/*$sql=$con->query("SELECT * FROM login WHERE email='$username'");
	if($f=mysqli_fetch_array($sql)){
		if($pass==$f[2]){
			header("Location: index2.php");
		}else{
			
		
			echo "<script>location.href='index.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	}*/


?>