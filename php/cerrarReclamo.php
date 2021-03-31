<?php

require("base.php");

$arrayDatos=array();

$fecha=date('d-m-y');
 $dni= htmlspecialchars($_POST['imptdni']);
 $resuelto="no";
 $detalle=htmlspecialchars($_POST['observaciones']);


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
array_push($arrayDatos, trim($observaciones));



grabarEnTablaDiagnosticos($arrayDatos);

echo "Diagnostico ingresado con exito ". $cliente->getip()." ".$cliente->getapellido()." ".$cliente->getnombre();

 }else{

  echo "El cliente selecionado no existe";

 }


         
 
?>


