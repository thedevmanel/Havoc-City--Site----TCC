<?php

session_start();

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

echo $id_user . "<br />";

try {
    $conn->saveGame($time, $pontuation, $id_user);

} catch (PDOException $e) {
    echo "Erro ao inserir dados do jogo". die($e->getMessage());

}