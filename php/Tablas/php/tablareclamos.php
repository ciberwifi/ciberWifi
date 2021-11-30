<?php
require_once "../../../bootstrap.php";
require_once "../../../Model/Ticket.php";
require_once "../../../Model/Cliente.php";
?>
<div class="tabla table-responsive">
          <?php
        $tickets1 = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'pendiente'));
         $tickets2 = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'diagnosticado'));
         $tickets3 = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'Monitoreado'));
         $tickets4 = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'Visita Tecnica'));
         $tickets=array_merge($tickets1,$tickets2,$tickets3,$tickets4);
        ?>

        <table id="tablaReclamos" class="table table-striped table-sm">
          <thead>
            <tr>
               <th style="visibility: hidden;">Id</th>

              <th>Fecha</th>
              <th>Zona</th>
              <th>IP</th>
              <th>Apellido y Nombre</th>
              <th>Motivo</th>
              <th>Datos operador</th>
              <th>Respuesta</th>
              <th>Estado</th>
                
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($tickets as $dato ) {
              ?>
               <td style="visibility: hidden;"> <?php echo $dato->getid();?></td>
              <td> <?php echo $dato->getfecha();?> </td>
              <td> <?php echo $dato->getcliente()->getzona();?> </td>
              <td><?php echo $dato->getip();?></td>
              <td> <?php echo $dato->getcliente()->getapellidoynombre();?> </td>
              <td><?php echo $dato->getmotivo();?></td>
              <td><?php echo $dato->getobservaciones();?></td>
              <td><?php echo $dato->getrespuesta();?></td>
              <td><?php echo $dato->getestado();?></td>
             
              </tr>
            <?php
              }
              ?>

       
        
          </tbody>
        </table>
      </div>