<?php
require_once "../bootstrap.php";
require_once "../Model/Cliente.php";
require_once "../Model/Ticket.php";



$id= htmlspecialchars($_POST['id']);



$reclamo= $entityManager->getRepository('Ticket')->findOneBy(array('id' => $id));


?>

<script>
   // Guardar la sesion php en js
   localStorage.setItem("id", "<?php echo $id; ?>");       
</script>

 <div class="modal fade" id="modalreclamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
   <form id="formreclamo" class="container">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Reclamo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
    



<div class="input-group">
  <span class="input-group-text">Detalle</span>
  <textarea class="form-control" aria-label="With textarea" name="observaciones"><?php echo $reclamo->getobservaciones();?></textarea>
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

    $( document ).ready(function() {

    var id = localStorage.getItem("id");
         

         $('#modalreclamo').modal('show');

    $("#btnguardar").click(function(){

      var loadUrl = "php/altareclamo.php";// paso parametro accion e id
      var data = $("#formreclamo").serializeArray(); 
      data.push({name: "id", value: id});

      $.post(loadUrl,$.param(data) ,function(result) { 
         $("#resultado2").html(result);
      });
      });  



}); 

</script>
