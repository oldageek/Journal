<?php


$email = $_GET['email'];
$usuario = $_GET['usuario'];
$password = $_GET['password'];

require 'PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.webmilab.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 26;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "contacto@webmilab.com";
//Password to use for SMTP authentication
$mail->Password = "Ah@\R6D!<31H";
//Set who the message is to be sent from
$mail->setFrom('registro@fepro.cs.buap.mx', 'REGISTRO FEPRO 2017');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($email, 'Participante FEPRO');
//Set the subject line
$mail->Subject = 'Registro FEPRO 2017 ';
//Read an HTML message body from an external file, convert referenced images to embedded,
//$mail->msgHTML(file_get_contents('body.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = '
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>REGISTRO FEPRO 2017</title>
        </head>
        <body>
            <div style="text-align:center;width: 100%; font-family: Arial, Helvetica, sans-serif;">
                <h1>¡Registro exitoso!</h1>
                <div align="center">
                    <a href="http://fepro.cs.buap.mx/2017/"><img src="http://fepro.cs.buap.mx/2017/assets/img/logo.png" height="200" width="250" alt="PHPMailer rocks"></a>
                </div>

                <p>Estimado participante, tu registro a la  <a href="http://fepro.cs.buap.mx/2017/">X Competencia de Feria de Proyectos - FEPRO 2017</a> ha sido exitoso.<br><br> Tus datos de acceso son: usuario ['.$usuario.'] y password ['.$password.'], pulsa  <a href="http://fepro.cs.buap.mx/2017/participante.php">aquí</a> para ingresar.</p>
                <p>A la brevedad verifica que la información de tu proyecto esté completa en el Sistema de Participantes, tienes hasta el día 3 de agosto para hacerlo.</p>

                <p><b>NOTA:</b> en caso de no tener la información completa, tu equipo será dado de baja y quedarás fuera de la competencia.</p>

                <p>Si tienes dudas o comentarios escríbenos a: <b>contacto.fepro@gmail.com</b></p>

            </div>
        </body>
        </html>
';
$mail->IsHTML(true); 
$mail->AltBody = 'This is a plain-text message body';


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

