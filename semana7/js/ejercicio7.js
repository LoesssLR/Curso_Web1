// se solicita un numero y se imprimen los divisores de dicho numero

let numero = parseInt(prompt("Digite un número: "))

divisor = 0

while (divisor <= numero) {
    if (numero % divisor === 0) { // se verifica si el numero es divisible por el divisor
        document.write(divisor + "<br>")
    }
    divisor++
}