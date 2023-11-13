<?php

include "conexao.php";

$points_select_query = "SELECT u.nickname, j.tempo, j.pontuacao FROM usuario u JOIN jogo j ON u.id_user = j.id_user ORDER BY j.pontuacao DESC, j.tempo ASC LIMIT 5;";
$points_select = mysqli_query($conn, $points_select_query);

$i = 0;

if (($points_select) && ($points_select->num_rows != 0)) {
    while ($rows = mysqli_fetch_array($points_select)) {
        $name_points_position[$i] = $rows['nickname'];
        $times_points_position[$i] = $rows['tempo'];
        $pontuations_points_position[$i] = $rows['pontuacao'];

        $i += 1;
    }
} else {
}

mysqli_close($conn);

?>
