<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuModelo
 *
 * @author EChulde
 */

require_once 'conexion.php';


class MenuModelo extends Conexion{
    //put your code here
    
    public function MenuModelo(){
        parent::__construct();
    }
    
    public function get_menu($perfil){
        $query = "select 
        DISTINCT(m.id) as id,
        m.nombre as nombre,
        m.accion as accion,
        m.icono as icono,
        u.tipo as perfil
        FROM
        tbl_menu AS m
        INNER JOIN tbl_permisos AS p ON m.id = p.id_menu
        INNER JOIN tbl_usuarios AS u ON p.id_perfil = u.tipo
        WHERE m.padre = 0 AND u.tipo = '$perfil'";
        $result = $this->conexion_db->query($query);
        $menu = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $menu;
    }
    
    public function get_submenu($padre,$perfil){
        $query = "select 
        DISTINCT(m.id) as id,
        m.nombre as nombre,
        m.accion as accion,
        m.icono as icono,
        u.tipo as perfil
        FROM
        tbl_menu AS m
        INNER JOIN tbl_permisos AS p ON m.id = p.id_menu
        INNER JOIN tbl_usuarios AS u ON p.id_perfil = u.tipo
        WHERE m.padre = $padre AND u.tipo = '$perfil'";
        $result = $this->conexion_db->query($query);
        $submenu = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $submenu;
    }
    
}
