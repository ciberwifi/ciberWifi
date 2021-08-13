
<?php

require_once "../../../../bootstrap.php";
require_once "../../../../Model/Ticket.php";
require_once "../../../../Model/Diagnostico.php";





?>

<h4 style="margin-bottom: 30px;">Historial Diagnosticos</h4>

<?php
   
  $diagnosticos = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'cerrado'));
  
        

        
        ?>

<span class="border-bottom"></span>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
             
              <th>Fecha</th>
              <th>Zona</th>
              <th>Ip</th>
              <th>Apellido</th>
              <th>Reclamo</th>
              <th>Diagnostico</th>
              <th>Visita</th>
              <th>Monitoreo</th>
              <th>Detalle Diagnostico</th>
             
                <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($diagnosticos as $dato ) {

                if($dato->getdiagnostico()!==null){
              ?>
              <td><?php echo $dato->getfecha();?></td>
              <td><?php echo $dato->getcliente()->getzona();?></td>
               <td><?php echo $dato->getip();?></td>
                <td><?php echo $dato->getcliente()->getapellidoynombre();?></td>
                <td><?php echo $dato->getmotivo();?></td>
               <td><?php echo $dato->getdiagnostico()->getmotivo();?></td>
              <td> <?php echo sizeof($dato->getdiagnostico()->getallvisitas());?></td>
              <td><?php echo $dato->getdiagnostico()->getmonitoreo();?></td>
              <td><?php echo $dato->getdiagnostico()->getobservaciones();?></td>
              </tr>
            <?php
              }
              }
              ?>

       
          <tr>
          </tbody>
        </table>
      </div>



   

