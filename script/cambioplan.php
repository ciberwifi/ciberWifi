<?php

require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Suscripcion.php";
require_once "../Model/Ticket.php";
require_once "../Model/Pago.php";
require_once "../Model/Plan.php";



$clientes = $entityManager->getRepository('Cliente')->findall();

 foreach($clientes as $cliente ) {

$cartera=0;
$cartera=$cliente->getsuscripcion()->getcartera();
$descripcion=$cliente->getsuscripcion()->getidPlan()->getdescripcion(); 
$suscripcion=$cliente->getsuscripcion();
            
	if($cartera == 2){
	if(strcmp($descripcion,"3Mx1M")==0)$suscripcion->setidPlan(301);
	if(strcmp($descripcion,"3Mx2M")==0)$suscripcion->setidPlan(302);
	if(strcmp($descripcion,"3M")==0)$suscripcion->setidPlan(303);
	if(strcmp($descripcion,"5M")==0)$suscripcion->setidPlan(305);
	if(strcmp($descripcion,"10M")==0)$suscripcion->setidPlan(310);
		}

$entityManager->flush();		

}




?>