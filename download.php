<?php

session_start();

if (!isset($_SESSION['logged_user'])) {
}
else {
    $url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . urlencode($_SESSION['logged_user']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Download Havoc City</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/download.css" type="text/css" />
	<link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>

<body>
	<div class="img-conteiner-download">

	</div>
	<nav id="menu-h">
		<div class="logo-jogo-header">
			<img src="https://fontmeme.com/permalink/231027/599d6f4224ce722a5f04605e3e9d1db4.png" class="logo-header" />
		</div>

		<ul>
			<li><a href="index.php">Home </a></li>

			<li><a href="Download.php">Download</a></li>

			<?php
                if (!isset($_SESSION['logged_user']) && !isset($_SESSION['logged_adm'])) {
                    echo '
                        <li><a href="entrar.php">iniciar sessao</a></li>
                        ';
                } else if (isset($_SESSION['logged_adm'])) {
                    echo '
                        <li><a href="http://localhost//Havoc-City--Site----TCC/adm_page.php">admin</a></li>
                        ';
                } else {
                    echo '
                        <li><a href="' . $url . '"> perfil </a></li>
                        ';
                }
                ?>
            </ul>
        </ul>
        <?php
        if (!isset($_SESSION['logged_adm']) && !isset($_SESSION['logged_user'])) {
            echo '
                <a href="http://localhost//Havoc-City--Site----TCC/adm_login.php" class="link-adm">
                    <button class=button-admin>
                        admin
                    </button>
                </a>
            ';
        }
        ?>	
		</ul>
	</nav>

    <span class="title-download"> Baixe o nosso jogo </span>

    <?php
    if (isset($_SESSION['logged_user'])) {
            echo '
                <a href="Imagens/aaa.png" download><button id="button-download" class="button-download"> BAIXAR JOGO </button></a>
            ';
        } else {
            echo '
                <a><button id="button-download" class="button-download" onclick="mostrarMessage()"> BAIXAR JOGO </button></a>
            ';
        }
    ?>

	<span class="font-download"></span>

	<div class="footer">
		<div class="info-footer">
			™ & ©2023 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello, Gustavo Azevedo, <br>Pedro
			Ogata, Filipe Grande sao os desenvolvedores
		</div>
		<!-- <div class="icons-footer">
            <span class="box-icones-footer">
                <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/insta.svg" class="icones-footer" alt="Imagem SVG" /></a>
                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/facebook.svg" class="icones-footer" alt="Imagem SVG" /></a>
                <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/twitter.svg" class="icones-footer" alt="Imagem SVG" /></a>
            </span>
        </div> -->
	</div>

    <script>
        var buttonDownload = document.getElementById('button-download');
        function mostrarMessage() {
            alert('Faça o login para continuar o download!!')
        }
    </script>
</body>

</html>