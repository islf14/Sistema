<?php
	date_default_timezone_set("America/Lima");
	$tomorrow=mktime(0,0,0,date("m"),date("d")+1,date("Y"));
	echo "tomorrow is ".date("Y/m/d",$tomorrow);

	$hora_actual=date("H:i");
	$hora = date("H:i",mktime(11,00));
	$fecha_sistema= date("Y-m-d H:i:s");
	$fecha_hecha=date("Y-m-d",mktime(0,0,0,07,9,2017));
	//$hora1 = strtotime( "10:00" );
	//$hora2 = mktime(11,00);
	echo "<br>hora actual: ".$hora_actual;
	echo "<br>hora: ".$hora;
	echo "<br>hora sistema: ".$fecha_sistema;
	echo "<br>fecha hecha: ".$fecha_hecha;

	if( $hora_actual >$hora) {
		echo '<br>$hora_actual es mayor a $hora';
	} else {
		echo '<br>$hora es mayor a $hora_actual';
	}
		// ejecutamos la función pasándole la fecha que queremos
	saber_dia($fecha_hecha);
	
	function saber_dia($nombredia) {
	$dias = array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
	$fecha = $dias[date('N', strtotime($nombredia))];
	echo "<br>numero dia:".date('N', strtotime($nombredia)); 
	echo "<br>El día es ".$fecha;
	}
	echo jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 ); 
	
?> 