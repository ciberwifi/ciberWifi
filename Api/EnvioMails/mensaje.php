<?php



require_once "../../bootstrap.php";
require_once "../../Model/Cliente.php";

/*

$clientes=$entityManager->getRepository('Cliente')->findall();



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


*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../../vendor/autoload.php";

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
    $mail->Password = 'metafisica19899';

    // Configure Email
    $mail->setFrom('ciberwifiredes@gmail.com', 'CiberWifi');
    $mail->addAddress('tigra.gata89@gmail.com');
    $mail->Subject = 'Nuevos Costos A partir de Diciembre 2021';
    $mail->isHTML(true);
    $mail->Body = 'Prueba';

    // send mail
    $mail->Send();
    echo 'Message has been sent using SMTP Server';
} catch (Exception $e) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>





  