<?php

require_once "../bootstrap.php";
require_once "../Model/Instalacion.php";

 $fecha=date('Y-m-d');

$id=htmlspecialchars($_POST['id']);
 $zona= htmlspecialchars($_POST['impzona']);
 $apellidoynombre=trim(htmlspecialchars($_POST['impapellidoynombre']));
 $dni= htmlspecialchars($_POST['impdni']);
 $tel= htmlspecialchars($_POST['imptel']);
 $direccion=htmlspecialchars($_POST['impdireccion']);
 $observaciones=htmlspecialchars($_POST['observaciones']);

if($id<0){
	$instalacion= new Instalacion();
	$instalacion->setfecha($fecha);
	$instalacion->setestado("pendiente");
	

}

if($id>0)$instalacion = $entityManager->getRepository('Instalacion')->findOneBy(array('id' => $id));

$instalacion->setzona($zona);
$instalacion->setapellidoynombre($apellidoynombre);
$instalacion->setdni($dni);
$instalacion->settel($tel);
$instalacion->setdireccion($direccion);
$instalacion->setobservaciones($observaciones);


if($id<0)$entityManager->persist($instalacion);

$entityManager->flush();


echo "Operacion Realizada con exito  ". $instalacion->getapellidoynombre();


         
 
?>
