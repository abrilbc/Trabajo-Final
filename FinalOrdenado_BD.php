<?php

/**
 * Escrbir un texto en color ROJO
 * @param string $texto
 */
function escribirRojo($texto)
{
    echo "\e[1;37;41m $texto \e[0m";
}

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
    $coleccionPartidas[0] = ["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix"=> "CASTA" , "jugador" => "derecha", "intentos"=> 4, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix"=> "FUEGO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 1];
    $coleccionPartidas[4] = ["palabraWordix"=> "FIBRA" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 5];
    $coleccionPartidas[5] = ["palabraWordix"=> "LABIO" , "jugador" => "pink2000", "intentos"=> 2, "puntaje" => 7];
    $coleccionPartidas[6] = ["palabraWordix"=> "PLUMA" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 2];
    $coleccionPartidas[7] = ["palabraWordix"=> "RASTA" , "jugador" => "rudolf", "intentos"=> 1, "puntaje" => 3];
    $coleccionPartidas[8] = ["palabraWordix"=> "SUCIO" , "jugador" => "pink2000", "intentos"=> 1, "    puntaje" => 10];
    $coleccionPartidas[9] = ["palabraWordix"=> "NEGRO" , "jugador" => "pink2000", "intentos"=> 6, "    puntaje" => 0];

    return $coleccionPartidas;
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

/** Función que determina si el primer caracter de el nombre de un jugador es letra o np
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
        if($cont==0){
            echo "Ingrese el nombre del Jugador: ";
            $jug=trim(fgets(STDIN));
        }else{
            escribirRojo ("El nombre ingresado no es válido.");
            echo "\nIngrese el nombre del Jugador nuevamente: ";
            $jug=trim(fgets(STDIN));
        }
        $esCaracter=primerLetra($jug);
        $cont+=1;
    }while(!($esCaracter)); 

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
function mostrarPartida(){
    echo "MOSTRAR PARTIDA: \n";
    $numMostrar = solicitarNumeroEntre(1, count(cargarPartidas()));
    $partidaPrint = cargarPartidas()[$numMostrar-1];
    return $partidaPrint;
}
// PROGRAMA PRINCIPAL


do {
    $opcion = seleccionarOpcion();
    $palabras = cargarColeccionPalabras();
        if ($opcion <> -1) {
        switch ($opcion) {
            case 1:
                $jugador = solicitarJugador(); 
                $palabraSelec = palabraSeleccionada($jugador);
                echo $palabraSelec . "\n\n";
                break;
            case 2:
                echo "Ingrese su nombre: ";
                $jugador = solicitarJugador();
                $palabraAleat = palabraAleatoria($jugador);
                echo $palabraAleat . "\n\n";
                break;
            case 3:
                print_r(mostrarPartida());
                break;
            case 4:
                echo "Opción 4\n";
                break;
            case 5:
                echo "Opción 5\n";
                break;
            case 6:
                echo "Opción 6\n";
                break;
            case 7:
                echo "Opción 7\n";
                break;
        }
    }
        else {
            escribirRojo("OPCION INCORRECTA: Vuelva a seleccionar.");
            echo "\n\n";
        }
} while ($opcion <> 8);
