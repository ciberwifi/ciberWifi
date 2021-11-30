<?php

require_once "../../../../bootstrap.php";
//require_once "../Model/Cliente.php";
require_once "../../../../Model/Ticket.php";
require_once "../../../../Model/Diagnostico.php";
require_once "../../../../Model/VisitaTecnica.php";

 echo $id= htmlspecialchars($_POST['id']);


 
 $resultadovt=htmlspecialchars($_POST['resultadovt']);
 
 

 $visita = $entityManager->getRepository('VisitaTecnica')->findOneBy(array('id' => $id));


$visita->setresultado($resultadovt);
$visita->setestado("cerrada");

$entityManager->flush();

echo "Visita Cerrada con exito ";
         
 
?>

