<?php

// Almacenamos todos los arrays en la variable listas
$arrays = [
    [5, 12, 8, 20, 1], [1, 1, 2, 3, 5, 8, 13], [10, 10, 10, 10],
    [19, 18, 17, 16, 15, 14, 13], [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
    [1, 3, 5, 7, 9, 11, 13, 15, 17, 19], [7, 14, 7, 14, 7], [20, 1, 20, 1],
    [11, 12, 13, 14, 15], [5, 10, 15, 20], [2, 3, 5, 7, 11, 13, 17, 19],
    [9, 3, 1, 18, 4, 12, 7, 2, 10], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    [15, 15, 16, 16, 17, 17], [4, 9, 16], [8, 16, 8, 4, 2, 1],
    [20, 20, 20, 5, 5, 1], [6, 12, 18], [1, 2, 2, 2, 3, 3, 4, 4, 4, 4],
    [13, 7, 19, 2, 11, 5, 17]
];

// Nos encargamos de unificar todos los arrays en uno grande usando el operador ...
$union = array_merge(...$arrays);

// Obtenemos el total de elementos y la suma total con funciones directas
$totalNumeros = count($union);
$sumaTotal = array_sum($union);

// array_count_values cuenta automáticamente cuántas veces aparece cada valor
$conteoGlobal = array_count_values($union);

// Calculamos la moda: buscamos el valor máximo de repeticiones y sus llaves
$maxRepeticiones = max($conteoGlobal);
$modas = array_keys($conteoGlobal, $maxRepeticiones);

// Cálculo de la Media global
$mediaGlobal = $sumaTotal / $totalNumeros;

echo "---Analisis de array (Usando funciones nativas)---\n";
echo "Total de números procesados: $totalNumeros\n";
echo "Media global: " . number_format($mediaGlobal, 2) . "\n";

// implode une el array de modas en un string separado por comas
echo "Moda: " . implode(', ', $modas) . " aparece $maxRepeticiones veces\n";

echo "---------------------------------\n";
echo "Top 3 numeros mas frecuentes:\n";

// Ordenamos de mayor a menor frecuencia
arsort($conteoGlobal);

$i = 0;
foreach ($conteoGlobal as $num => $veces) {
    echo "Número $num: $veces veces\n";
    if (++$i == 3) break;
}