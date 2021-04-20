
<?php


Class Instalacionn {
    // Declaración de una propiedad
    private $zona;
    private $nombre;
	private $apellido;
	private $dni;
	private $tel;
	private $direccion;
	private $costoInstal
	private $plan;
	private $observaciones;

	
    // Declaración de un método
	
	
public function __construct($vecClientes) {

		$this->zona=$vecClientes[0];
		 $this->nombre=$vecClientes[1];
		 $this->apellido=$vecClientes[2];
		 $this->dni=$vecClientes[3];
		 $this->tel=$vecClientes[4];
		 $this->direccion=$vecClientes[5];
		 $this->costoInstal=$vecClientes[6];
		 $this->plan=$vecClientes[7];
		 $this->observaciones=$vecClientes[8];
		
 }
	
	
	
	public function __destruct()
  {

	  unset($this);
  }
	

public function getzona()
{
return $this->zona;
}


public function getnombre()
{
return $this->nombre;
}
public function getapellido()
{
return $this->apellido;
}

public function getdireccion()
{
return $this->direccion;
}


public function getdni()
{
return $this->dni;
}


public function getdni()
{
return $this->dni;
}

public function getplan()
{
return $this->plan;
}

public function getcostoInstal()
{
return $this->costoInstal;
}

public function getobservaciones()
{
return $this->observaciones;
}





  }