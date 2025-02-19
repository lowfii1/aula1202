<?php
require 'conecta.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
   
    //try
    try {
        //define a consulta sql para atualizar os dados do usuário com base no id
        //utiliza parâmetros nomeados para prevenir injeção de sql
        $sql = "UPDATE cadastro SET nome =:nome,telefone =:telefone,email=:email WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
 
        if ($stmt->execute()) {
            echo "Usuário atualizado com sucesso";
        } else {
        }
    } catch (PDOException $e) {
        echo "Erro:" . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido";
}
 
//prepara a consulta para execução
 
//liga os parâmetros da consulta aos valores recebidos do formulário
 
?>
<br><a href="list.php">Voltar a lista de usuários</a>