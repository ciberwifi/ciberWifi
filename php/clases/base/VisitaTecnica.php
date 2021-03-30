<?php


Class Diagnostico {
    // Declaración de una propiedad
  
    private $ip;
    private $datosInstal;
	private $motivo;
	private $observaciones;
	private $fecha;  
    // Declaración de un método
	
	
public function __construct($dato) {
		
		 
		
		 $this->ip=$dato[0];
		 $this->datosInstal=$dato[1];
		 $this->motivo=$dato[2];
		 $this->observaciones=$dato[3];
	     $this->fecha=$dato[4];
	
  }	
	
	public function __destruct()
  {

	  unset($this);
  }
	
public function getfecha()
{
return $this->fecha;
}

public function getip()
{
return $this->ip;
}

public function getmotivo()
{
return $this->motivo;
}
public function getdatosInstal()
{
return $this->datosInstal;
}


public function getobservaciones()
{
return $this->observaciones;
}

  }