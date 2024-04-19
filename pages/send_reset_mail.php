<?php

if(isset($_POST['emailreset'])){
    $db_connection = new PDO('pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres','postgres.smtyqkucrdolnrkzwqjp','ezLz72hM(dJv!@E');
    $email = strtolower($_POST['emailreset']);
    $stmt = $db_connection->prepare("SELECT id FROM postgres.public.user WHERE email = :mail");
    $stmt->execute(['mail' => $email]);
    

    // Check email 
    if ($stmt->rowCount()==0) {
        header("location: password_reset.php?user=false");
        exit();
    }
}

require '../includes/PHPMailer/src/Exception.php';
require '../includes/PHPMailer/src/PHPMailer.php';
require '../includes/PHPMailer/src/SMTP.php';

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

    $mail->setFrom("cp.online.coach@gmail.com", "CP Coach");
    $mail->addAddress($email);


    $mail->isHTML(true);
    $mail->Subject = "Password Reset";
    $mail->Body = '
        <html>
        <head>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: #061A26;
                    color: #333;
                    width:300%;
                    

                }
                .container {
                    background-color:#BFA181;
                    max-width: 800px;
                    width:100%;
                    height: 300px;
                    margin: 0 auto;
                    padding-top: 50px;
                    border-radius: 8px;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                    text-align:center;
                    
                }
                h1 {
                    color: #061A26;
                    text-align: center;
                    padding-bottom: 20px;
                }
                p {
                    text-align: center;
                    color: #061A26;
                    font-size: 16px;
                    padding-bottom: 50px;
                }


                .btn {
                    display: inline-block;
                    width: 15%;
                    height: 10%;
                    background-color: #061A26;
                    color: #BFA181 !important;
                    font-size: 15px;
                    text-decoration: none;
                    border-radius: 20px;
                    text-align: center;
                    line-height: 30px; 
                    align-self: center; 
                    justify-content: center;
                }

                .link {
                    color:#BFA181;
                }

            </style>
        </head>
        <body>
            <div class="container">
                <h1>  Reset your password </h1>
                <p> Click the link below to redirect you to your password reset page </p>
                <a href="http://192.168.100.20:8000/pages/reset.php?mail=' . urlencode($email) . '" class="btn">Reset</a>
                </div>
        </body>
        </html>
    ';

    $mail->send();
    echo "Email sent successfully";
    header("Location:login.php?sent=successfull");
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}


?>