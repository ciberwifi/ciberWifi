<?php

require_once "../bootstrap.php";
//require_once "../Model/Cliente.php";
require_once "../Model/Ticket.php";
require_once "../Model/Diagnostico.php";
require_once "../Model/VisitaTecnica.php";

 echo $id= htmlspecialchars($_POST['id']);


 
 $fecha=htmlspecialchars($_POST['fechavt']);
 $hora=htmlspecialchars($_POST['horavt']);
 

 $visita = $entityManager->getRepository('VisitaTecnica')->findOneBy(array('id' => $id));

$visita->setfecha($fecha);
$visita->sethora($hora);



$entityManager->flush();

echo "Fecha Asignada con exito ";
         
 
?>

