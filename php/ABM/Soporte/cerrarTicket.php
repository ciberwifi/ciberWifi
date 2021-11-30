<?php

require_once "../../../bootstrap.php";
require_once "../../../Model/Ticket.php";


 $id= htmlspecialchars($_POST['id']);

$ticket = $entityManager->getRepository('Ticket')->findOneBy(array('id' => $id));
$ticket->setestado("cerrado");
$entityManager->flush();

echo "Ticket Cerrado con exito Cliente:". " " . $ticket->getcliente()->getapellidoynombre();
 ?>