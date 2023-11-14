<?php

/** Función del Menú de Opciones.
 * Pregunta al usuario y devuelve la opción elegida
 * @return int
 */

 function seleccionarOpcion() {
    echo "MENÚ DE OPCIONES: ¡WORDIX! \n";
    echo "1. Jugar al WORDIX con una palabra elegida. \n";
    echo "2. Jugar al WORDIX con una palabra aleatoria. \n";
    echo "3. Mostrar una Partida. \n";
    echo "4. Mostrar la primer partida ganadora. \n";
    echo "5. Mostrar resumen de Jugador. \n";
    echo "6. Mostrar listado de partidas ordenadas por JUGADOR y por PALABRA.\n";
    echo "7. Agregar una palabra de 5 letras a Wordix.\n";
    echo "8. Salir.\n\n";
    echo "OPCIÓN: ";
    $opcionSeleccionada = trim(fgets(STDIN));
    if (is_numeric($opcionSeleccionada)) {
    return $opcionSeleccionada;
    } else {
        return false;
    }
}

/** Función que muestra las palabras almacenadas en el programa (Utilizada para opción 1 del MENÚ)
 * @return array
 */
function cargarColeccionPalabras() {
    $coleccionPalabras = [];
    $coleccionPalabras = 
    ["QUESO", "CAZAR", "HUEVO", "RESTO", "CANTO", 
    "MELON", "TERMO", "TINTO", "NAVES", "VERDE",
    "ABRIL", "TRAMO", "LECHE", "JERGA", "MARZO"];
    return $coleccionPalabras;
}


// PROGRAMA PRINCIPAL //
do {
$opcionMenu = seleccionarOpcion();
$partida = 0;
$jugador = [];
    switch ($opcionMenu) {
        case 1: 
            echo "NOMBRE DEL JUGADOR: ";
            $jugador[$partida]["nombre"] = trim(fgets(STDIN));
           for ($i = 0; $i < count(cargarColeccionPalabras()); $i++) {
            $palabra = cargarColeccionPalabras();
                echo "[" . $i+1 ."] => " . $palabra[$i] . "\n";
           }
           echo "Seleccione el número de palabra a JUGAR: ";
           $opcionPalabra = trim(fgets(STDIN));
           break;
           case 2:
        }
    } while ($opcionMenu < 8 || $opcionMenu > 0);