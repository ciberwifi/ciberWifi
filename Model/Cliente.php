
<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require  "Conexion.php";
require  "Plan.php";
require "Ticket.php";
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
     * @ORM\Column(type="date", nullable=true)
     */
	private $fechaAlta;
	/**

     * @ORM\OneToOne(targetEntity="Plan" , cascade={"persist", "remove"} )
     */
	private $idplan;

	/**
     *@ORM\OneToOne(targetEntity="Conexion", cascade={"persist", "remove"})
     */
	private $idConexion;

	 /**
     
     * @ORM\OneToMany(targetEntity="Ticket", cascade={"persist", "remove"} , mappedBy="cliente")
     */
    private $tickets;
	
    

    /**
     * @ORM\Column(type="string")
     */
    private $idip;

    // Declaración de un método



 public function __construct() {
        $this->tickets = new ArrayCollection();
       $this->idConexion= new Conexion();
        $this->idplan= new Plan();
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

public function getidip()
{
return $this->idip;
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
public function setidip($idip)
{
$this->idip=$idip;
}

public function setidconexion($conexion)
{
$this->idConexion=$conexion;
}

  }