<?php

include "conexao.php";

$id = $_GET['id'];

$delete_query = "DELETE FROM `jogo` WHERE `id_jogo`='$id'";

if (mysqli_query($conn, $delete_query)) {
    echo "<script>
        alert('O usuario foi deletado');
        window.location.href='http://localhost//Havoc-City--Site----TCC/adm_gen.php';
    </script>";
} else {
    echo "Error" . $delete_query, "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>