<?php

$select = $conn->timeRecords();

$i = 0;

if (($select) && ($select->rowCount() != 0)) {
    while (($rows = $select->fetch(PDO::FETCH_ASSOC)) && ($i < 5)) {
        // echo "<li>" . $rows["nickname"] . "</li>";
        $name_time_position[$i] = $rows['nickname'];
        $times_time_position[$i] = $rows['game_time'];
        $pontuations_time_position[$i] = $rows['game_points'];

        // echo "$name_time_position[$i]<br />";
        // echo "$times_time_position[$i] <br />";
        // echo "$pontuations_time_position[$i] <br /><br />";

        $i += 1;
    }
} else {
}

// echo "$name_time_position[0]<br />";
// echo "$times_time_position[0] <br />";
// echo "$pontuations_time_position[0]";
