<?php

// create_product.php <name>
//require_once "../bootstrap.php";

//require_once "Cliente.php";







$clientes="clientes.csv";

$arch= file($clientes);



	$ai=0;
	$flag=0;
	
foreach($arch as $linea ) {
	 $dato = explode(";", $linea);	
	$pk=$ai;
	$zona=trim( $dato[0]);
	$ipAux=trim($dato[1]);
	$ip=str_replace("-", ".", $ipAux);
    $apellido =trim($dato[2]);
    $nombre = trim($dato[3]);
	$tel= trim($dato[4]);
	$dir= trim($dato[5]);
	$dni= trim($dato[6]);
	$email= trim($dato[7]);
	$tarjetas= trim($dato[8]);
	$fechaAlta=trim($dato[9]);
	$importeMensual= trim($dato[10]);
    $plan= trim($dato[11]);
    $venc= trim($dato[12]);
	
	
	$tels= explode(" ", $tel);
	$celAux=$tels[0];
	$celAux2= explode("-", $celAux);
		
	
	if(strlen($celAux2[0])==2 && strlen($celAux2[1])>0 )$celAux="11".$celAux2[1];
	if(strlen($celAux2[0]) > 2 ){
		$celAux="11".substr($celAux2[0],2,10);
		}
		
   
	if(strlen($celAux) < 10)$celAux="";	
	
	$z=explode("-", $zona);	
	
	if($flag ==0 && ($z[0]=="A" OR $z[0]=="Mor")) $flag=1;
	
	if($flag==1 && $z[0]!=="" &&$z[0]!=="ZONA" &&$z[1]!=="S/C" && $z[1]!=="s/c") {
		
		$tarjetasFormat=str_replace(array(" ","  ","   "), " ",$tarjetas);
		 
		$vecTarjetas = explode(" ", $tarjetasFormat);
		$tarjetasCli=array();
			foreach($vecTarjetas as $tarjeta ) {
			$emailc=explode("@",$tarjeta);
			if(count($emailc)==1)$datoBuscado=trim($tarjeta);
			if(count($emailc)==2)$datoBuscado=trim($emailc[0])."@";
			array_push($tarjetasCli,$datoBuscado);
			}
			$tarjetas2=implode(" ", $tarjetasCli);
			$tarjetasCli2=str_replace(array(" ","  ","   "), " ",$tarjetas2);



$cliente = new Cliente();
$apellidynombre=trim($apellido." ".$nombre);

$cliente->setzona($z[0]);
$cliente->setapellidoynombre($apellidynombre);
$cliente->setdni($dni);
$cliente->settel($celAux);
$cliente->setdireccion($dir);
$cliente->setemail($email);
$cliente->setmediospago($tarjetasCli2);
//$cliente->setfechaAlta($fechaAlta);
$cliente->setidip($ip);
//$cliente->setidconexion($conexion);

$entityManager->persist($cliente);
$entityManager->flush();

//$entityManager->clear(;

	 echo $ai.",".$z[0].",".$ip.",".$apellido.",".$nombre.",".$celAux.",".$dir.",".$dni.",".$email.",".$tarjetasCli2.",".$fechaAlta.",".$importeMensual.",".$plan.",".$venc;
	


	}


}


?>