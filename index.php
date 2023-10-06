<?php
session_start();

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$classUsuario = new Usuario($db);

// Array para produtos em destaque
$produtosDestaque = [];

// Busca produtos em destaque
$queryDestaque = "SELECT * FROM produtos WHERE destaque = 1";
$resultDestaque = $db->query($queryDestaque);
if ($resultDestaque->rowCount() > 0) {
    while ($row = $resultDestaque->fetch(PDO::FETCH_ASSOC)) {
        $produtosDestaque[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Galada&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
<?php include_once('view/header.php'); ?>
    <section id="corpo">
        <img src="img/slide.png" alt="" id="slide">
        <h1 id="titulo">Coffe's Garden</h1>
        <section id="container">
        <div id="frase">Explore nosso jardim de delícias, onde café e flores se unem para criar um verdadeiro paraíso.</div>

        <div class="container">
            <div class="row destaque">
                <div class="col-md-12 destaque">
                    <h2>Produtos em Destaque</h2>
                </div>
                <!-- Exibe produtos em destaque -->
                <?php
                foreach ($produtosDestaque as $produto) {
                    echo '<div class="col-md-3 product-card ">';
                    echo '<div class="card shadow">';
                    echo '<div class="cinza">';
                    echo '<img src="' . $produto["foto_produto"] . '" alt="' . $produto["nome_produto"] . '" class="card-img-top">';
                    echo '</div>';
                    echo '<div class="card-body">';
                    echo '<h2 class="card-title">' . $produto["nome_produto"] . '</h2>';
                    echo '<p class="card-text">' . $produto["descricao"] .'</p>';
                    echo '<div class="d-flex justify-content-around">';
                    echo '<a href="visualizar_produto.php?id_produto=' . $produto["id_produto"] . '" name="add" class=" btn btn-primary preco">R$ '. number_format($produto['preco'], 2, ',', '.') .'</a>';
                    echo '<a href="visualizar_produto.php?id_produto=' . $produto["id_produto"] . '" name="add" class=" btn btn-secondary confira shadow-sm">Confira!</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
        </div>

        <?php include_once('view/rodape.php'); ?>
    </section>
        
        

    </section>
</body>
</html>