<?php

session_start();

include "conexao.php";

$id = $_GET['id'];
$delete_jogo = "DELETE FROM `jogo` WHERE `id_user`='$id'";
$delete_user = "DELETE FROM `usuario` WHERE `id_user` = '$id'";

if (mysqli_query($conn, $delete_jogo)) {
} else {
    echo "Error" . $delete_jogo, "<br>" . mysqli_error($conn);
}


if (mysqli_query($conn, $delete_user)) {
    unset($_SESSION['logged_user']);
} else {
    echo "Error" . $delete_user, "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header('Location: http://localhost//Havoc-City--Site----TCC/entrar.php')

?>