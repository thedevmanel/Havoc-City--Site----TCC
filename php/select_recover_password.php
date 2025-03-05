<?php

include "conexao.php";

session_start();

$_SESSION['update_password'] = 'failed';

if (isset($_GET['key_pass'])) {
    $key_pass = $_GET['key_pass'];
} else {
    $key_pass = '';
}

$select = $conn->validateKeyPass($key_pass);

if (($select) && ($select->rowCount() != 0)) {
    while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
        $detect_key = $rows['key_forgot_password_webhc'];

        if ($detect_key == $key_pass) {
            $_SESSION['update_password'] = 'waiting';
        }
    }
}

?>