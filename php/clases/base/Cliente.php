
<?php


Class Cliente {
    // Declaración de una propiedad
    private $zona;
    private $ip;
	private $nombre;
	private $apellido;
	private $dni;
	private $tel;
	private $direccion;
	private $email;
	private $mediosPago;
	private $plan;
	private $monto;
    // Declaración de un método
	
	
public function __construct($vecClientes) {
		$this->zona=$vecClientes[1];
		 $this->ip=$vecClientes[2];
		 $this->apellido=$vecClientes[3];
		 $this->nombre=$vecClientes[4];
		 $this->tel=$vecClientes[5];
		 $this->direccion=$vecClientes[6];
		 $this->dni=$vecClientes[7];
		 $this->email=$vecClientes[8];
		 $this->mediosPago=$vecClientes[9];
		 $this->monto=$vecClientes[11];
		 $this->plan=$vecClientes[12];
 }
	
	
	
	public function __destruct()
  {

	  unset($this);
  }
	

public function getzona()
{
return $this->zona;
}

public function getip()
{
return $this->ip;
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

public function getplan()
{
return $this->plan;
}

public function getmonto()
{
return $this->monto;
}


public function getallatributes()
{

	$arrayDatos=array();
	array_push($arrayDatos, $this->getzona());
	array_push($arrayDatos, $this->getip());
	array_push($arrayDatos, $this->getnombre());
	array_push($arrayDatos, $this->getapellido());
	array_push($arrayDatos, $this->getdireccion());
	array_push($arrayDatos, $this->getplan());
	array_push($arrayDatos, $this->getmonto());


return $this->monto;
}


  }