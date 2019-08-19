<?php 

$email = "omar_350_hs@hotmail.com";

require 'email/PHPMailerAutoload.php';

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
        $mail->setFrom('contact@mexicanjournal.buap.mx', 'Mexican Journal of Materials Science and Engineering');
        //Set an alternative reply-to address
        $mail->addReplyTo('omar.350.hs@gmail.com', 'Omar Hernandez');
        //Set who the message is to be sent to
        $mail->addAddress($email, 'Omar Hdez');   
        //Set the subject line
        $mail->Subject = 'Sign Up to Mexican Journal of Materials Science and Engineering';
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //$mail->msgHTML(file_get_contents('body.php'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        $mail->Body = '
                
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Sign Up to Mexican Journal of Materials Science and Engineering</title>
        </head>
        <body>
            <div style="text-align:center;width: 100%; font-family: Arial, Helvetica, sans-serif;">
                <h1>Success Sign Up!</h1>
                

                <p>Welcome toMexican Journal of Materials Science and Engineering</p>
                <p>This is an confirmation email </p>

                <p>Now you can sign in to: <a href="http://webmilab.com/omar/journal/register.php">http://webmilab.com/omar/journal/login.php</a></p>

               

            </div>
        </body>
        </html>

        ';
        $mail->IsHTML(true); 
        $mail->AltBody = 'This is a plain-text message body';

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
        	echo 'Message sent!';
        }



 ?>