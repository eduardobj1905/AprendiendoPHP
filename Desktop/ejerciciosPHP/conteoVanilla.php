<?php



function analizarEntradaUsuario(array $numeros) {


// Contamos el numero de elementos que hay en el array y verificamos que no este vacio
$totalNumeros = 0;
foreach ($numeros as $n) {
    $totalNumeros++;
}

if ($totalNumeros === 0) {
    echo "ERROR: El array está vacío.\n";
    exit;
}

//Calculamos la suma total de los elementos
$sumaTotal = 0;
foreach ($numeros as $n) {
    $sumaTotal += $n;
}

//Contamos las repeticiones
foreach ($numeros as $n) {
    $conteoGlobal[$n] = ($conteoGlobal[$n] ?? 0) + 1;
}

//Buscamos la moda
$maxRepeticiones = 0;
foreach ($conteoGlobal as $veces) {
    if ($veces > $maxRepeticiones) {
        $maxRepeticiones = $veces;
    }
}

$modas = [];
    $totalModas = 0; 
    foreach ($conteoGlobal as $num => $veces) {
        if ($veces === $maxRepeticiones) {
            $modas[] = $num;
            $totalModas++;
        }
    }
//Calculamos la media
$mediaGlobal = $sumaTotal / $totalNumeros;


echo "---Analisis de arrray---\n";

echo "Total de números procesados: $totalNumeros\n";

echo "Media global: " . $mediaGlobal . "\n";

//Utilizamos un bucle for para comprobar cuantas modas hay e imprimirlas
echo "Moda: ";
    for ($i = 0; $i < $totalModas; $i++) {
        echo $modas[$i];
        if ($i < $totalModas - 1) {
            echo ", ";
        }
    }
    echo " aparece $maxRepeticiones veces\n";
echo "--- Conteo de repeticiones de cada numero ---\n";


 foreach ($conteoGlobal as $num => $veces) {
    // Si $veces es 1, no se repite se imprimira por pantalla aparece 1 vez
    $mensaje = ($veces > 1) ? "se repite $veces veces" : "aparece 1 vez";
    echo "El número $num $mensaje.\n";
 }
}

$numeros =[20, 20, 20, 5, 5, 1];


analizarEntradaUsuario( $numeros);
