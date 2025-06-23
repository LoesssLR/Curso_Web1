/*
ENUNCIADO.

Realizar un pequeño juego en JavaScript donde el usuario y la computadora compitan para ver cuál es el número más alto. 
Tomando en cuenta lo siguiente:

El usuario debe elegir un número entre 1 y 100 y la computadora genera el número aleatorio entre 1 y 100.
Se deben comparar los números y:
    Si el número del usuario es mayor, muestra un mensaje que diga: "¡Ganó! Su número es más alto."
    Si el número de la computadora es mayor, muestra un mensaje que diga: "Perdió. La computadora tiene un número más alto."
    Si los números son iguales, se muestra un mensaje que diga: "Empate. Ambos sacaron el mismo número."
*/

alert("Bienvenido a la competencia del número más alto contra la computadora.")
alert("Consiste en que ambos van a elegir un número, y gana el que tenga el número más alto.")

let numeroUsuario;

// validar los datos que se pusieron
do {
    numeroUsuario = parseInt(prompt("Elige un número entre 1 y 100: "));
    if (!(numeroUsuario >= 1 && numeroUsuario <= 100)) {
        alert("Número inválido. Debe estar entre 1 y 100. Inténtelo de nuevo.");
    } 
} while (!(numeroUsuario >= 1 && numeroUsuario <= 100)); // si el numero es menor a 1 o mayor a 100, vuelve a pedir el 
// numero hasta que sea correcto

// genera un numero random entre 1 y 100 
let numeroComputadora = Math.floor(Math.random() * 100) + 1;

/* 
que genere un numero aleatorio entre 0 y 1, se multiplica lo obtenido por 100 y le sumamos 1 porque math random nunca llega a 1 y 
con el math floor se redondea hacia abajo eliminando los decimales y ya se obtiene el valor
*/

// \n = salto de linea 
alert(`Tu número: ${numeroUsuario}\nNúmero de la computadora: ${numeroComputadora}`);

if (numeroUsuario > numeroComputadora) {
    alert('¡Ganó! Su número es más alto.');
} else if (numeroComputadora > numeroUsuario) {
    alert('Perdió. La computadora tiene un número más alto.');
} else {
    alert('Empate. Ambos sacaron el mismo número.');
}

