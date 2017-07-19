<?php
    date_default_timezone_set("America/Lima");
    include("conexion.php");
    function retornar(){
        echo "<script>location.href='ma_marcar_asistencia.php'</script>";
    }
    $con= conectar();
    $tarjeta = $_POST["tarjeta"];
    $opcion = $_POST["turno"];

    $alum=$con->query("SELECT nombres FROM alumno where tarjeta=$tarjeta;");
    $verif=mysqli_num_rows($alum);
    if($verif==0){
        echo "<script>alert('No Existe Número de tarjeta')</script>";
        retornar();
    }
    //
    $fecha_sistema= date("Y-m-d H:i:s");
    ////////////
    $hora_actual=date("H:i",mktime(18,45));
    $fecha_actual=date("Y-m-d",mktime(0,0,0,07,10,2017));
    //////////////
    //establecienido límites
    $desayuno_min=date("H:i",mktime(6,30));
    $desayuno_max=date("H:i",mktime(8,25));
    $almuerzo_min=date("H:i",mktime(12,00));
    $almuerzo_max=date("H:i",mktime(13,55));
    $cena_min=date("H:i",mktime(17,30));
    $cena_max=date("H:i",mktime(20,10));

    if(date('N', strtotime($fecha_actual))==6){
        $desayuno_min=date("H:i",mktime(7,00));
        $desayuno_max=date("H:i",mktime(8,30));
        $almuerzo_min=date("H:i",mktime(11,30));
        $almuerzo_max=date("H:i",mktime(13,00));
    }
    //$hora_actual=date("H:i");
    //$hora = date("H:i",mktime(9,00));
    //echo "<script>alert('fecha actual: $fecha_sistema')</script>";
    //echo "<script>alert('hora actual: $hora_actual')</script>";    
    //////////////////////////////////////////////
    $registro=$con->query("select alumno_tarjeta, id_asistencia,desayuno,almuerzo,cena from asistencia where fecha = '$fecha_actual' and alumno_tarjeta = $tarjeta;");
    $array_registro=mysqli_fetch_array($registro);
    $registros_enc=mysqli_num_rows($registro);
    $id_registrado=$array_registro[1];
    $desayuno=$array_registro[2];
    $almuerzo=$array_registro[3];
    $cena=$array_registro[4];
 
    //obteniendo id asistencia
    $cons_id=$con->query("SELECT IFNULL(MAX(CAST(id_asistencia AS UNSIGNED)), 0) codigoExterno FROM asistencia");
    $idmax=mysqli_fetch_array($cons_id);
    $id=$idmax[0]+1;//nuevo id asistencia
    //echo "<br>id nuevo: ".$id;
    if(date('N', strtotime($fecha_actual))!=7){

        //desayunos
        if($opcion==1 && $hora_actual >= $desayuno_min && $hora_actual <= $desayuno_max){        
            //echo "<br>entrando a desayuno ".$_POST["turno"];
            if($registros_enc>0 && $registros_enc<=1){
                echo "<script>alert('Error!!! Ya está registrado en Desayuno')</script>";            
                retornar();
            }else if($registros_enc<1){
                $con->query("INSERT INTO asistencia (alumno_tarjeta, administrador_usuario, id_asistencia,fecha, desayuno) VALUES ('$tarjeta', 'isaias', '$id', '$fecha_actual', '$hora_actual');");
                echo "<script>alert('Registo exitodo en desayuno')</script>";            
                retornar();
            }else {
                echo "<script>alert('Error! Existe $registros_enc rgistros, Verificar base de datos')</script>";            
                retornar();
            }

        //almuerzos
        }else if($opcion==2 && $hora_actual >= $almuerzo_min && $hora_actual <= $almuerzo_max){
            //echo "almuerzo es ".$_POST["turno"];
            if(date('N', strtotime($fecha_actual))==6){
                //entra dia sábado
                if($registros_enc>0 && $registros_enc<=1){
                    if($almuerzo==null){
                        $con->query("UPDATE asistencia SET almuerzo='$hora_actual',cena='$hora_actual',domingo='$hora_actual' WHERE id_asistencia='$id_registrado';");
                        echo "<script>alert('Actualización exitosa en almuerzo')</script>";
                        retornar();
                    }else{
                        echo "<script>alert('Error. Asistencia de almuerzo ya marcada')</script>";
                        retornar();
                    }
                    //registrando almuerzo si no está  creado   
                }else if($registros_enc<1){
                    $con->query("INSERT INTO asistencia (alumno_tarjeta, administrador_usuario,id_asistencia,fecha,almuerzo,cena,domingo) VALUES ('$tarjeta', 'isaias', '$id', '$fecha_actual', '$hora_actual', '$hora_actual', '$hora_actual');");
                    echo "<script>alert('Registo exitodo en Almuerzo')</script>";
                    retornar();
                }else {
                    echo "<script>alert('Error!!! Existen $registros_enc  Registros, Verificar base de datos')</script>";
                    retornar();
                }
            }else{
                //entra si es cualquier dia excepto sábado
                if($registros_enc>0 && $registros_enc<=1){
                    if($almuerzo==null){
                        $con->query("UPDATE asistencia SET almuerzo='$hora_actual' WHERE id_asistencia='$id_registrado';");
                        echo "<script>alert('Actualización exitosa en almuerzo')</script>";
                        retornar();
                    }else{
                        echo "<script>alert('Error. Asistencia de almuerzo ya marcada')</script>";
                        retornar();
                    }
                    //registrando almuerzo si no está  creado   
                }else if($registros_enc<1){
                    $con->query("INSERT INTO asistencia (alumno_tarjeta, administrador_usuario, id_asistencia,fecha, almuerzo) VALUES ('$tarjeta', 'isaias', '$id', '$fecha_actual', '$hora_actual');");
                    echo "<script>alert('Registo exitodo en Almuerzo')</script>";
                    retornar();
                }else {
                    echo "<script>alert('Error!!! Existen $registros_enc  Registros, Verificar base de datos')</script>";
                    retornar();
                }
            }
        //cenas
        }else if($opcion==3 && $hora_actual >= $cena_min && $hora_actual <= $cena_max && date('N', strtotime($fecha_actual))!=6){ 
            //echo "<br>entrando cena id: ".$_POST["turno"];   
            if($registros_enc>0 && $registros_enc<=1){
                if($cena==null){
                    $con->query("UPDATE asistencia SET cena='$hora_actual' WHERE id_asistencia='$id_registrado';");
                    echo "<script>alert('Actualización exitosa en cena')</script>";
                    retornar();
                }else{
                    echo "<script>alert('Error. Asistencia de cena ya marcada')</script>";
                    retornar();
                }
            }else if($registros_enc<1){
                $con->query("INSERT INTO asistencia (alumno_tarjeta, administrador_usuario, id_asistencia,fecha, cena) VALUES ('$tarjeta', 'isaias', '$id', '$fecha_actual', '$hora_actual');");
                echo "<script>alert('Registo exitodo en cena')</script>";
                retornar();
            }else {
                echo "<script>alert('Error!!! Existen $registros_enc registros, Verificar base de datos')</script>";
                retornar();
            }
        }else{
            echo "<script>alert('Error! verificar hora')</script>";
            retornar();
        }
    }else{
        echo "<script>alert('NO SE PUEDE REGISTRAR, ES DOMINGO.')</script>";
        retornar();
    }
?>