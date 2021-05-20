
<?php



require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Ticket.php";



 $dni= htmlspecialchars($_POST['imptDni']);
 


$clientes=array();




if (sizeof($clientes) === 0) {
$qb = $entityManager->createQueryBuilder();
$clientes=$qb->select('c')
   ->from('Cliente', 'c')
   ->where($qb->expr()->like('c.apellidoynombre', ':element'))
   ->setParameter('element', '%' . $dni . '%')
   ->getQuery()
  ->getResult()
;

if (sizeof($clientes) === 0){
$qb = $entityManager->createQueryBuilder();
   $clientes=$qb->select('c')
   ->from('Cliente', 'c')
   ->where($qb->expr()->like('c.direccion', ':element'))
   ->setParameter('element', '%' . $dni . '%')
   ->getQuery()
  ->getResult()
;

}
}

$cliente = $entityManager->getRepository('Cliente')->findOneBy(array('idip' => $dni));


if ($cliente === null) {
$cliente = $entityManager->getRepository('Cliente')->findOneBy(array('dni' => $dni));
}

if ($cliente !==null) {
array_push($clientes,$cliente);
}


if (sizeof($clientes) === 0) {
    echo "El cliente selecionado no existe.\n";
    exit(1);
}




?>



<h4>Clientes</h4>





<span class="border-bottom"></span>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Zona</th>
              <th>IP</th>
              <th>Apellido y Nombre</th>
              <th>Dni</th>
              <th>Telefonos</th>
              <th>Direccion</th>
              <th>Medios Pago</th>
              
            </tr>
          </thead>
         
         <tbody>
             <?php foreach($clientes as $cliente ) { ?>
            <tr>
              <td> <?php echo $cliente->getzona();?> </td>
              <td> <?php echo $cliente->getidip();?> </td>
              <td><?php echo $cliente->getapellidoynombre();?></td>
              <td><?php echo $cliente->getdni();?></td>
              <td><?php echo $cliente->gettel();?></td>
              <td><?php echo $cliente->getdireccion();?></td>
              <td><?php echo $cliente->getmediospago();?></td>
              
            </tr>
            <?php } ?>
      
          </tbody>
        </table>
      </div>


<?php

if (sizeof($clientes) === 1) {
    $tickets = $cliente->getalltickets();
    $cantTickets=sizeof($tickets);

if($cantTickets>0){


?>

  <h5>Tickets Ingresados</h5>

  <span class="border-bottom"></span>
  <div class="table-responsive">
        <table class="table table-striped table-sm">
        
           <thead>
            <tr>
              <th>Fecha</th>
              <th>IP</th>
              <th>Motivo</th>
              <th>Observaciones</th>
              <th>Estado</th>
         
              
            </tr>
          </thead>

            <tbody>
            <tr>
              <?php foreach($tickets as $dato ) {
              ?>
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



  <?php
              }
              } 

              ?>
