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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Coffe's Garden</title>
</head>

<body>
    <?php include_once('view/header.php'); ?>

    <section class= "corpo">
        <div class="titulo">
            <h1>Coffe's Garden</h1>
        </div>

        <div id="slide1">
            <img src="img/slid.png" alt="" id="slide">
            <div id="frase">Bem-vindo(a) ao nosso paraíso<br>de café e flores.</p>
        </div>
    </section>
            <section id="produtos-destaques">
                <h2>Produtos mais pedidos</h2>
                <div>
                    <h3>Café Americano</h3>
                    <img src="img/americano.png" alt="">
                    <div id="adc">
                        <p>Sabor puro e tradicional, sem amargor. Descubra a perfeição em cada xícara.</p>  
                        <button>Saiba mais!</button>
                    </div>
                </div>
                <div>
                    <h3>Buquê Girassol</h3>
                    <img src="img/girassol.png" alt="">
                    <div id="adc">
                        <p>Raios de felicidade em cada pétala. Ilumine o dia com nosso buquê de girassóis.</p>
                        <button>Saiba mais!</button>
                    </div>
                </div>
                <div>
                    <h3>Garden Blond Vanilla Latte</h3>
                    <img src="img/garden.png" alt="">
                    <div id="adc">
                        <p>A doçura da baunilha encontra a suavidade do café blond. Experimente o paraíso em cada gole.</p>
                        <button>Saiba mais!</button>
                    </div>
                </div>
            </section>
    <div id="car">
        <span class="material-symbols-outlined" id="carrinho">shopping_cart</span>
        </div>
    

    <?php include_once('view/rodape.php'); ?>

    <script src="index.js"></script>

</body>

</html>