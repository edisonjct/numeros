/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    $('#llenardatosusuario').hide();
    $('#txt-id').hide();

    $('#btn-nuevousuario').on('click', function () {
        $('#llenardatosusuario').show();
        $('#txt-nombreusuario').val('');
        $('#txt-usuario').val('');
        $('#txt-password').val('');
        $("#txt-nombreusuario").focus();
        $('#mostrardatosusuario').hide();
        $('#btn-nuevousuario').hide();
        $('#btn-modificarusuario').hide();

    });

    $('#btn-cancelanueousuario').on('click', function () {
        var r = confirm("Esta Seguro de Cancelar!");
        if (r === true) {
            $('#llenardatosusuario').hide();
            $('#mostrardatosusuario').show();
            $('#btn-nuevousuario').show();
            return false;
        } else {
            return false;
        }
    });

    $('#btn-guardarusuario').on('click', function () {
        var nombre = $('#txt-nombreusuario').val();
        var usuario = $('#txt-usuario').val();
        var password = $('#txt-password').val();
        var tipo = $('#carga-combo-tipo').val();
        var avatar = $('#carga-combo-avatar').val();
        var estado = $('#carga-combo-estado').val();
        var empresa = $('#carga-combo-empresa').val();
        $('#div-mensaje').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
        var url = '../../pages/controlador/UsuariosControlador.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: 'proceso=guardar&nombre=' + nombre + '&usuario=' + usuario + '&password=' + password + '&tipo=' + tipo + '&avatar=' + avatar + '&estado=' + estado + '&empresa=' + empresa,
            success: function (datos) {
                $('#div-mensaje').html(datos);
                $('#llenardatosusuario').hide();
                $('#btn-nuevousuario').show();
                $('#mostrardatosusuario').show();
            }
        });
        return false;
    });




});

function cargarestados() {
    $('#carga-combo-estado').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/UsuariosControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=cargaestado',
        success: function (datos) {
            $('#carga-combo-estado').html(datos);
        }
    });
    return false;
}

function cargarusuarios() {
    $('#agrega-registros').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/UsuariosControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=cargausuarios',
        success: function (datos) {
            $('#agrega-registros').html(datos);
        }
    });
    return false;
}

function cargaravatar() {
    $('#carga-combo-avatar').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/UsuariosControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=avatar',
        success: function (datos) {
            $('#carga-combo-avatar').html(datos);
        }
    });
    return false;
}

function cargartipo() {
    $('#carga-combo-tipo').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/UsuariosControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=tipo',
        success: function (datos) {
            $('#carga-combo-tipo').html(datos);
        }
    });
    return false;
}

function formeditarusuario(id, nombre, usuario, password, tipo, logo, estado, empresa) {
    $('#llenardatosusuario').show();
    $('#mostrardatosusuario').hide();
    $('#btn-nuevousuario').hide();
    $('#btn-modificarusuario').show();
    $('#btn-guardarusuario').hide();
    $('#txt-id').val(id);
    $('#txt-nombreusuario').val(nombre);
    $('#txt-usuario').val(usuario);
    $('#txt-password').val(password);
    $('#carga-combo-tipo').val(tipo);
    $('#carga-combo-avatar').val(logo);
    $('#carga-combo-estado').val(estado);
    $('#carga-combo-empresa').val(empresa);
}
function eliminarusuario(id) {
    swal({
        title: "¿Seguro que de eliminar el usuario?",
        text: "No podrás deshacer este paso...",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false},
            function () {
                $('#div-mensaje').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
                var url = '../../pages/controlador/UsuariosControlador.php';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: 'proceso=eliminar&id=' + id,
                    success: function (datos) {
                        $('#div-mensaje').html(datos);
                    }
                });
                return false;
            });
}

function modificarusuario() {
    swal({
        title: "¿Seguro que de modificar el usuario?",
        text: "No podrás deshacer este paso...",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false},
            function () {
                var id = $('#txt-id').val();
                var nombre = $('#txt-nombreusuario').val();
                var usuario = $('#txt-usuario').val();
                var password = $('#txt-password').val();
                var tipo = $('#carga-combo-tipo').val();
                var logo = $('#carga-combo-avatar').val();
                var estado = $('#carga-combo-estado').val();
                var empresa = $('#carga-combo-empresa').val();
                $('#div-mensaje').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
                var url = '../../pages/controlador/UsuariosControlador.php';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: 'proceso=modificar&id=' + id + '&nombre=' + nombre + '&usuario=' + usuario + '&password=' + password + '&tipo=' + tipo + '&logo=' + logo + '&estado=' + estado + '&empresa=' + empresa,
                    success: function (datos) {
                        $('#div-mensaje').html(datos);
                        $('#llenardatosusuario').hide();
                        $('#btn-nuevousuario').show();
                        $('#mostrardatosusuario').show();
                    }
                });
                return false;
            });
}


