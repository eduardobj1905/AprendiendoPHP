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

    // Ordenamos  de menor a mayor para facilitar la lectura
    ksort($conteoGlobal); 

    foreach ($conteoGlobal as $num => $veces) {
        // Si $veces es 1, no se repite, se imprimirá por pantalla "aparece 1 vez"
        $mensaje = ($veces > 1) ? "se repite $veces veces" : "aparece 1 vez";
        echo "El número $num $mensaje.\n";

    }
    return [
        'total' => $totalNumeros,
        'suma'  => $sumaTotal,
        'media' => $mediaGlobal,
        'modas' => $modas,
        'conteo' => $conteoGlobal
    ];
}

// Ejemplo de uso
//$numeros = [20, 20, 20, 5, 5, 1];
//analizarEntradaUsuario($numeros);

function Prueba() {
    echo "-----Inicio de Prueba Unitaria-----\n";
    echo "-----------------------------------\n";

   $input = [20, 20, 20, 5, 5, 1];
    $espTotal = 6;
    $espSuma  = 71;
    $espMedia = 11.83;
    $espModa  = [20];
    $espRepeticiones20 = 3;
    $espRepeticiones5  = 2;

    $res = analizarEntradaUsuario($input);
    $mediaReal = round($res['media'], 2);

    
    // Prueba 1 : Conteo total
    echo ($res['total'] === $espTotal) ? "Correcto" : "Error";
    echo " - Verificación de Conteo (Esperado: $espTotal, Real: {$res['total']})\n";

    // Prueba 2 : Suma total
    echo ($res['suma'] === $espSuma) ? "Correcto" : "Error";
    echo " - Verificación de Suma (Esperada: $espSuma, Real: {$res['suma']})\n";
    // Prueba 3 : Media
    echo ($mediaReal === $espMedia) ? "Correcto" : "Error";
    echo " - Verificación de Media (Esperada: $espMedia, Real: $mediaReal)\n";

    // Prueba 4 : Comprobacion de la moda
    echo ($res['modas'] === $espModa) ? "Correcto" : "Error";
    echo " - Verificación de Moda (Moda esperada: 20)\n";
    //Prueba 5 : Repeticiones
    echo ($res['conteo'][20] === $espRepeticiones20) ? "Correcto" : "Error";
    echo " - Verificación Repeticiones del 20 (Esperado: $espRepeticiones20, Real: {$res['conteo'][20]})\n";
    
    echo ($res['conteo'][5] === $espRepeticiones5) ? "Correcto" : "Error";
    echo " - Verificación Repeticiones del 5 (Esperado: $espRepeticiones5, Real: {$res['conteo'][5]})\n";

    echo "-------------------------------------------------------------\n";
}

Prueba();

?>