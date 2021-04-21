<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\Column(type="string",nullable=true)

     */
    private $ip;
	/**
     * @ORM\Column(type="string", nullable=true)
     */
	private $usuario;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $contrasenia;
	/**
     * @ORM\Column(type="string", nullable=true)
     */
    private $equipos;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $altura;
    
	
    // Declaración de un método
	


 public function __construct() {
        $this->equipos = new ArrayCollection();
    }    
	
public function getip()
{
return $this->ip;
}

public function getusuario()
{
return $this->usuario;
}

public function getcontrasenia()
{
return $this->contrasenia;
}

public function getequipos()
{
return $this->equipos;
}


public function getaltura()
{
return $this->clavewifi;
}

	
public function setip($ip)
{
$this->ip=$ip;
}

public function setusuario($usuario)
{
$this->usuario=$usuario;
}

public function setcontrasenia($contrasenia)
{
$this->contrasenia=$contrasenia;
}

public function setequipos($equipos)
{
$this->equipos=$equipos;
}


public function setaltura($altura)
{
$this->clavewifi=$altura;
}



  }