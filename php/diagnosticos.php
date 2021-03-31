
<?php

require("base.php");


$arrayDatos=array();

$arrayDatos=leertablaDiagnosticos();


?>

<h4 style="margin-bottom: 30px;">Diagnosticos</h4>



<span class="border-bottom"></span>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Fecha Diagnostico</th>
              <th>IP</th>
              <th>Motivo Falla</th>
              <th>Revision en Domicilio</th>
              <th>En Monitoreo</th>
              <th>Datos Conexion</th>
              <th>Datos operador</th>
             
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
              <td><?php echo $dato->getmonitoreo();?></td>
              <td><?php echo $dato->getvisitaTecnica();?></td>
               <td><?php echo $dato->getdatosInstal();?></td>
              <td><?php echo $dato->getobservaciones();?></td>
          
                 </tr>
            <?php
              }
              ?>

       
          <tr>
          </tbody>
        </table>
      </div>


      <div id="resultado2" class="container" style="margin-top: 20px;" >


   
      </div>
  <td>
  <button type="button" class="btn btn-primary" id="btnEditar"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Editar </button>
   </td>

<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {


   $("#btndiagnosticos").click(function(){

      var loadUrl = "html/nuevodiagnostico.html"; // paso parametro accion e id
      $("#resultado2").load(loadUrl); // ejecuto
      }); 

    $("#btnEditar").click(function(){

      var loadUrl = "html/nuevodiagnostico.html"; // paso parametro accion e id
      $("#resultado2").load(loadUrl); // ejecuto
      }); 


  }); 

</script>
   

