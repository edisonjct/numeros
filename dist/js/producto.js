/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

   
});

function cargarservicioscombo() {
    $('#servicio').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ProductosControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=servicio',
        success: function (datos) {
            $('#servicio').html(datos);
        }
    });
    return false;
}

