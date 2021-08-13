
<?php
require_once "../../../../bootstrap.php";
require_once "../../../../Model/Diagnostico.php";
require_once "../../../../Model/Ticket.php";


 $id= htmlspecialchars($_POST['id']);



$diagnostico = $entityManager->getRepository('Diagnostico')->findOneBy(array('id' => $id));

$visita=sizeof($diagnostico->getallvisitas());
$monitoreo=$diagnostico->getmonitoreo();


?>

<script>
   // Guardar la sesion php en js
   localStorage.setItem("id", "<?php echo $id; ?>");  
   localStorage.setItem("visita", "<?php echo $visita; ?>");  
    localStorage.setItem("monitoreo", "<?php echo $monitoreo; ?>");       
</script>

 <div class="modal fade" id="modaldiagnostico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
   <form id="formdiagnostico" class="container">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Diagnostico</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
        <p>Motivo Supuesto de Falla </p>
        <div class="input-group "  style="margin-bottom: 20px;">
        <select id="selectmotivo" name="selectmotivo" class="form-select" aria-label="Default select example">
          <option selected><?php echo $diagnostico->getmotivo();?></option>
          <option value="Infraestructura">Infraestructura </option>
          <option value="Instalacion Cliente">Instalacion Cliente</option>
          <option value="Otros">Otros</option>
          
          
        </select>

        </div>

<div class="form-check" style="margin-bottom: 20px;">
  <input class="form-check-input" type="checkbox" value="" id="chkvt"  name="chkvt">
  <label id="chkvt" name="chkvt" class="form-check-label" for="flexCheckDefault">
  Se Determino Visita Tecnica
  </label>
</div>

<div class="form-check" style="margin-bottom: 20px;">
  <input class="form-check-input" type="checkbox" value="" id="chkmonitoreo" name="chkmonitoreo">
  <label id="chkmonitoreo" name="chkmonitoreo" class="form-check-label" for="flexCheckDefault">
  En Monitoreo
  </label>
</div>

<div class="hidden-md-down" style="margin-bottom: 20px;">
<div class="input-group">
  <span class="input-group-text">Detalle Diagnostico</span>
  <textarea class="form-control" aria-label="With textarea" name="observaciones"><?php echo $diagnostico->getobservaciones();?></textarea>
</div>

</div>

<div class="hidden-md-down">
<div class="input-group">
  <span class="input-group-text">Respuesta del Sector</span>
  <textarea class="form-control" aria-label="With textarea" name="respuesta"><?php echo $diagnostico->getticket()->getrespuesta();?></textarea>
</div>

</div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardar" name="btnguardar">Guardar</button>

        <div id="resultado10" class="container" style="margin-top: 20px;" ></div>
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

             var id= localStorage.getItem("id");
           var visita = localStorage.getItem("visita");
           var monitoreo = localStorage.getItem("monitoreo");

      $(Inicializar);
        function Inicializar() {
            if(visita >0 ) $("#chkvt").prop("checked", true);
            if(monitoreo == "SI")$("#chkmonitoreo").prop("checked", true);

                }

       
       

         $('#modaldiagnostico').modal('show');

         $("#btnguardar").click(function(){

      var loadUrl = "php/ABM/Soporte/Diagnostico/editarDatosDiagnostico.php";// paso parametro accion e id
      var data = $("#formdiagnostico").serializeArray();
        data.push({name: "id", value: id});
     
      $.post(loadUrl, $.param(data) ,function(result) { 
         $("#resultado10").html(result);
      });
      });;  



}); 

</script>
