<?php

function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS"
        /* Agregar 5 palabras más */
    ];

    return ($coleccionPalabras);
}

function menu(){
    echo "\n\n1: Cargar Coleccion Palabras\n";
    echo "2: Cargar Partidas\n";
    echo "3: Jugar 1er opcion\n";
    echo "4: Salir\n";

    echo "Ingrese un número para elegir una opción: ";
    $opcion=trim(fgets(STDIN));
    return $opcion;
}

function cargarPartidas() {
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

    return $coleccionPartidas;
}
// 4
function palabra(){
    echo "Ingrese una palabra de 5 letras: ";
    $pal=trim(fgets(STDIN));

    return $pal;
}
// 5
function rangoValores(){
    echo "Ingrese un número entre 1 y 10: ";
    $num=trim(fgets(STDIN));
    while($num<0 || $num>10){
        echo "El numero ingresado no es válido, ingrese otro nuevamente: ";
    }
    return $num;
}

// 6
function mostrarPartida(){
    echo "Ingrese el número de la partida: ";
    $numPar=trim(fgets(STDIN));

    $coleccionPartidas[0] = ["palabraWordix "=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix "=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix "=> "CASTA" , "jugador" => "derecha", "intentos"=> 4, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix "=> "MERCA" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 1];
    $coleccionPartidas[4] = ["palabraWordix "=> "FIBRA" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 5];
    $coleccionPartidas[5] = ["palabraWordix "=> "LABIO" , "jugador" => "pink2000", "intentos"=> 2, "puntaje" => 7];
    $coleccionPartidas[6] = ["palabraWordix "=> "PLUMA" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 2];
    $coleccionPartidas[7] = ["palabraWordix "=> "RASTA" , "jugador" => "rudolf", "intentos"=> 1, "puntaje" => 3];
    $coleccionPartidas[8] = ["palabraWordix "=> "SUCIO" , "jugador" => "pink2000", "intentos"=> 1, "puntaje" => 10];
    $coleccionPartidas[9] = ["palabraWordix "=> "NEGRO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 0];

    return $coleccionPartidas[$numPar-1];
}
$coleccionPartidas[0] = ["palabraWordix "=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
$coleccionPartidas[1] = ["palabraWordix "=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 4];
$coleccionPartidas[2] = ["palabraWordix "=> "CASTA" , "jugador" => "derecha", "intentos"=> 4, "puntaje" => 3];
$coleccionPartidas[3] = ["palabraWordix "=> "MERCA" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
$coleccionPartidas[4] = ["palabraWordix "=> "FIBRA" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 4];
$coleccionPartidas[5] = ["palabraWordix "=> "LABIO" , "jugador" => "pink2000", "intentos"=> 2, "puntaje" => 5];
$coleccionPartidas[6] = ["palabraWordix "=> "PLUMA" , "jugador" => "majo", "intentos"=> 1, "puntaje" => 6];
$coleccionPartidas[7] = ["palabraWordix "=> "RASTA" , "jugador" => "rudolf", "intentos"=> 1, "puntaje" => 6];
$coleccionPartidas[8] = ["palabraWordix "=> "SUCIO" , "jugador" => "pink2000", "intentos"=> 1, "puntaje" => 6];
$coleccionPartidas[9] = ["palabraWordix "=> "NEGRO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 1];

$coleccionPalabras = array(
    "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
    "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
    "VERDE", "MELON", "YUYOS", "PIANO", "PISOS"
    /* Agregar 5 palabras más */
);
// 7

function agregarPalabra($arreglo, $palabra){
    $long=count($arreglo);
    $arreglo[$long]=$palabra;
    return $arreglo;
}

function mostrarPrimerPartida($arreglo, $nombre) {
    $i=0;
    $posicion=-1;
    while (!(($arreglo[$i]["jugador"] == $nombre) && ($arreglo[$i]["puntaje"]>0)) && $i<=(count($arreglo)-1)){
        $i++;
    }
    if($i!=(count($arreglo)-1)){
        $posicion=$i;
    }
    return $posicion;
}

/**
 * Escrbir un texto en color VERDE
 * @param string $texto)
 */
function escribirVerde($texto)
{
    echo "\e[1;37;42m $texto \e[0m";
}

/**
 * Escrbir un texto en color AMARILLO
 * @param string $texto)
 */
function escribirAmarillo($texto)
{
    echo "\e[1;37;43m $texto \e[0m";
}

/**
 * Escrbir un texto en color GRIS
 * @param string $texto)
 */
function escribirGris($texto)
{
    echo "\e[1;34;47m $texto \e[0m";
}

/**
 * Escrbir un texto pantalla.
 * @param string $texto)
 */
function escribirNormal($texto)
{
    echo "\e[0m $texto \e[0m";
}

function escribirResumenJugador($arreglo, $nombre)
{
    $contPar=0;
    $puntajeTotal=0;
    $victorias=0;
    for($i=0; $i<count($arreglo); $i++){
        if($arreglo[$i]["jugador"]==$nombre){
            $contPar+=1;
            $puntajeTotal+=$arreglo[$i]["puntaje"];
            if(($arreglo[$i]["puntaje"])>0){
                $victorias+=1;
            }
        }
    }
    echo "***************************************************\n";
    echo "Jugador: ".$nombre;
    echo "\nPartidas: ".$contPar;
    echo "\nPuntaje Total: ".$puntajeTotal;
    echo "\nVictorias: ".$victorias;
    echo "\nPorcentaje Victorias: ".($victorias/$contPar*100);
    echo "\nAdivinadas: \n";
    $cont1=1;
    for($i=0; $i<count($arreglo); $i++){
        if($arreglo[$i]["jugador"]==$nombre){
            echo "            Intento ".$cont1.": ".$arreglo[$i]["puntaje"]."\n";
            $cont1=$cont1+1;
        }
    }
    echo "***************************************************\n";
}

// 10

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

function solicitarJugador(){
    $cont=0;
    do{
        if($cont==0){
            echo "Ingrese el nombre del Jugador: ";
            $jug=trim(fgets(STDIN));
        }else{
            echo "La palabra ingresada no es correcta. Ingrese el nombre del Jugador nuevamente: ";
            $jug=trim(fgets(STDIN));
        }
        $esCaracter=primerLetra($jug);
        $cont+=1;
    }while(!($esCaracter)); 

    return strtolower($jug);
}

// 11

function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return (($a['jugador'] < $b['jugador'])) ? -1 : 1;
}

function cmb($a, $b){
    $valor = 0;
    if($a['jugador'] == $b['jugador']){
        if($a['palabraWordix '] < $b['palabraWordix ']){
            $valor=-1;
        }else{
            $valor=1;
        }
    }
    return $valor;
}

function mostrarColeccionOrdenada($arreglo){
    uasort($arreglo, 'cmp');
    uasort($arreglo, 'cmb');
    print_r($arreglo);   
}


do { 
    $opcionn=menu();
    switch($opcionn) {
        case 1:
                $arreglo=cargarColeccionPalabras();
                print_r($arreglo); 
            break;
        case 2:
                $partidas=cargarPartidas();
                print_r($partidas);
            break;
        case 3:
                $juego1=rangoValores();
                echo $juego1;
            break;
        case 4:
                $juego2=mostrarPartida();
                 print_r($juego2);
            break;
        case 5:
                $juego3=agregarPalabra($coleccionPalabras, "SAMSA");
                print_r($juego3);
            break;
        case 6:
                $juego4=mostrarPrimerPartida($coleccionPartidas, "pink2000");
                if($juego4==-1){
                    echo "Este jugador no ganó ninguna partida.";
                }else{
                    echo $juego4;
                }
            break;
        case 7:
            $juego5=escribirResumenJugador($coleccionPartidas, "majo");
            echo $juego5;
        case 8:
            $juego6=solicitarJugador();
            echo $juego6;
            break;
        case 9:
            $juego7=mostrarColeccionOrdenada($coleccionPartidas);
            echo $juego7;
            break;
        case 10:
            break;
    }
}while($opcionn!=10);

