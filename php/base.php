<?php

 require("clases/base/Cliente.php");
 require("clases/base/Reclamo.php");

 $urlBD="Z:/redes.bas/baseDatos/";

 

function buscarCliente($dni){

 $tablaClientes="Z:/redes.bas/baseDatos/"."tablas/tablaClientes".date('m')."-".date('y').".csv";

 $pos=2;
 $arrayBusqueda=array();
 array_push($arrayBusqueda, trim($dni));
 $vecCliente=buscarEnTabla($tablaClientes,$arrayBusqueda, $pos);
 $cliente=new Cliente($vecCliente);

 return($cliente);

	}

function grabarEnTabla($tabla, $array){

	$linea="";
	foreach($array as $dato ){
			 $linea=linea$.trim($dato).",";
				}

	 if($archivo = fopen($tabla, "a"))
    {
        fwrite($tabla, trim($linea). "\r\n");
        fclose($tabla);
    }

	}

	function buscarEnTabla($tabla, $arrayBusqueda, $posSearch){
	
	$dato =0;
	$arrayDatos=array();
	$arrayDatoBuscado=array();

	$vecTabla=file($tabla);
	
	foreach($vecTabla as $linea ) {
		$dato = explode(",", $linea);
		$datoSearch=trim($dato[$posSearch]);
		$vecDatoSearch=explode(" ", $datoSearch);
			foreach($vecDatoSearch as $datoS ){
			 array_push($arrayDatos, trim($datoS));
				}
	$result = array_intersect($arrayBusqueda, $arrayDatos);
		
	if(count($result)==1){
	$arrayDatoBuscado=$dato;
	
	vaciarArray($arrayDatos);
	break;
		}
	}
			
return $arrayDatoBuscado;		
}
	
 function vaciarArray($array){
$cant=count($array);
	for ($i=0; $i < $cant ; $i++){
		array_pop($array);
		}				
	}	
	


?>