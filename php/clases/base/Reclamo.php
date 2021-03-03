<?php


Class Reclamo {
    // Declaración de una propiedad
  
	private $fecha;  
    private $ip;
	private $motivo;
	private $estabilizador;
	private $observaciones;
	private $estado;
	
    // Declaración de un método
	
	
public function __construct($dato) {
		
		 $this->fecha=$dato[0];
		 $this->ip=$dato[1];
		 $this->motivo=$dato[2];
		 $this->estabilizador=$dato[3];
		 $this->observaciones=$dato[4];
		$this->estado=$dato[5];
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
public function getestabilizador()
{
return $this->estabilizador;
}
public function getobservaciones()
{
return $this->observaciones;
}
public function getestado()
{
return $this->estado;
}

  }