
<?php

require("base.php");


$arrayDatos=array();

$arrayDatos=leertablaReclamos();


?>

<h3 style="margin-bottom: 30px;">Diagnosticos</h3>

<h5>Reclamos Pendientes</h5>

<span class="border-bottom"></span>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>IP</th>
              <th>Motivo</th>
              <th>Tiene estabilizador</th>
              <th>Datos operador</th>
               <th>Estado</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($arrayDatos as $dato ) {
              ?>
              <td> <?php echo $dato->getfecha();?> </td>
              <td><?php echo $dato->getip();?></td>
              <td><?php echo $dato->getmotivo();?></td>
              <td><?php echo $dato->getestabilizador();?></td>
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
<button type="button" class="btn btn-primary" id="btndiagnosticos"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Diagnosticar </button>

      <div id="resultado2" class="container" style="margin-top: 20px;" >


   
      </div>


<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {


   $("#btndiagnosticos").click(function(){

      var loadUrl = "html/nuevodiagnostico.html"; // paso parametro accion e id
      $("#resultado2").load(loadUrl); // ejecuto
      }); 

  }); 

</script>
   

