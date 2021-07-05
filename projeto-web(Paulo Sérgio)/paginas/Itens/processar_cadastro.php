<?php

if(!empty($_POST)){
    
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $codigo = $_POST["codigo"];
    $foto = $_POST["foto"];

    # Insert no banco de dados
    $stmt = $conn->prepare("INSERT INTO itens (nome, descricao, codigo ,foto) VALUES (:nome, :descricao,:codigo, :foto)");

    $bind_param = ["nome" => $nome, "descricao" => $descricao, "codigo" => $codigo ,"foto" => $foto];

    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro ' . $conn->lastInsertId() . ' inserido no banco!</div>';
        $conn->commit();
    } catch(PDOExecption $e) {
        $conn->rollback();
        echo '<div class="msg-cadastro-contato msg-cadastro-erro">Erro ao inserir  no banco: ' . $e->getMessage() . '</div>';
    }

}

?>