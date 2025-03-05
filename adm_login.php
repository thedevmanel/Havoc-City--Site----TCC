<?php

session_start();

if (isset($_SESSION['logged_user'])) {
    echo "<script>
        alert('Esta página é exclusiva para os administradores!');
        window.location.href='http://localhost//Havoc-City--Site----TCC/adm_page.php'
    </script>";
} else if (!isset($_SESSION['logged_adm'])) {
} else {
    header("Location: http://localhost//Havoc-City--Site----TCC/adm_page.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Adm</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/formulario.css" type="text/css" />
    <link rel="shortcut icon" href="" type="image x/icon" />
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

            <li><a href="adm_login.php">admin</a></li>
        </ul>
    </nav>
    <div class="container-form">
        <div class="box-image-form">
            <img src="Imagens/pageAdm.jpg" alt="" class="image-form">
        </div>
        <div class="formulario-box">
            <h2 class="titulo-formulario">Adiministracao</h2>
            <form action="php/selecionar_adm.php" method="post">
                <div class="user-box">
                    <input type="text" name="email" id="email" required autocomplete="off" />
                    <label for="email"> Email </label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" required autocomplete="off" value="<?php echo isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : ''; ?>" />
                    <label for="password"> Senha </label>
                    <span>
                        <img src="Imagens/hide_pass.png" alt="hide-password" class="image-show-hide-pass" onclick="showPassword()" id="show-password" />
                    </span>
                </div>
                <button type="submit" class="button-submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    entrar
                </button>
                <br />
                <br />

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
    // caso faça algo errado
    if (isset($_SESSION['failed'])) {
        $img_path = "Imagens/x_alert.png";
        $class_html = "image-fail-popup";
        echo '<script>
            Swal.fire({
                position: "top-end",
                html: "<img src='. $img_path .' class='. $class_html .' />",
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
    ?>
</body>
</html>