<?php

session_start();
// Conectar ao banco de dados (substitua com suas credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT pedidos.id_pedido, produtos.nome_produto
        FROM pedidos
        JOIN produtos_pedido ON pedidos.id_pedido = produtos_pedido.id_pedido
        JOIN produtos ON produtos_pedido.id_produto = produtos.id_produto
        WHERE pedidos.id_usuario = $user_id";

$result = $conn->query($sql);

$data = array();

if ($result === false) {
    die("Erro na consulta SQL: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    // Tratar caso não haja resultados (nenhum pedido encontrado)
    echo "Nenhum pedido encontrado para o usuário.";
}

$conn->close();

echo json_encode($data);
?>