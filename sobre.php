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
    <link rel="stylesheet" href="css/sobre.css">
</head>

<body>

    <?php include_once('view/header.php'); ?>
    <section id="corpo">
        <img src="img/nav-produtos.png" alt="" id="slide">
        <section id="container">
            <div class="sobre">
                <h1>Sobre Nós</h1>
            </div>
            <div class='telas'>
                <div class="texto">
                    <p>
                        No Refúgio Perfumado, unimos a paixão pelo café e o amor pelas flores para criar experiências únicas e memoráveis. Fundada por entusiastas do café e 
                        amantes das flores, nossa missão é trazer beleza, sabor e inspiração para o seu dia a dia. Selecionamos os melhores grãos de café e flores frescas para 
                        proporcionar uma jornada sensorial inesquecível. Nosso compromisso com a sustentabilidade reflete o cuidado que temos com o planeta. Seja para um momento
                         de relaxamento ou uma celebração especial, no Refúgio Perfumado, a simplicidade e sofisticação se encontram.
                    </p>

                </div>
                <div class="img">
                    <img src="img/coffee-5428480_1280.jpg" alt="" width="450px" height="auto">
                </div>
            </div>


            <?php include_once('view/rodape.php'); ?>



        </section>


    </section>

</body>

</html>