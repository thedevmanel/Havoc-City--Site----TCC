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
            <img src="https://fontmeme.com/permalink/231030/8bed3f01dae90fa6adbb3602541bd9f2.png" class="logo-header" />
        </div>

        <ul>
            <li><a href="index.html">Home </a></li>

            <li><a href="Download.html">Download</a></li>

            <li><a href="<?php echo $url;?>">perfil</a></li>
        </ul>
    </nav>
    <div class="container-user">
        <div class="container-descriptions">
            <span class="title-user-info"> Seja bem vindo </span> <br />
                <div class="line-title"></div>
            <div class="box-description-user">
                <div class="box-save-button">
                    <div class="info-save-button">
                        Caso quiser, você pode adicionar seus dados salvos em nossos banco de dados. Para isso, clique no
                        botão abaixo e navegue até: <br /> <span class="file-path">C:\Users\"meu_usario"\AppData\Local\Havoc_City </span>no explorador de arquivos.
                    </div>
                    <div class="button-save">

                        <input type="file" id="fileInput" accept=".sav" />
                        <div id="numericValues"></div>
                        
                        <!-- Campos de entrada existentes -->
                        <form action="php/save_data.php" method="post">
                            <input type="text" name="id_user" id="id_user" value="<?php echo "$id"; ?>" hidden />
                            <input type="text" name="seconds" id="seconds" name="seconds" readonly hidden />
                            <input type="text" name="minutes" id="minutes" name="minutes" readonly hidden />
                            <input type="text" name="hours" id="hours" name="hours" readonly hidden />
                            <input type="text" name="pontuation" id="pontuation" name="pontuation" readonly hidden />
                            
                            <!-- Botão de confirmação e submit -->
                            <div id="confirmationDiv">
                                <p>Voce tem certeza de que quer enviar os dados?</p>
                                <input type="submit" value="Confirmar Envio" class="button-submit-save" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="info-description-user">
                    <span class="font-information-title"> Nome: </span> <?php echo $nome; ?> <br />
                    <span class="font-information-title"> Nickname: </span> <?php echo $nickname; ?> <br />
                    <span class="font-information-title"> E-mail: </span> <?php echo $email; ?> <br />

                </div>
            </div>
            <div class="buttons-user-page">
                <form action="edit.php" method="GET">
                    <input type="text" name="id" id="id" hidden value="<?php echo $id; ?>" />

                    <input type="submit" value="Editar" class="button-choose-user" />
                </form>

                <div class="box-button-delete">
                    <button class="button-choose-user" id="button-delete" onclick="showMessage()"> delete </button>

                    <div id="box-info-delete">
                        Deseja deletar o usuário?
                        <form action="php/delete_user.php" method="GET">
                            <input type="text" name="id" id="id" hidden value="<?php echo $id; ?>" />
                            
                            <input type="submit" id="delete" value="Sim" class="button-delete-accept" />
                        </form>
                        <button id="cancel" class="button-delete-accept" onclick="hideMessage()"> Não </button>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="info-footer">
            ™ & ©2023 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello, Gustavo Azevedo, <br>Pedro
            Ogata, Filipe Grande sao os desenvolvedores
        </div>
    </div>

    <script src="js/aparecerDelete.js"></script>
    <script>
    /* Aperecer opção de  baixar arquivo de save*/
        document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById("fileInput");
        const confirmationDiv = document.getElementById("confirmationDiv");

        fileInput.addEventListener("change", function (event) {
          const selectedFile = event.target.files[0];

          if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function (e) {
              const fileText = e.target.result;

              const regex =
                /(?:seconds|minutes|hours|pontuation)="(\d+\.\d+)"/g;
              let match;

              while ((match = regex.exec(fileText)) !== null) {
                const fieldName = match[0].split("=")[0];
                const value = match[1];

                // Preencha os campos de entrada existentes com os valores extraídos
                const inputField = document.getElementById(fieldName);
                if (inputField) {
                  inputField.value = value;
                }
              }

              // Mostrar o botão de confirmação após a leitura do arquivo
              confirmationDiv.style.display = "block";
            };

            reader.readAsText(selectedFile);
          }
        });
      });
    </script>
</body>

</html>