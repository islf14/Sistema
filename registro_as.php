<?php
    date_default_timezone_set("America/Lima");
    include("connect_db.php");
    function retornar(){
        //echo "<script>location.href='marcar_asistencia.php'</script>";
    }
    $con= conectar();
    $tarjeta = $_POST["tarjeta"];
    $opcion = $_POST["turno"];
    //
    $fecha_actual1= date("Y-m-d H:i:s");
    $hora=date("H");
    echo "<script>alert('fecha actual: $fecha_actual1')</script>";
    echo "<script>alert('hora actual: $hora')</script>";
    $fecha_actual="2017-07-18";
    //   
    $registro=$con->query("select alumno_tarjeta, id_asistencia,desayuno,almuerzo,cena from asistencia where fecha = '$fecha_actual' and alumno_tarjeta = $tarjeta;");
    $array_registro=mysqli_fetch_array($registro);
    $registros_enc=mysqli_num_rows($registro);
    $id_registrado=$array_registro[1];
    $desayuno=$array_registro[2];
    $almuerzo=$array_registro[3];
    $cena=$array_registro[4];
    //echo "<br>tarjeta ingresada : ".$tarjeta;
    //echo "<br>tarjeta alumno de consulta: ".$array_registro[0];
    //echo "<br>id asistencia de consulta: ".$array_registro[1];
    //echo "<br>cantidad encontrada: ".$registros_enc;
    //echo "<br>almuerzo en registro:(".$array_registro[3].")";
    //obteniendo id asistencia
    $cons_id=$con->query("SELECT IFNULL(MAX(CAST(id_asistencia AS UNSIGNED)), 0) codigoExterno FROM asistencia");
    $idmax=mysqli_fetch_array($cons_id);
    $id=$idmax[0]+1;//nuevo id asistencia
    //echo "<br>id nuevo: ".$id;
    //desayunos
    if($opcion==1){        
        //echo "<br>entrando a desayuno ".$_POST["turno"];
        if($registros_enc>0 && $registros_enc<=1){
            echo "<script>alert('Error!!! Ya está registrado en Desayuno')</script>";            
            retornar();
        }else if($registros_enc<1){
            $con->query("INSERT INTO asistencia (alumno_tarjeta, administrador_usuario, id_asistencia,fecha, desayuno) VALUES ('$tarjeta', 'isaias', '$id', '$fecha_actual', '08:06');");
            echo "<script>alert('Registo exitodo en desayuno')</script>";            
            retornar();
        }else {
            echo "<script>alert('Error! Existe $registros_enc rgistros, Verificar base de datos')</script>";            
            retornar();
        }
    //almuerzos
    }else if($opcion==2){
        //echo "almuerzo es ".$_POST["turno"];
        if($registros_enc>0 && $registros_enc<=1){
            if($almuerzo==null){
                $con->query("UPDATE asistencia SET almuerzo='12:00:00' WHERE id_asistencia='$id_registrado';");
                echo "<script>alert('Actualización exitosa en almuerzo')</script>";
                retornar();
            }else{
                  echo "<script>alert('Error. Asistencia de almuerzo ya marcada')</script>";
                  retornar();
            }
               
        }else if($registros_enc<1){
            $con->query("INSERT INTO asistencia (alumno_tarjeta, administrador_usuario, id_asistencia,fecha, almuerzo) VALUES ('$tarjeta', 'isaias', '$id', '$fecha_actual', '14:06');");
            echo "<script>alert('Registo exitodo en Almuerzo')</script>";
            retornar();
        }else {
            echo "<script>alert('Error!!! Existen $registros_enc  Registros, Verificar base de datos')</script>";
            retornar();
        }
    //cenas
    }else{ 
        //echo "<br>entrando cena id: ".$_POST["turno"];   
        if($registros_enc>0 && $registros_enc<=1){
            if($cena==null){
                $con->query("UPDATE asistencia SET cena='19:00:00' WHERE id_asistencia='$id_registrado';");
                echo "<script>alert('Actualización exitosa en cena')</script>";
                retornar();
            }else{
                echo "<script>alert('Error. Asistencia de cena ya marcada')</script>";
                retornar();
            }
        }else if($registros_enc<1){
            $con->query("INSERT INTO asistencia (alumno_tarjeta, administrador_usuario, id_asistencia,fecha, cena) VALUES ('$tarjeta', 'isaias', '$id', '$fecha_actual', '19:06');");
            echo "<script>alert('Registo exitodo en cena')</script>";
            retornar();
        }else {
            echo "<script>alert('Error!!! Existen $registros_enc registros, Verificar base de datos')</script>";
            retornar();
        }
    }
?>