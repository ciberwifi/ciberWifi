<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require_once  "Pago.php";
/**
 * @ORM\Entity
 * @ORM\Table(name="suscripciones")
 */

Class Suscripcion {
    // Declaración de una propiedad

     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
	/**
    * @ORM\ManyToOne(targetEntity="Plan" , cascade={"persist", "remove"} )
     */
    private $idPlan;
     /**
     * @ORM\Column(type="date")
     */
	private $fechaVencimiento;
    /**
      * @ORM\OneToMany(targetEntity="\Pago", cascade={"persist", "remove"} , mappedBy="suscripcion")
     */
    private $pagos;
      /**
     * @ORM\Column(type="decimal",nullable=true)
     */
    private $saldo;
    /**
     * @ORM\Column(type="decimal",nullable=true)
     */
    private $saldovencido;
     
   /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $linkPago;

    /**
     * @ORM\Column(type="integer")
     */
    private $cartera;





    // Declaración de un método
	
	

 public function __construct() {
        $this->pagos = new ArrayCollection();
        $this->idplan= new Plan();
    }


public function getid()
{
return $this->id;
}

public function getidPlan()
{
return $this->idPlan;
}
public function getfechaVencimiento()
{
return $this->fechaVencimiento;
}

public function getsaldo()
{
return $this->saldo;
}
public function getsaldovencido()
{
return $this->saldovencido;
}

public function getlinkPago()
{
return $this->linkPago;
}
public function getcartera()
{
return $this->cartera;
}


public function setidPlan($idplan)
{
$this->idPlan=$idplan;
}
public function setfechaVencimiento($fechaVencimiento)
{
$this->fechaVencimiento=$fechaVencimiento;
}

public function setsaldo($saldo)
{
$this->saldo=$saldo;
}
public function setsaldovencido($saldovencido)
{
$this->saldovencido=$saldovencido;
}

public function addpago($pago)
{
$pago->setsuscripcion($this);
$this->pagos->add($pago);

}
public function getallpagos()
{
return $this->pagos;

}

public function setlinkPago($linkPago)
{
 $this->linkPago=$linkPago;
}

public function setcartera($cartera)
{
 $this->cartera=$cartera;
}

public function actualizarSaldo($monto)
{
 $this->saldo=$this->saldo+$monto;
}


  }