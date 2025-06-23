const titulo = document.getElementById("titulo");
const boton = document.getElementById("boton");
const botonVarios = document.getElementById("boton-varios");
const botonFondo = document.getElementById("boton-fondo");
const botonFiltro = document.getElementById("boton-filtro");

boton.textContent = "Agregar";
botonVarios.textContent = "Agregar varios";
botonFondo.textContent = "Cambiar fondo";
botonFiltro.textContent = "Agregar con filtro";

document.body.style.backgroundColor = "aliceblue";
titulo.style.textDecoration = "underline";

//insertar elementos
const nuevoH2 = document.createElement("h2");
nuevoH2.textContent = "Luis Alejandro López Reyes";
const header = document.querySelector("header");
header.insertAdjacentElement('afterend', nuevoH2);

//agregar articulos con el boton Agregar
const cajaTexto = document.getElementById("caja-texto");
const listaArticulos = document.getElementById("lista-articulos");

boton.addEventListener("click", function(){
    const nuevoArticulo = cajaTexto.value.trim();
    if(nuevoArticulo !== ''){
        const nuevoElemento = document.createElement("li");
        nuevoElemento.textContent = nuevoArticulo;
        listaArticulos.appendChild(nuevoElemento);
        cajaTexto.value = '';
    }else{
        alert("Por favor, digite un artículo");
    }
});

//agregar articulos de una lista con el boton agregar varios
const articulosVarios = ["Papas", "Pasta", "Galletas", "Azúcar"];

botonVarios.addEventListener("click", function(){
    articulosVarios.forEach(function(articulo){
        const nuevoElemento = document.createElement("li");
        nuevoElemento.textContent = articulo;
        listaArticulos.appendChild(nuevoElemento);
    })
});

//cambiar el fondo del contenedor
const contenedor = document.querySelector(".contenedor");
function generarColorAleatorio(){
    const letras = "0123456789ABCDEF";
    let color = "#";
    for(let i = 0; i < 6; i++){
        color += letras[Math.floor(Math.random() * 16)];
    }
    return color;
}

botonFondo.addEventListener("click", () =>{
    const colorAleatorio = generarColorAleatorio();
    contenedor.style.backgroundColor = colorAleatorio;
});

// boton de filtrado
// palabras que inicien con determinada letra
botonFiltro.addEventListener("click", () => {
    const articulo = cajaTexto.value.trim();
    if (articulo.charAt(0).toLowerCase() === 'c') {
        const nuevoArticulo = document.createElement('li');
        nuevoArticulo.textContent = articulo;
        listaArticulos.appendChild(nuevoArticulo);
        cajaTexto.value = '';
    } else {
        alert('Por favor, digite un artículo que comience con la letra "C"');
    }
});

// al inicio con charAt, en medio con include y al final con lenght -1

// boton para eliminar todo
const botonLimpiar = document.getElementById('limpiar');
botonLimpiar.addEventListener('click', () => {
    listaArticulos.innerHTML = '';
});

// Cambiar tema
const botonTema = document.getElementById('boton-tema');
const body = document.body;
body.classList.add('claro');
botonTema.addEventListener('click', () => {
    if (body.classList.contains('claro')) {
        body.classList.remove('claro');
        body.classList.add('oscuro');
    } else {
        body.classList.remove('oscuro');
        body.classList.add('claro');
    }
});



