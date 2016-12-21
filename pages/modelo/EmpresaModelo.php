<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VentasModelo
 *
 * @author EChulde
 */
require_once 'conexion.php';

class EmpresaModelo extends Conexion {

    //put your code here

    public function EmpresaModelo() {
        parent::__construct();
    }

    public function get_empresas() {
        $query = "select * from tbl_empresa where estado = 1";
        $result = $this->conexion_db->query($query);
        $empresas = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $empresas;
    }

    
    
    public function truncate_masvendidos(){
        $query = "truncate table mrb_tmp_masvendidos;";
        $result = $this->conexion_db->query($query);
        $this->conexion_db->close();
        return $result;
    }
    
    public function set_masvendidos($bodega,$fecha){
        $query = "INSERT INTO mrb_tmp_masvendidos(codbar01,cantidad) 
        SELECT
        d.CODPROD03 as codigo,
        Sum(d.CANTID03) AS cantidad
        FROM
        $bodega.movpro AS d
        INNER JOIN $bodega.maefac AS c ON d.NOCOMP03 = c.nofact31
        WHERE d.TIPOTRA03 = '80' AND c.cvanulado31 != '9' AND d.FECMOV03 BETWEEN '2016-09-28 00:00:00' AND '2016-09-28 23:59:59'
        GROUP BY d.CODPROD03
        LIMIT 15;";
        $result = $this->conexion_db->query($query);
        $this->conexion_db->close();
        return $result;
    }     

}
