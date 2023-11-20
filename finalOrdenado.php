<?php
include_once("wordix.php");

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
    echo "\n";
    if (!(is_numeric($opcionSeleccionada)) || $opcionSeleccionada <= 0 || $opcionSeleccionada > 8) {
        $opcionSeleccionada = -1;
    }
    return $opcionSeleccionada;
}

/** Función que almacena partidas
 * 
 * 
 */
function cargarPartidas() {
    $coleccionPartidas = [];
    $coleccionPartidas[0] = ["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 4];
    $coleccionPartidas[2] = ["palabraWordix"=> "TINTO" , "jugador" => "derecha", "intentos"=> 4, "puntaje" => 3];
    $coleccionPartidas[3] = ["palabraWordix"=> "GOTAS" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
    $coleccionPartidas[4] = ["palabraWordix"=> "FIBRA" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 4];
    $coleccionPartidas[5] = ["palabraWordix"=> "VERDE" , "jugador" => "pink2000", "intentos"=> 2, "puntaje" => 5];
    $coleccionPartidas[6] = ["palabraWordix"=> "NAVES" , "jugador" => "majo", "intentos"=> 1, "puntaje" => 6];
    $coleccionPartidas[7] = ["palabraWordix"=> "TINTO" , "jugador" => "rudolf", "intentos"=> 1, "puntaje" => 6];
    $coleccionPartidas[8] = ["palabraWordix"=> "PISOS" , "jugador" => "pink2000", "intentos"=> 1, "puntaje" => 6];
    $coleccionPartidas[9] = ["palabraWordix"=> "GATOS" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 1];
    return $coleccionPartidas;
}

/** Esta función verifica si existe un jugador ingresado dentro de la colección de partidas
 * @param string $nombre
 * @return bool
 */
function verificarJugador($nombre, $arregloPartidas) {
    $i = 0;
    $band = false;
    for ($i = 0 ; $i < count($arregloPartidas) ; $i++) {
        if ($arregloPartidas[$i]["jugador"] == $nombre) {
            $band = true;
        }
    }
    return $band;
}


/** Función de la colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PLATO", "MILAN", "FABRA", "DARIN", "RESTO"
    ];

    return ($coleccionPalabras);
}


/** Función que determina si el primer caracter de el nombre de un jugador es letra o no
 * @param string $cadena
 * @return bool
 */
function primerLetra($cadena)
{
    //int $cantCaracteres, $i, boolean $esLetra
    $esLetra = true;
    $esLetra =  ctype_alpha($cadena[0]);
    if($esLetra){
        $resp=true;
    }else{
        $resp=false;
    }
    return $resp;
}

/** Función que solicita el nombre de un jugador 
 * @return string
 */
function solicitarJugador(){
    $cont=0;
    do{
        if($cont == 0){
            echo "Ingrese el nombre del Jugador: ";
            $jug=trim(fgets(STDIN));
        }else{
            escribirRojo ("El nombre ingresado no es válido.");
            echo "\nIngrese el nombre del Jugador nuevamente: ";
            $jug=trim(fgets(STDIN));
        }
        $esCaracter=primerLetra($jug);
        $cont+=1;
    } while(!($esCaracter)); 

    return strtolower($jug);
}

/** Función que pregunta al usuario un número entre un rango de valores
 * @return int
 */
function solicitarNumeroEntre($min, $max)
{
    echo "Ingrese un número entre ". $min . " y " . $max . ": ";
    $numero = trim(fgets(STDIN));

    if (is_numeric($numero)) { //determina si un string es un número. puede ser float como entero.
        $numero  = $numero * 1; //con esta operación convierto el string en número.
    }
    while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))) {
        escribirRojo("Número inválido.");
        echo "\nDebe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
        if (is_numeric($numero)) {
            $numero  = $numero * 1;
        }
    }
    return $numero;
}

/** Función que retorna una palabra seleccionada
 * @param string $nombre
 * @return string $palabraSeleccionada
 */
function palabraSeleccionada($nombre) {
    $numero = solicitarNumeroEntre(1, count(cargarColeccionPalabras()));
    for ($i = 0; $i < count(cargarPartidas()); $i++) {
        while (cargarPartidas()[$i]["jugador"] == $nombre && cargarPartidas()[$i]["palabraWordix"] == cargarColeccionPalabras()[$numero-1]) {
            escribirRojo("La palabra seleccionada ya ha sido jugada.");
            echo "\n";
            echo "Elija otro número: ";
            $numero = trim(fgets(STDIN));
        }
    }
        $palabraSeleccionada = cargarColeccionPalabras()[$numero-1];
    return $palabraSeleccionada;
}

/** Función para que se seleccione aleatoriamente
 * @param string $nombre
 * @return string $palabraAleat
 */
function palabraAleatoria($nombre) {
    $min = 0;
    $max = count(cargarColeccionPalabras()) - 1;
    $numAleatorio = random_int($min, $max);
    $palabraAl = cargarColeccionPalabras()[$numAleatorio];
    for ($i = 0 ; $i < count(cargarPartidas()) ; $i++) {
        while (cargarPartidas()[$i]["jugador"] == $nombre && cargarPartidas()[$i]["palabraWordix"] == cargarColeccionPalabras()[$numAleatorio]){
            echo $palabraAl . " ya ha sido jugada\n";
            $numAleatorio = random_int($min, $max);
        }
    }
    $palabraAl = cargarColeccionPalabras()[$numAleatorio];
    return $palabraAl;
}

/** Función que muestra una partida basada en el número ingresado
 * @return array
 */
function mostrarPartida($coleccionDePartidas){
    echo "MOSTRAR PARTIDA: \n";
    $numMostrar = solicitarNumeroEntre(1, count($coleccionDePartidas));
    $partidaPrint = $coleccionDePartidas[$numMostrar-1];
    return $partidaPrint;
}

/** Función que muestra la primer partida ganada
 * @param $arregloPartidas
 * @param $nombre
 * @return int
 */
function mostrarPrimerPartida($arregloPartidas, $nombre) {
    $i = 0;
    $retorna = -1;
    $band = false;
    while ($band == false && $i < count($arregloPartidas)) {
        if(($arregloPartidas[$i]["jugador"] == $nombre) && ($arregloPartidas[$i]["puntaje"] > 0)) {
            $band = true;
        } else {
            $i++;
        }
    }
    if ($band == true) {
        $retorna = $i;
    }
    return $retorna;
}

/** Función que muestra las estadisticas de un jugador ingresado
 * @param array $arregloPartidas
 * @param string $nombre
 */
function escribirResumenJugador($arregloPartidas, $nombre)
{
    $contadorPartidas = 0;
    $puntajeTotal = 0;
    $victorias = 0;
    for($i = 0; $i < count($arregloPartidas) ; $i++) {
        if ($arregloPartidas[$i]["jugador"] == $nombre) {
            $contadorPartidas += 1;
            $puntajeTotal += $arregloPartidas[$i]["puntaje"];
            
            if (($arregloPartidas[$i]["puntaje"]) > 0) {
                $victorias += 1;
            }
        }

    }
    echo "***************************************************\n";
    echo "Jugador: " . $nombre;
    echo "\nPartidas: " . $contadorPartidas;
    echo "\nPuntaje Total: " . $puntajeTotal;
    echo "\nVictorias: " . $victorias;
    echo "\nPorcentaje Victorias: " . ($victorias/$contadorPartidas*100) . "%";
    echo "\nAdivinadas: \n";

    $cont1 = 1;
    for($i = 0; $i < count($arregloPartidas) ; $i++) {
        if($arregloPartidas[$i]["jugador"] == $nombre) {
            echo "            Intento " . $cont1 . ": " . $arregloPartidas[$i]["puntaje"] . "\n";
            $cont1 = $cont1 + 1;
        } 
        
    }echo "***************************************************\n";
}

/**
 * 
 * 
 */
function cmp($a, $b) {
    $valor = 1;
    if ($a == $b) {
        $valor = 0;
    }
    elseif ($a["jugador"] < $b["jugador"]) { 
        $valor = -1;
    }
    else {
        $valor = 1;
    }
    return $valor;
}

/** 
 * 
 * 
 */
function cmb($a, $b){
    $valor = 0;
    if($a["jugador"] == $b["jugador"]){
        if($a["palabraWordix"] < $b["palabraWordix"]){
            $valor = -1;
        }else{
            $valor = 1;
        }
    }
    return $valor;
}

 /**
  * 
  */
function mostrarColeccionOrdenada($arreglo){
    uasort($arreglo, 'cmp');
    uasort($arreglo, 'cmb');
    print_r($arreglo);   
}

/** Función que verifica si la palabra ingresada ya existe en el arreglo de Palabras
 * @param array $arregloPalabras
 * @param string $palabra
 * @return bool
 */
function verificarPalabra($arregloPalabras, $palabra) {
    $band = false;
    for ($i = 0 ; $i < count($arregloPalabras) ; $i++) {
        if ($arregloPalabras[$i] == $palabra) {
            $band = true;
        }
    }
    return $band;
}

/** Función que pide una palabra de 5 letras y la retorna en mayúsculas
 * @return string
 */
function ingresarPalabra() {
    do {
        echo "Ingrese una palabra de 5 letras: ";
        $palabra = strtoupper(trim(fgets(STDIN)));
        
        while ((strlen($palabra) != 5) || !esPalabra($palabra)) {
            escribirRojo("ERROR: La palabra ingresada es inválida.");
            echo "\nDebe ingresar una palabra de 5 letras:";
            $palabra = strtoupper(trim(fgets(STDIN)));
        }
        $condicion = verificarPalabra(cargarColeccionPalabras(), $palabra);
        if ($condicion == true) {
            escribirRojo("PALABRA EXISTENTE: Ingrese otra palabra");
            echo "\n"; 
        }
    } while ($condicion == true);

    return $palabra;
}

/** Función que agrega una palabra al arreglo previo de la colección
 * @param array $arregloPalabras
 * @param string $palabra
 * @return array
 */
function agregarPalabra($arregloPalabras, $palabra){
    $long = count($arregloPalabras);
    $arregloPalabras[$long] = $palabra;
    return $arregloPalabras;
}

/** Función que calcula el puntaje del jugador
 * @param int $intentos
 * @param string $palabra
 * @return int $puntajeTotal
 */
function obtenerPuntajeWordix($intentos, $palabra) {
    //Puntaje basado en los intentos
    $intentosMaximos = 6;
    $puntajeBase = 0;
    if ($intentos != 0) {
        while ($intentos <= $intentosMaximos) {
            $puntajeBase++;
            $intentosMaximos--;
        }
        $puntajeIntentos = $puntajeBase;
        echo "PUNTAJE: " . $puntajeIntentos . "\n\n";
    //Puntaje basado en la palabra (vocales, consonantes antes y despúes de "M")
        $cantLetras = strlen($palabra);
        $cantVocales = 0;
        $consAntesM = 0;
        $consPostM = 0;
        for($i = 0 ; $i < $cantLetras ; $i++) {
            $letra = $palabra[$i];
            //condición para las vocales (1 punto)
            if (in_array($letra, ["A", "E", "I", "O", "U"])) {
                $cantVocales++;
            }
            //condición para las consonantes anteriores a M (inclusive)(2 puntos)
            if(in_array($letra, ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"])) {
                $consAntesM++;
            }
            //condición para las consonantes posteriores a M (3 puntos);
            if(in_array($letra, ["N", "Ñ", "O", "P", "Q", "R", "S", "T","U", "V", "W", "X", "Y", "Z"])) {
                $consPostM++;
            }
        }
        echo "Cantidad Vocales: " . $cantVocales . "\n";
        echo "Cantidad Antes de M: " . $consAntesM . "\n";
        echo "Cantidad Post a M: " . $consPostM . "\n";    
        $puntAntesM = $consAntesM * 2;
        $puntPostM = $consPostM * 3;
        $puntajeFinal = $puntajeIntentos + $puntAntesM + $puntPostM + $cantVocales; 
    }
    return $puntajeFinal;
}

/** Agregar partida a la colección de partidas
 * @param array $partidaActual
 * @param array $coleccionPartidas
 * @param array 
 */
function agregarPartida($partidaActual, $coleccionDePartida) {
    $cantPartidas = count($coleccionDePartida);
    $coleccionDePartida[$cantPartidas] = $partidaActual;
    return $coleccionDePartida;
}

// PROGRAMA PRINCIPAL
/* MENÚ DE OPCIONES PARA INTERACTUAR */
echo "\nPUNTOS: ". $puntaje . "\n\n";
$palabrasActuales = cargarColeccionPalabras();
$partidas = cargarPartidas();
do {
    $opcion = seleccionarOpcion();
    if ($opcion <> -1) {
        switch ($opcion) {
            case 1:
                $jugador = solicitarJugador(); 
                $palabraSelec = palabraSeleccionada($jugador);
                $partida = jugarWordix($palabraSelec, $jugador);
                $partidas = agregarPartida($partida, $partidas);
                echo print_r($partidas);
                break;
            case 2:
                $jugador = solicitarJugador();
                $palabraAleat = palabraAleatoria($jugador);
                $partida = jugarWordix($palabraAleat, $jugador);
                $partidas = agregarPartida($partida, $partidas);
                echo print_r($partidas);
            case 3:
                print_r(mostrarPartida($partidas));
                break;
            case 4:
                do {
                    $jugador = solicitarJugador();
                    if (verificarJugador($jugador, $partidas) == true) {
                        $indicePartida = mostrarPrimerPartida($partidas, $jugador);
                        if($indicePartida == -1){
                            escribirRojo("Este jugador no ganó ninguna partida.");
                            echo "\n\n";
                        }
                        else {
                            escribirVerde("PRIMERA PARTIDA GANADA POR ");
                            escribirGris($jugador);
                            echo (": ");
                            echo "\n";
                            print_r($partidas[$indicePartida]);
                        }
                    }
                    else {
                        escribirRojo("Nombre inválido: El jugador no ha sido encontrado en el sistema.");
                        echo "\n";
                    }
                } while (verificarJugador($jugador, $partidas) == false);
                break;
            case 5:
                do {
                    $jugador = solicitarJugador();
                    if (verificarJugador($jugador, $partidas) == true) {
                        escribirResumenJugador($partidas, $jugador);
                    }
                    else {
                        escribirRojo("Nombre inválido: El jugador no ha sido encontrado en el sistema.");
                        echo "\n";
                    }
                } while (verificarJugador($jugador, $partidas) == false);
                break;
            case 6:
                mostrarColeccionOrdenada($partidas);
                break;
            case 7:
                $palab = ingresarPalabra();
                echo "Palabra a agregar: " . $palab . "\n\n";
                $palabrasActuales = agregarPalabra($palabrasActuales, $palab);
                escribirVerde("PALABRA AGREGADA EXITOSAMENTE");
                echo "\n\n¿Desea ver la colección de palabras actuales?(s/n): ";
                $rta = trim(fgets(STDIN));
                if ($rta == "s" || $rta == "S") {
                    print_r($palabrasActuales);
                }
                break;
            }
        }
    else {
        escribirRojo("OPCION INCORRECTA: Vuelva a seleccionar.");
        echo "\n\n";
    }
} while ($opcion <> 8);