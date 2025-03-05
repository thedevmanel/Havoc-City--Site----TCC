<?php

$select = $conn->pointsRecords();

$i = 0;

if (($select) && ($select->rowCount() != 0)) {
    while (($rows = $select->fetch(PDO::FETCH_ASSOC)) && ($i < 5)) {
        $name_points_position[$i] = $rows['nickname'];
        $times_points_position[$i] = $rows['game_time'];
        $pontuations_points_position[$i] = $rows['game_points'];

        $i += 1;
    }
} else {
}


