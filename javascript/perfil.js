let contador = 0;
const like = () => {
    let curtidas = document.getElementById('contar');
    contador =  contador + 1
    curtidas.innerHTML = `<h4>Curtidas: ${contador} </h4>`;    
};

let cont = 0;
const like_txt = () => {
    let curtidastxt = document.getElementById('contartxt');
    cont =  cont + 1
    curtidastxt.innerHTML = `<h4>Curtidas: ${cont} </h4>`;    
};