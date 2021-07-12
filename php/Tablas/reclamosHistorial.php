
<?php

require_once "../../bootstrap.php";
require_once "../../Model/Ticket.php";
require_once "../../Model/Cliente.php";


?>
<style>

  table tr:hover {
  background-color: #CBD1D8;
 
  cursor: pointer;
}

</style>

<h4 style="margin-bottom: 30px;">Reclamos Cerrados

              </h4>

<span class="border-bottom"></span>

      <div class="tabla table-responsive">
          <?php
        $tickets = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'cerrado'));

        ?>
        <table id="tablareclamoshistorial" class="table table-striped table-sm">
          <thead>
            <tr>
               <th style="visibility: hidden;">Id</th>

              <th>Fecha</th>
              <th>Zona</th>
              <th>IP</th>
              <th>Apellido y Nombre</th>
              <th>Motivo</th>
              <th>Datos operador</th>
               <th>Estado</th>
                <th></th>
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
              <td><?php echo $dato->getestado();?></td>
             
              </tr>
            <?php
              }
              ?>

       
          <tr>
          </tbody>
        </table>
      </div>
             
              

   

