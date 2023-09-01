<?php
require_once "src/funcoes-crud.php";
require_once "src/funcoes-utilitarias.php";

$alunos = lerAlunos($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <table border="1">
    <tr>
        <th> Nome </th>
        <th> Primeira Nota </th>
        <th> Segunda Nota </th>
        <th> Média </th>
        <th> Situação </th>
        <th> Operações </th>
    </tr>

    
    <?php foreach ($alunos as $aluno) { ?>
    <tr>
        <td><?=$aluno['nome']?></td>
        <td><?=$aluno['primeira_nota']?></td>
        <td><?=$aluno['segunda_nota']?></td>
        <td><?=resultadoMedia($aluno['primeira_nota'], $aluno['segunda_nota'])?></td>
        <td><?=resultadoSituacao(resultadoMedia($aluno['primeira_nota'], $aluno['segunda_nota']))?></td>
        <td><a href="atualizar.php?id=<?=$aluno['id']?>">Editar |
            <a href="excluir.php?id=<?=$aluno['id']?>" class="excluir">Excluir</a></a></td>
    <tr>
    <?php } ?>
   </table>


    <p><a href="index.php">Voltar ao início</a></p>
</div>

<script src="js/confirmar-exclusao.js"></script>
</body>
</html>