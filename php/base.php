<?php

 require("clases/base/Cliente.php");
 require("clases/base/Reclamo.php");
 require("clases/base/Diagnostico.php");
require("clases/base/VisitaTecnica.php");

 $urlBD="Z:/redes.bas/baseDatos/";
 

 

function buscarCliente($dni){

 $tablaClientes="Z:/redes.bas/baseDatos/"."tablas/tablaClientes".date('m')."-".date('y').".csv";

 $pos=2;
 $arrayBusqueda=array();
 array_push($arrayBusqueda, trim($dni));
 $vecCliente=buscarEnTabla($tablaClientes,$arrayBusqueda, $pos);
 if(count($vecCliente) > 0 ){
 $cliente=new Cliente($vecCliente);
 return($cliente);
}else{
 return(-1);
	}
	}

function grabarEnTabla($tabla, $array){

	$linea="";
	foreach($array as $dato ){
			 $linea=$linea.trim($dato).",";
				}


	 if($archivo = fopen($tabla, "a"))
    {
        fwrite($archivo, trim($linea). "\r\n");
        fclose($archivo);
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
	




function grabarEnTablaReclamos($array){

	$tablaReclamos="Z:/redes.bas/baseDatos/"."tablas/reclamos/tablaReclamos".date('m')."-".date('y').".csv";

	grabarEnTabla($tablaReclamos, $array);

}


function grabarEnTablaDiagnosticos($array){

	$tablaDiagnosticos="Z:/redes.bas/baseDatos/"."tablas/reclamos/tablaDiagnosticos".date('m')."-".date('y').".csv";

	grabarEnTabla($tablaDiagnosticos, $array);

}

function grabarEnTablaVT($array){

	$tablaVtecnica="Z:/redes.bas/baseDatos/"."tablas/reclamos/tablaVtecnica".date('m')."-".date('y').".csv";

	grabarEnTabla($tablaVtecnica, $array);

}


function leertablaReclamos(){

	$tablaReclamos="Z:/redes.bas/baseDatos/"."tablas/reclamos/tablaReclamos".date('m')."-".date('y').".csv";


	$vecTabla=file($tablaReclamos);
	$arrayDatos=array();
	 
	 foreach($vecTabla as $linea ) {
		$dato = explode(",", $linea);
		$reclamo=new Reclamo($dato);
		array_push($arrayDatos, $reclamo);
     }

     return($arrayDatos);
}

function leertablaReclamosHistorial(){

	$tablaReclamos="Z:/redes.bas/baseDatos/"."tablas/reclamos/tablaReclamosHistorial".date('m')."-".date('y').".csv";


	$vecTabla=file($tablaReclamos);
	$arrayDatos=array();
	 
	 foreach($vecTabla as $linea ) {
		$dato = explode(",", $linea);
		$reclamo=new Reclamo($dato);
		array_push($arrayDatos, $reclamo);
     }

     return($arrayDatos);
}

function leertablaDiagnosticos(){

	$tablaDiagnosticos="Z:/redes.bas/baseDatos/"."tablas/reclamos/tablaDiagnosticos".date('m')."-".date('y').".csv";


	$vecTabla=file($tablaDiagnosticos);
	$arrayDatos=array();
	 
	 foreach($vecTabla as $linea ) {
		$dato = explode(",", $linea);
		$diagnostico=new Diagnostico($dato);
		array_push($arrayDatos, $diagnostico);
     }

     return($arrayDatos);
}

function leertablaVt(){

	$tablavt="Z:/redes.bas/baseDatos/"."tablas/reclamos/tablaVtecnica".date('m')."-".date('y').".csv";


	$vecTabla=file($tablavt);
	$arrayDatos=array();
	 
	 foreach($vecTabla as $linea ) {
		$dato = explode(",", $linea);
		$vt=new VisitaTecnica($dato);
		array_push($arrayDatos, $vt);
     }

     return($arrayDatos);
}



?>