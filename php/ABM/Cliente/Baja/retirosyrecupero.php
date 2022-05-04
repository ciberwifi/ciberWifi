
<?php


require_once "../../../../bootstrap.php";
require_once "../../../../Model/Retiro.php";
require_once "../../../../Model/Cliente.php";
require_once "../../../../Model/Ticket.php";

?>
<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/DataTables/1.11.2/css/dataTables.bootstrap4.min.css">
  <script src="bootstrap/DataTables/1.11.2/js/jquery.dataTables.min.js"></script>
  <script src="bootstrap/DataTables/1.11.2/js/dataTables.bootstrap4.min.js"></script>
</head>

<style>
/*
  table tbody tr:hover {
  background-color: #297D18;
 
  cursor: pointer;
}
*/
.hideextra { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }

    #tablaReclamos tbody tr:hover  {
       background-color: #297D18;
       color:white;
       cursor: pointer;
   }

   

</style>
<body>

<h5 style="margin-bottom: 30px; margin-left: -5%;">Bajas y Recupero: Retiros y Recupero</h4>

<span class="border-bottom"></span>


      <div class="table-responsive"  style="margin-top:5%;margin-left: -3%;">
        

        <table id="tablaRetiros" class="table table-striped table-sm  align-middle" >
            <?php
        $bajas = $entityManager->getRepository('Retiro')->findall();
        
        ?>
          <thead>
            <tr>
               <th style="visibility: hidden;">Id</th>

              <th>Fecha</th>
              <th>Zona</th>
              <th>Apellido y Nombre</th>
              <th>Direccion</th>
              <th>Tel</th>
              <th>Mac</th>
              <th>Wifi</th>
              <th>Estabilizador</th>
              <th>Antena</th>
              <th>Estado</th>
                
            </tr>
          </thead>
          <tbody  id="resultadoRetiros">
            <tr>
              <?php foreach($bajas as $dato ) {
              ?>
               <td style="visibility: hidden;"> <?php echo $dato->getid();?></td>
              <td > <div class="hideextra" >  <?php echo $dato->getfecha();?> 
              </div></td>
              <td> <?php echo $dato->getzona();?> </td>
              <td> <?php echo $dato->getapellidoynombre();?> </td>
              <td><?php echo $dato->getdireccion();?></td>
              <td><?php echo $dato->gettel();?></td>
              <td><?php echo $dato->getmacwan();?></td>
              <td><?php echo $dato->getwifi();?></td>
              <td><?php echo $dato->getestabilizador();?></td>
              <td><?php echo $dato->getantena();?></td>
              <td><?php echo $dato->getestado();?></td>
             
              </tr>
            <?php
              }
              ?>

       
        
          </tbody>
        </table>
        
      </div>
   

      <div id="modalBajas" class="container" style="margin-top: 20px;" >


   
      </div>

               <td>
                <button type="button" class="btn btn-success btn-sm" id="btneditarBaja"  data-bs-toggle="modalBaja" data-bs-target="#modalBajas" >Editar</button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btningresarretiro"  data-bs-toggle="contenedorBajas" data-bs-target="#contenedorReclamo">Ingresar Retiro</button>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm" id="btnhistorialbajas"  data-bs-toggle="contenedorBajas" data-bs-target="#contenedorReclamo" >Historial</button>
              </td>

       
       <div id="contenedorBajas" class="container" style="margin-top: 20px;" >


   
      </div>     

<script>

    $.ajaxSetup ({  
        cache: false  
      });
    $( document ).ready(function() {

  var ultimaFila = null;   
  var row = -1;
  var colorOriginal ;
  var fondooriginal ;
      


    $('#tablaRetiros').find('tr').click(function(){
  
    row = $(this).find('td:first').text();
    fondooriginal = 'white' ;

    if (ultimaFila != null) {
        ultimaFila.css('background-color', fondooriginal)
        ultimaFila.css('color', colorOriginal)
        }
     if(row % 2 !== 0)fondooriginal ='black';   
        colorOriginal = 'black';
        $(this).css('background-color','#297D18');
        $(this).css('color','white');
        ultimaFila = $(this);

   });

  
   


    $("#btnhistorialbajas").click(function(){

      var loadUrl = "php/Tablas/reclamosHistorial.php"; // paso parametro accion e id
      $("#contenedorReclamo").load(loadUrl); // ejecuto
      }); 

  
            $("#btneditarBaja").click(function(){

              if(row!=-1){

                var loadUrl = "php/ABM/Cliente/Baja/editarbaja.php";
                var data= { 'id' : row };
                $.post(loadUrl, data ,function(result) { 
                $("#modalBajas").html(result);
                  });
              row=-1;
             // $('#tablaReclamos').DataTable().ajax.reload();
              }else{ 
                alert("Debe Seleccionar una baja Editar");
              }

        });


         
      
           $("#btndiagnosticar").click(function(){
 
              if(row!=-1){ 
                var loadUrl = "php/ABM/Soporte/Diagnostico/nuevodiagnostico.php"; // paso parametro accion e id
                var data= { 'id' : row };
                $.post(loadUrl, data ,function(result) { 
                $("#modalReclamo").html(result);
                });
              row=-1;
              }else{ 
                 alert("Debe Seleccionar un reclamo a Diagnosticar");
              }
          }); 

           $("#btncerrarticket").click(function(){
             if(row!=-1){ 
              var loadUrl = "php/ABM/Soporte/cerrarTicket.php"; // paso parametro accion e id
               var data= { 'id' : row };
              $.post(loadUrl, data ,function(result) { 
              $("#contenedorReclamo").html(result);
               }); 

             row=-1;
             }else{ 
              alert("Debe Seleccionar un reclamo a Diagnosticar");
              }
          }); 
       
 
  

    $('#tablaReclamos').find('tr').dblclick(function(){
      var row = $(this).find('td:first').text();
      var loadUrl = "php/ABM/Soporte/editarreclamo.php";// paso parametro accion e id
      var data= { 'id' : row };
      $.post(loadUrl, data ,function(result) { 
         $("#modalReclamo").html(result);
      });
      row=-1;
          

});


  



$('#tablaRetiros').DataTable( {
        "language": {
            "lengthMenu": "Cantidad de Registros _MENU_ ",
            "zeroRecords": "Nothing found - sorry",
            "info": "Viendo pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
             "search": "Buscar:",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
        }
    } );


      
    

     

   


  }); 

</script>
   

