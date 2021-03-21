<?php


Class Diagnostico {
    // Declaración de una propiedad
  
	private $fecha;  
    private $ip;
	private $motivo;
	private $visitaTecnica;
	private $monitoreo;
	private $observaciones;
	private $estado;
	
    // Declaración de un método
	
	
public function __construct($dato) {
		
		 $this->fecha=$dato[0];
		 $this->ip=$dato[1];
		 $this->motivo=$dato[2];
		 $this->visitaTecnica=$dato[3];
		 $this->monitoreo=$dato[4];
		 $this->observaciones=$dato[5];
	
	
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
public function getvisitaTecnica()
{
return $this->visitaTecnica;
}
public function getmonitoreo()
{
return $this->monitoreo;
}

public function getobservaciones()
{
return $this->observaciones;
}

  }