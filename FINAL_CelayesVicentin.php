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
 * @param array $arregloPalabras
 * @return int $numero
 */
function palabraAleatoria($palabrasArreglo) {
    $max = count($palabrasArreglo)-1;
    $numero = random_int(0, $max);
    return $numero;
}
    
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
    
    $coleccionPartidas[0] = ["palabraWordix "=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix "=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix "=> "CASTA" , "jugador" => "derecha", "intentos"=> 4, "    puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix "=> "MERCA" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 1];
    $coleccionPartidas[4] = ["palabraWordix "=> "FIBRA" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 5];
    $coleccionPartidas[5] = ["palabraWordix "=> "LABIO" , "jugador" => "pink2000", "intentos"=> 2, "    puntaje" => 7];
    $coleccionPartidas[6] = ["palabraWordix "=> "PLUMA" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 2];
    $coleccionPartidas[7] = ["palabraWordix "=> "RASTA" , "jugador" => "rudolf", "intentos"=> 1, "puntaje" => 3];
    $coleccionPartidas[8] = ["palabraWordix "=> "SUCIO" , "jugador" => "pink2000", "intentos"=> 1, "    puntaje" => 10];
    $coleccionPartidas[9] = ["palabraWordix "=> "NEGRO" , "jugador" => "pink2000", "intentos"=> 6, "    puntaje" => 0];

    if (isset($coleccionPartidas)) { //verifica si el jugador tiene partidas registradas
        $coleccionPartidas[$nombre] = [];
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

/** Función que almacena en un contador cuantas veces un jugador ganó en ciertos intentos
 * @param array $arregloPartidas
 * @param string $nombre
 * @return array
 */
function intentosContador($arregloPartidas, $nombre) {
    $intento1 = 0;
    $intento2 = 0;
    $intento3 = 0;
    $intento4 = 0;
    $intento5 = 0;
    $intento6 = 0;
    $arregloIntentos = [];
    for ($i = 0 ; $i < count($arregloPartidas) ; $i++) {
        if ($arregloPartidas[$i]["jugador"] == $nombre) {
            if ($arregloPartidas[$i]["intentos"] == 1) {
                $intento1++;
            }
            elseif ($arregloPartidas[$i]["intentos"] == 2) {
                $intento2++;
            }
            elseif ($arregloPartidas[$i]["intentos"] == 3) {
                $intento3++;
            }
            elseif ($arregloPartidas[$i]["intentos"] == 4) {
                $intento4++;
            }
            elseif ($arregloPartidas[$i]["intentos"] == 5) {
                $intento5++;
            }
            elseif ($arregloPartidas[$i]["intentos"] == 6) {
                $intento6++;
            }
        }
    }}