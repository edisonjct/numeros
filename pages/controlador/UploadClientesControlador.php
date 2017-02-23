<?php

require_once '../modelo/ClienteModelo.php';
$cliente = new ClienteModelo();

$id = $_GET['id'];
$descripcion = $_GET['desc'];
$tipo_archivo = $_FILES['foto']['type'];

if ($tipo_archivo != "image/jpeg" && $tipo_archivo != "image/png" && $tipo_archivo != "image/jpeg" && $tipo_archivo != "application/pdf") {
    echo '<script>swal({title: "Error", text: "Solo se permite subir archivos PDF e IMAGENES ", timer: 3000, showConfirmButton: false});</script>';
} else {
    $documento = $id . $descripcion . date('Y-m-d') . date('H-i-s') . trim($_FILES['foto']['name']);
    $insertdocumento = $cliente->insertardocumentos($id, $descripcion, $documento);
    move_uploaded_file($_FILES['foto']['tmp_name'], '../../dist/upload/' . $documento);
    echo '<script>swal({title: "Bien", text: "Guardado Con Exito ", timer: 2000, showConfirmButton: false});cargardocumentos(' . $id . ');</script>';
}