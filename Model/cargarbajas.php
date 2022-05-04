<?php

// create_product.php <name>
require_once "../bootstrap.php";

require_once "Retiro.php";



$retiros="retiros.csv";

$arch= file($retiros);

	
foreach($arch as $linea ) {
	$dato = explode(",", $linea);	
	
	$fechaBaja=trim($dato[2]);
	$zona1=trim( $dato[3]);
	$apellido=trim($dato[4]);
    $nombre = trim($dato[5]);
	$tel= trim($dato[6]);
	$dir= trim($dato[7]);
	$macwan= trim($dato[8]);
	$wifi1= trim($dato[9]);
	$estabilizador1= trim($dato[10]);
	$antena1= trim($dato[11]);


	$fechaAux= explode(":", $fechaBaja);	
	$fecha=$fechaAux[1];

	$zonaAux= explode("-", $zona1);	
	$zona=$zonaAux[0];

	$apellidoynombre=$apellido." ".$nombre;

	$wifiAux= explode("=", $wifi1);	
	$wifi=trim($wifiAux[1]);

	$estaux=explode("=", $estabilizador1);	
	$estabilizador=trim($wifiAux[1]);

	$antaux=explode("=", $antena1);
	$antena=trim($antaux[1]);



$baja = new Retiro();

$baja->setfecha($fecha);
$baja->setzona($zona);
$baja->setapellidoynombre($apellidoynombre);
$baja->settel($tel);
$baja->setdireccion($dir);
$baja->setmacwan($macwan);
$baja->setwifi($wifi);
$baja->setestabilizador($estabilizador);
$baja->setantena($antena);


$entityManager->persist($baja);
$entityManager->flush();

	


	}





?>