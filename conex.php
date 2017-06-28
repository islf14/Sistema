<?php
function conectar(){

	$server="localhost";
	$bd="academias";
	$user="root";
	$pass="1234567";

	$conexion=new mysqli($server,$user,$pass,$bd);

	if($conexion->connect_error){
		//->connect_errno
		die ($conexion->connect_error);
		//echo "errorrrrr= "."$conexion->connect_error";
		echo "no se pudo conectarr: ";
	}
	//echo "errorrrrr= "."$conexion->connect_error";
	return $conexion;
/*	$sql="INSERT INTO login(id,user,password,email,pasadmin) values(7,'hola','123','abc@gmail.com','1')";
	if ($conexion->query($sql)==TRUE){
		echo "inserted data";
	}else{
		echo "failed";
	}*/
	$conexion->close(); 
	echo "conexxion cerrada";
}

?>