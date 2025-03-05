<?php

include "conexao.php";

$id_user = $_SESSION['logged_user'];

try {
    $select = $conn->verifyIdUser($id_user);

    if (($select) && ($select->rowCount() != 0)) {
        while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
            $detect_id_user = $rows['id_user'];

            if ($detect_id_user == $id_user) {  
                $name = $rows['name'];
                $nickname = $rows['nickname'];
                $email = $rows['email'];
            }
        }
    } else {
        echo "<script>
            window.location.href='http://localhost:3000/entrar.php';
        </script>";
    }
} catch (PDOException $e) {
    echo "Erro ao localizar a conta!! -> " . die($e->getMessage());
}