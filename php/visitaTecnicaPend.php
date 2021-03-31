
<?php

require("base.php");


$arrayDatos=array();

$arrayDatos=leertablaVt();


?>

<h4 style="margin-bottom: 30px;">Vs Pendientes

              </h4>

<span class="border-bottom"></span>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
             
              <th>IP</th>
              <th>Datos Conexion</th>
              <th>Motivo</th>
              <th>Observaciones</th>
             
               <th>Fecha Programada</th>
               
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($arrayDatos as $dato ) {
              ?>
              
              <td><?php echo $dato->getip();?></td>
              <td><?php echo $dato->getdatosInstal();?></td>
              <td><?php echo $dato->getmotivo();?></td>
              <td><?php echo $dato->getobservaciones();?></td>
              <td> <?php echo $dato->getfecha();?> </td>
              </tr>
            <?php
              }
              ?>

       
          <tr>
          </tbody>
        </table>
      </div>


      <div id="resultado3" class="container" style="margin-top: 20px;" >


   
      </div>



 <td>
                <button type="button" class="btn btn-primary" id="btndiagnosticos"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Asignar Fecha </button>
              </td>
         
<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {


   $("#btndiagnosticos").click(function(){

      var loadUrl = "html/nuevodiagnostico.html"; // paso parametro accion e id
      $("#resultado3").load(loadUrl); // ejecuto
      }); 

  }); 

</script>
   

