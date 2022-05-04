<?php

require_once "cobroDigitalApi.php";
require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Suscripcion.php";
require_once "../Model/Ticket.php";
require_once "../Model/Pago.php";

// set de variables
$comercio='MS372596'; 
$sid='Jm2zvdT8k6GRsUCzWM3U2rzSTYtXBx6qJ5p8fU0PwSDB2kw31xeoEO89rIg';

$diaActual = date('d');
$mes = date("m");
$anio =date("Y");




$envios=array();
$fechaDesde=date('Ymd',mktime(0, 0, 0, $mes, 01, $anio));
$fechaHasta=date('Ymd',mktime(0, 0, 0, $mes, $diaActual, $anio));
$envios = envios($comercio, $sid, $fechaDesde, $fechaHasta);
$vecTransacciones = obtenerPagos ($envios);


$vec=array();
	
	foreach ($vecTransacciones as $dat){
	
		$vec = json_decode(json_encode($dat), True);
			
		 $nroboleta=$vec["Nro Boleta"];

		 if($nroboleta >=0) {

		 $id_transaccion=$vec["id_transaccion"];	
		 $noperacion=explode("==", $id_transaccion);
		 $noperacion=$noperacion[0];	
		 $fecha= $vec["Fecha"];
		 $email="Tarjeta de Cobranza";
		 $tarjeta=$vec["Código de barras"];
		 $bruto=$vec["Bruto"];
		 $bruto = str_replace(".", "", $bruto);	
		 $bruto = str_replace(",", ".", $bruto);	
		 $comision=$vec["Comisión"];
		 $neto=$vec["Neto"];
		 $neto= str_replace(".", "", $neto);	
		 $neto= str_replace(",", ".", $neto);
		 $descripcion=substr($tarjeta,0,15); 

		$pagos = $entityManager->getRepository('Pago')->findOneBy(array('noperacion' => $noperacion));

		if($pagos === null) {
	
		$cliente = $entityManager->getRepository('Cliente')->findOneBy(array('mediosPago' => $descripcion));

		if ($cliente !== null) {
			$pago= New Pago();
			$pago->setfecha($fecha);
			$pago->setnoperacion($noperacion);
			$pago->setdescripcion($descripcion);
			$pago->setemail($email);
			$pago->setbruto($bruto);
			$pago->setcomision($comision);
			$pago->setneto($neto);
			$pago->setsuscripcion($cliente->getsuscripcion());
			$cliente->getsuscripcion()->addpago($pago);
			$cliente->getsuscripcion()->actualizarsaldo($bruto);
			$entityManager->persist($pago);
		$entityManager->flush();
		}else{
		echo "DebugInf:"."Cliente no Identificado: ".$fecha." ". $descripcion." ".$noperacion." ".$bruto." ".$comision." ". $neto . " "."<br>";
		}
		}

		}		



	}

?>