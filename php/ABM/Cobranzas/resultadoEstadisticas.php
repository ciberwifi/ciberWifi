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
<h5 style="margin-bottom: 30px; margin-left: -5%;">Cobranzas: Estadisticas por Cartera</h5>

<span class="border-bottom"></span>

   
      <div class="table-responsive"  style="margin-left: -3%;">
          
            <?php

            $totalNeto1= 0; $totalNeto2= 0; $totalComisiones1= 0; $totalComisiones2= 0; $totalBruto1= 0; $totalBruto2 = 0; $cantidad1=0; $cantidad2=0; $deudores1=0; $deudores2=0;
            $plan1M1=0; $plan2M1=0; $plan3M1=0; $plan5M1=0; $plan10M1=0;
            $plan1M2=0; $plan2M2=0; $plan3M2=0; $plan5M2=0; $plan10M2=0;

            $fecha1= '2022-04-01';
            $fecha2= '2022-04-26';

            $qb = $entityManager->createQueryBuilder();
              $pagos=$qb->select('p')
              ->from('Pago', 'p')
              ->where($qb->expr()->between('p.fecha', ':fecha1', ':fecha2'))
              ->setParameter('fecha1',  $fecha1 )
              ->setParameter('fecha2',  $fecha2 )
              ->getQuery()
              ->getResult()
              ;


            foreach($pagos as $pago ) {

               $cartera= $pago->getsuscripcion()->getcartera();
               if($cartera==1){
                $totalNeto1= $totalNeto1+$pago->getneto();
                $totalComisiones1=$totalComisiones1+$pago->getcomision();
                $totalBruto1=$totalBruto1+$pago->getbruto();
                $cantidad1++;
                }
                if($cartera==2){
                $totalNeto2= $totalNeto2+$pago->getneto();
                $totalComisiones2=$totalComisiones2+$pago->getcomision();
                $totalBruto2=$totalBruto2+$pago->getbruto();
                $cantidad2++;
                }

                }

            $clientes = $entityManager->getRepository('Cliente')->findAll();   
            foreach($clientes as $dato ) {
              $id=$dato->getid();
              $baja=$entityManager->getRepository('Bajas')->findOneBy(array('cliente' => $id ));

              if(is_null($baja)) {

              $saldo=$dato->getsuscripcion()->getSaldo();
              if( $saldo<0 ) {
                 $cartera= $dato->getsuscripcion()->getcartera();   
                 if($cartera==1)$deudores1++;
                 if($cartera==2)$deudores2++;
                 }
              
             $descripcion=$dato->getsuscripcion()->getidPlan()->getdescripcion(); 
            
              if($cartera==1) {
              if(strcmp($descripcion,"3Mx1M")==0)$plan1M1++;
              if(strcmp($descripcion,"3Mx2M")==0)$plan2M1++;
              if(strcmp($descripcion,"3M")==0)$plan3M1++;
              if(strcmp($descripcion,"5M")==0)$plan5M1++;
              if(strcmp($descripcion,"10M")==0)$plan10M1++;
                 }
              
              if($cartera==2) {
              if(strcmp($descripcion,"3Mx1M")==0)$plan1M2++;
              if(strcmp($descripcion,"3Mx2M")==0)$plan2M2++;
              if(strcmp($descripcion,"3M")==0)$plan3M2++;
              if(strcmp($descripcion,"5M")==0)$plan5M2++;
              if(strcmp($descripcion,"10M")==0)$plan10M2++;
                 }    

              }
              }



               ?>

     
    

    <table class="table table-striped table-sm  align-middle" >
     <h6 >Cartera1:</h6> 
    <tbody>
    <td>
    <h6 >Composicion Cartera:</h6> 
    <h7 >Total Clientes: <?php echo $plan1M1+$plan2M1+$plan3M1+$plan5M1+$plan10M1 ?></h7>   </br>  
    <h7 >Cantidad Plan 3M x1M: <?php echo $plan1M1 ?></h7>   </br>   
    <h7 >Cantidad Plan 3M x2M: <?php echo $plan2M1 ?></h7>   </br>     
    <h7 >Cantidad Plan 3M: <?php echo $plan3M1 ?></h7>   </br>
    <h7 >Cantidad Plan 5M: <?php echo $plan5M1 ?></h7>   </br>      
    <h7 >Cantidad Plan 10M: <?php echo $plan10M1 ?></h7>   </br>   
    </td>

    <td> 
      <h6 >Facturacion:</h6> 
     <h7 >Total Neto: <?php echo $totalNeto1 ?></h7>  </br>       
     <h7 >Total Comisiones: <?php echo $totalComisiones1 ?></h7> </br>
     <h7 >Total Bruto: <?php echo $totalBruto1 ?></h7>   </br>  
     <h7 >Cantidad Cobros: <?php echo $cantidad1 ?></h7>   </br>        
     <h7 >Cantidad Deudores: <?php echo $deudores1 ?></h7>   </br>   
    </td>    
</tbody>
 </table>    
 
    
    <table class="table table-striped table-sm  align-middle" >
     <h6 >Cartera2:</h6> 
     <tbody>
    <td>
    <h6 >Composicion Cartera:</h6> 
     <h7 >Total Clientes: <?php echo $plan1M2+$plan2M2+$plan3M2+$plan5M2+$plan10M2 ?></h7>   </br>  
      <h7 >Cantidad Plan 3M x1M: <?php echo $plan1M2 ?></h7>   </br> 
    <h7 >Cantidad Plan 3M x2M: <?php echo $plan2M2 ?></h7>   </br>     
    <h7 >Cantidad Plan 3M: <?php echo $plan3M2 ?></h7>   </br>
    <h7 >Cantidad Plan 5M: <?php echo $plan5M2 ?></h7>   </br>      
    <h7 >Cantidad Plan 10M: <?php echo $plan10M2 ?></h7>   </br>
     </td>  
    <td>
      <h6 >Facturacion:</h6>
     <h7 >Total Neto: <?php echo $totalNeto2 ?></h7>  </br>       
     <h7 >Total Comisiones: <?php echo $totalComisiones2 ?></h7> </br>
     <h7 >Total Bruto: <?php echo $totalBruto2 ?></h7>   </br>    
      <h7 >Cantidad Cobros: <?php echo $cantidad2 ?></h7>   </br>
      <h7 >Cantidad Deudores: <?php echo $deudores2 ?></h7>   </br>
      
    </td>  

  </tbody>
  </table>    
      </div>



   

     

   

