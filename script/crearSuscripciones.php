<?php

require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Suscripcion.php";
require_once "../Model/Ticket.php";
require_once "../Model/Pago.php";

$clientes = $entityManager->getRepository('Cliente')->findall();



$fecha = new DateTime();
$fecha->setDate("2022", "01","10");

 foreach($clientes as $cliente ) {

 $sus=$cliente->getsuscripcion();

 if(is_null($sus)) {

$suscripcion=new Suscripcion(); 	
             
$idplan=$cliente->getidplan();
$fechaVencimiento=$fecha;
$saldo=$cliente->getidplan()->getmonto();

$suscripcion->setidplan($idplan);
$suscripcion->setfechavencimiento($fechaVencimiento);
$suscripcion->setidplan($idplan);
$suscripcion->setsaldo(-$saldo);
$cliente->setsuscripcion($suscripcion);


$entityManager->persist($suscripcion);
}
 }

$entityManager->flush();




//resetear saldos

/*
$clientes = $entityManager->getRepository('Cliente')->findall();

 foreach($clientes as $cliente ) {



$saldoa=$cliente->getsuscripcion()->getsaldo();

if($saldoa>0) {

$saldo=$cliente->getidplan()->getmonto();

$cliente->getsuscripcion()->setsaldo(-$saldo);

$entityManager->flush();

}
}
*/


//resetear link de pago
/*
$clientes = $entityManager->getRepository('Cliente')->findall();

 foreach($clientes as $cliente ) {



$id=$cliente->getid();

if($id>103) {



$cliente->setlinkPago("");

$entityManager->flush();

}
}

//
/*
$suscripciones = $entityManager->getRepository('Suscripcion')->findBy(array('saldo'  < 0 ));

foreach($suscripciones as $sus ) {
	echo $sus->getid();
	echo $sus->getsaldo();
	echo "<br>";
	}



*/

?>