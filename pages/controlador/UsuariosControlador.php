<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$proceso = $_POST['proceso'];
header("Content-Type: text/html;charset=utf-8");
require_once '../modelo/UsuarioModelo.php';

$usuarios = new UsuarioModelo();
?>

<?php
switch ($proceso) {
    case 'cargausuarios':        
        $arrayuusuariobase = $usuarios->get_usuario()
        ?>
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th></th>
                    <th>USUARIO</th>
                    <th>NOMBRES</th>
                    <th>TIPO</th>
                    <th>AVATAR</th>
                    <th>ESTADO</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arrayuusuariobase as $row) { ?>
                    <tr>
                        <th><a onclick="eliminarusuario('<?php echo $row['id']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a><a onclick="formeditarusuario('<?php echo $row['id']; ?>','<?php echo $row['nombres']; ?>','<?php echo $row['usuario']; ?>','<?php echo base64_decode($row['password']); ?>','<?php echo $row['idtipo']; ?>','<?php echo $row['logo']; ?>','<?php echo $row['idestado']; ?>','<?php echo $row['idempresa']; ?>');">&nbsp;&nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
                        <td><?php echo $row['usuario']; ?></td>
                        <td><?php echo $row['nombres']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><img src="../../dist/img/<?php echo $row['logo']; ?>" class="img-circle" alt="User Image" width="34" height="35"></td>
                        <td><?php echo $row['estado']; ?></td>
                    </tr>
                <?php } ?>    
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>USUARIO</th>
                    <th>NOMBRES</th>
                    <th>TIPO</th>
                    <th>AVATAR</th>
                    <th>ESTADO</th>
                </tr>
            </tfoot>
        </table>
        <?php
        break;
    case 'guardar':
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];
        $avatar = $_POST['avatar'];
        $estado = $_POST['estado'];
        $empresa = $_POST['empresa'];
        $arrayestadousuario = $usuarios->guardar_usuario($nombre, $usuario, base64_encode($password), $tipo, $avatar, $estado, $empresa);
        echo '<script>swal({title: "Bien",text: "Guardado Con Exito el Usuario: ' . $nombre . ' .",timer: 2000, showConfirmButton: false}); cargarusuarios();</script>';
        break;
    case 'tipo':
        $arrayestadousuario = $usuarios->combo_tipo();
        if (isset($proceso)) {
            ?>
            <?php foreach ($arrayestadousuario as $row) { ?>
                <option value="<?php echo $row['codtab']; ?>"><?php echo $row['nombre']; ?></option>                
            <?php } ?>
            <?php
        }
        break;
    case 'cargaestado':
        $arrayestadousuario = $usuarios->estado_usuario();
        if (isset($proceso)) {
            ?>
            <?php foreach ($arrayestadousuario as $row) { ?>
                <option value="<?php echo $row['codigo']; ?>"><?php echo $row['nombre']; ?></option>                
            <?php } ?>
            <?php
        }
        break;
    case 'avatar':
        $arrayestadousuario = $usuarios->combo_avatar();
        if (isset($proceso)) {
            ?>
            <?php foreach ($arrayestadousuario as $row) { ?>
                <option value="<?php echo $row['op1']; ?>"><?php echo $row['nombre']; ?></option>                
            <?php } ?>
            <?php
        }
        break;

    case 'eliminar':
        $id = $_POST['id'];
        $arrayestadousuario = $usuarios->eliminar_usuario($id);
        if ($arrayestadousuario == true) {
            echo '<script>swal("¡Bien!", "Usuario Eliminado:)", "success");cargarusuarios();</script>';
        } else {
            echo '<script>swal("¡Error!","Usuario No Elimiado","error");cargarusuarios();</script>';
        }
        break;

    case 'modificar':
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];
        $avatar = $_POST['logo'];
        $estado = $_POST['estado'];
        $empresa = $_POST['empresa'];
        $arrayestadousuario = $usuarios->modificar_usuario($id, $nombre, $usuario, base64_encode($password), $tipo, $avatar, $estado, $empresa);
        if ($arrayestadousuario == true) {
            echo '<script>swal("¡Bien!", "Usuario Modificado:)", "success");cargarusuarios();</script>';
        } else {
            echo '<script>swal("¡Error!","Usuario No Modificado","error");cargarusuarios();</script>';
        }
        break;
}
?>