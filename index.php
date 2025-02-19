<?php
//list.php
require 'conecta.php';
 
try {
    $sql = "SELECT * FROM cadastro";
    $stmt = $pdo->query($sql);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro:" . $e->getMessage());
}
 
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Cadastro de Pessoas</title>
    <link rel="stylesheet" href="style.css">
 
</head>
<body>
<section id="esquerda">
    <form action="insert.php" method="post">
        <h2>Cadastrar Pessoas</h2>
        <label for ="nome">Nome</label>
        <input type="text" name="nome" id="nome">
        <label for ="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone">
        <label for ="email">Email</label>
        <input type="text" name="email" id="email">
        <input type="submit" value="Cadastrar">
 
    </form>
 
</section>
<section id = "direita">
    <table>
    <thead>
        <tr id="titulo">
            <td>Id</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td colspan="2">Email</td>
        <tr>  
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['telefone'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                   
                    <td>
                        <a href="update_form.php?id=<?= $usuario['id'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
 
</section>
</body>
</html>
 