<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}


$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>


<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand " href="#">
                <img src="img/logo.png" alt="Bootstrap" width="80" height="80">
            </a>
            <div class="collapse navbar-collapse pl-5" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
                    <li class="nav-item">
                        <a id = "inicio" class=" nav-link " href="#">Inicio</a>
                        <button class="nav-link" id="inicio">Logar</button>
                    </li>
                    <li class="nav-item">
                        <a id = "produtos" class="  nav-link" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a id = "sobre" class=" nav-link" href="#">Sobre nós</a>
                    </li>
                </ul>
                
            </div>
            <div class="btnColor"></div>
            <div class="icons">
                <a class="navbar-brand " href="#">
                    <i class="material-symbols-outlined">person</i></a>
            </div>
        </div>
    </nav>

    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container1">
            <div class="Produtos">
                <h3>Produtos</h3>
            </div>
        </div>
    </div>


    <script src="index.js"></script>

</body>

</html>