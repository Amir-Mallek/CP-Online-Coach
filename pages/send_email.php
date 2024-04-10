<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require 'C:\xampp\htdocs\CP-Online-Coach\includes\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\CP-Online-Coach\includes\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\CP-Online-Coach\includes\PHPMailer\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = "cp.online.coach@gmail.com";
    $mail->Password = "kfje jgcj sxxb oesg";

    $mail->setFrom($email, $name);
    $mail->addAddress("cp.online.coach@gmail.com", "CP Coach");


    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '
        <html>
        <head>
            <style>
                body {
                    font-family: \'Trebuchet MS\', \'Lucida Sans Unicode\', \'Lucida Grande\', \'Lucida Sans\', Arial, sans-serif;
                    background-color: #061A26;
                    color: #333;
                }
                .container {
                    max-width: 600px;
                    width:100%;
                    margin: 0 auto;
                    padding: 0;
                    border-radius: 8px;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                }
                h1 {
                    color: #BFA181;
                    text-align: center;
                }
                p {
                    text-align: center;
                    color: #061A26;
                    font-size: 16px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>' . $subject . '</h1>
                <p>' . $message . '</p>
            </div>
        </body>
        </html>
    ';

    $mail->send();
    header("Location: index.php");
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>
