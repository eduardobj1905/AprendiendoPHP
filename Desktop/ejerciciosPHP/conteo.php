<?php

// Almacenamos todos los arrays en la variable listas
$arrays = [
    [5, 12, 8, 20, 1], [1, 1, 2, 3, 5, 8, 13], [10, 10, 10, 10],
    [19, 18, 17, 16, 15, 14, 13], [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
    [1, 3, 5, 7, 9, 11, 13, 15, 17, 19], [7, 14, 7, 14, 7], [20, 1, 20, 1],
    [11, 12, 13, 14, 15], [5, 10, 15, 20], [2, 3, 5, 7, 11, 13, 17, 19],
    [9, 3, 1, 18, 4, 12, 7, 2, 10], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    [15, 15, 16, 16, 17, 17], [4, 9, 16], [8, 16, 8, 4, 2, 1],
    [20, 20, 20, 5, 5, 1], [6, 12, 18], [1, 2, 2, 3, 3, 3, 4, 4, 4, 4],
    [13, 7, 19, 2, 11, 5, 17]
];

// Nos encargamos de unificar todos los arrays en uno grande
$union = array_merge(...$arrays);

// Contamos el numero de elementos que hay en el array unificado y la suma total de estos
$totalNumeros = count($union);
$sumaTotal = array_sum($union);

//Empleamos array_count_values para ver la cantidad de veces que se repite un valor
$conteoGlobal = array_count_values($union);

// Calculamos la moda ordenando de mayor a menor 
arsort($conteoGlobal); 
//Vemos el numero que mas aparece
$maxRepeticiones = max($conteoGlobal);

//Extrae los numeros que mas se repiten
$modas = array_keys($conteoGlobal, $maxRepeticiones);

// Cálculo de la Media global
$mediaGlobal = $sumaTotal / $totalNumeros;

echo "---Analisis de arrray---\n";
echo "Total de números procesados: $totalNumeros\n";
//Empleamos number_format para el formato de los numeros y que solo muestre dos decimales
echo "Media global: " . number_format($mediaGlobal, 2) . "\n";
//Empleamos implode para transformar el array de modas en un String que podamos imprimir
echo "Moda: " . implode(', ', $modas) . " aparece $maxRepeticiones veces\n";

echo "--- Conteo de repeticiones de cada numero ---\n";

// Ordenamos de menor a mayor para facilitar la lectura
ksort($conteoGlobal); 

foreach ($conteoGlobal as $num => $veces) {
    // Si $veces es 1, no se repite se imprimira por pantalla aparece 1 vez
    $mensaje = ($veces > 1) ? "se repite $veces veces" : "aparece 1 vez";
    echo "El número $num $mensaje.\n";
}