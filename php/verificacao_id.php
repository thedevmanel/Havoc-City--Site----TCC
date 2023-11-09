<?php

include "conexao.php";

$id = $_GET['id'];

$gatilho = false;

$query_select = "SELECT * FROM `usuario` WHERE `id_user` = '$id'";
$select = mysqli_query($conn, $query_select);

if (($select) && ($select->num_rows != 0)) {
    while ($rows = mysqli_fetch_array($select)) {
        $detect_id = $rows['id_user'];

        if ($detect_id ==  $id) {
            $gatilho = true;
            $nome = $rows['nome'];
            $nickname = $rows['nickname'];
            $email = $rows['email'];
            $senha = $rows['senha'];
        }else {
        }
    }
}

if ($gatilho ==  false) {
    mysqli_close($conn);

    echo "<script language='javascript' type='text/javascript'>
        alert('Infelizmente ocorreu um pequeno problema para acessar sua conta, repita o processo de login');
        window.location.href='http://localhost//Havoc-City--Site----TCC/entrar.html';
    </script>";

} else {
}

mysqli_close($conn);