<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inicio
 *
 * @author EChulde
 */
require_once 'conexion.php';

class InicioModelo extends Conexion {

    //put your code here

    public function InicioModelo() {
        parent::__construct();
    }

    public function get_ventas() {
        
    }

    public function get_productos() {
        
    }

    public function get_clientes() {
        $query = "select count(id) as sum from tbl_clientes";
        $result = $this->conexion_db->query($query);
        $numclientes = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $numclientes;
    }

    public function get_pagos() {
        
    }

}
