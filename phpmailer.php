<?php
use PHPMailer\PHPMailer\PHPMailer;
    require 'vendor/autoload.php';

    function sendEmail( $recipient_mail, $recipient_name ) {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'giveaway@gsfmusic.link';
        $mail->Password = 'Giveaway1';
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('giveaway@gsfmusic.link', 'GSF Music');
        $mail->addReplyTo('giveaway@gsfmusic.link', 'GSF Music');
        $mail->addAddress($recipient_mail, $recipient_name);
        $mail->Subject = 'Ο διαγωνισμός ολοκληρώθηκε!';
        $mail->msgHTML(file_get_contents('message3.html'), __DIR__);
        //$mail->Body = 'This is a plain text message body';
        //$mail->addAttachment('test.txt');
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'The email message was sent.';
        }
    }

    sendEmail( 'chara.lampos.samou.ridis@gmail.com', 'Χαράλαμπος Σαμουρίδης' )
    ?>