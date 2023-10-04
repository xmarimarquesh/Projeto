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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top " id="nav1">

        <div class="container">

            <a class="navbar-brand " href="#">
                <img src="img/logo.png" alt="Bootstrap" width="80" height="80">
            </a>
            <div class="collapse navbar-collapse pl-5" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
                    <li class="nav-item">
                        <a id="inicio" class=" nav-link " href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a id="produtos" class="  nav-link" href="produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a id="sobre" class=" nav-link" href="#">Sobre nós</a>
                    </li>
                </ul>

            </div>

            <div class="icons">
            <?php
            
          
                if (!empty($_SESSION['email'])) { 
                    
                    ?>
                    <a href="logout.php" type="button" >Deslogar</a>
                    <a   ><?php echo 'Olá ' .$_SESSION['nome']. '!' ;?></a>
                    <?php
                    
                } else { ?>
                    <a class="navbar-brand " href="login.php">
                    <i class="material-symbols-outlined">person</i></a>
                    <?php
                }
                ?>
                
            </div>
        </div>
    </nav>

    <section class= "corpo">
        <div class="titulo">
            <h1>Coffe's Garden</h1>
        </div>

        <img src="img/slide.png" alt="" id="slide">
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
    

    <section class="rodape">
        <div id="contato">
            <img src="img/whatsbranco.png" alt=""><p>(41) 9 9624-3287</p>
            <img src="img/instabranco.png" alt=""><p>@coffesgarden</p>
        </div>
        <div id="direitos">
            <p>Todos os direitos reservados a coffesgarden@gmail.com</p>
        </div>
    </section>

    <script src="index.js"></script>

</body>

</html>