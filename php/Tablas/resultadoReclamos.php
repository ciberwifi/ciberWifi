
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

<h4 style="margin-bottom: 30px;">Reclamos Pendientes

              </h4>

<span class="border-bottom"></span>

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


      <div id="modalReclamo" class="container" style="margin-top: 20px;" >


   
      </div>


   
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btnnuevorecla"  data-bs-toggle="modalReclamo" data-bs-target="#modalReclamo" >Nuevo Reclamo</button>
              </td>
               <td>
                <button type="button" class="btn btn-success btn-sm" id="btneditarReclamo"  data-bs-toggle="modalReclamo" data-bs-target="#modalReclamo" >Editar</button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btndiagnosticar"  data-bs-toggle="modalReclamo" data-bs-target="#modalReclamo" >Diagnosticar </button>
              </td>
                <td>
                <button type="button" class="btn btn-success btn-sm" id="btnverdiagnostico"  data-bs-toggle="contenedorReclamo" data-bs-target="#contenedorReclamo" >Ver Diagnostico </button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btncerrarticket"  data-bs-toggle="contenedorReclamo" data-bs-target="#contenedorReclamo" >Cerrar Ticket</button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btnhistorialreclamos"  data-bs-toggle="contenedorReclamo" data-bs-target="#contenedorReclamo" >Historial</button>
              </td>

       
       <div id="contenedorReclamo" class="container" style="margin-top: 20px;" >


   
      </div>          
 
<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {




       $("#btnnuevorecla").click(function(){

      var loadUrl = "html/nuevoreclamo.html"; // paso parametro accion e id
      $("#modalReclamo").load(loadUrl); // ejecuto
      }); 


    $("#btnhistorialreclamos").click(function(){

      var loadUrl = "php/Tablas/reclamosHistorial.php"; // paso parametro accion e id
      $("#contenedorReclamo").load(loadUrl); // ejecuto
      }); 

      

    $('#tablaReclamos').find('tr').click(function(){
   var row = $(this).find('td:first').text();
  


       $("#btneditarReclamo").one('click',function(){
       var loadUrl = "php/ABM/Soporte/editarreclamo.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#modalReclamo").html(result);
         });
          
        });


          $("#btnverdiagnostico").one('click',function(){


      var loadUrl = "php/ABM/Soporte/Diagnostico/verdiagnostico.php"; // paso parametro accion e id
       var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#contenedorReclamo").html(result);
         });
       // ejecuto
      }); 

      
       $("#btndiagnosticar").one('click',function(){

      var loadUrl = "php/ABM/Soporte/Diagnostico/nuevodiagnostico.php"; // paso parametro accion e id
       var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#modalReclamo").html(result);
         });
       // ejecuto
      }); 

       $("#btncerrarticket").one('click',function(){

      var loadUrl = "php/ABM/Soporte/cerrarTicket.php"; // paso parametro accion e id
           var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#contenedorReclamo").html(result);
      }); 
    
      }); 

  }); 


    $('#tablaReclamos').find('tr').dblclick(function(){
      var row = $(this).find('td:first').text();

      var loadUrl = "php/ABM/Soporte/editarreclamo.php";// paso parametro accion e id

     
      var data= { 'id' : row };
      $.post(loadUrl, data ,function(result) { 
         $("#modalReclamo").html(result);
      });

       
 // alert('You clicked ' + row);
});



     var ultimaFila = null;
        var colorOriginal;
        var fondooriginal;
        $(Inicializar);
        function Inicializar() {
            $('#tablaReclamos tr').click(function () {
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
   

