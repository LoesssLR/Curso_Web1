/*
Programa donde se pide una edad, si la edad es mayor o igual a 18, que se imprima que es
mayor de edad, sino debe imprimir que es menor de edad
*/

let edad = parseInt(prompt("Ingrese su edad: "));

if (edad >= 18) {
    alert("Adulto");
} else if (edad >= 13){
    alert("Adolecente");
} else {
    alert("Niño");
}