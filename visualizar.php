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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="m-5">
    
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <table class="table">
    <tr>
        <th scope="col"> Nome </th>
        <th> Primeira Nota </th>
        <th> Segunda Nota </th>
        <th> Média </th>
        <th> Situação </th>
        <th> Operações </th>
    </tr>
    
    <?php foreach ($alunos as $aluno) { ?>
    <tr>
        <td  scope="row"><?=$aluno['nome']?></td>
        <td><?=$aluno['primeira_nota']?></td>
        <td><?=$aluno['segunda_nota']?></td>
        <td><?=resultadoMedia($aluno['primeira_nota'], $aluno['segunda_nota'])?></td>
        <td class="situacao"><?=resultadoSituacao(resultadoMedia($aluno['primeira_nota'], $aluno['segunda_nota']))?></td>
        <td><a href="atualizar.php?id=<?=$aluno['id']?>">Editar |
            <a href="excluir.php?id=<?=$aluno['id']?>" class="excluir">Excluir</a></a></td>
    <tr>
    <?php } ?>
   </table>

    <p><a href="index.php">Voltar ao início</a></p>
    </div>
</div>

<script src="js/confirmar-exclusao.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/cor-na-tag.js"></script>

</body>
</html>