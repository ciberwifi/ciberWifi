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
     * @ORM\Column(type="date")
     */
	private $fecha;  

    /**
     * @ORM\Column(type="string")
     */
    private $zona;

	   /**
     * @ORM\Column(type="string")
     */

    private $apellidoynombre;
     /**
     * @ORM\Column(type="string")
     */
	private $direccion;
	   /**
     * @ORM\Column(type="string")
     */
	private $tel;
    /**
     * @ORM\Column(type="string",  nullable=true)
     */
    private $macwan;
    /**
     * @ORM\Column(type="boolean",  nullable=true)
     */
    private $wifi;
   /**
     * @ORM\Column(type="boolean",  nullable=true)
     */
	private $estabilizador;
	/**
     * @ORM\Column(type="boolean",  nullable=true)
     */
    private $antena;
    




	

    
    
public function getfecha()
{
return $this->fecha->format('y-m-d');
}

public function getzona()
{
return $this->zona;
}

public function getapellidoynombre()
{
return $this->apellidoynombre;
}

public function getdireccion()
{
return $this->direccion;
}
public function gettel()
{
return $this->tel;
}

public function getestabilizador()
{
return $this->estabilizador;
}

public function getmacwan()
{
return $this->macwan;
}

public function getantena()
{
return $this->antena;
}

public function getwifi()
{
return $this->wifi;
}



public function setfecha($fecha)
{
 $fechaTrunk=explode(" ", $fecha);  
 $fechaArray=explode("/", $fechaTrunk[0]);   
$this->fecha = new DateTime();
$this->fecha->setDate($fechaArray[2], $fechaArray[1],$fechaArray[0]);
}

public function setzona($zona)
{
$this->zona=$zona;
}   

public function setapellidoynombre($apellidoynombre)
{
$this->apellidoynombre=$apellidoynombre;
}


public function setdireccion($direccion)
{
$this->direccion=$direccion;
}


public function settel($tel)
{
$this->tel=$tel;
}

public function setestabilizador($estabilizador)
{
$this->estabilizador=$estabilizador;
}

public function setmacwan($macwan)
{
 $this->macwan=$macwan;
}

public function setantena($antena)
{
$this->antena=$antena;
}

public function setwifi($wifi)
{
$this->wifi=$wifi;
}



















  }