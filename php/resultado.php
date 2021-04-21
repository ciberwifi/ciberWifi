
<?php



require_once "../bootstrap.php";
require_once "../Model/Cliente.php";


 $id= htmlspecialchars($_POST['imptDni']);

$cliente = $entityManager->findBy('Cliente', $id);


if ($cliente === null) {
    echo "No product found.\n";
    exit(1);
}



?>

<h4>Cliente</h4>

<span class="border-bottom"></span>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>IP</th>
              <th>Apellido y Nombre</th>
              <th>direccion</th>
              <th>Plan</th>
              <th>Mensual</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> <?php echo $cliente->getidip();?> </td>
              <td><?php echo $cliente->getapellidoynombre();?></td>
              <td><?php echo $cliente->getdireccion();?></td>
              
            </tr>
          <tr>
          </tbody>
        </table>
      </div>



   

