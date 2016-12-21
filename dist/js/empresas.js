/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $("#example1").DataTable();
    $('#llenardatosempresa').hide();


    $('#btn-nuevaempresa').on('click', function () {
        $('#llenardatosempresa').show();
        $('#mostrardatosempresa').hide();
        $('#btn-nuevaempresa').hide();
    });


    $('#btn-cancelanueaempresa').on('click', function () {
        var r = confirm("Esta Seguro de Cancelar!");
        if (r === true) {
            $('#llenardatosempresa').hide();
            $('#mostrardatosempresa').show();
            $('#btn-nuevaempresa').show();
            return false;
        } else {
            return false;
        }
    });

});

function cargarempresa() {
    $('#agrega-registros').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/EmpresaControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=0',
        success: function (datos) {
            $('#agrega-registros').html(datos);
        }
    });
    return false;
}

function cargarcomboempresa() {
    $('#carga-combo-empresa').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/EmpresaControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=3',
        success: function (datos) {
            $('#carga-combo-empresa').html(datos);
        }
    });
    return false;
}


