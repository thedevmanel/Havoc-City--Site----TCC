<?php

session_start();

include "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];
// $senha = md5($senha);
// $senha = md5($senha);

$gatilho = false;

$query_select = "SELECT * FROM `usuario` WHERE `email` = '$email' AND `senha` = '$senha'";
$select = mysqli_query($conn, $query_select);

if (($select) && ($select->num_rows != 0)) {
    while ($rows = mysqli_fetch_array($select)) {
        $detect_email = $rows['email'];
        $detect_senha = $rows['senha'];

        if (($detect_email == $email) && ($detect_senha == $senha)) {
            $gatilho = true;
            $id = $rows['id_user'];
            $_SESSION['logged_user'] = $id;
            $nome = $rows['nome'];
            $nickname = $rows['nickname'];
        } else {

        }
    }
}
if ($gatilho ==  false) {
    mysqli_close($conn);

    echo "<script language='javascript' type='text/javascript'>
        alert('O login ou senha digitados está incorreto');
        window.location.href='http://localhost//Havoc-City--Site----TCC/entrar.php';
    </script>";

} else {
    mysqli_close($conn);
    
    $url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . urlencode($_SESSION['logged_user']);
    
    header("Location: " . $url);

}
