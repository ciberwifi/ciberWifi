
<?php
use Doctrine\ORM\Mapping as ORM;
require_once "Plan.php";
/**
 * @ORM\Entity
 * @ORM\Table(name="instalaciones")
 */

Class Instalacion {
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
    private $zona;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $apellidoynombre;
	/**
     * @ORM\Column(type="integer")
     */
	private $dni;
	/**
     * @ORM\Column(type="integer", nullable=true)
     */
	private $tel;
	/**
     * @ORM\Column(type="string")
     */
	private $direccion;

	/**
     * @ORM\Column(type="string", nullable=true)
     */
	private $observaciones;

	/**
     * @ORM\Column(type="string")
     */
	private $estado;

	
    // Declaración de un método

 public function getid()
{
return $this->id;
}
  

public function getfecha()
{
return $this->fecha->format('y-m-d');
    	
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
public function getcostoInstal()
{
return $this->costoInstal;
}

public function getplan()
{
return $this->plan;
}

public function getobservaciones()
{
return $this->observaciones;
}

public function getestado()
{
return $this->estado;
}

public function setzona($zona)
{
$this->zona=$zona;
}



public function setapellidoynombre($apellidoynombre)
{
$this->apellidoynombre=($apellidoynombre);
}


public function setdni($dni)
{
$this->dni=($dni);
}

public function settel($tel)
{
 $this->tel=$tel;
}

public function setdireccion($direccion)
{
$this->direccion=$direccion;
}
public function setcostoInstal($costoInstal)
{
$this->costoInstal=$costoInstal;
}

public function setplan($plan)
{
$this->plan=$plan;
}

public function setobservaciones($observaciones)
{
$this->observaciones=$observaciones;
}

public function setestado($estado)
{
$this->estado=$estado;
}

public function setfecha($fecha)

{

$fechaArray=explode("-", $fecha);   
$this->fecha = new DateTime();
$this->fecha->setDate($fechaArray[0], $fechaArray[1],$fechaArray[2]);
}  



  public function close()
    {
        $this->status = "CLOSE";
    }
  }