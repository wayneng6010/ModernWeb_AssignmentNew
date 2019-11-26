<?php

require_once 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer/vendor/autoload.php";
$mail = new PHPMailer();

if (filter_input(INPUT_POST, 'reg_submit', FILTER_SANITIZE_URL) !== null) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = $_POST['message'];
    $email_sent = false;
    
    try {
        // $mail->SMTPDebug = 2; //not nessasary .. use to find our bug
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls"; //Enable TLS encryption
        $mail->IsSMTP();
        $mail->SMTPAuth = true;

        $sender_email = "wayne.ng6010@gmail.com"; //Your gmail
        $mail->Username = $sender_email;
        $mail->Password = "wficihgrnrwatcth"; //Your App Password 

        $to = $email; //Recipient's gmail
        $name = $username; //Recipient's name
        $mail->From = $sender_email; //Sender's email
        $mail->FromName = "NG YUAN SHEN"; //Sender's name
        $mail->AddAddress($to, $name);
        $mail->AddReplyTo($sender_email, "NG YUAN SHEN");

        $content = "<div style='display: flex;align-items: center; width:700px; height: 25px; color: white;'>"
                . "<p style='display: flex;align-items: center; line-height: .5;font-family:Lato; letter-spacing: 2px; color: #2e4f84;'><b>MALAYSIA HARMONICA FESTIVAL 2019</b></p>"
                . "</div>"
                . "<div style= 'background-color:#f1f1f1; padding: 1rem 2rem; margin-top:1rem;font-family:Lato; width: 700px; border-radius: 10px;'><span style='color: #2e4f84; font-weight: bold;'>Below is your message : </span><br><br>" . nl2br($message) . "<br><br><span style='font-weight: bold; color: black;'>Thanks for contacting us. You will be replied soon.</span></div>";

        $mail->isHTML(true);
        $mail->WordWrap = 50;
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->AddCC($sender_email);

        if ($mail->Send()) {
            $email_sent = true;
        }
    } catch (Exception $e) {
        $email_sent = false;
        echo "Email could not be sent.<br>";
        echo "Mailer Error: " . $email->ErrorInfor;
    }

    if ($email_sent) {
        echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Mail sent</p></div>';
        header('refresh:1;url=contact_us.php');
    } else {
        echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Mail failed to send</p></div>';
    }
}
?>