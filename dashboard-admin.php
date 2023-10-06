<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$login = $_SESSION['email'];

require_once('classes/Produto.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$crud = new CrudProduto($db);

// Solicitações do usuário
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $crud->create($_POST);
            $rows = $crud->read(); // atualiza a variável $rows após a criação de um novo registro
            break;
        case 'read':
            $rows = $crud->read();
            break;
        default:
            $rows = $crud->read();
            break;
    }
} else {
    $rows = $crud->read();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ADM</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Painel de Controle do ADM</h1>
        <p class="text-center">Seja bem-vindo, <?php echo $_SESSION['nome']; ?></p>
        <a href="logout.php" class="btn btn-danger float-right">Sair</a>

        <form method="POST" action="?action=create" enctype="multipart/form-data" class="mt-5">
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" class="form-select">
                    <option value="cafe">Café</option>
                    <option value="flor">Flor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="destaque" class="form-label">Produto Destaque</label>
                <select name="destaque" class="form-select">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nome_produto" class="form-label">Nome do Produto</label>
                <input type="text" name="nome_produto" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço do Produto</label>
                <input type="text" name="preco" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="foto_produto" class="form-label">Foto do Produto</label>
                <input type="file" name="foto_produto" class="form-control" id="ft">
            </div>
            <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
        </form>

        <table class="table mt-5 tabela-produtos">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome do Produto</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Caminho Imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($rows)) {
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id_produto'] . "</td>";
                        echo "<td>" . $row['nome_produto'] . "</td>";
                        echo "<td>" . $row['tipo'] . "</td>";
                        echo "<td>" . $row['descricao'] . "</td>";
                        echo "<td>" . $row['foto_produto'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Não há registros a serem exibidos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Inclua os arquivos JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="footer">

    </footer>
</body>

</html>