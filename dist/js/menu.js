/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    
});

function cargarmenu() {
    var url = '../../pages/controlador/MenuControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=cargamenu',
        success: function (datos) {
            $('#mostrar-menu').html(datos);
        }
    });
    return false;
}

function prueba(){
    alert("aqui");
}