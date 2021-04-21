<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="planes")
 */

Class Plan {
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
    private $descripcion;
    /**
     * @ORM\Column(type="decimal",nullable=true)
     */
	private $monto;
    
    // Declaración de un método
	
	

public function getdescripcion()
{
return $this->descripcion;
}

public function getmonto()
{
return $this->monto;
}

public function setdescripcion($descripcion)
{
$this->descripcion=$direccion;
}


public function setmonto($monto)
{
$this->monto=$monto;
}




  }