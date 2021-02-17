<?php

require("base.php");

 $dni= htmlspecialchars($_POST['imptDni']);

$cliente=buscarCliente($dni);

?>

<h4>Cliente</h4>

<span class="border-bottom"></span>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>IP</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>direccion</th>
              <th>Plan</th>
              <th>Mensual</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> <?php echo $cliente->getip();?> </td>
              <td><?php echo $cliente->getnombre();?></td>
              <td><?php echo $cliente->getapellido();?></td>
              <td><?php echo $cliente->getdireccion();?></td>
              <td><?php echo $cliente->getplan();?></td>
              <td><?php echo "$". $cliente->getmonto();?></td>
            </tr>
          <tr>
          </tbody>
        </table>
      </div>