<?php

include "conexao.php";

$seconds = $_POST['seconds'];
$seconds = ($seconds / 1000000) * 1000000;
$minutes = $_POST['minutes'];
$minutes = ($minutes / 1000000) * 1000000;
$hours = $_POST['hours'];
$hours = ($hours / 1000000) * 1000000;
$time = "$hours:$minutes:$seconds";
$pontuation = $_POST['pontuation'];
$pontuation = ($pontuation / 1000000) * 1000000;
$id_user = $_POST['id_user'];

$insert = "INSERT INTO `jogo` VALUES (DEFAULT,'$id_user','$time','$pontuation')";

echo $id_user . "<br />" . $time . "<br />" . $pontuation . "<br />";

if (mysqli_query($conn, $insert)) {
} else {
    echo "erro" . $insert, "<br>" . mysqli_error($conn);
}