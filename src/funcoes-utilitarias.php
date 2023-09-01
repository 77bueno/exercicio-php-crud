<?php

// Calculo de nota

function resultadoMedia(float $primeira_nota, float $segunda_nota):string{
    $media = ($primeira_nota + $segunda_nota) / 2;
    return number_format($media, 2);
}

// Situação de Aluno

function resultadoSituacao(float $media):void {
    if ($media > 7) {
        echo "Aprovado";
    } elseif($media < 5) {
        echo "Reprovado";
    } else{
        echo "Recupereitchan!";
    }
}