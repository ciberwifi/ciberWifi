<?php

require_once "../../../bootstrap.php";
require_once "../../../Model/Cliente.php";
require_once "../../../Model/Pago.php";
require_once "../../../Model/Suscripcion.php";
require_once "../../../Model/Ticket.php";

$id=htmlspecialchars($_POST['id']);


if($id<0){

 $fecha ="20/01/2022";

 $dni= htmlspecialchars($_POST['imptdni']);
 $importe= htmlspecialchars($_POST['imptimporte']);
 $detalle=htmlspecialchars($_POST['selectmotivo']);
 
 $cliente = $entityManager->getRepository('Cliente')->findOneBy(array('idip' => $dni));


	if($cliente!==null){
		$pago= New Pago();
		$pago->setfecha($fecha);
		$pago->setnoperacion("CodigoManual");
		$pago->setdescripcion($detalle);
		$pago->setemail($cliente->getemail());
		$pago->setbruto($importe);
		$pago->setcomision(0);
		$pago->setneto($importe);
		$pago->setsuscripcion($cliente->getsuscripcion());
		$cliente->getsuscripcion()->addpago($pago);
		$cliente->getsuscripcion()->actualizarsaldo($importe);
		$entityManager->persist($pago);
		$entityManager->flush();
		
		}else{
		echo "El cliente selecionado no existe";
		}
}




echo "Operacion Realizada con exito  ". $cliente->getidip()." ".$cliente->getapellidoynombre();

        
 
?>


