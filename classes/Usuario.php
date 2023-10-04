<?php

include('conexao/conexao.php');

$db = new Conexao();

class Usuario
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar($nome, $email, $senha, $confSenha, $cep, $rua, $numero_casa)
    {

        if ($senha == $confSenha) {

            $emailExistente = $this->verificacaoEmailExistente($email);
            if ($emailExistente) {
                print "<script>alert('Email já cadastrado')</script>";
                return false;
            }

            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha, cep, rua, numero_casa) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $senhaCriptografada);
            $stmt->bindValue(4, $cep);
            $stmt->bindValue(5, $rua);
            $stmt->bindValue(6, $numero_casa);
            $result = $stmt->execute();

            return $result;
        } else {
            return false;
        }
    }

    private function verificacaoEmailExistente($email)
    {
        $sql = "SELECT COUNT(*) from usuarios WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    public function logar($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $usuario['senha'])) {
                return true;
            }
        }
    }

    public function getDadosUsuario($email)
    {
        $sql = "SELECT nome FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verificarAdm($login)
    {
        $query = "SELECT adm FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':email', $login);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario['adm'] == 1;
        }

        return false;
    }
}
