<?php

function calcularMedia(float $nota1, float $nota2, float $nota3): float 
{ 
    return ($nota1 + $nota2 + $nota3) / 3; 
} 

function classificacao(float $media): string {
    if ($media >= 7) {
        $classificacao = "Aprovado"; 
    } elseif ($media >= 5) { 
        $classificacao = "Exame"; 
    } else { 
        $classificacao = "Reprovado"; 
    } 

    return $classificacao;
}
