const resultado = document.querySelector('#resultado');
const formulario = document.querySelector('#formulario')

window.onload = () =>{
    formulario.addEventListener('submit', validarFormulario);
}

function validarFormulario(e){
    e.preventDefault(); // evita que la pagina se recargue
    const terminoBusqueda = document.querySelector('#termino').value.trim()
    if(terminoBusqueda === ''){
        mostrarAlerta('Error, no ha agregado un termino de busqueda')
        return;
    }
    buscarImagenes(terminoBusqueda)
}

function mostrarAlerta(mensaje){
    const existeAlerta = document.querySelector('.alerta')
    if(!existeAlerta){
        const alerta = document.createElement('p')
        alerta.className = 'alerta'
        alerta.innerHTML = mensaje
        formulario.appendChild(alerta)
        setTimeout(()=>{
            alerta.remove()
        }, 3000)
    }
}

function buscarImagenes(termino){
    const url = `https://pixabay.com/api/?key=49547308-0582dbc962e90ca41c6b90f0f&q=` + termino;

    fetch(url)
    .then(respuesta => respuesta.json())
    .then(resultado => {
        mostrarImagenes(resultado.hits);
    })
}

function mostrarImagenes(imagenes){
    const resultado = document.getElementById("resultado");
    while(resultado.firstChild){
        resultado.removeChild(resultado.firstChild)
    }
    resultado.innerHTML = ""; // Limpiar contenido anterior
    imagenes.forEach(imagen => {
        const { previewURL, likes, views, largeImageURL } = imagen;
        resultado.innerHTML += `
            <div class="contenido">
                <div class="tarjeta">
                    <img src="${previewURL}" alt="Imagen">
                    <div class="info-tarjeta">
                        <p class="likes">${likes} <span>Me gusta</span></p>
                        <p class="views">${views} <span>Vistas</span></p>
                        <a href="${largeImageURL}" target="_blank">Ver imagen grande</a>
                    </div>
                </div>
            </div>
        `;
    });
}

    
