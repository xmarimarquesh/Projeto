<?php
session_start();

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$classUsuario = new Usuario($db);

$produto = null;


// Verifica se um ID de produto foi passado via GET
if (isset($_GET['id_produto'])) {
    $id_produto = $_GET['id_produto'];

    // Consulta SQL para buscar informações do produto pelo ID
    $sql = "SELECT * FROM produtos WHERE id_produto = :id_produto";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_produto', $id_produto);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Produto não encontrado.";
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="produto_esp.css">
    <style>

    </style>
</head>

<body>

    <?php require('view/header.php'); ?>


    <section id="corpo">
        <img src="img/fundo.jpg" alt="" id="slide">
        <section id="container">
            <div class="container">
                <div class="row g-2 justify-content-around tudo">
                    <div class="col-md-6 d-flex justify-content-center align-itens-center order-lg-2">
                        <div class="p-3 texto">
                            <h1 class="custom-highlight" style="font-size: 6.5em;"><?php echo $produto['nome_produto']; ?></h2>
                            <div class="preco">
                                <p class="produto-preco">Preço: R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                                <p class="produto-descricao"><?php echo $produto['descricao']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-itens-center order-lg-2">
                        <div class="p-3 imagem">
                            <img src="<?php echo $produto['foto_produto']; ?>" alt="<?php echo $produto['nome_produto']; ?>" class="mx-auto d-block  " width="700" height="auto">
                        </div>
                    </div>
                </div>

                <div class="produto-info">
                    <img src="<?php echo $produto['foto_produto']; ?>" alt="<?php echo $produto['nome_produto']; ?>" class="produto-img">
                    <div>
                        <h2 class="produto-titulo"><?php echo $produto['nome_produto']; ?></h2>
                        <p class="produto-descricao"><?php echo $produto['descricao']; ?></p>
                        <p class="produto-preco">Preço: R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
        </section>
    </section>



</body>

</html>