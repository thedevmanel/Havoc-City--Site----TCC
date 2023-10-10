<?php

$id = $_GET['id'];

include "php/verificacao_id.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Página de Edição </title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/formulario.css" type="text/css" />
</head>

<body>
  <nav id="menu-h">
    <div class="logo-jogo-header">
      <img src="https://fontmeme.com/permalink/230529/06735112d397a33f5f981ecb17a4ad41.png" class="logo-header" />
    </div>

    <ul>
      <li><a href="index.html">Home </a></li>
      
      <li><a href="Download.html">Download</a></li>

      <li><a href="entrar.html">iniciar sessão</a></li>
    </ul>
  </nav>
  <div class="container-login">
    <div class="formulario-box">
      <h2 class="titulo-formulario">Edição</h2>
      <form action="php/update_date_user.php" method="get">
        <input type="text" name="id" id="id" hidden value="<?php echo $id;?>">
        <div class="user-box">
          <div class="user-box">
            <input type="text" name="nome" id="nome" required autocomplete="off" value="<?php echo $nome;?>" />
            <label for="nome"> Nome </label>
          </div>
          <div class="user-box">
            <input type="text" name="nickname" id="nickname" required autocomplete="off" value="<?php echo $nickname;?>" />
            <label for="nickname"> Nickname </label>
          </div>
          <div class="user-box">
            <input type="text" name="email" id="email" required autocomplete="off" value="<?php echo $email;?>" />
            <label for="email"> Email </label>
          </div>
          <div class="user-box">
            <input type="password" name="senha" id="senha" required autocomplete="off" value="<?php echo $senha;?>" />
            <label for="senha"> Senha </label>
            <span>
              <input type="checkbox" name="mostrar-senha" id="mostrar-senha" class="caixa-mostrar-senha" />
            </span>
          </div>
          <button type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Editar
          </button>
          <br />
          <br />
          <p class="texto-link-para-cadastro">
            
          <a href="entrar.html" class="link-cadastro"> Cancelar Edição </a>
          </p>
        </div>
      </form>
    </div>
  </div>
</body>

</html>