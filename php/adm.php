<?php

include "conexao.php";

// selecionando tudo;

$select_query = "SELECT u.*, j.* FROM usuario u JOIN jogo j ON u.id_user = j.id_user ORDER BY u.nickname ASC, j.tempo ASC, j.pontuacao ASC";
$select = mysqli_query($conn, $select_query);

$i = 0;

if (($select) && ($select->num_rows!=0)) {
    while ($rows = mysqli_fetch_array($select)) {
        $id_jogo[$i] = $rows['id_jogo'];
        $nickname[$i] = $rows['nickname'];
        $time[$i] = $rows['tempo'];
        $pontuation[$i] = $rows['pontuacao'];

        $i += 1;
    }
}

// tabela usuario;
$select_user_query = "SELECT COUNT(*) AS total_linhas FROM `usuario`";
$select_user = mysqli_query($conn, $select_user_query);


if ($select_user) {
    $num_user = mysqli_fetch_assoc($select_user);
}

// tabela jogo;
$select_game_query = "SELECT COUNT(*) AS total_linhas FROM `jogo`";
$select_game = mysqli_query($conn, $select_game_query);


if ($select_game) {
    $num_game = mysqli_fetch_assoc($select_game);
}

// média do tempo

$select_time_query = "SELECT SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(tempo))), 1, 8) AS media_horas FROM `jogo`";
$select_time = mysqli_query($conn, $select_time_query);

if ($select_time) {
    $avarage_hours = mysqli_fetch_assoc($select_time);
}

