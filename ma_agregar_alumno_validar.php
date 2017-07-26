<?php
include("conexion.php");
$con= conectar();
$tarjeta=$_POST['tarjeta'];
$codigo=$_POST['codigo'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$beca=$_POST['beca'];
$pagos=$_POST['pagos'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$facultad=$_POST['facultad'];
$escuela=$_POST['escuela'];
/////////
//$facultad="";
//$escuela="";
$tipobeca="";
switch($beca){
    case 1:$tipobeca="a";break;
    case 2:$tipobeca="b";break;
    case 3:$tipobeca="c";break;
}
//echo  "<script>alert('beca validar: $tipobeca')</script>";
$con->query("INSERT INTO alumno VALUES('$tarjeta','$codigo','$nombres','$apellidos','$tipobeca','$pagos','$direccion','$telefono',
'$facultad','$escuela')");
echo "<script>alert('Registo exitodo')</script>";
echo "<script>location.href='admin_menu.html'</script>";
?>