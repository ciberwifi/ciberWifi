<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="inbox")
 */

Class Inbox {
    // Declaración de una propiedad

     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
	/**
     * @ORM\Column(type="string",nullable=true)
     */
    private $destinatario;
    /**
     * @ORM\Column(type="string")
     */
	private $mensaje;
    
    // Declaración de un método
	
	

public function getid()
{
return $this->id;
}

public function getdestinatario()
{
return $this->destinatario;
}

public function getmensaje()
{
return $this->mensaje;
}

public function setdestinatario($destinatario)
{
$this->destinatario=$destinatario;
}


public function setmensaje($mensaje)
{
$this->mensaje=$mensaje;
}




  }