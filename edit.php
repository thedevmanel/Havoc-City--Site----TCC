<?php

session_start();

if (!isset($_SESSION['logged_user'])) {
  header('Location: http://localhost:3000/entrar.php');
}

if (isset($_SESSION['logged_adm'])) {
  header('Location: http://localhost:3000/index.php');
}

include "php/verificacao_id.php";
include "php/select_edit.php";

$url = "http://localhost:3000/usuario.php?id=" . urlencode($id_user);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Página de Edição </title>
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
      <li><a href="index.php">Home </a></li>

      <li><a href="Download.php">Download</a></li>

      <li><a href="<?php echo $url; ?>">perfil</a></li>
    </ul>
  </nav>
  <div class="container-form">
    <div class="box-image-form">
      <img src="Imagens/ImageEd.png" alt="" class="image-form">
    </div>
    <div class="formulario-box">
      <h2 class="titulo-formulario">Editar</h2>
      <form action="php/forms_data_user.php" method="post">
        <input type="text" name="id_user" id="id_user" hidden value="<?php echo $id_user; ?>">
        <div class="user-box">
          <div class="user-box">
            <input type="text" name="name" id="name" required autocomplete="off" value="<?php echo $name; ?>" />
            <label for="name"> Nome </label>
          </div>
          <div class="user-box">
            <input type="text" name="nickname" id="nickname" required autocomplete="off" value="<?php echo $nickname; ?>" maxlength="10" />
            <label for="nickname"> Nickname </label>
          </div>
          <div class="user-box">
            <input type="text" name="email" id="email" required autocomplete="off" value="<?php echo $email; ?>" />
            <label for="email"> Email </label>
          </div>
          <div class="user-box">
            <input type="password" name="password" id="password" required autocomplete="off" value="" />
            <label for="password"> Senha </label>
            <span>
              <img src="Imagens/hide_pass.png" alt="hide-password" class="image-show-hide-pass" onclick="showPassword()" id="show-password" />
            </span>
          </div>
          <p class="texto-link-para-cadastro">
            mudou de ideia?
            <a href="<?php echo $url; ?>" class="link-forms"> cancelar </a>
          </p>
          <button type="submit" class="button-submit" name="btn-submit" value="edit-user">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            editar
          </button>
          <br />
          <br />

        </div>
      </form>
    </div>
  </div>
  <div class="footer">
    <div class="info-footer">
      ™ & ©2024 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello
    </div>
    <script src="js/mostrarSenha.js"></script>

</body>

</html>