<?php


require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Suscripcion.php";
require_once "../Model/Ticket.php";
require_once "../Model/Pago.php";



$pagosla="../reportes/MercadoPago/mpfull-la.csv";
//$pagosra="../reportes/MercadoPago/mpfull-ra.csv";

$archla= file($pagosla);
//$archra= file($pagosra);
$debugMp="../debug/MercadoPago/debugMP.csv";

foreach($archla as $linea ) {
	$dato = explode(";", $linea);	
	
	$fecha=trim( $dato[1]);
    $email =trim($dato[5]);
    $descripcion=trim($dato[9]);
	$noperacion=trim($dato[12]);
	$bruto = trim($dato[16]);
	$comision= trim($dato[17]);
	$neto= trim($dato[21]);
	



$pagos = $entityManager->getRepository('Pago')->findOneBy(array('noperacion' => $noperacion));


if($pagos === null) {


$ip=explode(" ",$descripcion);
$idip=str_replace("-", ".", $ip);

$cliente = $entityManager->getRepository('Cliente')->findOneBy(array('email' => $email, 'idip' => $idip ));

if ($cliente !== null) {
	$pago= New Pago();
	$pago->setfecha($fecha);
	$pago->setnoperacion($noperacion);
	$pago->setdescripcion($descripcion);
	$pago->setemail($email);
	$pago->setbruto($bruto);
	$pago->setcomision($comision);
	$pago->setneto($neto);
	$pago->setsuscripcion($cliente->getsuscripcion());
	$cliente->getsuscripcion()->addpago($pago);
	$cliente->getsuscripcion()->actualizarsaldo($bruto);
	$entityManager->persist($pago);
$entityManager->flush();
}else{
$cliente = $entityManager->getRepository('Cliente')->findOneBy(array('idip' => $idip ));

if ($cliente !== null) {

echo "DebugInf:"."Cliente: ".$cliente->getapellidoynombre()." ". $fecha." ". $email." ". $descripcion." ".$noperacion." ".$bruto." ".$comision." ". $neto . " "."<br>";
}else {
echo "DebugInf:"."Cliente no Identificado: ".$fecha." ". $email." ". $descripcion." ".$noperacion." ".$bruto." ".$comision." ". $neto . " "."<br>";

}

}
//echo $fecha." ". $email." ". $descripcion." ".$noperacion." ".$bruto." ".$comision." ". $neto . " "."<br>";

}


}





















?>