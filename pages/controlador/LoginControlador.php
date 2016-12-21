<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginControlador
 *
 * @author EChulde
 */


if (isset($_POST["enviar"])) {

    require_once '../modelo/LoginModelo.php';

    $loginNombre = $_POST["usuario"];
    $loginPassword = base64_encode($_POST["password"]);        

    $login = new LoginModelo();
    $arrayloginbase = $login->valida_usuario($loginNombre, $loginPassword);

    foreach ($arrayloginbase as $row) {
        $id = $row["id"];
        $userok = $row["usuario"];
        $passok = $row["password"];
        $nombre = $row["nombres"];
        $logo = $row["logousuario"];
        $tipo = $row["tipousuario"];
        $perfil = $row["perfil"];
        $nomempresa = $row["nomempresa"];
        $iva = $row["nomempresa"];
    }

    if (isset($loginNombre) && isset($loginPassword)) {
        if ($loginNombre == $userok && $loginPassword == $passok) {
            session_start();
            $_SESSION["usuario"] = $userok;
            $_SESSION["nombres"] = $nombre;
            $_SESSION["logo"] = $logo;
            $_SESSION["tipo"] = $tipo;
            $_SESSION["perfil"] = $perfil;
            $_SESSION["empresa"] = $nomempresa;
            $_SESSION["iva"] = $iva;
            header("Location: ../../pages/forms/admin.php");            
        } else {
            Header("Location: ../../index.php?error=login");
        }
    }
} else {
    header("Location: ../../index.php");
}