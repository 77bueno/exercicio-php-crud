<?php
require_once "src/funcoes-crud.php";

$alunos = inserirAluno($conexao, $nome, $primeira_nota, $segunda_nota);

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
    </tr>
    <tr>
        <td>3</td>
        <td>2</td>
        <td>1</td>
    </tr>
   </table>


    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>