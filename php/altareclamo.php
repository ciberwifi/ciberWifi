<?php

require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Ticket.php";

 $fecha=date('Y-m-d');
 

$id=htmlspecialchars($_POST['id']);
$observaciones=htmlspecialchars($_POST['observaciones']);


if($id===-1){

 $dni= htmlspecialchars($_POST['imptdni']);
 $motivo=htmlspecialchars($_POST['selectmotivo']);
 $observaciones=htmlspecialchars($_POST['observaciones']);
 $cliente = $entityManager->getRepository('Cliente')->findOneBy(array('idip' => $dni));

	if($cliente!==null){
		$ticket=new Ticket();
		$cliente->addticket($ticket);

		$ticket->setfecha($fecha);
		$ticket->setip($dni);
		$ticket->setmotivo($motivo);
		$ticket->setobservaciones($observaciones);
		$ticket->setestado("pendiente");
		$entityManager->persist($ticket);
		}else{
		echo "El cliente selecionado no existe";
		}
}

if($id!==-1){
	$ticket=$entityManager->getRepository('Ticket')->findOneBy(array('id' => $id));
	$ticket->setobservaciones($observaciones);
	$cliente = $entityManager->getRepository('Cliente')->findOneBy(array('id' => $ticket->getcliente()));
	}


$entityManager->flush();

echo "Operacion Realizada con exito  ". $cliente->getidip()." ".$cliente->getapellidoynombre();

        
 
?>


