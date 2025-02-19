<?php
//delete.php
require 'conecta.php';
 
if (isset($_GET['id'])){
    $id = $_GET['id'];
 
    try{
        $sql = "DELETE FROM cadastro WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
 
        if($stmt->execute()){
            echo "Deletado com sucesso";
        }
        else{
            echo "Erro ao deletar";
        }
 
    }catch (PDOException $e) {
        echo "Erro:".$e->getMessage();
    }
}else{
    echo "ID não fornecido.";
}
?>
<br><a href="list.php">Voltar à lista de usuários</a>