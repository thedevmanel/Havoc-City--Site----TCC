<?php

session_start();

if (isset($_SESSION['logged_user'])) {
    echo "<script>
        alert('Esta página é restrita e apenas os administradores podem visualizar!');
        window.location.href='http://localhost:3000/index.php'
    </script>";
} else if (!isset($_SESSION['logged_adm'])) {
    header("Location: http://localhost:3000/adm_login.php");
}

if (isset($_GET['exit'])) {
    unset($_SESSION['logged_adm']);
    header("Location:http://localhost:3000/index.php");
}

include "php/adm.php";

include "php/time_records.php";

include "php/point_records.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Página de Adm </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/usuario.css" type="text/css">
    <link rel="stylesheet" href="css/adm.css" type="text/css">
    <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>
<body>
<nav id="menu-h">
        <div class="logo-jogo-header">
            <img src="https://fontmeme.com/permalink/231030/8bed3f01dae90fa6adbb3602541bd9f2.png" class="logo-header" />
        </div>
        <ul>
            <li><a href="index.php">Home </a></li>

            <li><a href="Download.php">Download</a></li>

            <li><a href="" id="button-perfil">admin</a></li>
        </ul>
    </nav>
    <div class="container-adm">
        <div class="description-adm">
            <span class="title-adm">
                administracao
            </span>
            <div class="line-title-adm"></div>
            <div class="container-data-collection">
                levantamento de dados
                <div class="box-data-collection">
                    <div class="box-data-dc">
                        <!-- WAMPSERVER
                        <div class="data-fonts">Jogadores Registrados:</div><div class="data-fonts"> <?php echo $num_user['total_linhas'] ?> </div> -->
                        <!-- POSTGRESQL -->
                        <div class="data-fonts">Jogadores Registrados:</div><div class="data-fonts"> <?php echo $num_users['number_line'] ?> </div> 
                    </div>
                    <div class="box-data-dc">
                        <!-- WAMPSERVER
                        <div class="data-fonts">Dados de jogos Registrados:</div><div class="data-fonts"> <?php echo $num_game['total_linhas'] ?> </div> -->
                        <!-- POSTGRESQL -->
                        <div class="data-fonts">Dados de jogos Registrados:</div><div class="data-fonts"> <?php echo $num_game['number_line'] ?> </div>
                    </div>
                    <div class="box-data-dc">
                        <!-- WAMPSERVER
                        <div class="data-fonts">Media de horas entre usuarios: </div><div class="data-fonts"> <?php echo $avarage_hours['media_horas'] ?> </div> -->
                        <!-- POSTGRESQL -->
                        <div class="data-fonts">Media de horas entre usuarios: </div><div class="data-fonts"> <?php echo $avg_hours['avg_hours'] ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-button-edit">
        <a href="adm_gen.php">
            <button class="button-edit">
                editar
            </button>
        </a>
        <a href="adm_page.php?exit=true">
            <button class="button-edit">
                sair
            </button>
        </a>
    </div>
        
    <div class="container-ranking">
        <span class="title-raking"> rankings </span> <br />
        <div class="line-title"></div>
        <div class="box-standard-rankings">
            <div class="box-first-place">
                <div class="type-ranking"> tempo </div>
                <?php echo "$name_time_position[0]"; ?> tem o melhor tempo !!

                <div class="records">
                    <?php echo "$times_time_position[0]"; ?>
                    <span class="box-image-crown-ranking">
                        <img src="Imagens/crown.png" alt="crown" class="image-crown" />
                    </span><br />
                </div>
            </div>
            <div class="box-tops-player">
                <span class="title-tops-players"> os 5 melhores tempos </span>

                <div class="list-players-ranking">
                    <div id="number-ranking">
                        <span class="nome-ranking"> 1 - <?php echo "$name_time_position[0]"; ?></span>
                        <span class="info-ranking"> <?php echo "$times_time_position[0]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_time_position[0]"; ?> </span>
                    </div>
                    <div id="number-ranking">
                        <span class="nome-ranking"> 2 - <?php echo "$name_time_position[1]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$times_time_position[1]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_time_position[1]"; ?> </span>
                    </div>
                    <div id="number-ranking">
                        <span class="nome-ranking"> 3 - <?php echo "$name_time_position[2]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$times_time_position[2]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_time_position[2]"; ?> </span>
                    </div>
                    <div id="number-ranking">
                        <span class="nome-ranking"> 4 - <?php echo "$name_time_position[3]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$times_time_position[3]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_time_position[3]"; ?> </span>
                    </div>
                    <div id="number-ranking">
                        <span class="nome-ranking"> 5 - <?php echo "$name_time_position[4]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$times_time_position[4]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_time_position[4]"; ?> </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-standard-rankings">
            <div class="box-first-place">
                <div class="type-ranking"> Pontuacao </div>
                <?php echo "$name_points_position[0]"; ?> tem a melhor pontuacao !!

                <div class="records">
                    <?php echo "$pontuations_points_position[0]"; ?>
                    <span class="box-image-crown-ranking">
                        <img src="Imagens/crown.png" alt="crown" class="image-crown" />
                    </span><br />
                </div>
            </div>
            <div class="box-tops-player">
                <span class="title-tops-players"> as 5 melhores pontuacoes </span>

                <div class="list-players-ranking">
                    <div id="number-ranking">
                        <span class="nome-ranking"> 1 - <?php echo "$name_points_position[0]"; ?></span>
                        <span class="info-ranking"> <?php echo "$times_points_position[0]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_points_position[0]"; ?> </span>
                    </div>
                    <div id="number-ranking">
                        <span class="nome-ranking"> 2 - <?php echo "$name_points_position[1]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$times_points_position[1]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_points_position[1]"; ?> </span>
                    </div>
                    <div id="number-ranking">
                        <span class="nome-ranking"> 3 - <?php echo "$name_points_position[2]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$times_points_position[2]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_points_position[2]"; ?> </span>
                    </div>
                    <div id="number-ranking">
                        <span class="nome-ranking"> 4 - <?php echo "$name_points_position[3]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$times_points_position[3]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_points_position[3]"; ?> </span>
                    </div>
                    <div id="number-ranking">
                        <span class="nome-ranking"> 5 - <?php echo "$name_points_position[4]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$times_points_position[4]"; ?> </span>
                        <span class="info-ranking"> <?php echo "$pontuations_points_position[4]"; ?> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="http://localhost//Havoc-City--Site----TCC/adm_page.php?exit=true"><button class="button-choose-user"> sair </button></a> -->

    <div class="footer">
        <div class="info-footer">
        ™ & ©2024 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello
        </div>
    </div>
</body>
</html>