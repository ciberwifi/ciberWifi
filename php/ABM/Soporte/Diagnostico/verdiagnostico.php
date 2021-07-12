 <?php

require_once "../../../../bootstrap.php";
require_once "../../../../Model/Ticket.php";
require_once "../../../../Model/Diagnostico.php";


 $id= htmlspecialchars($_POST['id']);

$ticket = $entityManager->getRepository('Ticket')->findOneBy(array('id' => $id));

if(strcmp($ticket->getestado(), "pendiente") != 0){

$dato=$ticket->getdiagnostico();

?>

  <h5>Diagnostico</h5>

  <span class="border-bottom"></span>
  <div class="table-responsive">
        <table class="table table-striped table-sm">
        
           <thead>
            <tr>
              <th>Motivo Falla</th>
              <th>Linea Monitoreada</th>
              <th>Visita Tecnica</th>
              <th>Observaciones</th>  
            </tr>
          </thead>

            <tbody>
            <tr>
             
              <td> <?php echo $dato->getmotivo();?> </td>
              <td><?php echo $dato->getmonitoreo();?></td>
               <td> <?php echo sizeof($dato->getallvisitas());?> </td>
             <td><?php echo $dato->getobservaciones();?></td>
             
              </tr>
         
          <tr>
          </tbody>
        </table>
      </div>

<?php


} else {

echo "El ticket no esta diagnosticado aun";
}

?>