<?php
require_once "../../../../bootstrap.php";
require_once "../../../../Model/Instalacion.php";



$id= htmlspecialchars($_POST['id']);



$instalacion = $entityManager->getRepository('Instalacion')->findOneBy(array('id' => $id));



?>

<script>
   // Guardar la sesion php en js
   localStorage.setItem("id", "<?php echo $id; ?>");       
</script>



 <div class="modal fade" id="modalsolicitudinstalacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
   <form id="formsolinstal" class="container">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Solicitud</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

       
     <div class="modal-body">
         <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Zona</span>
     <input id="impzona" name="impzona" type="text" class="form-control" placeholder="Lafe" aria-label="Username" aria-describedby="basic-addon1" value= "<?php echo $instalacion->getzona();?>">
        </div>

         <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Apellido y Nombre</span>
     <input id="impapellidoynombre" name="impapellidoynombre" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value= "<?php echo $instalacion->getapellidoynombre();?>">
        </div>

         

         <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Dni</span>
     <input id="impdni" name="impdni" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value= "<?php echo $instalacion->getdni();?>">
      <span class="input-group-text" id="basic-addon1">Tel</span>
     <input id="imptel" name="imptel" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value= "<?php echo $instalacion->gettel();?>">
        </div>
      

         <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Direccion</span>
     <input id="impdireccion" name="impdireccion" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value= "<?php echo $instalacion->getdireccion();?>">
        </div>

       
      
  






<div class="input-group">
  <span class="input-group-text">Observaciones</span>
  <textarea class="form-control" aria-label="With textarea" name="observaciones"  ><?php echo $instalacion->getobservaciones();?></textarea>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardar" name="btnguardar">Guardar</button>
        <div id="resultado2" class="container" style="margin-top: 20px;" ></div>
      </div>

    </div>

  </div>


    </form>





   



</div>







<script>

    $.ajaxSetup ({  
        cache: false  
         });

    $( document ).ready(function(e) {

   // Sacar valor
   var id = localStorage.getItem("id");

         $('#modalsolicitudinstalacion').modal('show');

         $("#btnguardar").click(function(){

      var loadUrl = "php/altaSolicitudInstalacion.php";// paso parametro accion e id
      var data = $("#formsolinstal").serializeArray(); 
      data.push({name: "id", value: id});

      $.post(loadUrl,$.param(data) ,function(result) { 
         $("#resultado2").html(result);
      });
      });  



}); 

</script>
