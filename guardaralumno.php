<?php
$host = 'localhost';
$user = 'root';
$pass = '1234567';
$db = 'comedor_unjbg';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

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


$mysqli->query("INSERT INTO alumno VALUES('$tarjeta','$codigo','$nombres','$apellidos','$tipobeca','$pagos','$direccion','$telefono',
'$facultad','$escuela')");
echo "<script>location.href='menuadmin.html'</script>";
?>
