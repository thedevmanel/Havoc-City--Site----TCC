<?php

session_start();

include "conexao.php";

$email = $_POST['email'];
$password = $_POST['password'];

$conn->selectAdm($email, $password);