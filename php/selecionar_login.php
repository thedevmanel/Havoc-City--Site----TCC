<?php

include "conexao.php";

$email = $_GET['email'];
$senha = $_GET['senha'];
$senha = md5($senha);
$senha = md5($senha);

$query_select = "SELECT * FROM `usuario` WHERE `email` = $email AND `senha` = $senha";
$select = mysqli_query($conn, $query_select);

if (($select) && ($select->num_rows != 0)) {
    while ($rows = mysqli_fetch_array($select)) {
        $id = $rows['id_user'];
        $nome = $rows['nome'];
        $nickname = $rows['nickname'];
    }
}

mysqli_close($conn);

// $url = "http://localhost//Site%20do%20TCC/usuario.php?id=" . urlencode($id);

// header("Location: " . $url);