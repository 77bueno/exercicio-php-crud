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
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

// 2- READ / SELECT

function lerAlunos(PDO $conexao):array {
    $sql = "SELECT * FROM alunos ORDER BY nome"; 

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
    float $segunda_nota,
    int $id
):void {
    $sql = "UPDATE alunos SET
    nome = :nome,
    primeira_nota = :primeira_nota,
    segunda_nota = :segunda_nota
    WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":primeira_nota", $primeira_nota, PDO::PARAM_STR);
        $consulta->bindValue(":segunda_nota", $segunda_nota, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao atualizar: ".$erro->getMessage());
    }
}

// 4- LER UM ALUNO // SELECT
function lerUmAluno(PDO $conexao, int $id):array {
    $sql = "SELECT *, ROUND((primeira_nota + segunda_nota) / 2 , 2) AS media
    FROM alunos WHERE id = :id";
    
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao visualizar aluno: ".$erro->getMessage());
    }
    return $resultado;
}

// Excluir Aluno 

function excluirAluno(PDO $conexao, int $id):void {
    $sql = "DELETE FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao excluir: ".$erro->getMessage());
    }
}