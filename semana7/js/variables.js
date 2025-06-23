// VAR

var nombre
nombre = 'Pedro'
console.log(nombre)

var nombre = 'Jose'
console.log(nombre)

nombre = 'Sebastian'
console.log(nombre)

function mensaje(){
    nombre = 'Alejandro'
    console.log(nombre)
}

mensaje()

// LET 

let numero = 20;
console.log(numero)
numero = 25;
console.log(numero)

// CONST

const n = 4;
console.log(n)

miObjeto = {
    n: 5
}
miObjeto.n = 6
console.log(miObjeto.n) // 6

const persona = {nombre: 'Luis', edad: 20}
console.log(persona)
persona.edad = 21
console.log(persona) // { nombre: 'Luis', edad: 21 }

if(true){
    let x = 1
    const y = 6;
    console.log(x)
    console.log(y)
}

