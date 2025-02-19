<?php
// Importa o arquivo de configuração que contém, por exemplo, a conexão com o banco de dados
require 'conecta.php';
 
// Verifica se o parâmetro "id" foi enviado via URL (Método GET)
if (isset($_GET['id'])) {
    // Atribui o valor do parâmetro "id" à variável $id
    $id = $_GET['id'];
 
    try {
        // Define a consulta SQL para selecionar todos os dados do usuário cujo id corresponde ao informado
        $sql = "SELECT * FROM cadastro WHERE id = :id";
 
        // Prepara a consulta SQL utilizando PDO para evitar injeção de SQL
        $stmt = $pdo->prepare($sql);
 
        // Associa o valor da variável $id ao parâmetro nomeado ":id" na consulta SQL
        $stmt->bindParam(':id', $id);
 
        // Executa a consulta preparada
        $stmt->execute();
 
        // Recupera os dados do usuário com um array associativo
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // Verifica se algum usuário foi encontrado; se não, encerra o script com uma mensagem de erro
        if (!$usuario) {
            die("Usuário não encontrado.");
        }
    } catch (PDOException $e) {
        // Se ocorre algum erro na consulta, exibe a mensagem de erro e encerra o script
        die("Erro: " . $e->getMessage());
    }
} else {
    // Caso o parâmetro "id" não tenha sido informado via GETm encerra o script com uma mensagem de erro
    die("ID não fornecido.");
}
 
?>
<html lang="pt-BR">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário</title>
</head>
 
<body>
    <h1>Atualizar Usuário</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $usuario['nome'] ?>" required><br><br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?= $usuario['telefone'] ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $usuario['email'] ?>" required><br><br>
        <required><br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
 
</html>