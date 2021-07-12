
<?php
require_once "../bootstrap.php";
require_once "../Model/Ticket.php";



$id= htmlspecialchars($_POST['id']);



$visita= $entityManager->getRepository('VisitaTecnica')->findOneBy(array('id' => $id));



?>

<script>
   // Guardar la sesion php en js
   localStorage.setItem("id", "<?php echo $id; ?>");       
</script>

 <div class="modal fade" id="modalvt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
   <form id="formdiagnostico" class="container">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar Fecha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    

             
  <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Fecha</span>
     <input id="fechavt" name="fechavt" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" placeholder="10/05/2021"  >
        </div>


  <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Franja Horaria</span>
     <input id="horavt" name="horavt" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" placeholder="09:00 a 14:00" >
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

         $('#modalvt').modal('show');

         $("#btnguardar").click(function(){

      var loadUrl = "php/altavt.php";// paso parametro accion e id
      var data = $("#formdiagnostico").serializeArray();
        data.push({name: "id", value: id});
     
      $.post(loadUrl, $.param(data) ,function(result) { 
         $("#resultado2").html(result);
      });
      });;  



}); 

</script>
