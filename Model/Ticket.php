<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tickets")
 */
Class Ticket {
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
     * @ORM\Column(type="string")
     */
	private $estado;
	
    
     /**
     
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="tickets")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;
    // Declaración de un método

	

    
    

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

public function setestabilizador($estabilizador)
{
 $this->estabilizador=$estabilizador;
}

public function setobservaciones($observaciones)
{
 $this->observaciones=$observaciones;
}

public function setestado($estado)
{
$this->estado=$estado;
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
public function getestabilizador()
{
return $this->estabilizador;
}
public function getobservaciones()
{
return $this->observaciones;
}
public function getestado()
{
return $this->estado;
}

  }