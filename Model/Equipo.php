
<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="equipos")
 */

Class Equipo{
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
    private $sn;
	/**
     * @ORM\Column(type="string")
     */
    private $descripcion;
    /**
     * @ORM\Column(type="string")
     */
	private $macAdress;
    
    /**
     * @ORM\Column(type="string")
     */
    private $firmvers;


      /**
     * @ORM\Column(type="boolean")
     */
    private $comodato;
    /**
     
     * @ORM\ManyToOne(targetEntity="Conexion", inversedBy="equipos")
     * @ORM\JoinColumn(name="conexion_id", referencedColumnName="id")
     */
    private $conexion;
    


    // Declaración de un método
	
	
public function getsn()
{
return $this->sn;
}

public function getdescripcion()
{
return $this->descripcion;
}

public function getmacAdress()
{
return $this->macAdress;
}

public function getfirmvers()
{
return $this->firmvers;
}

public function setsn($sn)
{
$this->sn=$sn;
}

public function setdescripcion($descripcion)
{
$this->descripcion=$descripcion;
}

public function setmacAdress($macAdress)
{
$this->macAdress=$macAdress;
}

public function setfirmvers($firmvers)
{
$this->firmvers=$firmvers;
}




  }