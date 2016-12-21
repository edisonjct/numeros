/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

   
});

function cargarciudad() {
    $('#carga-combo-ciudad').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ConfiguracionesControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=ciudad',
        success: function (datos) {
            $('#carga-combo-ciudad').html(datos);
        }
    });
    return false;
}

function cargarcargos() {
    $('#carga-combo-cargo').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ConfiguracionesControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=cargo',
        success: function (datos) {
            $('#carga-combo-cargo').html(datos);
        }
    });
    return false;
}

function cargartiposervicio() {
    $('#tipo-servicio-cliente').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ConfiguracionesControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=tiposervicio',
        success: function (datos) {
            $('#tipo-servicio-cliente').html(datos);
        }
    });
    return false;
}

