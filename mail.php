<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require_once './config/dbc.php';

require './vendors/phpmailer/src/Exception.php';
require './vendors/phpmailer/src/PHPMailer.php';
require './vendors/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.nolimitv.com;';                   // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'admin@nolimitv.com';                 // SMTP username
    $mail->Password = '2015Live';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
   
    //Recipients
    $mail->setFrom('admin@nolimitv.com', 'Nolimitv');
    $mail->addAddress('rajapaksha.live@gmail.com', 'Ashan Rajapaksha');     // Add a recipient
    $mail->addAddress('ashanrajapaksha@live.com');               // Name is optional
    $mail->addReplyTo('admin@nolimitv.com', 'Information');      
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>

