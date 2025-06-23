// Crear una funcion que indique si una palabra es isograma.

/*

Un isograma = Palabra que no tiene letras repetidas.
String con letras repetidas = No es un isograma.
String vacio = Isograma.

*/

function es_Isograma(palabra){
    let letras = [];
    for(let i=0 ;i<palabra.length; i++){
        let letra = palabra[i]
        if(letras.includes(letra)){
            console.log('No es un isograma')
            return false;
        } else {
            letras.push(letra);
        }
    }
    console.log('Es un isograma')
}

es_Isograma("Sapo") // Isograma
es_Isograma("") // Isograma
es_Isograma("Anagrama") // No es un isograma
es_Isograma("Matemática") // No es un isograma


