<?php

include "php/conexao.php";

session_start();

$mail_user = $_POST['input-for-forgot-pass'];
$trigger = false;

// echo "$email <br />";

$select = $conn->forgotPassword($mail_user);

if (($select) && ($select->rowCount() != 0)) {
    while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
        $detect_mail_user = $rows['email'];
        
        if ($detect_mail_user == $mail_user) {
            $trigger = true;
            $_SESSION['confirm_email'] = 'known'; 
            
            $key_pass = password_hash($rows['id_user'], PASSWORD_DEFAULT); 
            // echo "Chave: $key_pass <br />Id: " . $rows['id_user'];
            
            $conn->updateKeyPass($rows['id_user'], $key_pass);
            $url = "http:/localhost:3000/recover_password.php?key_pass=" . urlencode($key_pass);

            include "send_mail.php";

            // echo 'Email enviado';
            header('Location: http://localhost:3000/entrar.php');
        }
    }
}

if (!$trigger):
    $_SESSION['confirm_email'] = 'unknown';
    header('Location: http://localhost:3000/entrar.php');
endif;

?>