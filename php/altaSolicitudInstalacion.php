<?php

require_once "../bootstrap.php";
require_once "../Model/Instalacion.php";

 $fecha=date('d-m-y');

$id=htmlspecialchars($_POST['id']);
 $zona= htmlspecialchars($_POST['impzona']);
 $apellidoynombre=trim(htmlspecialchars($_POST['impapellidoynombre']));
 $dni= htmlspecialchars($_POST['impdni']);
 $tel= htmlspecialchars($_POST['imptel']);
 $direccion=htmlspecialchars($_POST['impdireccion']);
 $observaciones=htmlspecialchars($_POST['observaciones']);

if($id===-1){
	$instalacion= new Instalacion();
	$instalacion->setfecha(new \DateTime($fecha));
	$instalacion->setestado("pendiente");
	

}

if($id!==-1)$instalacion = $entityManager->getRepository('Instalacion')->findOneBy(array('id' => $id));

$instalacion->setzona($zona);
$instalacion->setapellidoynombre($apellidoynombre);
$instalacion->setdni($dni);
$instalacion->settel($tel);
$instalacion->setdireccion($direccion);
$instalacion->setobservaciones($observaciones);


if($id===-1)$entityManager->persist($instalacion);

$entityManager->flush();


echo "Operacion Realizada con exito  ". $instalacion->getapellidoynombre();


         
 
?>
