<?php

require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Suscripcion.php";
require_once "../Model/Ticket.php";
require_once "../Model/Pago.php";



$clientes = $entityManager->getRepository('Cliente')->findall();

 foreach($clientes as $cliente ) {


$montoPlan=$cliente->getsuscripcion()->getidplan()->getmonto();

$saldoAnterior=$cliente->getsuscripcion()->getsaldo()+$cliente->getsuscripcion()->getsaldovencido();
$cliente->getsuscripcion()->setsaldovencido($saldoAnterior);

if($saldoAnterior<=0)$cliente->getsuscripcion()->setsaldo(-$montoPlan);
if($saldoAnterior>0)$cliente->getsuscripcion()->setsaldo(-$montoPlan+$saldoAnterior);

$entityManager->flush();



}


?>