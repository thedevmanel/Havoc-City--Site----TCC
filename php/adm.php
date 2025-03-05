<?php

include "conexao.php";

$select = $conn->admOrderUsers();
$i = 0;

try {   
    if (($select) && ($select->rowCount() !=0)) {
        while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
            $id_game[$i] = $rows['id_game'];
            $nickname[$i] = $rows['nickname'];
            $game_time[$i] = $rows['game_time'];
            $game_points[$i] = $rows['game_points'];

            $i++;
        }
    }
} catch (PDOException $e) {
    echo "Erro ao entrar na conta!! -> " . die($e->getMessage());
}


$stmt = $conn->admCountUsers();
$num_users = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->admCountGameStats();
$num_game = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->admAvarageHours();
$avg_hours = $stmt->fetch(PDO::FETCH_ASSOC);
