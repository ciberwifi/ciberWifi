<?php

require_once "../../../../bootstrap.php";
require_once "../../../../Model/Cliente.php";
require_once "../../../../Model/Bajas.php";
require_once "../../../../Model/Ticket.php";
 $fecha=date('Y-m-d');
 

$id=htmlspecialchars($_POST['id']);
$observaciones=htmlspecialchars($_POST['observaciones']);
 $disponibilidad=htmlspecialchars($_POST['disponibilidad']);

if($id<0){

 $dni= htmlspecialchars($_POST['imptdni']);
 $motivo=htmlspecialchars($_POST['selectmotivo']);
 $cliente = $entityManager->getRepository('Cliente')->findOneBy(array('idip' => $dni));

	if($cliente!==null){

		$baja=new Bajas();
		
		$baja->setcliente($cliente);
		$baja->setfecha($fecha);
		$baja->setip($dni);
		$baja->setmotivo($motivo);
		$baja->setobservaciones($observaciones);
		$baja->setdisponibilidad($disponibilidad);
		$baja->setestado("pendiente");
		$entityManager->persist($baja);
		}else{
		echo "El cliente selecionado no existe";
		}
}

if($id>0){

	$baja=$entityManager->getRepository('Bajas')->findOneBy(array('id' => $id));
	$baja->setobservaciones($observaciones);
	$baja->setdisponibilidad($disponibilidad);
	$idcliente=$baja->getcliente();
	$cliente = $entityManager->getRepository('Cliente')->findOneBy(array('id' => $idcliente ));
	
	}


$entityManager->flush();

echo "Operacion Realizada con exito  ". $cliente->getidip()." ".$cliente->getapellidoynombre();

        
 
?>


