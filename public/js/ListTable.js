$(document).ready(function() {
    $('#ListTable').DataTable({
        language: {
            search: "Buscar:",
            info: "Mostrando del _START_ al _END_ de <b>_TOTAL_ registros</b>",
            emptyTable: "No hay datos disponibles en la tabla",
            infoEmpty: "No hay registros que mostrar",
            lengthMenu: "Mostrar _MENU_ registros",
            paginate: {
                first:    'Primero',
                    previous: 'Anterior',
                    next:     'Siguiente',
                    last:     'Último'
            }
        }
    });
    $('#ListTable2').DataTable({
        language: {
            search: "Buscar:",
            info: "Mostrando del _START_ al _END_ de <b>_TOTAL_ registros</b>",
            emptyTable: "No hay datos disponibles en la tabla",
            infoEmpty: "No hay registros que mostrar",
            lengthMenu: "Mostrar _MENU_ registros",
            paginate: {
                first:    'Primero',
                    previous: 'Anterior',
                    next:     'Siguiente',
                    last:     'Último'
            }
        }
    });
});


function animateDisplay(obj,time,value) {
    var velocidad = 0.2;
    var opacity = value == 0?1:0;
    var direccion = value == 0? -1*velocidad:1*velocidad;
    var id = setInterval(function(){
        obj.style.opacity = opacity;
        opacity = opacity + direccion;
        if(opacity < 0 || opacity > 1){
            obj.style.display = (value == 0)?"none":"";
            clearInterval(id);
        }
    }, time);
}

myFunction = function () {
    var inputText = document.getElementById('buscar').value.toUpperCase().trim();
    var tabla = document.getElementById('ListTable1');
    var tabla_body = tabla.getElementsByTagName('tbody');
    var tabla_tr = tabla_body[0].getElementsByTagName("tr");
    var tabla_td;
    var tdText
    var tdText2;
    var flag_encontro = 0;
    var indexOf;
    for (i=0; i<tabla_tr.length; i++){
        tabla_td = tabla_tr[i].getElementsByTagName("td");
        for (j=0; j<tabla_td.length; j++){
            tdText2 = tabla_td[j].innerText;
            tdText = tabla_td[j].innerText.toUpperCase();
            indexOf = tdText.indexOf(inputText);
            if(indexOf != -1){
                flag_encontro = 1;
                if(inputText != ''){
                    tabla_td[j].style.backgroundColor=('#FFFF00');
                    tabla_td[j].innerHTML =
                    tdText2.substring(0,indexOf)+
                    '<b>' + tdText2.substring(indexOf,indexOf + inputText.length) + '</b>' +
                    tdText2.substring(indexOf + inputText.length,tdText2.length);
                }
            }
            if(inputText == '') {
                tabla_td[j].style.backgroundColor=('');
                tabla_td[j].innerHTML = tdText2;
            }
        }
        if(flag_encontro == 0){
            animateDisplay(tabla_tr[i],50,0);
        }
        else{
            animateDisplay(tabla_tr[i],50,1);
            flag_encontro = 0;
        }

    }
}
