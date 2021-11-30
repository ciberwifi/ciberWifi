<?php

require_once "../../../bootstrap.php";
require_once "../../../Model/Instalacion.php";


 $id= htmlspecialchars($_POST['id']);

$ticket = $entityManager->getRepository('Instalacion')->findOneBy(array('id' => $id));
$ticket->setestado("cerrada");
$entityManager->flush();

echo "Solicitud Archivada";

 ?>