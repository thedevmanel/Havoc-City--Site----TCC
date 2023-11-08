<?php

include "conexao.php";

$id = $_GET['id'];
$delete = "DELETE FROM `usuario` WHERE `id_user` = '$id'";

if (mysqli_query($conn, $delete)) {
} else {
    echo "Error" . $delete, "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header('Location: http://localhost//Havoc-City--Site----TCC/entrar.html');
