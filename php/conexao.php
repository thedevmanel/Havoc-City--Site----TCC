<?php

include "controller.php";


try {
    $conn = new Database(); // criando uma instância da classe
    // $conn->connection($hostname, $database, $username, $password); // criando a conexao de acordo com a função

} catch (PDOException $e) {
    echo "Erro ao tentar conectar com o banco de dados -> " . die($e->getMessage());
}

?>