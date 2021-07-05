<h1>Listagem de Violões</h1>

<html>
    <div>
        <form method = "POST" action ="?pg=itens/processar_cadastro">
            <select name="categoria">
                <option value="">Categoria</option>
                <option value="">Nome</option>
                <option value="">Código</option>
                <option value="">Descrição</option>
                <option value="">Foto</option>
            </select>
        </form>
        <button type="submit"><b>Buscar</b></button>
    </div>
</html>


<?php

if(!empty($_POST)){
    
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $codigo = $_POST["codigo"];
    $foto = $_POST["foto"];

}

$sql = "SELECT id, nome, descricao, codigo, foto FROM itens";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Código</th>
        <th>Foto</th>
    </tr>
    <?php
        while($linha = $result->fetch()){
    ?>
        <tr>
            <?php 
                foreach($linha as $chave => $valor){
            ?>
                <td><?= $valor ?></td>
            <?php
                }
            ?>
        </tr>
    <?php
        }
    ?>
</table>
