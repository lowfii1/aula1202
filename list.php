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
 
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
 
<body>
<h1>Lista de Usuários</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th> </tr>
        </thead>
        <tbody>  <?php foreach ($usuarios as $usuario): ?>  <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['telefone'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td>
                        <a href="update_form.php?id=<?= $usuario['id'] ?>">Editar</a> | <a href="delete.php?id=<?= $usuario['id'] ?>">Excluir</a> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
 
</html>