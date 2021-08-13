
<?php

require_once "../../../../bootstrap.php";
require_once "../../../../Model/Ticket.php";
require_once "../../../../Model/Diagnostico.php";





?>
<style>

  table tr:hover {
  background-color: #CBD1D8;
 
  cursor: pointer;
}

</style>

<h4 style="margin-bottom: 30px;">Diagnosticos</h4>


<span class="border-bottom"></span>

      <div class="tabla table-responsive">

        <?php
   
  $tickets2 = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'diagnosticado'));
  $tickets3 = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'Monitoreado'));
  $tickets4 = $entityManager->getRepository('Ticket')->findBy(array('estado' => 'Visita Tecnica'));
  $diagnosticos=array_merge($tickets2,$tickets3,$tickets4);
         ?>


        <table id="tablaDiagnosticos" class="table table-striped table-sm">
          <thead>
            <tr>
                <th style="visibility: hidden;">Id</th>
              <th>Fecha</th>
              <th>Zona</th>
              <th>Ip</th>
              <th>Apellido</th>
              <th>Reclamo</th>
              <th>Diagnostico</th>
              <th>Visita</th>
              <th>Monitoreo</th>
              <th>Detalle Diagnostico</th>
         
                
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($diagnosticos as $dato ) {
              ?>
                <td style="visibility: hidden;"> <?php echo $dato->getdiagnostico()->getid();?></td>
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
              ?>

       
        
          </tbody>
        </table>
      </div>


      <div id="modalDiagnostico" class="container" style="margin-top: 20px;" >
  </div>

  <td>
  <button type="button" class="btn btn-success btn-sm" id="btnEditarDiagnostico"  data-bs-toggle="modalDiagnostico" data-bs-target="#modalDiagnostico" >Editar </button>
  </td>

    <td>
      <button type="button" class="btn btn-success btn-sm" id="btnhistorial"  data-bs-toggle="contenedorDiagnostico" data-bs-target="#contenedorDiagnostico" >Historial</button>
    </td>


<div id="contenedorDiagnostico" class="container" style="margin-top: 20px;" >

</div> 


<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {


 
    


      $("#btnhistorial").click(function(){

      var loadUrl = "php/ABM/Soporte/Diagnostico/tablaDiagnosticosHistorial.php"; // paso parametro accion e id
      $("#contenedorDiagnostico").load(loadUrl); // ejecuto
      }); 


 $('#tablaDiagnosticos').find('tr').click(function(){
   var row = $(this).find('td:first').text();
  


       $("#btnEditarDiagnostico").one('click',function(){
       var loadUrl = "php/ABM/Soporte/Diagnostico/editardiagnostico.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#modalDiagnostico").html(result);
         });
          
        });



  }); 




 var ultimaFila = null;
        var colorOriginal;
        var fondooriginal;
        $(Inicializar);
        function Inicializar() {
            $('#tablaDiagnosticos tr').click(function () {
                if (ultimaFila != null) {
                    ultimaFila.css('background-color', colorOriginal)
                    ultimaFila.css('color', fondooriginal)
                }
                colorOriginal = 'white';
                fondooriginal = $(this).css('color');
                $(this).css('background-color','#297D18');
                  $(this).css('color','white');
                ultimaFila = $(this);
            });
        }









  }); 

</script>
   

