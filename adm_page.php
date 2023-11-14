<?php

session_start();

if (isset($_GET['exit'])) {
    unset($_SESSION['logged_adm']);
    header("Location: http://localhost//Havoc-City--Site----TCC/index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Página de Adm </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/formulario.css" type="text/css" />
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
    <br />
    <br />
    <a href="http://localhost//Havoc-City--Site----TCC/adm_page.php?exit=true"><button class="button-choose-user"> sair </button></a>

   
</body>
</html>