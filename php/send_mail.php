<!-- gyyc qqiz jkpb xuuk -->
<?php

$config = include "php/config.php";

$gmail_mail = $config['gmail_mail'];
$password_mail = $config['password_mail'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $gmail_mail;  // Seu e-mail do Gmail
    $mail->Password   = $password_mail; // Sua senha do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Remetente
    $mail->setFrom($gmail_mail, $rows['name']);

    // Destinatário
    $mail->addAddress($mail_user);  // Adiciona um destinatário

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Recuperar Senha';
    $mail->Body    = 'Geramos o link para que você possa digitar uma nova senha para o perfil, lembre-se que você não poderá entrar na sua conta até trocar a senha:
        <br /><a href="http://localhost:3000/recover_password.php?key_pass=' . urlencode($key_pass) . '">
            http://localhost:3000/recover_password.php?key_pass=' . $key_pass . ' 
        </a><br /><br />
        Por favor, não respoda esse e-mail';
    $mail->AltBody = 'Geramos o link para que você possa digitar uma nova senha para o perfil, lembre-se que você não poderá entrar na sua conta até trocar a senha:
        http://localhost:3000/recover_password.php?key_pass=' . urlencode($key_pass); 

    // Depuração
    // $mail->SMTPDebug = 2;
    // $mail->Debugoutput = 'html';

    // Envia o e-mail
    $mail->send();
    // echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo "Falha ao enviar o e-mail. Mailer Error: {$mail->ErrorInfo}";
}
?>