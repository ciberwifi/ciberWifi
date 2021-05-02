
<?php


require_once "../bootstrap.php";
require_once "../Model/Ticket.php";
require_once "../Model/Cliente.php";


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
        $tickets = $entityManager->getRepository('Ticket')->findall();
        ?>
        <table id="thetable" class="table table-striped table-sm">
          <thead>
            <tr>
               <th style="visibility: hidden;">Id</th>
              <th>Fecha</th>
              <th>IP</th>
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
              <td><?php echo $dato->getip();?></td>
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


      <div id="resultado3" class="container" style="margin-top: 20px;" >


   
      </div>


   <div id="resultado4" class="container" style="margin-top: 20px;" >


   
      </div>    
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btnnuevorecla"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Nuevo Reclamo</button>
              </td>
               <td>
                <button type="button" class="btn btn-success btn-sm" id="btneditar"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Editar</button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btndiagnosticos"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Diagnosticar </button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btncerrarticket"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Cerrar Ticket</button>
              </td>
                   <td>
                <button type="button" class="btn btn-success btn-sm" id="btnhistorial"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Historial</button>
              </td>

       
              
<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {



       $("#btnnuevorecla").click(function(){

      var loadUrl = "html/nuevoreclamo.html"; // paso parametro accion e id
      $("#resultado3").load(loadUrl); // ejecuto
      }); 


    $("#btnhistorial").click(function(){

      var loadUrl = "php/reclamosHistorial.php"; // paso parametro accion e id
      $("#resultado4").load(loadUrl); // ejecuto
      }); 


    $('#thetable').find('tr').click(function(){
   var row = $(this).find('td:first').text();
  

       $("#btneditar").one('click',function(){
       var loadUrl = "php/editarreclamo.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#resultado3").html(result);
         });
            $.done(function(html){
            $(".tabla").html(html);
             });
        });

          $("#btndiagnosticos").one('click',function(){

      var loadUrl = "php/nuevodiagnostico.php"; // paso parametro accion e id
       var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#resultado3").html(result);
         });
       // ejecuto
      }); 


  }); 


    $('#thetable').find('tr').dblclick(function(){
      var row = $(this).find('td:first').text();

      var loadUrl = "php/editarreclamo.php";// paso parametro accion e id

     
      var data= { 'id' : row };
      $.post(loadUrl, data ,function(result) { 
         $("#resultado3").html(result);
      });

       
 // alert('You clicked ' + row);
});



     var ultimaFila = null;
        var colorOriginal;
        var fondooriginal;
        $(Inicializar);
        function Inicializar() {
            $('#thetable tr').click(function () {
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
   

