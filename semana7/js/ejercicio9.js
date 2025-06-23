/*
programa que solicita 5 numeros, y luego imprime cuales fueron multiplos de 3 y 5
tomar en cuenta que hay numeros que son multiplos de 3 y 5 al mismo tiempo
*/

let numeros = []

for (let i = 0; i < 5; i++) {
    numeros.push(parseInt(prompt(`Ingrese el numero ${i+1}: `)))
    if (numeros[i] % 3 === 0 && numeros[i] % 5 === 0) {
        console.log(`El numero ${numeros[i]} es multiplo de 3 y 5`)
    }
}

/*
Pendiente de hacer bien
*/
