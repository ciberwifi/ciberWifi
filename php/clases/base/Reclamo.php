<?php


Class Reclamo {
    // Declaración de una propiedad
  
    private $ip;
	private $motivo;
	private $estabilizador;
	private $observaciones;
	
    // Declaración de un método
	
	
public function __construct($vecClientes) {
		
		 $this->ip=$vecClientes[2];
		 $this->motivo=$vecClientes[3];
		 $this->estabilizador=$vecClientes[4];
		 $this->observaciones=$vecClientes[5];
		
 }
	
	
	
	public function __destruct()
  {

	  unset($this);
  }
	

public function getip()
{
return $this->ip;
}

public function getmotivo()
{
return $this->motivo;
}
public function getestabilizador()
{
return $this->nombre;
}
public function getobservaciones()
{
return $this->apellido;
}


  }