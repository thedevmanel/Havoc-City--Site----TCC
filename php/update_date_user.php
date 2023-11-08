<?php

$id = $_GET['id'];
$nome = $_GET['nome'];
$nickname = $_GET['nickname'];
$email = $_GET['email'];
$senha = $_GET['senha'];

include "conexao.php";

$update = "UPDATE `usuario` SET `nome` = '$nome', `nickname` = '$nickname', `email` = '$email', `senha` = '$senha' WHERE `id_user` = '$id'";

if (mysqli_query($conn, $update)) {
} else {
    echo "Error" . $update, "<br>" . mysqli_error($conn);
}

$url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . urlencode($id);

header('Location: ' . $url);

?>
