<?php

require("base.php");

$arrayDatos=array();

$fecha=date('d-m-y');
 $dni= htmlspecialchars($_POST['imptdni']);
 $motivo=htmlspecialchars($_POST['selectmotivo']);
 $monitoreo="no";
 $visitatecnica="no";
 $observaciones=htmlspecialchars($_POST['observaciones']);
 $datosInstal=htmlspecialchars($_POST['datosconexion']);

  if (isset($_POST['chkvt'])){
  $visitatecnica="si";
  }

  
  if (isset($_POST['chkmonitoreo'])){
  $monitoreo="si";
  }

$cliente=buscarCliente($dni);


if($cliente!==-1){
array_push($arrayDatos, trim($fecha));
array_push($arrayDatos, trim($dni));
array_push($arrayDatos, trim($motivo));
array_push($arrayDatos, trim($monitoreo));
array_push($arrayDatos, trim($visitatecnica));
array_push($arrayDatos, trim($datosInstal));
array_push($arrayDatos, trim($observaciones));

grabarEnTablaDiagnosticos($arrayDatos);

echo "Diagnostico ingresado con exito ". $cliente->getip()." ".$cliente->getapellido()." ".$cliente->getnombre(). " ";

if($visitatecnica=="si"){
$arrayDatos2=array();
array_push($arrayDatos2, trim($dni));
array_push($arrayDatos2, trim($datosInstal));
array_push($arrayDatos2, trim($motivo));
array_push($arrayDatos2, trim($observaciones));

grabarEnTablaVT($arrayDatos2);

echo "Visita Tecnica ingresado con exito ". $cliente->getip()." ".$cliente->getapellido()." ".$cliente->getnombre();
}

 }else{

  echo "El cliente selecionado no existe";

 }


         
 
?>


