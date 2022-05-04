<?php

use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 * @ORM\Table(name="retiros")
 */
Class Retiro {
    // Declaración de una propiedad


    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="date",nullable=true)
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
     * @ORM\Column(type="string",  nullable=true)
     */
    private $wifi;
   /**
     * @ORM\Column(type="string",  nullable=true)
     */
	private $estabilizador;
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
    private $antena;
    
       /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $estado;
    



	

public function getid()
{
return $this->id;
}    
    
public function getfecha()
{

if(!(is_null($this->fecha))) {
   
return $this->fecha->format('Y-m-d');
}else{
return "S/F";    
}

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

public function getestado()
{
return $this->estado;
}


public function setfecha($fecha)
{

$fechaTrunk=explode("-", $fecha);  

if(count($fechaTrunk)>1){


$this->fecha = new DateTime();
$dia=01;
$mes=$fechaTrunk[0];
$año="20".$fechaTrunk[1];
$this->fecha->setDate($año, $mes, $dia);
}    
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


public function setestado($estado)
{
$this->estado=$estado;
}

















  }