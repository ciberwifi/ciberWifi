<?php

require("base.php");

$arrayDatos=array();

$fecha=date('d-m-y');
 $dni= htmlspecialchars($_POST['imptdni']);
 $motivo=htmlspecialchars($_POST['selectmotivo']);
 $estabilizador="no";
 $observaciones=htmlspecialchars($_POST['observaciones']);


  if (isset($_POST['chkestb'])){
  $estabilizador="si";
  }

$cliente=buscarCliente($dni);


if($cliente!==-1){
array_push($arrayDatos, trim($fecha));
array_push($arrayDatos, trim($dni));
array_push($arrayDatos, trim($motivo));
array_push($arrayDatos, trim($estabilizador));
array_push($arrayDatos, trim($observaciones));
array_push($arrayDatos, trim("abierto"));


grabarEnTablaReclamos($arrayDatos);

echo "Alta reclamo generada con exito ". $cliente->getip()." ".$cliente->getapellido()." ".$cliente->getnombre();

 }else{

  echo "El cliente selecionado no existe";

 }


         
 
?>


