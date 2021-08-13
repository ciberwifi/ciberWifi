
<?php

require_once "../../../../bootstrap.php";
require_once "../../../../Model/Diagnostico.php";
require_once "../../../../Model/VisitaTecnica.php";




?>
<style>

  table tr:hover {
  background-color: #CBD1D8;
 
  cursor: pointer;
}

</style>

<h4 style="margin-bottom: 30px;">Visitas Tecnicas

              </h4>

<?php
$visitas1 = $entityManager->getRepository('VisitaTecnica')->findBy(array('estado' => 'pendiente'));
$visitas2 = $entityManager->getRepository('VisitaTecnica')->findBy(array('estado' => 'Fecha Asignada'));
 
         $visitas=array_merge($visitas1, $visitas2);

?>              

<span class="border-bottom"></span>

      <div class="table-responsive">
        <table id="tablavisitastecnicas" class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="visibility: hidden;">Id</th>
              <th>Fecha Reclamo</th>
              <th>Zona</th>
              <th>Ip</th>
              <th>Apellido</th>
              <th>Direccion</th>
              <th>Reclamo</th>
              <th>Diagnostico</th>
              <th>Estado</th>
              <th>Fecha Programada</th>
               
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach($visitas as $dato ) {
              ?>
               <td style="visibility: hidden;"> <?php echo $dato->getid();?></td>
              <td><?php echo $dato->getdiagnostico()->getticket()->getfecha();?></td>
              <td><?php echo $dato->getdiagnostico()->getticket()->getcliente()->getzona();?></td>
               <td><?php echo $dato->getdiagnostico()->getticket()->getip();?></td>
              <td><?php echo $dato->getdiagnostico()->getticket()->getcliente()->getapellidoynombre();?></td>
               <td><?php echo $dato->getdiagnostico()->getticket()->getcliente()->getdireccion();?></td>
              <td><?php echo $dato->getdiagnostico()->getticket()->getmotivo();?></td>
              <td><?php echo $dato->getdiagnostico()->getmotivo();?></td>
              <td><?php echo $dato->getestado();?></td>
              <td> <?php echo $dato->getfecha()." ".$dato->gethora();?> </td>
              </tr>
            <?php
              }
              ?>

       
        
          </tbody>
        </table>
      </div>


      <div id="resultadovt" class="container" style="margin-top: 20px;" >


   
      </div>



 <td>
    <button type="button" class="btn btn-success btn-sm" id="btnasignarfechavt"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Asignar Fecha </button>
</td>

 <td>
    <button type="button" class="btn btn-success btn-sm" id="btneditarfechavt"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Editar Fecha </button>
</td>


 <td>
    <button type="button" class="btn btn-success btn-sm" id="btnvtrealizada"  data-bs-toggle="modal" data-bs-target="#exampleModal"> Visita Realizada  </button>
</td>

<td>
    <button type="button" class="btn btn-success btn-sm" id="btnhistorialvt"  data-bs-toggle="modal" data-bs-target="#exampleModal"> Historial  </button>
</td>
         
<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {




 $('#tablavisitastecnicas').find('tr').click(function(){
   var row = $(this).find('td:first').text();
  


       $("#btnasignarfechavt").one('click',function(){
       var loadUrl = "php/asignarFechaVT.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#resultadovt").html(result);
          });
          });

        $("#btneditarfechavt").one('click',function(){
       var loadUrl = "php/editarFechaVT.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#resultadovt").html(result);
          });
          });

          $("#btnvtrealizada").one('click',function(){
       var loadUrl = "php/visitaRealizada.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#resultadovt").html(result);
          });
          });



  }); 


 var ultimaFila = null;
        var colorOriginal;
        var fondooriginal;
        $(Inicializar);
        function Inicializar() {
            $('#tablavisitastecnicas tr').click(function () {
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
   

