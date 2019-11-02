const c = (el) => document.querySelector(el);

const cs = (el) => document.querySelectorAll(el);

let aulas1 = [];
let aulas2 = [];
let aulas3 = [];
let aulas4 = [];

let povoar2 = (valor) => {

    let array = valor.split(',');

    console.log(array);

    if (array.length == 1) {

    } else {
        for (var i = 0, max = (array.length / 6); i < max; i++) {
            aulas1.push({
                assunto: array[(i * 6) + 0].toString(),
                data: array[(i * 6) + 1].toString(),
                materia: array[(i * 6) + 2].toString(),
                tipo: array[(i * 6) + 3].toString(),
                status: array[(i * 6) + 4].toString(),
                id: array[(i * 6) + 5].toString()
            });
        }
    }


    for (var i = 0; i < aulas1.length; i++) {
        //alert(aulas1[i]);
        let {assunto, data, materia, tipo} = aulas1[i];
        console.log('assunto: ' + assunto);
    }


    aulas1.map((item, index) => {
        console.log("entrou");
        let {assunto, data, materia, tipo, status, id} = item;
        let aulaItem = document.querySelector('.aula-item').cloneNode(true);
        aulaItem.setAttribute('data-key', index);

        if (status == 0) {
            //aulaItem.addClass('bg-danger');
            aulaItem.classList.add('bg-danger')
            //aulaItem.setAttribute('style', 'background-color: red');
        } else {
            aulaItem.classList.add('bg-success')
            //aulaItem.addClass('bg-success');
            //aulaItem.setAttribute('style', 'background-color: green')
        }

        let data2 = data.split(' ');
        let date = new Date(data2[0] + "T" + data2[1]);
        let mes = date.getMonth() + 1;
        let dataa = date.getDate().toString() +
                "/" + ((mes >= 10) ? mes.toString() : "0" + mes.toString()) +
                "/" + date.getFullYear().toString();
        console.log("daddddddd: " + dataa);
        aulaItem.querySelector('.aula-data').innerHTML = dataa;
        aulaItem.querySelector('.aula-materia').innerHTML = materia;
        aulaItem.querySelector('.aula-conteudo').innerHTML = assunto;
        aulaItem.querySelector('.aula-tipo-aula').innerHTML = tipo;
        
        let data3 = aulaItem.querySelector('.aula-url').innerHTML;
        aulaItem.querySelector('a').setAttribute('href', 'alterarStatus.php?id=' + id + "&data=" + data3);
        aulaItem.querySelector('a').setAttribute('data-target', '#janela'+id);
        aulaItem.querySelector('.idd').setAttribute('id','janela'+id);
        document.querySelector('.aula-area').append(aulaItem);
    });
}

let povoar = (valor) => {

    let array = valor.split('$');
    let array_rev1 = array[0].split(',');
    let array_rev2 = array[1].split(',');
    let array_rev3 = array[2].split(',');
    let array_rev4 = array[3].split(',');

    console.log(array_rev3);

    if (array_rev1.length == 1) {

    } else {
        for (var i = 0, max = (array_rev1.length / 4); i < max; i++) {
            aulas1.push({
                assunto: array_rev1[(i * 4) + 0].toString(),
                data: array_rev1[(i * 4) + 1].toString(),
                materia: array_rev1[(i * 4) + 2].toString(),
                tipo: array_rev1[(i * 4) + 3].toString()
            });
        }
    }

    if (array_rev2.length == 1) {

    } else {
        for (var i = 0, max = (array_rev2.length / 4); i < max; i++) {
            aulas2.push({
                assunto: array_rev2[(i * 4) + 0].toString(),
                data: array_rev2[(i * 4) + 1].toString(),
                materia: array_rev2[(i * 4) + 2].toString(),
                tipo: array_rev2[(i * 4) + 3].toString()
            });
        }
    }

    if (array_rev3.length == 1) {

    } else {
        for (var i = 0, max = (array_rev3.length / 4); i < max; i++) {
            aulas3.push({
                assunto: array_rev3[(i * 4) + 0].toString(),
                data: array_rev3[(i * 4) + 1].toString(),
                materia: array_rev3[(i * 4) + 2].toString(),
                tipo: array_rev3[(i * 4) + 3].toString()
            });
        }
    }
    if (array_rev4.length == 1) {

    } else {
        for (var i = 0, max = (array_rev4.length / 4); i < max; i++) {
            aulas4.push({
                assunto: array_rev4[(i * 4) + 0].toString(),
                data: array_rev4[(i * 4) + 1].toString(),
                materia: array_rev4[(i * 4) + 2].toString(),
                tipo: array_rev4[(i * 4) + 3].toString()
            });
        }
    }
    for (var i = 0; i < aulas1.length; i++) {
        alert(aulas1[i]);
        let {assunto, data, materia, tipo} = aulas1[i];
        console.log('assunto: ' + assunto);
    }


    aulas1.map((item, index) => {
        console.log("entrou");
        let {assunto, data, materia, tipo} = item;
        let aulaItem = document.querySelector('.aula-item').cloneNode(true);
        aulaItem.setAttribute('data-key', index);
        aulaItem.querySelector('.aula-data').innerHTML = data;
        aulaItem.querySelector('.aula-materia').innerHTML = materia;
        aulaItem.querySelector('.aula-item-conteudo').innerHTML = assunto;
        aulaItem.querySelector('.aula-tipo-aula').innerHTML = tipo;
        c('.aula-area').style.display = 'flex';
        document.querySelector('.aula-area').append(aulaItem);
    });


    aulas2.map((item, index) => {
        console.log("entrou");
        let {assunto, data, materia, tipo} = item;
        let aulaItem = document.querySelector('.aula-item').cloneNode(true);
        aulaItem.setAttribute('data-key', index);
        aulaItem.querySelector('.aula-data').innerHTML = data;
        aulaItem.querySelector('.aula-materia').innerHTML = materia;
        aulaItem.querySelector('.aula-item-conteudo').innerHTML = assunto;
        aulaItem.querySelector('.aula-tipo-aula').innerHTML = tipo;
        c('.aula-area').style.display = 'flex';
        document.querySelector('.aula-area').append(aulaItem);
    });

    aulas3.map((item, index) => {
        console.log("entrou");
        let {assunto, data, materia, tipo} = item;
        let aulaItem = document.querySelector('.aula-item').cloneNode(true);
        aulaItem.setAttribute('data-key', index);
        aulaItem.querySelector('.aula-data').innerHTML = data;
        aulaItem.querySelector('.aula-materia').innerHTML = materia;
        aulaItem.querySelector('.aula-item-conteudo').innerHTML = assunto;
        aulaItem.querySelector('.aula-tipo-aula').innerHTML = tipo;
        c('.aula-area').style.display = 'flex';
        document.querySelector('.aula-area').append(aulaItem);
    });

    aulas4.map((item, index) => {
        console.log("entrou");
        let {assunto, data, materia, tipo} = item;
        let aulaItem = document.querySelector('.aula-item').cloneNode(true);
        aulaItem.setAttribute('data-key', index);
        aulaItem.querySelector('.aula-data').innerHTML = data;
        aulaItem.querySelector('.aula-materia').innerHTML = materia;
        aulaItem.querySelector('.aula-item-conteudo').innerHTML = assunto;
        aulaItem.querySelector('.aula-tipo-aula').innerHTML = tipo;
        c('.aula-area').style.display = 'flex';
        document.querySelector('.aula-area').append(aulaItem);
    });


}

let funcao = function () {
    c('.calendar').style.opacity = '1';
}

let funcao2 = function () {
    /*
     if ($('table').hasClass('table-calendar')) {
     $('table').attr('style', 'display: none');
     $('table').removeClass('table-calendar');
     } else {
     $('table').attr('style', 'display: normal');
     $('table').addClass('table-calendar');
     }*/

    c('.calendar').style.opacity = '0';
    c('.calendar').style.display = 'block';
    //return $('#data').val();
    setTimeout(() => {
        c('.calendar').style.opacity = '1';
        //para ter um efeito trasiction ativado, como foi no style.css
        //qq alteracao no elemto dessa classe, há um efeito de transição
    }, 200);
}

let alternar = () => {
    if ($('#dropdown-menu').hasClass('mostrar')) {

        $('#dropdown-menu').removeClass('mostrar');
    } else {
        $('#dropdown-menu').addClass('mostrar');
    }
}

/*
 function closeModal() {
 c('.calendar').style.opacity = '0';
 
 setTimeout(() => {
 c('.calendar').style.display = 'none';
 }, 500);
 }
 */

//let calenda = $('.calendar').width();
//let esquerda = (window.innerWidth/2) - (Math.floor(calenda/2));
//$('.calendar').attr('style','left:'+esquerda+'px');