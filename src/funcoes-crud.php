<?php 
require_once "conecta.php";

// 1- CREATE / INSERT 

function inserirAluno(
    PDO $conexao,
    string $nome,
    float $primeira_nota, 
    float $segunda_nota
) {
    $sql = "INSERT INTO alunos(
        nome, primeira_nota, segunda_nota)
    VALUES(
        :nome, :primeira_nota, :segunda_nota
    )";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":primeira_nota", $primeira_nota, PDO::PARAM_STR);
        $consulta->bindValue(":segunda_nota", $segunda_nota, PDO::PARAM_STR);
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

// 2- READ / SELECT

function lerAlunos(PDO $conexao):array {
    $sql = "SELECT nome, primeira_nota, segunda_nota
    FROM alunos ORDER BY nome"; 

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar alunos: ".$erro->getMessage());
    }
    return $resultado;
}

// 3- UPDATE / UPDATE

function atualizarAlunos(
    PDO $conexao,
    string $nome,
    float $primeira_nota,
    float $segunda_nota
):void {
    $sql = "UPDATE produtos SET
    nome = :nome,
    primeira_nota = :primeira_nota,
    segunda_nota = :segunda_nota
    WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":primeira_nota", $primeira_nota, PDO::PARAM_STR);
        $consulta->bindValue(":segunda_nota", $segunda_nota, PDO::PARAM_STR);
    } catch (Exception $erro) {
        die("Erro ao atualizar: ".$erro->getMessage());
    }
}