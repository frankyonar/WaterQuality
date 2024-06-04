<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/vendor/autoload.php';

function send_mail($email, $oggetto, $messaggio, $path_allegato = null){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "smtp.hostinger.com"; // indirizzo del server di posta in uscita di Hostinger
    $mail->SMTPDebug = 0; // Abilita il debug di SMTP (0 = off, 1 = comandi, 2 = dati e comandi)
    $mail->Port = 465; // porta del server di posta in uscita per SSL
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl'; // tls o ssl informarsi presso il provider del vostro server di posta
    $mail->Username = "waterquality@niclya.com"; // la vostra email su Hostinger
    $mail->Password = "Water123quality@"; // password per accedere alla vostra email su Hostinger
    $mail->Priority = 1; // (1 = High, 3 = Normal, 5 = low)
    $mail->setFrom('waterquality@niclya.com', 'Water Quality'); // impostazione del mittente
    $mail->AddAddress($email);
    $mail->IsHTML(true); 
    $mail->Subject  =  $oggetto;
    $mail->Body     =  $messaggio;
    $mail->AltBody  =  "";

    if ($path_allegato !== null) {
        $mail->AddAttachment($path_allegato);
    }

    if(!$mail->Send()){
        echo "Errore nell'invio della mail: " . $mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
}

// test 
//$email = "francescoranno3@gmail.com";
//$oggetto = "Test Email";
//$messaggio = "Questo è un messaggio di test.";
//send_mail($email, $oggetto, $messaggio);

?>
