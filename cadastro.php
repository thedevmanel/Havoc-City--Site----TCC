<?php
session_start();

if (isset($_SESSION['logged_adm'])) {
  echo "<script>
      alert('Efetue o logout do administrador para acessar esta página');
      window.location.href='http://localhost//Havoc-City--Site----TCC/adm_page.php'
  </script>";
} else if (!isset($_SESSION['logged_user'])) {
} else {
  $url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . urlencode($_SESSION['logged_user']);

  header("Location: " . $url);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Realizar Cadastro</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/formulario.css" type="text/css" />
  <link rel="shortcut icon" href="" type="image x/icon" />
  <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>

<body>
  <nav id="menu-h-register">
    <a href="adm_login.php">
      <div class="logo-jogo-header">
        <img src="https://fontmeme.com/permalink/231030/8bed3f01dae90fa6adbb3602541bd9f2.png" class="logo-header" />
      </div>
    </a>

    <ul>
      <li><a href="index.php">Home </a></li>

      <li><a href="Download.php">Download</a></li>

      <li><a href="entrar.php">iniciar sessao</a></li>
    </ul>
  </nav>
  <div class="container-form">

    <div class="formulario-box">
      <h2 class="titulo-formulario">cadastro</h2>
      <form action="php/inserir_usuario.php" method="get">
        <div class="user-box">
          <div class="user-box">
            <input type="text" name="nome" id="nome" required autocomplete="off" />
            <label for="nome"> Nome </label>
          </div>
          <div class="user-box">
            <input type="text" name="nickname" id="nickname" required autocomplete="off" maxlength="10" />
            <label for="nickname"> Nickname </label>
          </div>
          <div class="user-box">
            <input type="email" name="email" id="email" required autocomplete="off" />
            <label for="email"> Email </label>
          </div>
          <div class="user-box">
            <input type="password" name="senha" id="senha" required autocomplete="off" />
            <label for="senha"> Senha </label>
            <span>
              <input type="checkbox" name="mostrar-senha" onclick="showPassword()" id="mostrar-senha" class="caixa-mostrar-senha" />
            </span>
          </div>
          <p class="texto-link-para-cadastro">
            Se possui uma conta
            <a href="entrar.php" class="link-cadastro"> efetuar login </a>
          </p>
          <button type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            cadastrar
          </button>
          <br />
          <br />
        </div>
      </form>
    </div>
    <div class="box-image-form">
      <img src="Imagens/ImageReg.jpg" alt="" class="image-form">
    </div>
  </div>
  <div class="footer">
    <div class="info-footer">
      ™ & ©2023 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello, Gustavo Azevedo, <br>Pedro Ogata,
      Filipe Grande sao os desenvolvedores
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
  <script src="js/mostrarSenha.js"></script>
</body>

</html>