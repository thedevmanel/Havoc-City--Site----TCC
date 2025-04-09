<?php
session_start();

if (isset($_SESSION['logged_adm'])) {

    echo "<script>
        alert('Voce esta logado como administrador. Efetue o logout do administrador para realizar o cadastro');
        window.location.href='http://localhost:3000/adm_page.php'
    </script>";
} else if (!isset($_SESSION['logged_user'])) {
} else {

    $url = "http://localhost:3000/usuario.php?id=" . urlencode($_SESSION['logged_user']);

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
    <img src="Imagens/menu_cell_phone.png" alt="Menu" id="menu-cell" onclick="toggleMenu()" />
    <nav id="side-menu">
        <button id="close-menu" onclick="toggleMenu()">X</button>
        <ul>
            <li><a href="index.php">Home </a></li>

            <li><a href="Download.php">Download</a></li>

            <li><a href="entrar.php">iniciar sessao</a></li>
        </ul>
    </nav>
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
            <form action="php/forms_data_user.php" method="post">
                <div class="user-box">
                    <div class="user-box">
                        <input type="text" name="nome" id="nome" required autocomplete="off" value="<?php echo isset($_SESSION['form_data']['nome']) ? $_SESSION['form_data']['nome'] : ''; ?>" />
                        <label for="nome"> Nome </label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="nickname" id="nickname" required autocomplete="off" maxlength="10" value="<?php echo isset($_SESSION['form_data']['nickname']) ? $_SESSION['form_data']['nickname'] : ''; ?>" />
                        <label for="nickname"> Nickname </label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="email" id="email" required autocomplete="off" value="<?php echo isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : ''; ?>" />
                        <label for="email"> Email </label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" id="password" required autocomplete="off" value="<?php echo isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : ''; ?>" />
                        <label for="password"> Senha </label>
                        <span>
                            <img src="Imagens/hide_pass.png" alt="hide-password" class="image-show-hide-pass" onclick="showPassword()" id="show-password" />
                        </span>
                    </div>
                    <p class="texto-link-para-cadastro">
                        Se possui uma conta
                        <a href="entrar.php" class="link-forms"> efetuar login </a>
                    </p>
                    <button type="submit" class="button-submit" name="btn-submit" value="register-user">
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
            ™ & ©2024 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello
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
    <script src="js/sweetAlert.js"></script>
    <?php
    // caso faça algo errado
    if (isset($_SESSION['failed'])) {
        if ($_SESSION['failed'] == 'email') {
            $message_error = "O email digitado já está cadastrado!! Tente outro";
        } else if ($_SESSION['failed'] == 'nickname') {
            $message_error = "O nickname digitado já está cadastrado!! Tente outro";
        } else {
            $message_error = "Ocorreu um erro ao casdatrar";
        }
        $img_path = "Imagens/x_alert.png";
        $class_html = "image-fail-popup";
        echo '<script>
            Swal.fire({
                position: "top-end",
                html: "<img src=' . $img_path . ' class=' . $class_html . ' />",
                title: "' . $message_error . '",
                showConfirmButton: false,
                timer: 3500,
                customClass: {
                    title: "custom-title-forms",
                    popup: "custom-popup-forms"         
                }
            });    
        </script>';
        unset($_SESSION['failed']);
    }

    if (isset($_SESSION['no_logged'])) {
    ?>
        <script>
            Swal.fire({
                position: 'top-end',
                html: '<img src="Imagens/alert-message.png" class="image-fail-popup" />',
                title: 'Crie uma conta para poder realizar o donwload do jogo',
                showConfirmButton: false,
                timer: 3500,
                customClass: {
                    title: 'custom-title-forms',
                    popup: 'custom-popup-forms'
                }
            });
        </script>
    <?php
        unset($_SESSION['no_logged']);
    }
    ?>
    <script src="js/scripts.js"></script>
</body>

</html>