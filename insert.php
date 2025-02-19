<?php
require 'conecta.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    //try
    try {
        //define a consulta sql para atualizar os dados do usuário com base no id
        //utiliza parâmetros nomeados para prevenir injeção de sql
        $sql = "INSERT INTO  cadastro (nome,telefone,email) VALUES(:nome,:telefone,:email)";
        $stmt = $pdo->prepare($sql);
       
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        if ($stmt->execute()) {
            echo "cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar usuário";
        }
    } catch (PDOException $e) {
        echo "Erro:" . $e->getMessage();
    }
} else {
    echo "Metodo de requisição inválido";
}
?>
 