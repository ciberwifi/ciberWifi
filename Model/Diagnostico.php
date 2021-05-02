<?php

use Doctrine\ORM\Mapping as ORM;



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
	private $motivofalla;  

	   /**
     
     * @ORM\OneToMany(targetEntity="\VisitaTecnica", cascade={"persist", "remove"} , mappedBy="diagnostico")
     */
    private $visitas;
     /**
     * @ORM\Column(type="boolean")
     */
	private $monitoreo;
	   /**
     * @ORM\Column(type="string")
     */
	private $observaciones;

  
 public function __construct() {
        $this->visitas = new ArrayCollection();
  
    }

	

    
    

public function setmotivofalla($motivofalla)
{
 $this->motivofalla=$motivofalla;
}

public function setmonitoreo($monitoreo)
{
 $this->monitoreo=$monitoreo;
}


public function setobservaciones($observaciones)
{
 $this->observaciones=$observaciones;
}



public function getid()
{
return $this->id;
}
	
	
public function getmotivofalla()
{
return $this->motivofalla;
}


public function getobservaciones()
{
return $this->observaciones;
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