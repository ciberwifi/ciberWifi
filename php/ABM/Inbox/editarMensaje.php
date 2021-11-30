<?php
require_once "../../../../bootstrap.php";
require_once "../../../../Model/Cliente.php";
require_once "../../../../Model/Bajas.php";
require_once "../../../../Model/Ticket.php";



$id= htmlspecialchars($_POST['id']);



$baja= $entityManager->getRepository('Bajas')->findOneBy(array('id' => $id));


?>

<script>
   // Guardar la sesion php en js
   localStorage.setItem("id", "<?php echo $id; ?>");       
</script>

 <div class="modal fade" id="modalEditarBaja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
   <form id="formEditarBaja" class="container">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Baja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
    



<div class="input-group">
  <span class="input-group-text">Observaciones</span>
  <textarea class="form-control" aria-label="With textarea" name="observaciones"><?php echo $baja->getobservaciones();?></textarea>
</div>
<div class="input-group">
  <span class="input-group-text">Disponibilidad Horaria</span>
  <textarea class="form-control" aria-label="With textarea" name="disponibilidad"><?php echo $baja->getdisponibilidad();?></textarea>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modalEditarBajas" id="btncerrar" name="btncerrar">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnEditarBaja" name="btnEditarBaja">Guardar</button>
        <div id="contenedorEditarBaja" class="container" style="margin-top: 20px;" ></div>
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
         

         $('#modalEditarBaja').modal('show');

    $("#btnEditarBaja").click(function(){

      var loadUrl = "php/ABM/Cliente/Baja/solicitudBajaCliente.php";// paso parametro accion e id
      var data = $("#formEditarBaja").serializeArray(); 
      data.push({name: "id", value: id});

      $.post(loadUrl,$.param(data) ,function(result) { 
         $("#contenedorEditarBaja").html(result);
      });
      });  


 $("#btncerrar").click(function(){
  $('#modalEditarBaja').modal('hide');
 });  


}); 

</script>
