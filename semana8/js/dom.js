//seleccion de elementos

//seleccionar por su ID
let titulo = document.getElementById('titulo');
console.log(titulo);

//seleccionar por clase
const centrar = document.getElementsByClassName("centrar");
console.log(centrar);

//seleccionar por etiqueta
let etiqueta = document.getElementsByTagName('li');
console.log(etiqueta);

//seleccionar  el primer elemento que coincide con un selector css
let selector = document.querySelector(".centrar");
console.log(selector)

//modificaciones a los elementos
titulo.textContent = 'Nuevo Titulo';

let caja = document.getElementById("caja");
caja.setAttribute("class", "claro");

caja.innerHTML = "Este es un texto";

titulo.style.backgroundColor = "green";
titulo.style.textDecoration = `underline`;

let boton = document.getElementById('boton');
/*boton.addEventListener("click", function(){
    alert("Dio clic al boton");
});*/

boton.addEventListener("mouseover", function(){
    alert("Pasó el mouse sobre el boton");
});

document.addEventListener("keydown", function(event){
    console.log(event.key);
    if(event.key === 'enter'){
        alert("Has presionado enter");
    }
});

window.addEventListener('scroll', function(){
    console.log("Ha hecho scroll");
});




