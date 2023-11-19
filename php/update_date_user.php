<?php

$id = $_GET['id'];
$nome = $_GET['nome'];
$nickname = $_GET['nickname'];
$email = $_GET['email'];
$senha = $_GET['senha'];

include "conexao.php";

$gatilho = true;

$query_select = "SELECT * FROM `usuario` WHERE `email` = '$email' AND `senha` = '$senha'";
$select = mysqli_query($conn, $query_select);

if (($select) && ($select->num_rows != 0)) {
    while ($rows = mysqli_fetch_array($select)) {
        $detect_email = $rows['email'];

        if ($detect_email == $email) {
            $gatilho = false;
        } else {
        }
    }
}
if ($gatilho ==  false) {
    mysqli_close($conn);

    echo "<script language='javascript' type='text/javascript'>
        alert('Já existe esse email registrado');
        window.location.href='http://localhost//Havoc-City--Site----TCC/entrar.php';
    </script>";
} else {
    $update = "UPDATE `usuario` SET `nome` = '$nome', `nickname` = '$nickname', `email` = '$email', `senha` = '$senha' WHERE `id_user` = '$id'";

    if (mysqli_query($conn, $update)) {
    } else {
        echo "Error" . $update, "<br>" . mysqli_error($conn);
    }

    $url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . urlencode($id);

    header('Location: ' . $url);
}