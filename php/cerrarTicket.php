<?php

require_once "../bootstrap.php";
require_once "../Model/Ticket.php";


echo  $id= htmlspecialchars($_POST['id']);

$ticket = $entityManager->getRepository('Ticket')->findOneBy(array('id' => $id));
$ticket->setestado("cerrado");
$entityManager->flush();
 ?>