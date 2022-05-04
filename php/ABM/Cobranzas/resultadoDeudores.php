<?php


require_once "../../../bootstrap.php";
require_once "../../../Model/Suscripcion.php";
require_once "../../../Model/Cliente.php";
require_once "../../../Model/Ticket.php";
require_once "../../../Model/Pago.php";
require_once "../../../Model/Bajas.php";
?>

<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/DataTables/1.11.2/css/dataTables.bootstrap4.min.css">
  <script src="bootstrap/DataTables/1.11.2/js/jquery.dataTables.min.js"></script>
  <script src="bootstrap/DataTables/1.11.2/js/dataTables.bootstrap4.min.js"></script>
</head>

<style>

.hideextra { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }

    #tabladeudores tbody tr:hover  {
       background-color: #297D18;
       color:white;
       cursor: pointer;
   }

</style>


<body>
<h4 style="margin-bottom: 30px; margin-left: -5%;">Deudores a la Fecha</h4>

<span class="border-bottom"></span>

   
      <div class="table-responsive"  style="margin-left: -3%;">
          <table id="tabladeudores" class="table table-striped table-sm  align-middle" >
            <?php

             $clientes = $entityManager->getRepository('Cliente')->findAll();
             

            ?>
          <thead>
            <tr>
               <th style="visibility: hidden;">Id</th>

              <th>Zona</th>
              <th>IP</th>
              <th>Apellido Y Nombre</th>
              <th>Plan </th>
              <th>Saldo Vencido</th>
              <th>Saldo</th>
              <th>Link</th>  
            </tr>
          </thead>
          <tbody  id="resultadodeudores">
            <tr>
              <?php foreach($clientes as $dato ) {

               
                $id=$dato->getid();
                $baja=$entityManager->getRepository('Bajas')->findOneBy(array('cliente' => $id ));

                  if(is_null($baja)) {
                $saldo=$dato->getsuscripcion()->getSaldo();

                    if( $saldo<0 ) {

               ?>
               <td style="visibility: hidden;"> <?php echo $dato->getid();?></td>
                <td > <?php echo $dato->getzona();?> </td>
                 <td > <?php echo $dato->getidip();?> </td>
               <td > <?php echo $dato->getapellidoynombre();?> </td>
                <td > <?php echo $dato->getsuscripcion()->getidPlan()->getmonto();?> </td>
                <td> <?php echo $dato->getsuscripcion()->getSaldovencido();?> </td>
              <td> <?php echo $dato->getsuscripcion()->getSaldo();?> </td>
            <td> <?php echo $dato->getlinkpago();?> </td>
              </tr>
            <?php
              }
              }
              }
              ?>

       
        
          </tbody>
        </table>
        
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
      


    $('#tabladeudores').find('tr').click(function(){
  
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

   

  



$('#tabladeudores').DataTable( {
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
   

