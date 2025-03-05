<?php

include "cryptography.php";

$id_user = $_POST['id'];
$password = $_POST['inputEditUser'];
$trigger = false;


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
                } else {
                    $trigger = false;
                }
            }
        }
    }

    if (!$trigger) {
        if (!$trigger) {
            $_SESSION['pass_error'] = true;
            $url = "http://localhost:3000/usuario.php?id=" . urlencode($_SESSION['logged_user']);

            header("Location: " . $url);
        }
    }
    
} catch (PDOException $e) {
    echo "Erro ao comparar a senha do usuário -> " . die($e->getMessage());
}