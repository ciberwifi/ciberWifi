<?php

require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Ticket.php";

 $fecha=date('Y-m-d');
 

echo $id=htmlspecialchars($_POST['id']);
 $dni= htmlspecialchars($_POST['imptdni']);
 $motivo=htmlspecialchars($_POST['selectmotivo']);
 $observaciones=htmlspecialchars($_POST['observaciones']);


 $cliente=null;
//$cliente = $entityManager->getRepository('Cliente')->findOneBy(array('idip' => $dni));
 $ticket=$entityManager->getRepository('Ticket')->findOneBy(array('id' => $id));



if($cliente!==null){

$ticket=new Ticket();
$cliente->addticket($ticket);


$ticket->setfecha($fecha);
$ticket->setip($dni);
$ticket->setmotivo($motivo);
$ticket->setobservaciones($observaciones);
$ticket->setestado("pendiente");



$entityManager->persist($ticket);
$entityManager->flush();


echo "Alta reclamo generada con exito ". $cliente->getidip()." ".$cliente->getapellidoynombre()." ".sizeof($cliente->getalltickets());
 }else{

  echo "El cliente selecionado no existe";

 }


         
 
?>


