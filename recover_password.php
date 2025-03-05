<?php

if (isset($_SESSION['logged_adm'])) {
  header('Location: http://localhost:3000/index.php');
}

include "php/select_recover_password.php";

$_SESSION['key_pass'] = $_GET['key_pass'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Página de Recuperação de Senha </title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/formulario.css" type="text/css" />
  <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>

<body>
  <nav id="menu-h">
    <div class="logo-jogo-header">
      <img src="https://fontmeme.com/permalink/231027/599d6f4224ce722a5f04605e3e9d1db4.png" class="logo-header" />
    </div>

    <ul>
      <li><a href="index.php"> Home </a></li>

      <li><a href="Download.php"> Download</a></li>

      <li><a href="<?php echo $url; ?>">perfil</a></li>
    </ul>
  </nav>
  <div class="container-form">
    <div class="box-image-form">
      <img src="Imagens/ImageEd.png" alt="" class="image-form">
    </div>
    <div class="formulario-box">
      <h2 class="titulo-formulario">Recuperar senha</h2>
      <form action="php/forms_data_user.php" method="post">
        <div class="user-box">
          <div class="user-box">
            <input type="password" name="password" id="password" required autocomplete="off" value="" />
            <label for="password"> Senha </label>
            <span>
              <img src="Imagens/hide_pass.png" alt="hide-password" class="image-show-hide-pass" onclick="showPassword()" id="show-password" />
            </span>
          </div>
          <button type="submit" class="button-submit" name="btn-submit" value="forgot-password">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            mudar senha
          </button>
          <br />
          <br />

        </div>
      </form>
    </div>
  </div>
  <div class="footer">
    <div class="info-footer">
      ™ & ©2023 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello, Gustavo Azevedo, <br>Pedro Ogata,
      Filipe Grande sao os desenvolvedores
    </div>
    <script src="js/mostrarSenha.js"></script>
    <?php
      if (isset($_SESSION['update_password'])) {
        if (($_SESSION['update_password']) == 'failed') {
          header('Location: http://localhost:3000/entrar.php');
          echo $_SESSION['key_pass'];
        } 
      }
    ?>

</body>

</html>