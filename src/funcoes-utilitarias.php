<?php

// Calculo de nota

function resultadoMedia(float $primeira_nota, float $segunda_nota):string{
    $media = ($primeira_nota + $segunda_nota) / 2;
    return number_format($media, 2);
}

// Situação de Aluno

function resultadoSituacao(float $media):string {
    if ($media >= 7) {
        $mensagem = "Aprovado";
    } elseif($media < 5) {
        $mensagem = "Reprovado";
    } else{
        $mensagem = "Recupereitchan!";
    }
    return $mensagem;
}