<?php

/**
 * This example shows making an SMTP connection with authentication.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;
//Set the hostname of the mail server
$mail->Host = 'mail.mexilab.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 26;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'contact@mexilab.com';
//Password to use for SMTP authentication
$mail->Password = 'yOm5PO[2p?9k';
//Set who the message is to be sent from
$mail->setFrom('contact@mexilab.com', 'Contact Dealer App');
//Set an alternative reply-to address
$mail->addReplyTo('contact@mexilab.com', 'Contact Dealer App');
//Set who the message is to be sent to

$mail->addAddress('omar.350.hs@gmail.com', 'Omar Hernandez Sarmiento');
$mail->addAddress('ricardo.lopez.barajas1@vwfs.com ', 'Ricardo Lopez');
//$mail->addCC('omar.hernandez@alumno.buap.mx', 'Omar Hernandez Alumno');
//Set the subject line
$mail->Subject = 'Contact Dealer App';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('content.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message sent!';
    //$_SESSION['success'] = '<p class="text-success text-center">Success!, Article and  constancy sent...</p>';

     echo '<script type="text/javascript">window.location="../author/index.php";</script>';
}