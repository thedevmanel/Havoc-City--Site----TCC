<?php

include "conexao.php";

$id_game = $_GET['id'];

$conn->admDeleteGameStats($id_game);


?>