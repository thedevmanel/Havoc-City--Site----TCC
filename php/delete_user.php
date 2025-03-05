<?php

session_start();

include "conexao.php";
include "cryptography.php";

$password = $_POST['inputDeleteUser'];
$trigger = false;

$id_user = $_POST['id'];

try {
    $select = $conn->selectPassword($id_user, $password);

    if (($select) && ($select->rowCount() != 0)) {
        while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
            $detect_id_user = $rows['id_user'];
            $detect_password = $rows['password'];

            $decript_pass = decriptPass($password, $detect_password, $trigger);

            if ($decript_pass) {
                if ($detect_id_user == $id_user) {
                    $trigger = true;
                    $conn->deleteUsers($id_user);
                    unset($_SESSION['logged_user']);
                    
                    header('Location: http://localhost:3000/entrar.php');
                } else {
                    $trigger = false;
                }
            }
        }
        if (!$trigger) {
            $_SESSION['pass_error'] = true;
            $url = "http://localhost:3000/usuario.php?id=" . urlencode($_SESSION['logged_user']);

            header("Location: " . $url);
        }
    }
} catch (PDOException $e) {
    echo "Erro ao deletar o usuário -> " . die($e->getMessage());
}

