// programa donde se digita un numero y se imprime si es par o no

let numero = parseInt(prompt("Digite un número: "))

if (numero % 2 === 0) {
    alert(`${numero} es par`)
} else {
    alert(`${numero} es impar`)
}