<?php

function analizarEntradaUsuario(array $numeros) {

    // Verificamos que el array no esté vacío
    if (empty($numeros)) {
        echo "ERROR El array no contiene datos.\n";
        return;
    }

    // Contamos el número de elementos y la suma total con funciones nativas
    $totalNumeros = count($numeros);
    $sumaTotal = array_sum($numeros);

    // Empleamos array_count_values para ver la cantidad de veces que se repite un valor
    $conteoGlobal = array_count_values($numeros);

    // Calculamos la moda ordenando de mayor a menor 
    arsort($conteoGlobal); 
    
    // Vemos el número que más aparece (el primero después de ordenar)
    $maxRepeticiones = max($conteoGlobal);

    // Extrae los números que más se repiten (las llaves que coinciden con el máximo)
    $modas = array_keys($conteoGlobal, $maxRepeticiones);

    // Cálculo de la Media global
    $mediaGlobal = $sumaTotal / $totalNumeros;

    echo "---Analisis de array---\n";
    echo "Total de números procesados: $totalNumeros\n";
    
    // Empleamos number_format para el formato de los números y que solo muestre dos decimales
    echo "Media global: " . number_format($mediaGlobal, 2) . "\n";
    
    // Empleamos implode para transformar el array de modas en un String que podamos imprimir
    echo "Moda: " . implode(', ', $modas) . " aparece $maxRepeticiones veces\n";

    echo "--- Conteo de repeticiones de cada numero ---\n";

    // Ordenamos por clave (el número) de menor a mayor para facilitar la lectura
    ksort($conteoGlobal); 

    foreach ($conteoGlobal as $num => $veces) {
        // Si $veces es 1, no se repite, se imprimirá por pantalla "aparece 1 vez"
        $mensaje = ($veces > 1) ? "se repite $veces veces" : "aparece 1 vez";
        echo "El número $num $mensaje.\n";
    }
}

// Ejemplo de uso
$numeros = [20, 20, 20, 5, 5, 1];
analizarEntradaUsuario($numeros);