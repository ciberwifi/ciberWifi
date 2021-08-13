<?php

require_once "../../../../bootstrap.php";

require_once "../../../../Model/Ticket.php";
require_once "../../../../Model/Diagnostico.php";
require_once "../../../../Model/VisitaTecnica.php";

 $id= htmlspecialchars($_POST['id']);
 $diagnostico = $entityManager->getRepository('Diagnostico')->findOneBy(array('id' => $id));

 $motivo=htmlspecialchars($_POST['selectmotivo']);
 $observaciones=htmlspecialchars($_POST['observaciones']);
 $respuesta=htmlspecialchars($_POST['respuesta']);
 

$diagnostico->getticket()->setrespuesta($respuesta);
$diagnostico->setmotivo($motivo);
$diagnostico->setobservaciones($observaciones);


  if (isset($_POST['chkvt'])){
  	if(sizeof($diagnostico->getallvisitas())<1){
  	$visitatecnica= new visitaTecnica();
  	$visitatecnica->setestado("pendiente");
  	$diagnostico->addvisita($visitatecnica);
  	$entityManager->persist($visitatecnica);
  	$ticket->setestado("Visita Tecnica");

  	echo "Visita Tecnica ingresado con exito ";
 }
  }



  if (isset($_POST['chkmonitoreo'])){
  $diagnostico->setmonitoreo(true);
  $diagnostico->getticket()->setestado("Monitoreado");
  }else{
  	$diagnostico->setmonitoreo(false);
  }


//if(strcmp($ticket->getestado(), "pendiente")===0)$ticket->setestado("diagnosticado");



$entityManager->flush();

echo "Datos Actualizados con Exito ";
         
 
?>

