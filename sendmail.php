<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require_once 'vendor/autoload.php';
 
$mail = new PHPMailer(true);
 
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'iskalinovfarukh';   //username
    $mail->Password = 'abstractions';   //password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;                    //smtp port
 
    $mail->setFrom('noreply@atimestore.com', 'A Time Store');
    $mail->addAddress('someuser@localhost.com', 'Manager');
 
    $mail->isHTML(true);
 
    $mail->Subject = 'Email Subject';
    $mail->Body    = 'Email Body';
 
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>