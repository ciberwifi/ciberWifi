
<?php


require_once "../../../bootstrap.php";
require_once "../../../Model/Instalacion.php";
?>

<style>

  table tr:hover {
  background-color: #CBD1D8;
 
  cursor: pointer;
}

.hideextra { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }

</style>

<h4 style="margin-bottom: 20px;">Solicitudes Instalacion </h4>
           

<span class="border-bottom"></span>

      <div class="tabla table-responsive">
        <?php
       
     $instalaciones = $entityManager->getRepository('Instalacion')->findBy(array('estado' => 'pendiente'));

        ?>

       
        <table id="tablaVentas" class="table table-striped table-sm">
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
       
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($instalaciones as $dato ) {
              ?>
              <td style="visibility: hidden;"> <?php echo $dato->getid();?></td>
                 <td > <div class="hideextra" >  <?php echo $dato->getfecha();?> 
              </div></td>
              <td><?php echo $dato->getzona();?></td>
              <td><?php echo $dato->getapellidoynombre();?></td>
              <td><?php echo $dato->getdni();?></td>
              <td><?php echo $dato->gettel();?></td>
              <td><?php echo $dato->getdireccion();?></td>
              <td><?php echo $dato->getobservaciones();?></td>
              <td><?php echo $dato->getestado();?></td>
       
              </tr>
            <?php
              }
              ?>

       
          
          </tbody>
        </table>
      </div>


      <div id="modalVentas" class="container" style="margin-top: 20px;" >


   
      </div>



     


               <td>
                <button type="button" class="btn btn-success btn-sm" id="btnnuevainsta"  data-bs-toggle="modalVentas" data-bs-target="#modalVentas" >Nueva Solicitud </button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btneditar"  data-bs-toggle="modalVentas" data-bs-target="#modalVentas" >Editar </button>
              </td>
              <td>
            <td> 
                <button  type="button" class="btn btn-success btn-sm" id="btnCerrarVenta"  data-bs-toggle="contenedorVentas" data-bs-target="#contenedorVentas" >Archivar Solicitud</button>
              </td>
            
               <td>
                <button type="button" class="btn btn-success btn-sm" id="btnAsignarFecha"  data-bs-toggle="modalVentas" data-bs-target="#modalVentas" >Asignar Fecha</button>
              </td>
               

               <td>
                <button type="button" class="btn btn-success btn-sm" id="btnInstalacionRealizada"  data-bs-toggle="contenedorVentas" data-bs-target="#contenedorVentas" >Instalacion Realizada!</button>
              </td>
                <td>
                <button type="button" class="btn btn-success btn-sm" id="btnHistorialVentas"  data-bs-toggle="contenedorVentas" data-bs-target="#contenedorVentas" >Historial</button>
              </td>

        <div id="contenedorVentas" class="container" style="margin-top: 20px;" >


   
      </div>          
               
             
<script>

    $.ajaxSetup ({  
        cache: false  
      });
   
    $( document ).ready(function() {

//var tabla2 =null;


  
// paso parametro accion e id

    $('#tablaVentas').find('tr').click(function(){
   var row = $(this).find('td:first').text();
  

       $("#btneditar").one('click',function(){
       var loadUrl = "php/editarinstal.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#modalVentas").html(result);
         });
            $.done(function(html){
            $(".tabla").html(html);
             });
        });

      $("#btnInstalacionRealizada").one('click',function(){
      var loadUrl = "php/ABM/Ventas/instalacionRealizada.php"; // paso parametro accion e id
           var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#contenedorVentas").html(result);
      }); 
    });

         $("#btnCerrarVenta").one('click',function(){
      var loadUrl = "php/ABM/Ventas/cerrarVenta.php"; // paso parametro accion e id
           var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#contenedorVentas").html(result);
      }); 
    });


  }); 

    $("#btnHistorialVentas").click(function(){

      var loadUrl = "php/ABM/Ventas/resultadoVentasHistorial.php"; // paso parametro accion e id
      $("#contenedorVentas").load(loadUrl); // ejecuto
      }); 

  $("#btnnuevainsta").click(function(){

      var loadUrl = "html/nuevaInstal.html";
      $("#modalVentas").load(loadUrl); // ejecuto
      });

  


    
    $('#tablaVentas').find('tr').dblclick(function(){
      var row = $(this).find('td:first').text();

      var loadUrl = "php/ABM/Ventas/editarinstal.php";// paso parametro accion e id

     
      var data= { 'id' : row };
      $.post(loadUrl, data ,function(result) { 
         $("#modalVentas").html(result);
      });

});


     var ultimaFila = null;
        var colorOriginal;
        var fondooriginal;
        $(Inicializar);
        function Inicializar() {
            $('#tablaVentas tr').click(function () {
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
   

