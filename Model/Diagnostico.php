<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require_once "VisitaTecnica.php";
require_once "Ticket.php";

/**
 * @ORM\Entity
 * @ORM\Table(name="diagnosticos")
 */
Class Diagnostico {
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


	private $motivo;  

	   /**
     
     * @ORM\OneToMany(targetEntity="\VisitaTecnica", cascade={"persist", "remove"} , mappedBy="diagnostico")
     */
    private $visitas;
     /**
     * @ORM\Column(type="boolean")
     */
	private $monitoreo;


        /**
     *@ORM\OneToOne(targetEntity="ticket", cascade={"persist", "remove"})
     */
    private $ticket;
	   /**
     * @ORM\Column(type="string")
     */
	private $observaciones;

  
 public function __construct() {
        $this->visitas = new ArrayCollection();
  
    }

	

    
    
public function setfecha($fecha)
{
 $this->fecha=$fecha;
}

public function setmotivo($motivo)
{
 $this->motivo=$motivo;
}

public function setmonitoreo($monitoreo)
{
 $this->monitoreo=$monitoreo;
}


public function setobservaciones($observaciones)
{
 $this->observaciones=$observaciones;
}
    

public function setticket($ticket)
{
 $this->ticket=$ticket;
}



public function getid()
{
return $this->id;
}
public function getfecha()
{
return $this->fecha;
}
	
	
public function getmotivo()
{
return $this->motivo;
}

public function getmonitoreo()
{

    if($this->monitoreo){
    $monitoreo="SI";
    }else{
    $monitoreo="NO";
    }
return $monitoreo;
}



public function getobservaciones()
{
return $this->observaciones;
}

public function getticket()
{
 return $this->ticket;
}


public function addvisita($visita)
{
$this->visitas->add($visita);
$visita->setdiagnostico($this);

}
public function getallvisitas()
{
return $this->visitas;

}



  }