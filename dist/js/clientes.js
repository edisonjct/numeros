/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('#txt-bs-cliente').focus();
    $('#btn-guardar-cliente').hide();
    $('#btn-modificar-cliente').hide();


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
    $('#carga-combo-ciudad').val('');
    $('#txt-telefonocliente').val('');
    $('#txt-correocliente').val('');
    $('#carga-combo-cargo').val('');
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

function upload_image() {
    $(".upload-msg").text('Cargando...');
    var inputFileImage = document.getElementById("fileToUpload");
    var file = inputFileImage.files[0];
    var data = new FormData();
    data.append('fileToUpload', file);

    /*jQuery.each($('#fileToUpload')[0].files, function(i, file) {
     data.append('file'+i, file);
     });*/

    $.ajax({
        url: "upload.php", // Url to which the request is send
        type: "POST", // Type of request to be send, called as method
        data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false, // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            $(".upload-msg").html(data);
            window.setTimeout(function () {
                $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 5000);
        }
    });
}
