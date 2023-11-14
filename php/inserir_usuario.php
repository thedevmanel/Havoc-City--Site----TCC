<?php

session_start();

include 'conexao.php';

$id = uniqid();
$nome = $_GET['nome'];
$nickname = $_GET['nickname'];
$email = $_GET['email'];
$senha = $_GET['senha'];

// $senha = md5($senha);
// $senha = md5($senha);
if (isset($_SESSION['logged_adm'])) {
    mysqli_close($conn);

    echo "<script>
        alert('Voce esta logado como administrador. Não será possivel a inserção desse usuário');
        window.location.href='http://localhost//Havoc-City--Site----TCC/adm_page.php'
    </script>";
} else {


    $query_select = "SELECT * FROM `usuario` WHERE `email` = '$email' AND `senha` = '$senha'";
    $select = mysqli_query($conn, $query_select);

    if (($select) && ($select->num_rows != 0)) {
        while ($rows = mysqli_fetch_array($select)) {
            $detect_email = $rows['email'];

            if ($detect_email == $email) {
                mysqli_close($conn);

                echo "<script>
                alert('Email já esta Registrado!!');
                window.location.href='http://localhost//Havoc-City--Site----TCC/cadastro.php';
                </script>";
            }
        }
    }
    $inserir_dados = "INSERT INTO `usuario` VALUES ('$id', '$nome', '$nickname', '$email', '$senha')";

    if (mysqli_query($conn, $inserir_dados)) {
        $_SESSION['logged_user'] = $id;
    } else {
        echo "erro" . $inserir_dados, "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);

$url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . urlencode($id);

header('Location: ' . $url);
