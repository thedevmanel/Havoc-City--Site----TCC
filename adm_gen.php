<?php

include "php/adm.php";

$end_rows = $i;

$i = 0;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gerenciar Usuarios </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/adm.css" type="text/css">
    <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>

<body>
    <div class="container-adm">
        <div class="description-adm">
            <span class="title-adm">
                gerenciar usuarios
            </span>
            <div class="line-title-adm"></div>
            <ul>
                <li>
                    <div class="container-users">
                        <div class="users-nickname-title"> nickname </div>
                        <div class="users-points-time-title"> pontuation </div>
                        <div class="users-points-time-title">time</div>
                    </div>
                </li>
                <?php
                while ($i < $end_rows) {
                    echo '
                    <li>
                        <div class="container-users">
                            <div class="users-nickname">' . $nickname[$i] . '</div>
                            <div class="users-points-time">' . $pontuation[$i] . '</div>
                            <div class="users-points-time">' . $time[$i] . '</div>
                            <div class="box-image-delete-users"> 
                                <button id="delete-button" onclick="showMessageDelete(' . $id_jogo[$i] . ')" class="link-delete-adm">
                                    <img src="Imagens/lixeira.png" class="image-trash" alt="" /> 
                                </button>
                            </div>
                        </div>
                    </li>
                    ';
                    $i += 1;
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="box-button-edit">
        <a href="adm_page.php">
            <button class="button-edit">
                voltar
            </button>
        </a>
    </div>

    <div class="footer">
        <div class="info-footer">
            ™ & ©2023 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello, Gustavo Azevedo, <br>Pedro
            Ogata, Filipe Grande sao os desenvolvedores
        </div>
    </div>
    <script>
        function showMessageDelete(id) {
            const result = confirm('Deseja excluir os dados salvos do usuário?');

            if (result) {
                window.location.href = 'http://localhost//Havoc-City--Site----TCC/php/delete_adm.php?id=' + id;
            }
        }
    </script>
</body>
</html>