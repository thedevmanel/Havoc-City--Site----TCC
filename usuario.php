<?php
    include "php/verificacao_id.php"; 

    $url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . urlencode($id);

?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/usuario.css">
    <title> Minha Conta </title>
</head>

<body>
    <nav id="menu-h">
        <div class="logo-jogo-header">
            <img src="https://fontmeme.com/permalink/230529/06735112d397a33f5f981ecb17a4ad41.png" class="logo-header" />
        </div>

        <ul>
            <li><a href="index.html">Home </a></li>

            <li><a href="Download.html">Download</a></li>

            <li><a href="<?php echo $url ?>">perfil</a></li>
        </ul>
    </nav>
    <div class="container-user">
        <!-- <div class="box-information-user">
             <div class="image-information-user">
                <img src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg" alt=""
                    class="main-image-userpage" />
            </div> -->
            <div class="info-description-user">
                <?php echo $nome; ?> <br />
                <?php echo $nickname; ?> <br />
                <?php echo $email; ?> <br />

                <br />
                <br />
                
            </div><!--
                
                </div> -->
                <form action="edit.php" method="GET">
                    <input type="text" name="id" id="id" hidden value="<?php echo $id;?>" />

                    <input type="submit" value="Editar"/> 
                </form>
    </div>
    <div class="footer">
        <div class="info-footer">
            © Todos os direitos estão reservados aos desenvolvedores
        </div>
        <div class="icons-footer">
            <span class="box-icones-footer">
                <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/insta.svg" class="icones-footer" alt="Imagem SVG" /></a>
                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/facebook.svg" class="icones-footer" alt="Imagem SVG" /></a>
                <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/twitter.svg" class="icones-footer" alt="Imagem SVG" /></a>
            </span>
        </div>
    </div>

    <script>

    </script>
</body>

</html>