    <?php

    include "conexao.php";

    $time_select_query = "SELECT u.nickname, j.tempo, j.pontuacao FROM usuario u JOIN jogo j ON u.id_user = j.id_user ORDER BY j.tempo ASC, j.pontuacao DESC LIMIT 5;";
    $time_select = mysqli_query($conn, $time_select_query);

    $i = 0;

    if (($time_select) && ($time_select->num_rows != 0)) {
        while ($rows = mysqli_fetch_array($time_select)) {
            // echo "<li>" . $rows["nickname"] . "</li>";
            $name_time_position[$i] = $rows['nickname'];
            $times_time_position[$i] = $rows['tempo'];
            $pontuations_time_position[$i] = $rows['pontuacao'];

            $i += 1;
        }
    } else {
    }

    //  echo "$name_time_position[0] <br />";
    //  echo "$times_time_position[0] <br />";
    //  echo "$pontuations_time_position[0]";

    mysqli_close($conn);

    ?>
