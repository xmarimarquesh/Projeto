<?php

session_start();
include("conexao/conexao.php");


!empty($_SESSION['email']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nós</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="sobre.css">
</head>

<body>

    <?php include_once('view/header.php'); ?>
    <section id="corpo">
        <img src="img/nav-produtos.png" alt="" id="slide">
        <section id="container">
            <div class="sobre">
                <h1>Sobre Nós</h1>
            </div>

            <p>Coffe's Garden é um encantador estabelecimento que combina a essência acolhedora de uma cafeteria com a beleza exuberante de uma floricultura, proporcionando aos seus clientes uma experiência única e relaxante. Localizada em um local pitoresco e tranquilo, esta joia escondida oferece um refúgio da agitação da vida cotidiana.</p>

            <?php include_once('view/rodape.php'); ?>

        </section>


    </section>

</body>

</html>