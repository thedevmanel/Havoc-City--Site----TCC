<?php
session_start();

if (isset($_GET['exit'])) {
    unset($_SESSION['logged_user']);
    header('Location: http://localhost:3000/entrar.php');
}

if (!isset($_SESSION['logged_user'])) {
    header('Location: http://localhost:3000/entrar.php');
}

include "php/verificacao_id.php";

include "php/time_records.php";

include "php/point_records.php";

// WAMPSERVER
// $url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . $_SESSION['logged_user'];


// POSTGRESQL
$url = "http://localhost:3000/usuario.php" . $_SESSION['logged_user'];

for ($i = 0; $i < 5; $i++) {
    if (isset($name_points_position[$i]) || isset($times_points_position[$i]) || isset($pontuations_points_position[$i])) {
        // echo "a<br />";
    } else {
        $name_points_position[$i] = "";
        $times_points_position[$i] = "";
        $pontuations_points_position[$i] = "";
        // echo "$name_points_position[$i], $times_points_position[$i], $pontuations_points_position[$i]";
    }

    if (isset($name_time_position[$i]) || isset($times_time_position[$i]) || isset($pontuations_time_position[$i])) {
        // echo "a<br />";
    } else {
        $name_time_position[$i] = "";
        $times_time_position[$i] = "";
        $pontuations_time_position[$i] = "";
        // echo "$name_time_position[$i], $times_time_position[$i], $pontuations_time_position[$i]";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
    <title> Minha Conta </title>
</head>

<body>
    <nav id="menu-h">
        <div class="logo-jogo-header">
            <img src="https://fontmeme.com/permalink/231030/8bed3f01dae90fa6adbb3602541bd9f2.png" class="logo-header" />
        </div>

        <ul>
            <li><a href="index.php">Home </a></li>

            <li><a href="Download.php">Download</a></li>

            <li><a href="<?php echo $url; ?>">perfil</a></li>
        </ul>
    </nav>
    <div class="container-user">
        <div class="container-descriptions">
            <span class="title-user-info"> Seja bem-vindo </span> <br />
            <div class="line-title"></div>
            <div class="box-description-user">
                <div class="info-description-user">
                    <!-- Campo de informação do usuario -->
                    <span class="font-information-title"> Nome: </span> <?php echo $name; ?> <br />
                    <span class="font-information-title"> Nickname: </span> <?php echo $nickname; ?> <br />
                    <span class="font-information-title"> E-mail: </span> <?php echo $email; ?> <br />

                </div>
                <!-- Ação de salvar os dados do usuario -->
                <div class="box-save-button">
                    <div class="info-save-button">
                        Caso quiser, você pode adicionar seus dados salvos em nossos banco de dados. Para isso, clique no
                        botão abaixo e navegue até: <br /> <span class="file-path"> C:\users\"user"\AppData\Local\Havoc_City </span>no explorador de arquivos.
                    </div>
                    <div class="button-save">
                        <!-- Botao para pesquisar os dados -->
                        <input type="file" id="fileInput" accept=".sav" />
                        <div id="numericValues"></div>

                        <!-- Campos de cada local de save -->
                        <form action="php/save_data.php" method="post">
                            <input type="text" name="id_user" id="id_user" value="<?php echo "$id_user"; ?>" hidden />
                            <input type="text" name="seconds" id="seconds" name="seconds" readonly hidden />
                            <input type="text" name="minutes" id="minutes" name="minutes" readonly hidden />
                            <input type="text" name="hours" id="hours" name="hours" readonly hidden />
                            <input type="text" name="pontuation" id="pontuation" name="pontuation" readonly hidden />

                            <!-- Botão de confirmação e submit -->
                            <div id="confirmationDiv">
                                <p>Voce tem certeza de que quer enviar os dados?</p>
                                <input type="submit" value="Confirmar Envio" class="button-submit-save" />
                            </div>
                    </div>
                    </form>
                </div>

            </div>
            <div class="buttons-user-page">
                <button class="button-choose-user" id="btn-edit" onclick="showMessageAlert('btnEdit')"> editar </button>

                <form id="formInputEdit" action="edit.php" method="POST">
                    <input type="text" name="id" id="id" hidden value="<?php echo $id_user; ?>" />
                    <input type="hidden" name="inputEditUser" id="inputEditUser" />

                </form>

                <a href="http://localhost:3000/usuario.php?exit=true"><button class="button-choose-user"> sair </button></a>

                <form id="formInputDelete" action="php/delete_user.php" method="POST">
                    <input type="text" name="id" id="id" hidden value="<?php echo $id_user; ?>" />
                    <input type="hidden" name="inputDeleteUser" id="inputDeleteUser" />
                    
                </form>
                <button class="button-choose-user" id="btn-delete" onclick="showMessageAlert('btnDelete')"> desativar </button>
            </div>
        </div>
    </div>
    <!-- PLACARES DE LÍDERES -->
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
    <div class="footer">
        <div class="info-footer">
            ™ & ©2024 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello
        </div>
    </div>

    <script src="js/scriptUsuário.js"></script>
    <script src="js/sweetAlert.js"></script>
    <?php
    if (isset($_SESSION['pass_error'])) {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "A senha está incorreta",
                    showConfirmButton: true,
                    customClass: {
                        title: "custom-title-forms",
                        popup: "custom-popup-forms",
                        confirmButton: "custom-button-error-pass"     
                    }
                });    
            </script>';
    }
    unset($_SESSION['pass_error']);
    ?>
</body>

</html>