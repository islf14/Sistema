<?php
include("conexion.php");
$con= conectar();
$tarjeta=$_POST['tarjeta'];
$codigo=$_POST['codigo'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$tipobeca=$_POST['tipobeca'];
$pagos=$_POST['pagos'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$facultad=$_POST['facultad'];
$escuela=$_POST['escuela'];
/////////
$con->query("INSERT INTO alumno VALUES('$tarjeta','$codigo','$nombres','$apellidos','$tipobeca','$pagos','$direccion','$telefono',
'$facultad','$escuela')");
echo "<script>alert('Registo exitodo')</script>";
echo "<script>location.href='admin_menu.html'</script>";
?>
