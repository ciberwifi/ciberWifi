<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="conexiones")
 */

Class Conexion {
    // Declaración de una propiedad

     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

	/**
     * @ORM\Column(type="string")
     */
    private $ip;
	/**
     * @ORM\Column(type="string")
     */
	private $usuario;
    /**
     * @ORM\Column(type="string")
     */
    private $contrasenia;
	/**
     * @ORM\Column(type="string")
     */
    private $idEquipo;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $altura;
    
	
    // Declaración de un método
	
	
public function getzona()
{
return $this->zona;
}

public function getapellidoynombre()
{
return $this->apellidoynombre;
}

public function getdni()
{
return $this->dni;
}

public function gettel()
{
return $this->tel;
}

public function getdireccion()
{
return $this->direccion;
}

public function getemail()
{
return $this->email;
}

public function getmediosPago()
{
return $this->mediosPago;
}


	
public function setzona($zona)
{
$this->zona=$zona;
}

public function setapellidoynombre($apellidoynombre)
{
$this->apellidoynombre=$apellidoynombre;
}

public function setdni($dni)
{
$this->dni=$dni;
}

public function settel($tel)
{
$this->tel=$tel;
}

public function setdireccion($direccion)
{
$this->direccion=$direccion;
}

public function setemail($email)
{
$this->email=$email;
}

public function setmediosPago($mediosPago)
{
$this->mediosPago=$mediosPago;
}




  }