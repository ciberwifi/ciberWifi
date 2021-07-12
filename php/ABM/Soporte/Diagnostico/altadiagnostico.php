<?php

require_once "../../../../bootstrap.php";
require_once "../../../../Model/Ticket.php";
require_once "../../../../Model/Diagnostico.php";
require_once "../../../../Model/VisitaTecnica.php";

 $id= htmlspecialchars($_POST['id']);

 $fecha=date('Y-m-d');

 $motivo=htmlspecialchars($_POST['selectmotivo']);
 $observaciones=htmlspecialchars($_POST['observaciones']);
 $respuesta=htmlspecialchars($_POST['respuesta']);
 
 $ticket = $entityManager->getRepository('Ticket')->findOneBy(array('id' => $id));
 $diagnostico=new Diagnostico();
 $ticket->setdiagnostico($diagnostico);
$ticket->setrespuesta($respuesta);

 $diagnostico->setticket($ticket);

$diagnostico->setfecha($fecha);
$diagnostico->setmotivo($motivo);
$diagnostico->setobservaciones($observaciones);

  if (isset($_POST['chkvt'])){
  	$visitatecnica= new visitaTecnica();
  	$visitatecnica->setestado("pendiente");
  	$diagnostico->addvisita($visitatecnica);
  	$entityManager->persist($visitatecnica);
  	$ticket->setestado("Visita Tecnica");

  	echo "Visita Tecnica ingresado con exito ";

  }

  
  if (isset($_POST['chkmonitoreo'])){
  $diagnostico->setmonitoreo(true);
  $ticket->setestado("Monitoreado");
  }else{
  	$diagnostico->setmonitoreo(false);
  }


if(strcmp($ticket->getestado(), "pendiente")===0)$ticket->setestado("diagnosticado");


$entityManager->persist($diagnostico);
$entityManager->flush();
echo "Diagnostico ingresado con exito ";
         
 
?>

