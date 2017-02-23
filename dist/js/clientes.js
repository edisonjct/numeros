/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('#txt-bs-cliente').focus();
    $('#btn-guardar-cliente').hide();
    $('#btn-modificar-cliente').hide();
    $("#txt-cedulacliente").prop('disabled', true);

    $('#btn-agregar-serviciocliente').on('click', function () {


    });


});

function buscar_clientes() {
    var nombre = $('#txt-bs-cliente').val();
    $('#mostrar-clientes').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ClienteControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=buscar&nombre=' + nombre,
        success: function (datos) {
            $('#mostrar-clientes').html(datos);
        }
    });
    return false;
}

function cargar_clientes() {
    $('#mostrar-clientes').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ClienteControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=cargar',
        success: function (datos) {
            $('#mostrar-clientes').html(datos);
        }
    });
    return false;
}
function form_mostrar_clientes(id, cedula, nombre, tipocli, direccion, ciudad, telefono, correo, cargo, actividad) {
    $('#txt-id').val(id);
    $("#txt-cedulacliente").prop('disabled', true);
    $("#parrafo").html('<h3>Datos de Clientes <small>Vista:  </small>' + nombre + '</h3>');
    $('#txt-cedulacliente').val(cedula);
    $('#txt-nombrecliente').val(nombre);
    $('#tipo-cliente').val(tipocli);
    $('#txt-direccioncliente').val(direccion);
    $('#carga-combo-ciudad').val(ciudad);
    $('#txt-telefonocliente').val(telefono);
    $('#txt-correocliente').val(correo);
    $('#carga-combo-cargo').val(cargo);
    $('#txt-actividad').val(actividad);
    $('#btn-guardar-cliente').hide();
    $('#btn-modificar-cliente').show();
}

function nuevo_clientes() {
    $("#txt-cedulacliente").prop('disabled', false);
    $('#txt-cedulacliente').val('');
    $('#txt-nombrecliente').val('');
    $('#txt-direccioncliente').val('');
    //$('#carga-combo-ciudad').val('');
    $('#txt-telefonocliente').val('');
    $('#txt-correocliente').val('');
    //$('#carga-combo-cargo').val('');
    $('#btn-guardar-cliente').show();
    $('#btn-modificar-cliente').hide();
}

function tipoclientes() {
    $('#tipo-cliente').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ClienteControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=tipocliente',
        success: function (datos) {
            $('#tipo-cliente').html(datos);
        }
    });
    return false;
}

function servicioscliente(id) {
    //alert("aqui servicios");
    $('#mostrar-servicios-cliente').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ClienteControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=serivioscliente&id=' + id,
        success: function (datos) {
            $('#mostrar-servicios-cliente').html(datos);
        }
    });
    return false;
}

function cargardocumentos(id) {
    //alert("aqui docuemn");
    $('#mostrar-documentos').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
    var url = '../../pages/controlador/ClienteControlador.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: 'proceso=mostrardoc&id=' + id,
        success: function (datos) {
            $('#mostrar-documentos').html(datos);
        }
    });
    return false;
}

function agregarserviciocliente() {
    var cliente = $('#txt-id').val();
    var tipo = $('#tipo-servicio-cliente').val();
    var servicio = $('#servicio').val();
    if (cliente != '') {
        $('#mostrar-servicios-cliente').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
        var url = '../../pages/controlador/ClienteControlador.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: 'proceso=guardartservicio&cliente=' + cliente + '&tipo=' + tipo + '&servicio=' + servicio,
            success: function (datos) {
                $('#mostrar-servicios-cliente').html(datos);
                swal({title: "Bien", text: "Guardado Con Exito ", timer: 2000, showConfirmButton: false});

            }
        });
        return false;
    } else {
        swal("¡Error!", "Seleccione un cliente, Servicio No Agregado", "error");
        cargarusuarios();
    }
}

function eliminarserivciocliente(id) {
    var cliente = $('#txt-id').val();
    swal({
        title: "¿Seguro que de eliminar este Servicio?", text: "No podrás deshacer este paso...", type: "warning", showCancelButton: true, cancelButtonText: "Cancelar", confirmButtonColor: "#DD6B55", confirmButtonText: "Aceptar", closeOnConfirm: false},
            function () {
                $('#mostrar-servicios-cliente').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
                var url = '../../pages/controlador/ClienteControlador.php';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: 'proceso=eliminarservicioc&id=' + id + '&cliente=' + cliente,
                    success: function (datos) {
                        $('#div-mensaje').html(datos);
                    }
                });
                return false;
            });
}

function uploadAjax() {
    var cliente = $('#txt-id').val();
    var desc = $('#desc').val();
    //alert(desc);
    var inputFileImage = document.getElementById("foto");
    if (desc != '' && inputFileImage != '') {
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('foto', file);
        var url = '../../pages/controlador/UploadClientesControlador.php?id=' + cliente + '&desc=' + desc;
        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            cache: false,
            success: function (datos) {
                $('#desc').val('');
                $('#foto').val('');
                $('#mostrar-documentos').html(datos); // display response from the PHP script, if any   
            }
        }
        );
        return false;
    } else {
        swal("¡Error!", "Ingrese los Parametros de Documentos", "error");
        return false;
    }
}

function eliminardocumentocliente(id) {
    var cliente = $('#txt-id').val();
    swal({
        title: "¿Seguro que de eliminar este Documento?", text: "No podrás deshacer este paso...", type: "warning", showCancelButton: true, cancelButtonText: "Cancelar", confirmButtonColor: "#DD6B55", confirmButtonText: "Aceptar", closeOnConfirm: false},
            function () {
                $('#mostrar-documentos').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
                var url = '../../pages/controlador/ClienteControlador.php';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: 'proceso=eliminardocumento&id=' + id + '&cliente=' + cliente,
                    success: function (datos) {
                        $('#div-mensaje').html(datos);
                    }
                });
                return false;
            });
}

function guardardatospersonales() {
    var cedula = $('#txt-cedulacliente').val();
    var nombre = $('#txt-nombrecliente').val();
    var tipo = $('#tipo-cliente').val();
    var direccion = $('#txt-direccioncliente').val();
    var cuidad = $('#carga-combo-ciudad').val();
    var telefono = $('#txt-telefonocliente').val();
    var correo = $('#txt-correocliente').val();
    var cargo = $('#carga-combo-cargo').val();
    var actividad = $('#txt-actividad').val();
//    alert(cedula);
//    alert(nombre);
//    alert(tipo);
//    alert(direccion);
//    alert(cuidad);
//    alert(telefono);
//    alert(correo);
//    alert(cargo);
//    alert(actividad);
    
    if (cedula != '' && nombre != '' && direccion != '' && telefono != '' && correo != '') {
        $('#div-mensaje').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
        var url = '../../pages/controlador/ClienteControlador.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: 'proceso=guardarservicio&cedula=' + cedula + '&nombre=' + nombre + '&tipo=' + tipo + '&direccion=' + direccion + '&cuidad=' + cuidad + '&telefono=' + telefono + '&correo=' + correo + '&cargo=' + cargo + '&actividad=' + actividad,
            success: function (datos) {
                $('#div-mensaje').html(datos);
                return false;
            }
        });
    } else {
        swal("¡Error!", "Ingrese los Campos Obligatorios, Cliente No Registrado", "error");
    }



//    if (cedula != '' && nombre != '' && direccion != '' && telefono != '' && correo != '') {
//        $('#datos-personales').html('<div align="center"><i class="fa fa-refresh fa-spin" style="font-size:40px"></i></div>');
//        var url = '../../pages/controlador/ClienteControlador.php';
//        $.ajax({
//            type: 'POST',
//            url: url,
//            data: 'proceso=guardarservicio&cedula=' + cedula + '&nombre=' + nombre + '&tipo=' + tipo + '&direccion=' + direccion + '&cuidad=' + cuidad + '&telefono=' + telefono + '&correo=' + correo + '&cargo=' + cargo + '&actividad=' + actividad,
//            success: function (datos) {
//                $('#div-mensaje').html(datos);
//                return false;
//            }
//        });
//        return false;
//    } else {
//        swal("¡Error!", "Ingrese los Campos Obligatorios, Cliente No Registrado", "error");        
//    }
}



