<?php
session_start();

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$classUsuario = new Usuario($db);


$produtos = [];

$query = "SELECT * FROM produtos ";
$result = $db->query($query);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = $row;
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
    <link rel="stylesheet" href="produtos.css">
    <title>Produtos Coffe's Garden</title>
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
                <a class="navbar-brand " href="login.php">
                    <i class="material-symbols-outlined">person</i></a>
            </div>
        </div>

    </nav>


    <section id="corpo">
        <img src="img/nav-produtos.png" alt="" id="slide">
        <section id="container">
            <div class="produto">
                <h1>Produtos</h1>
            </div>
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($produtos as $produto) {
                        echo '<div class="col-md-3 product-card">';
                        echo '<div class="card">';
                        echo '<img src="' . $produto["foto_produto"] . '" alt="' . $produto["nome_produto"] . '" class="card-img-top">';
                        echo '<div class="card-body">';
                        echo '<h2 class="card-title">' . $produto["nome_produto"] . '</h2>';
                        echo '<p class="card-text">' . $produto["descricao"] . '</p>';
                        echo '<a href="visualizar_produto.php?id_produto=' . $produto["id_produto"] . '" class="btn btn-primary">Visualizar Produto</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>



        </section>
        <section class="rodape">
            <div id="contato">
                <img src="img/whatsbranco.png" alt="">
                <p>(41) 9 9624-3287</p>
                <img src="img/instabranco.png" alt="">
                <p>@coffesgarden</p>
            </div>
            <div id="direitos">
                <p>Todos os direitos reservados a coffesgarden@gmail.com</p>
            </div>
        </section>
    </section>




</body>

</html>