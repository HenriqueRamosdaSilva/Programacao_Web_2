<?php
require_once 'funcoes.php';

$nome = "João";
$media = calcularMedia(1, 1, 6);
$classificacao = classificacao($media);

echo "Nome: $nome\n";
echo "Média: $media\n";
echo "Classificação: $classificacao";
