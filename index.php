<?php

function verificarParImpar($numero)
{
  return ($numero % 2 == 0) ? "par" : "ímpar";
}

$handle = fopen('./colunas.csv', 'r'); //modo de abertura é 'r' leitura.

if ($handle !== false) {

  $coluna1 = [];
  $coluna2 = [];


  while (($data = fgetcsv($handle, 1000, ';')) !== false) { //Um loop while é utilizado para ler cada linha do CSV usando a função fgetcsv.
    if (count($data) >= 2) {
      $coluna1[] = intval(trim($data[0]));
      $coluna2[] = intval(trim($data[1]));
    }
  }

  fclose($handle);

  $mediaColuna1 = array_sum($coluna1) / count($coluna1);
  $mediaColuna2 = array_sum($coluna2) / count($coluna2);

  $mediaInteiraColuna1 = intval($mediaColuna1);
  $mediaInteiraColuna2 = intval($mediaColuna2);

  echo "A média da coluna 1 é: $mediaInteiraColuna1\n";
  echo "A média da coluna 2 é: $mediaInteiraColuna2\n";

  echo "A média da coluna 1 é: " . verificarParImpar($mediaInteiraColuna1) . "\n";
  echo "A média da coluna 2 é: " . verificarParImpar($mediaInteiraColuna2) . "\n";
} else {
  echo "Erro ao abrir o arquivo CSV.";
}