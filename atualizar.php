<?php
require_once "src/funcoes-crud.php";
require_once "src/funcoes-utilitarias.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$aluno = lerUmAluno($conexao, $id);

if (isset($_POST['atualizar'])) {
    $nome = filter_input(
        INPUT_POST, "nome",
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    $primeira_nota = filter_input(
        INPUT_POST, "primeira_nota",
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );
    $segunda_nota = filter_input(
        INPUT_POST, "segunda_nota",
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );
    

    atualizarAlunos( $conexao, $nome, $primeira_nota, $segunda_nota, $id);

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p> 

    <form action="#" method="post">
        
	    <p><label for="nome">Nome:</label>
	    <input value="<?=$aluno['nome']?>" type="text" name="nome" id="nome" required></p>
        
        <p><label for="primeira">Primeira nota:</label>
	    <input value="<?=$aluno['primeira_nota']?>" type="number" id="primeira" name="primeira_nota" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input value="<?=$aluno['segunda_nota']?>" type="number" id="segunda" name="segunda_nota" step="0.01" min="0.00" max="10.00" required></p>

            
        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media" class="form-label">Média:</label>
            <input value="<?=$aluno['media']?>" name="media" type="number" id="media" step="0.01" min="0.00" max="10.00" class="form-control" readonly disabled>
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao" >Situação:</label>
	        <input value="<?=resultadoSituacao($aluno['media'])?>" type="text" name="situacao" id="situacao" readonly disabled>
        </p>

        <button type="submit" name="atualizar" class="btn btn-primary">Atualizar dados do aluno</button>

        
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/cor-na-tag.js"></script>
</body>
</html>