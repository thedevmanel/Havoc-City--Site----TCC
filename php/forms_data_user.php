<?php

session_start();

$btn_submit = $_POST['btn-submit'];

include "conexao.php";
include "cryptography.php";

// INSERT DATA USER
if ($btn_submit == 'register-user') {
    $id_users = uniqid(); // create id
    $name = $_POST['nome']; 
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $trigger = 0; // trigger for available data

    try {
        $select = $conn->verifyRegister($nickname, $email); // nomeando a variavel para que possa usar a função select
    
        if (($select) && ($select->rowCount() != 0)) {
            while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
                $detect_nickname = $rows['nickname']; // pegando o nicks do banco
                $detect_email = $rows['email']; // pegando emails do banco
    
                if ($detect_email == $email) {
                    $trigger = 1; // isso acarretará em um redirecionamento para página de cadastro
                    break;
                } else if ($detect_nickname == $nickname) {
                    $trigger = 2; // isso acarretará em um redirecionamento para página de cadastro
                    break;
                }
            }
        } 

        if (!$trigger) {
            // lógica para ver se o usuário realizou algum tipo de falha ao longo do cadastro
            if (isset($_SESSION['form_data'])) {
                unset($_SESSION['form_data']);
            } else {
            }
    
            // inserção de usuário
            try {
                $crypt_pass = cryptPass($password);
                $conn->insertDataUsers($id_users, $name, $nickname, $email, $crypt_pass);
                $_SESSION['logged_user'] = $id_users;
                header('Location: http://localhost:3000/usuario.php?id=' . $id_users);
    
                // echo "usuario cadastrado!!";
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao inserir o usuario -> " . die($e->getMessage());
            }
    
            // lógicas para retornar a página de cadastro caso falhe nos requisitos
        } else if ($trigger == 1) {
            $_SESSION['form_data'] = $_POST; // irá fazer com que os inputs ficaram da forma que foi enviada
            $_SESSION['failed'] = 'email';
            echo "<script>
                window.location.href='http://localhost:3000/cadastro.php';
            </script>";
        } else if ($trigger == 2) {
            $_SESSION['form_data'] = $_POST; // irá fazer com que os inputs ficaram da forma que foi enviada
            $_SESSION['failed'] = 'nickname';
            echo "<script>
                window.location.href='http://localhost:3000/cadastro.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo "Erro ao inserir usuário no banco de dados -> " . die($e->getMessage());
    }
} 
// LOG IN DATA USER
else if ($btn_submit == 'log-in-user') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $trigger = 0;

    try {
        $select = $conn->selectDataUser($email, $password);
    
        if (($select) && ($select->rowCount() != 0)) {
            while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
                $detect_email = $rows['email'];
                $detect_password = $rows['password'];
    
                $decrip_pass = decriptPass($password, $detect_password, $trigger);
                if ($decrip_pass) {
                    if ($detect_email == $email) {
                        $user_status = $rows['user_status'];
                        if ($user_status == true) {
                            if (isset($_SESSION['form_data'])) {
                                unset($_SESSION['form_data']);
                            }
                            $id_user = $rows['id_user'];
                            $_SESSION['logged_user'] = $id_user;
                            $trigger = 1;
                            
                            $url = "http://localhost:3000/usuario.php?id=" . urlencode($id_user);
                            header("Location: " . $url);
                        }
                    }
                }
            }
        } if (!$trigger) {
            $_SESSION['form_data'] = $_POST;
            $_SESSION["failed"] = 1;
         echo "<script>
                // alert('Email ou senha não existem ou foram digitados incorretamentes!');
                window.location.href='http://localhost:3000/entrar.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo "Erro ao entrar na conta!! -> " . die($e->getMessage());
    }
    
} 
// EDIT DATA USER
else if ($btn_submit == 'edit-user') {
    $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $trigger = 0;

    $select = $conn->selectAllFromUsers();

    try {
        if (($select) && ($select->rowCount() != 0)) {
            while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
                $verify_id_user = $rows['id_user'];
                $verify_email = $rows['email'];
                $verify_nickname = $rows['nickname'];

                if (($verify_email == $email) && ($verify_id_user != $id_user)) {
                    $trigger = 1;
                } else if (($verify_nickname == $nickname) && ($verify_id_user != $id_user)) {
                    $trigger = 2;
                }
            }
        }

        if ($trigger == 0) {
            $update = $conn->updateUsers($id_user, $name, $email, $nickname, $password);
        } else if ($trigger == 1) {
            echo "email já esta em uso";
        } else {
            echo "nickname já esta em uso";
        }
    } catch (PDOException $e) {
        echo "Erro ao autualizar os dados ->" . die($e->getMessage());
    }
}
// UPDATE NEW PASSWORD 
else if ($btn_submit == 'forgot-password') {
    $password = $_POST['password'];
    $key_pass = $_SESSION['key_pass'];
    $trigger = 0;

    $crypt_pass = cryptPass($password);

    $select = $conn->validateKeyPass($key_pass);

    if (($select) && ($select->rowCount() != 0)) {
        while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
            $verify_key_pass = $rows['key_forgot_password_webhc'];
            
            if ($verify_key_pass == $key_pass) {
                $conn->updatePassword($crypt_pass, $key_pass);
                $trigger = 1;
                $_SESSION['update_password'] = 'sucess';
                echo "sucesso";

                header('Location: http://localhost:3000/entrar.php');
            }
        }
    }

    if (!$trigger) {
        $_SESSION['update_password'] = 'failed';
        header('Location: http://localhost:3000/entrar.php');
    }
}

?>