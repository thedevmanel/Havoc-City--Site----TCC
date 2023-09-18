<?php

include "php/verificacao_id.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Minha Conta </title>
</head>

<body>
    <?php echo $id . $nome . $nickname . $email . $senha; ?>
</body>

</html>