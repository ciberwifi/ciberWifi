
<?php


require_once "../bootstrap.php";
require_once "../Model/Instalacion.php";
?>

<style>

  table tr:hover {
  background-color: #CBD1D8;
 
  cursor: pointer;
}

</style>

<h4 style="margin-bottom: 20px;">Solicitudes Instalacion </h4>
           

<span class="border-bottom"></span>

      <div class="tabla table-responsive">
        <?php
        $instalaciones = $entityManager->getRepository('Instalacion')->findall();
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


      <div id="resultado3" class="container" style="margin-top: 20px;" >


   
      </div>



   <div id="resultado4" class="container" style="margin-top: 20px;" >


   
      </div>      


               <td>
                <button type="button" class="btn btn-success btn-sm" id="btnnuevainsta"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Nueva Solicitud </button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btneditar"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Editar </button>
              </td>
              <td>

            
                <td>
                <button type="button" class="btn btn-success btn-sm" id="btnaprobarsolicitud"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Aprobar Solicitud</button>
              </td>
               <td>
                <button type="button" class="btn btn-success btn-sm" id="btnhistorial"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Asignar Fecha</button>
              </td>
                <td>
                <button type="button" class="btn btn-success btn-sm" id="btnhistorial"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Historial</button>
              </td>
                  
                <button  type="button" class="btn btn-success btn-sm" id="btncerrarticket"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Eliminar</button>
              </td>

             
<script>

    $.ajaxSetup ({  
        cache: false  
      });
   
    $( document ).ready(function() {

//var tabla2 =null;


  
// paso parametro accion e id

    $('#thetable').find('tr').click(function(){
   var row = $(this).find('td:first').text();
  

       $("#btneditar").one('click',function(){
       var loadUrl = "php/editarinstal.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#resultado3").html(result);
         });
            $.done(function(html){
            $(".tabla").html(html);
             });
        });
  }); 

    $("#btnhistorial").click(function(){

      var loadUrl = "php/reclamosHistorial.php"; // paso parametro accion e id
      $("#resultado4").load(loadUrl); // ejecuto
      }); 

  $("#btnnuevainsta").click(function(){

      var loadUrl = "html/nuevaInstal.html";
      $("#resultado3").load(loadUrl); // ejecuto
      });

  


    
    $('#thetable').find('tr').dblclick(function(){
      var row = $(this).find('td:first').text();

      var loadUrl = "php/editarinstal.php";// paso parametro accion e id

     
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
   

