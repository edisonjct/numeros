<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginModelo
 *
 * @author EChulde
 */

require_once 'conexion.php';

class LoginModelo extends Conexion {

    //put your code here
    public function LoginModelo() {
        parent::__construct();
    }

    public function valida_usuario($loginNombre,$loginPassword) {
        $query = "SELECT
        u.id AS id,
        u.nombres AS nombres,
        u.usuario AS usuario,
        u.`password` AS `password`,
        e.nombre AS nomempresa,
        u.logo AS logousuario,
        e.iva AS iva,
        e.estado AS estadoempresa,
        u.estado AS estadousuario,
        c.nombre as tipousuario,
        u.tipo as perfil
        FROM tbl_usuarios AS u
        INNER JOIN tbl_empresa AS e ON e.id = u.id_empresa
        INNER JOIN tbl_configuraciones as c ON u.tipo = c.codtab
        WHERE u.usuario = '$loginNombre' AND u. PASSWORD = '$loginPassword'
        AND e.estado = 1 AND u.estado = 1 AND c.numtab = 1";
        $result = $this->conexion_db->query($query);
        $usuarios = $result->fetch_all(MYSQL_ASSOC);
        $result->close();
        $this->conexion_db->close();
        return $usuarios;
    }

}
