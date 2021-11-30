<?php

use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 * @ORM\Table(name="bajas")
 */
Class Bajas {
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
	private $fecha;  

	   /**
     * @ORM\Column(type="string")
     */
    private $ip;
     /**
     * @ORM\Column(type="string")
     */
	private $motivo;
	   /**
     * @ORM\Column(type="string")
     */
	private $observaciones;
       /**
     * @ORM\Column(type="string",  nullable=true)
     */
    private $disponibilidad;
   /**
     * @ORM\Column(type="string", nullable=true)
     */
	private $estado;
	
    
    /**
     *@ORM\OneToOne(targetEntity="\Cliente", cascade={"persist", "remove"})
     */
    private $cliente;



	

    
    

public function setfecha($fecha)
{
 $this->fecha=$fecha;
}

public function setip($ip)
{
 $this->ip=$ip;
}

public function setmotivo($motivo)
{
$this->motivo=$motivo;
}



public function setobservaciones($observaciones)
{
 $this->observaciones=$observaciones;
}

public function setdisponibilidad($disponibilidad)
{
 $this->disponibilidad=$disponibilidad;
}


public function setestado($estado)
{
$this->estado=$estado;
}
	

public function setcliente($cliente)
{
$this->cliente=$cliente;
}

    public function getid()
{
return $this->id;
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

public function getobservaciones()
{
return $this->observaciones;
}

public function getdisponibilidad()
{
 return $this->disponibilidad;
}


public function getestado()
{
return $this->estado;
}

public function getcliente()
{
return $this->cliente;
}




  }