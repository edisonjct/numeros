<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductosModelo
 *
 * @author EChulde
 */

require_once 'conexion.php';

class ProductosModelo extends Conexion {
    //put your code here
    public function ProductosModelo() {
        parent::__construct();
    }
    
    public function servicios() {
        $query = "SELECT * FROM tbl_productos WHERE tipo_producto = 2 and cantidad > 0";
        $result = $this->conexion_db->query($query);
        $ciudad = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $ciudad;
    }
    
}
