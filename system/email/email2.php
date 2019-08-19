<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

if (empty($_GET['email'])) {
	echo '<script type="text/javascript">window.location="index.php";</script>';
}else{

	require 'PHPMailerAutoload.php';

	//require("includes/mysql_connect.php");


	$email = $_GET['email'];

/*
	$query = "SELECT idParticipante, nombre, apellidop, apellidom FROM participante WHERE email='$email'";
	$result =  mysqli_query($dbc, $query);
	
*/


		//$row_participante = mysqli_fetch_assoc($result);

		//$nombre = $row_participante['nombre'].' '.$row_participante['apellidop'].' '.$row_participante['apellidom'];
		
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Set who the message is to be sent from
		$mail->setFrom('contacto@fepro.cs.buap.mx', 'Contacto FEPRO 2017');
		//Set an alternative reply-to address
		//$mail->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress($email, 'Prueba');
		//Set the subject line
		$mail->Subject = 'Mensaje de Prueba';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('mailbody.php'), dirname(__FILE__));
		//Replace the plain text body with one created manually
		$mail->Body = '
			<h2>Hola esto es una prueba de correo</h2>
			<p>Hola esto es una prueba de correo</p>
		';


		//send the message, check for errors
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";

		}




}