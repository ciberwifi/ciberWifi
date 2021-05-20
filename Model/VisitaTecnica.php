<?php

use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 * @ORM\Table(name="visitastecnicas")
 */

Class VisitaTecnica {
    // Declaración de una propiedad
  

   /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

 	 /**
     
     * @ORM\ManyToOne(targetEntity="\Diagnostico", cascade={"persist", "remove"},inversedBy="visitas")
     * @ORM\JoinColumn(name="diagnostico_id", referencedColumnName="id")
     */
    private $diagnostico;
	/**
     * @ORM\Column(type="string", nullable=true)
     */
	private $resultado;


	/**
     * @ORM\Column(type="string", nullable=true)
     */
	private $fecha;  

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $hora;  


    /**
     * @ORM\Column(type="string")
     */
    private $estado;
	

public function getid()
{
return $this->id;
}

public function getdiagnostico()
{
return $this->diagnostico;
}

public function getresultado()
{
return $this->resultado;
}

public function getfecha()
{
return $this->fecha;
}

public function gethora()
{
return $this->hora;
}

public function getestado()
{
return $this->estado;
}

public function setdiagnostico($diagnostico)
{
 $this->diagnostico=$diagnostico;
}

public function setresultado($resultado)
{
$this->resultado=$resultado;
}

public function setfecha($fecha)
{
$this->fecha=$fecha;
}
public function sethora($hora)
{
$this->hora=$hora;
}

public function setestado($estado)
{
$this->estado=$estado;
}

  }