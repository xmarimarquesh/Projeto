<?php
session_start();

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$classUsuario = new Usuario($db);


$produtosCafe = [];
$produtosFlores = [];

// Busca produtos de café
$queryCafe = "SELECT * FROM produtos WHERE tipo = 'cafe'";
$resultCafe = $db->query($queryCafe);
if ($resultCafe->rowCount() > 0) {
    while ($row = $resultCafe->fetch(PDO::FETCH_ASSOC)) {
        $produtosCafe[] = $row;
    }
}

// Busca produtos de flores
$queryFlores = "SELECT * FROM produtos WHERE tipo = 'flor'";
$resultFlores = $db->query($queryFlores);
if ($resultFlores->rowCount() > 0) {
    while ($row = $resultFlores->fetch(PDO::FETCH_ASSOC)) {
        $produtosFlores[] = $row;
    }
}
?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Galada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="produtos.css">
    <title>Produtos Coffe's Garden</title>
</head>

<style>
    .cinza {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        margin: 20px 20px 0px 20px;
        padding: 25px;
        background-color: aliceblue;
    }

    .cinza img {
        width: 200px;
        height: auto;
    }

    .card-body h2 {
        color: #7C573E;
    }

    .btn-primary {
        --bs-btn-color: #fff !important;
        --bs-btn-bg: #7C573E !important;
        --bs-btn-border-color: #7C573E !important;
        --bs-btn-hover-color: #fff !important;
        --bs-btn-hover-bg: #3b2516 !important;
        --bs-btn-hover-border-color: #3b2516 !important;
    }


    .preco {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0px 20px;
    }

    .confira {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-secondary {
        --bs-btn-color: #7C573E !important;
        --bs-btn-bg: #fff !important;
        --bs-btn-border-color: #7C573E !important;
        --bs-btn-hover-color: #fff !important;
        --bs-btn-hover-bg: #3b2516 !important;
        --bs-btn-hover-border-color: #3b2516 !important;
    }

    .shadow-sm {
        --bs-box-shadow-sm: 0.1rem 0.1rem 0rem rgb(124 87 62);
    }

    ;

    .card-body {
        padding: 0;
    }

    .cafe{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 2%;
    }

    .cafe h2{
        color: #7C573E;
        font-size: 4em;
    }

    .flores{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5% 0 2% 0 !important;
    }

    .flores h2{
        color: #7C573E;
        font-size: 4em;
    }


</style>

<body>

    <?php include_once('view/header.php'); ?>
    <section id="corpo">
        <img src="img/nav-produtos.png" alt="" id="slide">
        <section id="container">
            <div class="produto">
                <h1>Produtos</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 cafe">
                        <h2>Cafés</h2>
                    </div>
                    <?php
                    foreach ($produtosCafe as $produto) {
                        echo '<div class="col-md-3 product-card ">';
                        echo '<div class="card shadow">';
                        echo '<div class="cinza">';
                        echo '<img src="' . $produto["foto_produto"] . '" alt="' . $produto["nome_produto"] . '" class="card-img-top">';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<h2 class="card-title">' . $produto["nome_produto"] . '</h2>';
                        echo '<p class="card-text">' . $produto["descricao"] . '</p>';
                        echo '<div class="d-flex justify-content-around">';
                        echo '<a href="visualizar_produto.php?id_produto=' . $produto["id_produto"] . '" name="add" class=" btn btn-primary preco">R$ ' . $produto["preco"] . '</a>';
                        echo '<a href="visualizar_produto.php?id_produto=' . $produto["id_produto"] . '" name="add" class=" btn btn-secondary confira shadow-sm">Confira!</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>


                    <div class="col-md-12 flores">
                        <h2>Flores</h2>
                    </div>
                    <?php
                    foreach ($produtosFlores as $produto) {
                        echo '<div class="col-md-3 product-card ">';
                        echo '<div class="card shadow">';
                        echo '<div class="cinza">';
                        echo '<img src="' . $produto["foto_produto"] . '" alt="' . $produto["nome_produto"] . '" class="card-img-top">';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<h2 class="card-title">' . $produto["nome_produto"] . '</h2>';
                        echo '<p class="card-text">' . $produto["descricao"] . '</p>';
                        echo '<div class="d-flex justify-content-around">';
                        echo '<a href="visualizar_produto.php?id_produto=' . $produto["id_produto"] . '" name="add" class=" btn btn-primary preco">R$ ' . $produto["preco"] . '</a>';
                        echo '<a href="visualizar_produto.php?id_produto=' . $produto["id_produto"] . '" name="add" class=" btn btn-secondary confira shadow-sm">Confira!</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <?php include_once('view/rodape.php'); ?>

        </section>



    </section>


</body>
<?php include_once('view/rodape.php'); ?>

</html>