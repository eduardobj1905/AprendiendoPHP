<?php



function analizarEntradaUsuario(array $numeros) {

if (empty($numeros)) {
        echo "Error: El array no contiene datos.\n";
        return;
    }

// Contamos el numero de elementos que hay en el array unificado y la suma total de estos
$totalNumeros = count($numeros);
$sumaTotal = array_sum($numeros);

//Empleamos array_count_values para ver la cantidad de veces que se repite un valor
$conteoGlobal = array_count_values($numeros);

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
}

$numeros =[20, 20, 20, 5, 5, 1];


analizarEntradaUsuario( $numeros);
