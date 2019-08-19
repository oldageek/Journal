<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer;

// smtp settings
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Host = 'mail.webmilab.com';
$mail->Port = 25;
$mail->Username = 'tester@webmilab.com'; // change this to yours
$mail->Password = 'DgvVu_Zj[RV(Yu2'; // change this to yours

// set from & to email address
$mail->setFrom('testerh@webmilab.com', 'Master tester'); // change this to yours
$mail->addReplyTo('contacto@webmilab.com', 'Contact'); // change this to yours
$mail->addAddress('omar.350.hs@gmail.com');

// mail content
$mail->isHTML(true);
$mail->Subject = 'This is the subject';
$mail->Body = '<h1>Test Mail!</h1><p>This is the body of the message.</p>';

// send email
if($mail->send()){
    echo 'Message has been sent successfully!';
} else {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
?>