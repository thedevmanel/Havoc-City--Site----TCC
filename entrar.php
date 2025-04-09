<?php

session_start();

// caso esteja logado como adm, saira da página com uma mensagem
if (isset($_SESSION['logged_adm'])) {
    echo "<script>
        alert('Voce esta logado como administrador. Efetue o logout do administrador para realizar um login normal');
        window.location.href='http://localhost:3000/adm_page.php'
    </script>";
} else if (!isset($_SESSION['logged_user'])) {
    // se não está logado, ele vai a página normalmente
} else {
    // caso já esteja logado com um usuário normal, ele será redirecionado a página de usuário
    $url = "http://localhost:3000/usuario.php?id=" . urlencode($_SESSION['logged_user']);

    header("Location: " . $url);
}

if (isset($_SESSION['key_pass'])) {
    unset($_SESSION['key_pass']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Efeutar Login</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/formulario.css" type="text/css" />
    <link rel="shortcut icon" href="" type="image x/icon" />
    <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>
<style>
    @media (orientation: portrait) {
        .footer {
            top: 85vh;
        }
    }
</style>
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
    <nav id="menu-h">
        <div class="logo-jogo-header">
            <img src="https://fontmeme.com/permalink/231027/599d6f4224ce722a5f04605e3e9d1db4.png" class="logo-header" />
        </div>

        <ul>
            <li><a href="index.php">Home </a></li>

            <li><a href="Download.php">Download</a></li>

            <li><a href="entrar.php">iniciar sessao</a></li>
        </ul>
    </nav>
    <div class="container-form">
        <div class="box-image-form">
            <img src="Imagens/formImage.jpg" alt="" class="image-form">
        </div>
        <div class="formulario-box">
            <h2 class="titulo-formulario">LOGIN</h2>
            <form action="php/forms_data_user.php" method="post">
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
                    Não possui uma conta?<a href="cadastro.php" class="link-forms">
                        cadastre aqui
                    </a>
                </p>
                <button type="submit" class="button-submit" name="btn-submit" value="log-in-user">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    entrar
                </button>
                <br />
                <br />


            </form>
            <div class="forget-pass-box"> <button class="link-forms" id="forgot-pass"> Esqueci minha senha </button> </div>

            <form id="form-input-forgot-pass" action="php/forgot_pass.php" method="POST">
                <input type="hidden" name="input-for-forgot-pass" id="input-for-forgot-pass" />

            </form>
        </div>
    </div>
    <div class="footer">
        <div class="info-footer">
            ™ & ©2024 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello
        </div>
    </div>
    <script src="js/mostrarSenha.js"></script>
    <script src="js/sweetAlert.js"></script>
    <?php
    // caso email e/ou senha estejm errados
    if (isset($_SESSION['failed'])) {
        $img_path = "Imagens/x_alert.png";
        $class_html = "image-fail-popup";
        echo '<script>
            Swal.fire({
                position: "top-end",
                html: "<img src=' . $img_path . ' class=' . $class_html . ' />",
                title: "O email e/ou senha digitados estão incorretos",
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

    // confirmação de email para a nova senha
    if (isset($_SESSION['confirm_email'])) {
        // email correto
        if ($_SESSION['confirm_email'] == 'known') {
            $img_path = "Imagens/correct_img.png";
            $class_html = "image-fail-popup";
            echo '<script>
                Swal.fire({
                    position: "top-end",
                    html: "<img src=' . $img_path . ' class=' . $class_html . ' />",
                    title: "Enviamos um link para sua caixa de email, assim, você será redirecionado para escrever uma nova senha",
                    showConfirmButton: false,
                    timer: 7000,
                    customClass: {
                        title: "custom-title-forms",
                        popup: "custom-popup-forms"         
                    }
                });    
            </script>';
            // email incorreto
        } else {
            echo '
            <script>
                Swal.fire({
                    icon: "error",
                    title: "O email digitado está incorreto e/ou não existe !!",
                    showConfirmButton: true,
                    customClass: {
                        title: "custom-title-msg-err-email",
                        popup: "custom-popup-msg-err-email",
                        confirmButton: "custom-button-error-pass"     
                    }
                });    
            </script>
            ';
        }
        unset($_SESSION['confirm_email']);
    }

    // token para recuperação de senha inválido
    if (isset($_SESSION['update_password'])) {
        if ($_SESSION['update_password'] == 'sucess') {
            $img_path = "Imagens/correct_img.png";
            $class_html = "image-fail-popup";
            echo '<script>
                Swal.fire({
                    position: "top-end",
                    html: "<img src=' . $img_path . ' class=' . $class_html . ' />",
                    title: "Sua senha foi cadastrada com sucesso, e agora você poderá realizar o login com sua nova senha !!",
                    showConfirmButton: false,
                    timer: 7000,
                    customClass: {
                        title: "custom-title-forms",
                        popup: "custom-popup-forms"         
                    }
                });    
            </script>';
        } else if ($_SESSION['update_password'] == 'failed') {
            $img_path = "Imagens/x_alert.png";
            $class_html = "image-fail-popup";
            echo '<script>
                Swal.fire({
                    position: "top-end",
                    html: "<img src=' . $img_path . ' class=' . $class_html . ' />",
                    title: "O token para a recuperação de senha está inválida ou inspirada...",
                    showConfirmButton: false,
                    timer: 3500,
                    customClass: {
                        title: "custom-title-forms",
                        popup: "custom-popup-forms"         
                        }
                });    
                </script>';
        }
        unset($_SESSION['update_password']);
    }

    ?>
    <script src="js/scriptFormularios.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>