<?php



require_once "../../bootstrap.php";
require_once "../../Model/Cliente.php";
require_once "../../Model/Ticket.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../../vendor/autoload.php";

ini_set('max_execution_time',1500);


$clientes=$entityManager->getRepository('Cliente')->findall();

foreach($clientes as $cliente ) {

$cartera=$cliente->getsuscripcion()->getcartera();
$costo=$cliente->getsuscripcion()->getidplan()->getmonto();
$email=$cliente->getemail();
$apellidoynombre= $cliente->getapellidoynombre();
$descripcion=$cliente->getsuscripcion()->getidplan()->getdescripcion();

if($cartera==2) {
    if(strcmp($descripcion,"10M")==0){

$mail = new PHPMailer(true);

try {
    // Configure PHPMailer
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Configure SMTP Server
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'ciberwifiredes@gmail.com';
    $mail->Password = 'metafisica198999';

    // Configure Email
    $mail->setFrom('ciberwifiredes@gmail.com', 'CiberWifi');
    $mail->addAddress($email);
    $mail->Subject = '-De CiberWifi- Nuevos Costos y promociones a partir de Mayo 2022 ';
    $mail->isHTML(true);
    $mail->Body = '

   <html lang="en"> 
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inicio</title>
 
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
  

 </head>
    
<body class="container">

<div style="text-align:center; background-color:#010101; border-color: #062A20; border-style:double; color: white ; border-radius: 15% 5% 15% 5%; margin:5% 20% 20% 20%;" >

<h3>Estimado Usuario</h3>

<p>El nuevo costo de su plan a partir de Mayo 2022 pasara a ser:  '.$costo.' </p>

<p>Aumenta Tu Plan un 50% con esta promo! $1690 Mensual *</p> 

<p>*Plan Sujeto a disponibilidad tecnica y geografica  </p>
<p>Solicitanos info por este medio para acceder a la promo!</p>

<p>Estamos a su disposicion para cualquier consulta por nuestros canales Habilitados
Whatsapp: 1144379572 Instagram @ciberwifiredes  </p>

<p>Saluda atentamente: El equipo de CiberWifi</p>

</div>

</body> 
</html>

';

    // send mail
    $mail->Send();
    echo 'Message has been sent using SMTP Server'."<br>";
} catch (Exception $e) {
   echo 'Mailer Error: ' . $mail->ErrorInfo."Cliente Error ".$cliente->getemail()."<br>";

}

unset($mail);

} 
}
} 
?>





  