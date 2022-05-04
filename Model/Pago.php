<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pagos")
 */

Class Pago {
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
    private $noperacion;
      /**
   * @ORM\Column(type="string")
     */
    private $descripcion;
   /**
      * @ORM\Column(type="string")
     */
    private $email;
      /**
     * @ORM\Column(type="decimal",nullable=true)
     */
    private $bruto;
    /**
     * @ORM\Column(type="decimal",nullable=true)
     */
    private $comision;
    /**
     * @ORM\Column(type="decimal",nullable=true)
     */
    private $neto;
      /**
     
     * @ORM\ManyToOne(targetEntity="\Suscripcion", cascade={"persist", "remove"},inversedBy="pagos")
     * @ORM\JoinColumn(name="suscripcion_id", referencedColumnName="id")
     */
    private $suscripcion;







    // Declaración de un método
	
	
public function getfecha()
{
return $this->fecha->format('y-m-d');
}
public function getnoperacion()
{
return $this->descripcion;
}
public function getdescripcion()
{
return $this->descripcion;
}
public function getemail()
{
return $this->email;
}
public function getbruto()
{
return $this->bruto;
}
public function getcomision()
{
return $this->comision;
}
public function getneto()
{
return $this->neto;
}
public function getsuscripcion()
{
return $this->suscripcion;
}    


public function setfecha($fecha)
{
 $fechaTrunk=explode(" ", $fecha);  
 $fechaArray=explode("/", $fechaTrunk[0]);   
$this->fecha = new DateTime();
$this->fecha->setDate($fechaArray[2], $fechaArray[1],$fechaArray[0]);
}

public function setnoperacion($noperacion)
{
$this->noperacion=$noperacion;
}
public function setdescripcion($descripcion)
{
$this->descripcion=$descripcion;
}
public function setemail($email)
{
$this->email=$email;
}
public function setbruto($bruto)
{
$this->bruto=$bruto;
}
public function setcomision($comision)
{
$this->comision=$comision;
}
public function setneto($neto)
{
 $this->neto=$neto;
}

public function setsuscripcion($suscripcion)
{
$this->suscripcion=$suscripcion;
}   

  }