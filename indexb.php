<!DOCTYPE html>

<html> 
    <head>
        <meta charset="utf-8">
        <title>Inicio</title>
  <link  href="js/jquery-ui.css" rel="stylesheet">
  <link href="js/jquery-ui.theme.css" rel="stylesheet" >
 

    </head>
    
 <body>
     <script src="js/external/jquery/jquery.js"></script>		
     
       
<header class="ui-widget-header" > 
     <h1  >CiberWifi</h1> 
				
       <nav class="ui-menu">
         <ul >
		<li><a href="#Cobranzas" id="btnCobranzas">Cobranzas</a></li>  
         <li><a href="#AFIP" id="btnAfip">Facturacion</a></li>  
         <li><a href="#Atc" id="btnAtc"  >Modulo ATC</a></li>				
		<li><a href="#Clientes" id="btnClientes"  >Clientes</a></li>
		</ul>
      </nav>
   </header> 
   	
 <script>
           $.ajaxSetup ({  
				cache: false  
			});
           $( document ).ready(function() {
 
    // Your code here.
 

			var ajax_load = "<img src='img/indicator_white_small' alt='loading...' />"; 
			
			$("#btnCobranzas").click(function(){
			var loadUrl = "src/vista/cobranzas/botonerasLaterales/vistaBotoneraLateralCobranzas.php"; // paso parametro accion e id
					$("#ajaxBotoneraLateral").load(loadUrl); // ejecuto
			});	
				$("#btnAfip").click(function(){
					var loadUrl = "src/vista/facturacion/vistaFacturacionElectronica.php"; // paso parametro accion e id
					$("#ajaxMainContenedor").load(loadUrl); // ejecuto
					
			});	
			$("#btnClientes").click(function(){
					var loadUrl = "src/vista/vistaBuscarCliente.php"; // paso parametro accion e id
					$("#ajaxMainContenedor").load(loadUrl); // ejecuto
					
			});	
			
		});		
        </script>

</body>
</html>