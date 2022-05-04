<?php

require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Suscripcion.php";
require_once "../Model/Ticket.php";
require_once "../Model/Pago.php";



$clientes = $entityManager->getRepository('Cliente')->findall();

 foreach($clientes as $cliente ) {

$cartera=0;
$id=$cliente->getid();

	if($id < 104){

		$cartera=1;
	}else{
		$cartera=2;
		}

$suscripcion=$cliente->getsuscripcion();

$suscripcion->setcartera($cartera);

$entityManager->flush();		

}




?>