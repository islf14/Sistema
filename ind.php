<?php

include("conex.php");

$con= conectar();

//echo " <br> fin de clase: ";


$sql="INSERT INTO login(user,password,email,pasadmin) values('pamela','123','gfdgf@gmail.com','   ')";
	if ($con->query($sql)==TRUE){
		echo "inserted :)";
	}else{
		echo "failed :(";
	}



?>