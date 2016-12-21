<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfiguracionesModelo
 *
 * @author EChulde
 */

require_once 'conexion.php';

class ConfiguracionesModelo extends Conexion{
    //put your code here
    
    public function ConfiguracionesModelo() {
        parent::__construct();
    }
    
    public function combo_ciudad() {
        $query = "SELECT codtab,nombre,op1 FROM tbl_configuraciones WHERE numtab = 4 AND codtab != 0 AND estado = 1 order by codtab";
        $result = $this->conexion_db->query($query);
        $ciudad = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $ciudad;
    }
    
    public function combo_cargos() {
        $query = "SELECT codtab,nombre,op1 FROM tbl_configuraciones WHERE numtab = 5 AND codtab != 0 AND estado = 1 order by codtab";
        $result = $this->conexion_db->query($query);
        $cargos = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $cargos;
    }
    
    public function tipo_servicio() {
        $query = "SELECT codtab,nombre,op1 FROM tbl_configuraciones WHERE numtab = 7 AND codtab != 0 AND estado = 1 order by codtab";
        $result = $this->conexion_db->query($query);
        $tservicio = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $tservicio;
    }
    
}
