<?php

include 'conexao.php';

$id = uniqid();
$nome = $_GET['nome'];
$nickname = $_GET['nickname'];
$email = $_GET['email'];
$senha = $_GET['senha'];

$senha = md5($senha);
$senha = md5($senha);

$inserir_dados = "INSERT INTO `usuario` VALUES ('$id', '$nome', '$nickname', '$email', '$senha')";

if (mysqli_query($conn, $inserir_dados)) {
} else {
    echo "erro" . $inserir_dados, "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

$url = "http://localhost//Site%20do%20TCC/usuario.php?id=" . urlencode($id);

header('Location: ' . $url);
