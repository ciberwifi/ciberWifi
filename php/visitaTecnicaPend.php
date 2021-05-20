
<?php

require_once "../bootstrap.php";
require_once "../Model/Ticket.php";
require_once "../Model/Diagnostico.php";





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
$visitas = $entityManager->getRepository('VisitaTecnica')->findall();

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
               <td style="visibility: hidden;"> <?php echo $dato->getdiagnostico()->getid();?></td>
              <td><?php echo $dato->getdiagnostico()->getticket()->getfecha();?></td>
              <td><?php echo $dato->getdiagnostico()->getticket()->getcliente()->getzona();?></td>
               <td><?php echo $dato->getdiagnostico()->getticket()->getip();?></td>
              <td><?php echo $dato->getdiagnostico()->getticket()->getcliente()->getapellidoynombre();?></td>
              <td><?php echo $dato->getdiagnostico()->getticket()->getmotivo();?></td>
              <td><?php echo $dato->getdiagnostico()->getmotivo();?></td>
              <td><?php echo $dato->getestado();?></td>
              <td> <?php echo $dato->getfecha()." ".$dato->gethora();?> </td>
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
                <button type="button" class="btn btn-success btn-sm" id="btnasignarfechavt"  data-bs-toggle="modal" data-bs-target="#exampleModal" >Asignar Fecha </button>
              </td>
         
<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {




 $('#tablavisitastecnicas').find('tr').click(function(){
   var row = $(this).find('td:first').text();
  


       $("#btnasignarfechavt").one('click',function(){
       var loadUrl = "php/editarvt.php";
        var data= { 'id' : row };
          $.post(loadUrl, data ,function(result) { 
          $("#resultado3").html(result);
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
   

