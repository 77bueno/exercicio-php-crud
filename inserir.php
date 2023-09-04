<?php
require_once "src/funcoes-crud.php";

if(isset($_POST['inserir'])){
	
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

	inserirAluno($conexao, $nome, $primeira_nota, $segunda_nota);

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container telameio">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
	    <p><label class="form-label" for="nome">Nome:</label>
	    <input class="form-control" type="text" id="nome" name="nome" required></p>
        
      <p><label class="form-label" for="primeira">Primeira nota:</label>
	    <input class="form-control" type="number" id="primeira" name="primeira_nota" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label class="form-label" for="segunda">Segunda nota:</label>
	    <input class="form-control" type="number" id="segunda" name="segunda_nota" step="0.01" min="0.00" max="10.00" required></p>
	    
      <button class="btn btn-primary" type="submit" name="inserir">Cadastrar aluno</button>
	</form>

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>