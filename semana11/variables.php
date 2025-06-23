<?php
$nombre = "Luis"; // Cadena de texto (String)
$edad = 21; // Número entero (Integer)
$estatura = 1.75; // Número decimal (Float)
$hijos = false; // Valor booleano (Boolean)

define("NACIONALIDAD", "costarricense"); // Constante (no cambia durante la ejecución)

// Mostrar valores usando echo
echo "Mi nombre es $nombre <br>"; // Comillas dobles interpretan variables
echo "Tengo $edad años <br>";
echo 'Mido ' .$estatura. ' metros <br>'; // Concatenación con punto (.)
echo $hijos; // Imprime 0 si es false
echo "Soy " .NACIONALIDAD;
?>
