<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'estatistica_jogador';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Erro... " . mysqli_connect_error($conn));
} else {
}