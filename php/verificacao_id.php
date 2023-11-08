<?php

include "conexao.php";

$id = $_GET['id'];

$query_select = "SELECT * FROM `usuario` WHERE `id_user` = '$id'";
$select = mysqli_query($conn, $query_select);

if (($select) && ($select->num_rows != 0)) {
    while ($rows = mysqli_fetch_array($select)) {
        $nome = $rows['nome'];
        $nickname = $rows['nickname'];
        $email = $rows['email'];
        $senha = $rows['senha'];
    }
}

mysqli_close($conn);
