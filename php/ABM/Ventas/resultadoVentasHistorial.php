
<?php


require_once "../../../bootstrap.php";
require_once "../../../Model/Instalacion.php";
?>

<style>

  table tr:hover {
  background-color: #CBD1D8;
 
  cursor: pointer;
}

</style>

<h4 style="margin-bottom: 20px;">Solicitudes Instalacion Realizadas</h4>
           

<span class="border-bottom"></span>

      <div class="tabla table-responsive">
        <?php
       
     $instalaciones = $entityManager->getRepository('Instalacion')->findBy(array('estado' => 'cerrado'));

        ?>

       
        <table id="thetable" class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="visibility: hidden;">Id</th>
              <th>Fecha</th>
              <th>Zona</th>
              <th>Apellido y Nombre</th>
              <th>Dni</th>
               <th>Tel</th>
                <th>Direccion</th>
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Fecha Programada</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($instalaciones as $dato ) {
              ?>
              <td style="visibility: hidden;"> <?php echo $dato->getid();?></td>
              <td> <?php echo $dato->getfecha();?> </td>
              <td><?php echo $dato->getzona();?></td>
              <td><?php echo $dato->getapellidoynombre();?></td>
              <td><?php echo $dato->getdni();?></td>
              <td><?php echo $dato->gettel();?></td>
              <td><?php echo $dato->getdireccion();?></td>
              <td><?php echo $dato->getobservaciones();?></td>
              <td><?php echo $dato->getestado();?></td>
             <td><?php echo $dato->getfechainstal();?></td>
              </tr>
            <?php
              }
              ?>

       
          <tr>
          </tbody>
        </table>
      </div>


     