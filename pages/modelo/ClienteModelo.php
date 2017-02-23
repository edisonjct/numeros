<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteModelo
 *
 * @author EChulde
 */
require_once 'conexion.php';

class ClienteModelo extends Conexion {

    //put your code here

    public function ClienteModelo() {
        parent::__construct();
    }

    public function buscar_clientes($nombre) {
        $query = "SELECT * FROM tbl_clientes WHERE nombres LIKE '%$nombre%' OR cedula LIKE '%$nombre%' order by id desc LIMIT 0, 8";
        $result = $this->conexion_db->query($query);
        $cliente = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $cliente;
    }

    public function carga_clientes() {
        $query = "SELECT * FROM tbl_clientes order by id desc LIMIT 0, 10";
        $result = $this->conexion_db->query($query);
        $cliente = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $cliente;
    }

    public function combo_tipo_cliente() {
        $query = "SELECT codtab,nombre FROM tbl_configuraciones WHERE numtab = 6 AND codtab != 0 AND estado = 1 order by codtab";
        $result = $this->conexion_db->query($query);
        $tipo = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $tipo;
    }

    public function servicios_cliente($id) {
        $query = "SELECT
        tsc.id as id,
        ts.nombre as tservicio,
        pr.nombre_producto as servicio
        FROM
        tbl_tipo_servicio_cliente AS tsc
        INNER JOIN tbl_clientes AS cl ON tsc.id_cliente = cl.id
        INNER JOIN tbl_productos AS pr ON tsc.id_servicio = pr.id
        INNER JOIN tbl_configuraciones AS ts ON tsc.id_tipo_servicio = ts.codtab
        WHERE ts.numtab = 7 AND cl.id = '$id'";
        $result = $this->conexion_db->query($query);
        $tipo = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $tipo;
    }

    public function grsrcliente($idcliente, $tipo, $servicio) {
        $query = "INSERT INTO tbl_tipo_servicio_cliente (id_cliente, id_tipo_servicio, id_servicio, estado) VALUES ($idcliente,$tipo,$servicio, 3)";
        $guardar = $this->conexion_db->query($query);
        $this->conexion_db->close();
        return $guardar;
    }

    public function guardarcliente($cedula, $nombre, $tipo, $direccion, $cuidad, $telefono, $correo, $cargo, $actividad) {
        $query = "INSERT INTO tbl_clientes (nombres, cedula, direccion, telefono, correo, id_cargo, actividad, fecha_ingreso, id_ciudad, id_tipo, saldo) VALUES ('$nombre', '$cedula','$direccion','$telefono','$correo', '$cargo','$actividad', CURDATE(),'$cuidad','$tipo', '0');";
        $guardar = $this->conexion_db->query($query);
        $this->conexion_db->close();
        return $guardar;
    }

    public function eliminarservicicliente($id) {
        $query = "DELETE FROM tbl_tipo_servicio_cliente WHERE (id='$id');";
        $eliminarsc = $this->conexion_db->query($query);
        $this->conexion_db->close();
        return $eliminarsc;
    }

    public function insertardocumentos($id, $descripcion, $documento) {
        $query = "INSERT INTO tbl_documentos (id_cliente, descripcion, nombrearchivo, estado) VALUES ('$id', '$descripcion', '$documento', '1');";
        $insertardocumento = $this->conexion_db->query($query);
        $this->conexion_db->close();
        return $insertardocumento;
    }

    public function mostrardocumentos($id) {
        $query = "SELECT * FROM tbl_documentos WHERE id_cliente = '$id' AND estado = 1;";
        $result = $this->conexion_db->query($query);
        $mostrardocumentos = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $mostrardocumentos;
    }

    public function eliminardocumentocliente($id) {
        $query = "DELETE FROM tbl_documentos WHERE (id='$id');";
        $eliminardc = $this->conexion_db->query($query);
        $this->conexion_db->close();
        return $eliminardc;
    }

}
