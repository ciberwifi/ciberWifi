
<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
include("Plan.php");
/**
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 */

Class Cliente {
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
    private $zona;
    /**
     * @ORM\Column(type="string")
     */
	private $apellidoynombre;
    /**
     * @ORM\Column(type="integer")
     */
	private $dni;
	/**
     * @ORM\Column(type="string")
     */
	private $tel;
	/**
     * @ORM\Column(type="string")
     */
	private $direccion;
	/**
     * @ORM\Column(type="string")
     */
	private $email;
	/**
     * @ORM\Column(type="string")
     */
	private $mediosPago;

	/**
     * @ORM\Column(type="date")
     */
	private $fechaAlta;
	/**
     * @ORM\OneToOne(targetEntity="Plan")
     */
	private $idplan;

	/**
     *@ORM\OneToOne(targetEntity="Conexion")
     */
	private $idConexion;

	 /**
     
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="cliente")
     */
    private $tickets;
	
    // Declaración de un método


 public function __construct() {
        $this->tickets = new ArrayCollection();
        $this->
        $this->Conexion= new Conexion();
    }

public function getzona()
{
return $this->zona;
}

public function getapellidoynombre()
{
return $this->apellidoynombre;
}

public function getdni()
{
return $this->dni;
}

public function gettel()
{
return $this->tel;
}

public function getdireccion()
{
return $this->direccion;
}

public function getemail()
{
return $this->email;
}

public function getmediosPago()
{
return $this->mediosPago;
}

public function getfechaAlta()
{
return $this->fechaAlta;
}

	
public function setzona($zona)
{
$this->zona=$zona;
}

public function setapellidoynombre($apellidoynombre)
{
$this->apellidoynombre=$apellidoynombre;
}

public function setdni($dni)
{
$this->dni=$dni;
}

public function settel($tel)
{
$this->tel=$tel;
}

public function setdireccion($direccion)
{
$this->direccion=$direccion;
}

public function setemail($email)
{
$this->email=$email;
}

public function setmediosPago($mediosPago)
{
$this->mediosPago=$mediosPago;
}

public function setfechaAlta($fechaAlta)
{
$this->fechaAlta=$fechaAlta;
}


  }