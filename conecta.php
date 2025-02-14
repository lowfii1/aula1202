<?php

try {
    // a variavel $pdo éuma nova instancia de PDO
    $pdo = new PDO("mysql:dbname=crud;host=localhost", "root", "");
    echo "Bd ok";
} catch (Exception $e) {
    echo "Erro no BD" . $e->getMessage();
}
//insert
//bind = vincular
//$cmd = $pdo->prepare("insert into cadastro(id,nome,telefone,email)values(:id,:n,:t,:e)");
//$cmd->bindValue(":id","");
//$cmd->bindValue(":n","Thiago");
//$cmd->bindValue(":t","112052525252525");
//$cmd->bindValue(":e","Thiago@teodoro.com");
//$cmd->execute();
//$pdo->query("INSERT INTO cadastro(id,nome,telefone,email)VALUES
//('','Thiago,'000000','thiago@teodoro.com')");
//bindPARAM
// BINDPARAM SÓ ACEITA VARIÁVEIS = $cmd->bindValue(":e","$EMAIL");
 
//delete
//substitue id pela var $id
//$cmd = $pdo->prepare("delete from cadastro where id='1'");
//$id = 1;
//$cmd->bindValue(":id","1");
//$cmd->execute();
 
//$cmd = $pdo->prepare("delete from cadastro where id='4'");
//$cmd->execute();
 
//update
//$pdo->query("UPDATE cadastro SET email='thiago@teodoro.com' WHERE id='5'");
 
//$cmd = $pdo->prepare("update cadastro set email='thiago@teodoro.com'where id=:id");
//$cmd->bindValue(":id",3);
//$cmd->execute();
 
//select
$cmd = $pdo->prepare("select * from cadastro where id=:id");
$cmd->bindValue(":id", 3);
$cmd->execute();
 
//fetch = um unico registro, all = mais de um registro
//fetch = buscar
 
//$valores = $cmd->fetch(PDO::FETCH_ASSOC);
//echo"<pre>";
//print_r($valores);
//echo"</pre>";
 
$valores = $cmd->fetch(PDO::FETCH_ASSOC);
foreach ($valores as $key => $value) {
    echo $key . ":" . $value . "<br>";
}