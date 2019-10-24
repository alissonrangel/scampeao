

const c = (el) => document.querySelector(el);

const cs = (el) => document.querySelectorAll(el);

let aulas = [];

let povoar = (valor) => {

    //alert(valor);
    let array = valor.split(',');
    //alert(array);    
    let j = 0;
    for (var i = 0, max = (array.length / 3); i < max; i++) {
        aulas.push({assunto: array[(i * 3) + 0].toString(), data: array[(i * 3) + 1].toString(), materia: array[(i * 3) + 2].toString()});
    }
    for (var i = 0; i < aulas.length; i++) {
        alert(aulas[i]);
        let { assunto, data, materia } = aulas[i];
        console.log('assunto: ' + assunto);
    }
    
    aulas.map((item, index) => {
        console.log("entrou");
        //console.log(item['assunto']);
        
        let { assunto, data, materia } = item;
        
        
        
        let aulaItem = document.querySelector('.aula-item').cloneNode(true);

        aulaItem.setAttribute('data-key', index);

        aulaItem.querySelector('.aula-data').innerHTML = data;
        aulaItem.querySelector('.aula-materia').innerHTML = materia;
        aulaItem.querySelector('.aula-item-conteudo').innerHTML = assunto;
        
        c('.aula-area').style.display = 'flex';
        document.querySelector('.aula-area').append(aulaItem);
    });
}



