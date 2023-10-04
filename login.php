<?php
session_start();
require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);




?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <header>

    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand " href="#">
                <img src="img/logo.png" alt="Bootstrap" width="30" height="24">
            </a>
            <div class="icons">
                <a class="navbar-brand " href="index.php">
                    <i class="material-symbols-outlined" width="30" height="24">home</i></a>
                <a class="navbar-brand " href="#">
                    <i class="material-symbols-outlined">person</i></a>
            </div>
        </div>
    </nav>



    <div class="container1">
        <div class="imagem">
            <img src="img/login.jpg">
        </div>

        <div class="formulario">

            <?php
            
            if (isset($_POST['logar'])) {
                
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $nome = $_POST['nome'];
                $login = $_POST['email'];
                
                if ($usuario->logar($email, $senha)) {
                        if($usuario->verificarAdm($email)){
                            $dadosUsuario = $usuario->getDadosUsuario($email);
                            $_SESSION['email'] = $login;
                            $_SESSION['adm'] = true; 
                            $_SESSION['nome'] = $dadosUsuario['nome'];
                            header("Location: dashboard-admin.php");
                            exit();
                        }else{
                            $dadosUsuario = $usuario->getDadosUsuario($email); // Suponhamos que isso retorne os dados do usuário, incluindo o nome
                            $_SESSION['email'] = $email;
                            $_SESSION['nome'] = $dadosUsuario['nome'];

                            header("Location: index.php");
                            exit();
                        }
                    
                } else {
                    print "<script>alert('Login inválido')</script>";
                }
            }

            

            if (isset($_POST['cadastrar'])) {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $confSenha = $_POST['confSenha'];
                $cep = $_POST['cep'];
                $rua = $_POST['rua'];
                $numero_casa = $_POST['numero_casa'];


                if ($usuario->cadastrar($nome, $email, $senha, $confSenha, $cep, $rua, $numero_casa)) {
                    echo "<p>Cadastro realizado com sucesso!</p>";
                } else {
                    echo "Erro ao cadastrar";
                }
            }
            ?>

            <div class="buttonsForm">
                <button id="btnLogar">Logar</button>
                <button id="btnRegistrar">Registrar</button>
                <div class="btnColor"></div>
            </div>

            <form method="POST" id="logar">
                <div class="input-group">
                    <span class="material-symbols-outlined" id="icon-email-logar">mail</span>
                    <input id="email-logar" type="email" name="email" placeholder="Digite seu E-mail..." required>
                </div>
                <div class="input-group">
                    <span class="material-symbols-outlined" id="icon-lock-logar">lock</span>
                    <input id="senha-logar" type="password" name="senha" placeholder="Digite sua senha..." required>
                </div>

                <button type="submit" name="logar" id="but-log">Logar</button>
            </form>



            <form method="POST" id="registrar">
                <span class="material-symbols-outlined" id="icon-person-cad">person</span>
                <input id="nome" type="text" name="nome" placeholder="Digite seu nome..." required>
                <span class="material-symbols-outlined" id="icon-email-cad">mail</span>
                <input id="email-cad" type="email" name="email" placeholder="Digite seu E-mail..." required>
                <span class="material-symbols-outlined" id="icon-lock-cad">lock</span>
                <input id="senha-cad" type="password" name="senha" placeholder="Digite sua senha..." required minlength="8" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}">
                <span class="material-symbols-outlined" id="icon-lock2-cad">lock</span>
                <input id="confsenha" type="password" name="confSenha" placeholder="Digite sua senha..." required minlength="8" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}">


                <h1><span class="material-symbols-outlined" id="icon-loca">location_on</span>Endereço</h1>


                <input id="cep" type="text" name="cep" placeholder="Digite seu CEP..." required>
                <input id="rua" type="text" name="rua" placeholder="Digite sua rua..." required>
                <input id="num" type="text" name="numero_casa" placeholder="Digite o número da sua casa..." required>
                <button type="submit" name="cadastrar" id="but-reg">Cadastrar</button>
            </form>
        </div>
    </div>

    <script src="index.js"></script>
</body>

</html>