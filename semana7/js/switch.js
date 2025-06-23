let letra = prompt("Digite una letra para saber si es vocal o consonante. ")
switch(letra){
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
        alert("La letra es vocal");
        break;
    default:
        alert("La letra es una consonante");
}