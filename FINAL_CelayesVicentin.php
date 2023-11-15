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

/** Función que elige una palabra aleatoria desde una colección de palabras
 * @param array $coleccionPalabras
 * @return string $palabra
 */
    
/** Función para almacenar partidas
 * @param string $nombre
 * @param string $palabra
 * @param int $intentos
 * @param float $puntaje
 * @param int $nroPartida
 * @return array 
 */

 $datosPorJugador = []; //Inicializo el arreglo fuera de la función, para almacenar los datos por jugador.
function cargarPartidas(string $nombre, string $palabra, int $intentos, float $puntaje, int $nroPartida) {
    if (isset($datosPorJugador[$nombre])) { //verifica si el jugador tiene partidas registradas
        $datosPorJugador[$nombre] = [];
    }

    $partidaActual = [      //Arreglo asociativo general para la partida actual
        "jugador" => $nombre,
        "palabra" => $palabra,
        "intentos" => $intentos,
        "puntaje" => $puntaje
    ];
    $datosPorJugador[$nroPartida] = $partidaActual;
    return $datosPorJugador[$nroPartida];
}
/** Función que muestra las palabras almacenadas en el programa (Utilizada para opción 1 del MENÚ)
 * @return array
 */
function cargarColeccionPalabras() {
    $coleccionPalabras = [];
    $coleccionPalabras = ["QUESO", "CAZAR", "HUEVO", "RESTO", "CANTO", 
    "MELON", "TERMO", "TINTO", "NAVES", "VERDE",
    "ABRIL", "TRAMO", "LECHE", "JERGA", "MARZO"];
    return $coleccionPalabras;
}

/** Función que agrega una palabra al final del arreglo $coleccionPalabras
 * @param array $colPalabras
 * @param string $palabra
 * @return array
 */

 function agregarPalabra(array $coleccionPalabras, string $palabra) {
    $longitud = count($coleccionPalabras);
    $coleccionPalabras[$longitud] = $palabra;
    return $coleccionPalabras;
}

// PROGRAMA PRINCIPAL //
$opcionMenu = seleccionarOpcion();

    do {
        $partida = 0;
        $jugador = [];
            if ($opcionMenu > 0 && $opcionMenu <= 8) {    
                switch ($opcionMenu) {
                case 1: 
                    echo "****************";
                    echo "NOMBRE DEL JUGADOR: ";
                    $jugador[$partida]["nombre"] = trim(fgets(STDIN));
                for ($i = 0; $i < count(cargarColeccionPalabras()); $i++) {
                    $palabra = cargarColeccionPalabras();
                        echo "[" . $i+1 ."] => " . $palabra[$i] . "\n";
                }
                    break;
                case 2:
                    break;
                case 3:
                    break;
                case 4;
                    break;
                case 5:
                    break;
                case 6:
                    break;
                case 7:
                        echo "Ingrese la palabra de 5 letras a agregar:";
                        $cargarPalabra = trim(fgets(STDIN));
                        $arregloPalabras = agregarPalabra(cargarColeccionPalabras(), $cargarPalabra);
                        print_r($arregloPalabras);
                        break;
                }
            }
        } while ($opcionMenu != 8);