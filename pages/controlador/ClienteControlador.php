<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$proceso = $_POST['proceso'];
require_once '../modelo/ClienteModelo.php';
$cliente = new ClienteModelo();
?>
<?php
switch ($proceso) {
    case 'buscar' :
        $nombre = $_POST['nombre'];
        $arraycliente = $cliente->buscar_clientes($nombre);
        ?>
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>CEDULA</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($arraycliente as $row) {
                    ?>            
                    <tr>
                        <td><a onclick="form_mostrar_clientes('<?php echo $row['id']; ?>', '<?php echo $row['cedula']; ?>', '<?php echo $row['nombres']; ?>', '<?php echo $row['id_tipo']; ?>', '<?php echo $row['direccion']; ?>', '<?php echo $row['id_ciudad']; ?>', '<?php echo $row['telefono']; ?>', '<?php echo $row['correo']; ?>', '<?php echo $row['id_cargo']; ?>', '<?php echo $row['actividad']; ?>'), servicioscliente('<?php echo $row['id']; ?>')"><?php echo $row['nombres']; ?></a></td>
                        <td><?php echo $row['cedula']; ?></td>
                    </tr>                

                <?php } ?>
            </tbody>            
        </table>
        <?php
        break;

    case 'cargar' :
        $arraycliente = $cliente->carga_clientes();
        ?>
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>CEDULA</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($arraycliente as $row) {
                    ?>            
                    <tr>
                        <td><a onclick="form_mostrar_clientes('<?php echo $row['id']; ?>', '<?php echo $row['cedula']; ?>', '<?php echo $row['nombres']; ?>', '<?php echo $row['id_tipo']; ?>', '<?php echo $row['direccion']; ?>', '<?php echo $row['id_ciudad']; ?>', '<?php echo $row['telefono']; ?>', '<?php echo $row['correo']; ?>', '<?php echo $row['id_cargo']; ?>', '<?php echo $row['actividad']; ?>'), servicioscliente('<?php echo $row['id']; ?>')"><?php echo $row['nombres']; ?></a></td>
                        <td><?php echo $row['cedula']; ?></td>
                    </tr>                

                <?php } ?>
            </tbody>            
        </table>
        <?php
        break;

    case 'tipocliente':
        $arraycliente = $cliente->combo_tipo_cliente();
        if (isset($proceso)) {
            ?>
            <?php foreach ($arraycliente as $row) { ?>
                <option value="<?php echo $row['codtab']; ?>"><?php echo $row['nombre']; ?></option>                
            <?php } ?>
            <?php
        }
        break;

    case 'serivioscliente' :
        $id = $_POST['id'];
        $arraycliente = $cliente->servicios_cliente($id)
        ?>
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <td width="20px"></td>
                    <th>TIPO SERVICIO</th>
                    <th>SERVICIO</th>                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arraycliente as $row) { ?>
                    <tr>
                        <td><a onclick="eliminarserivciocliente('<?php echo $row['id']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        <td><?php echo $row['tservicio']; ?></td>
                        <td><?php echo $row['servicio']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>            
        </table>
        <?php
        break;

    case 'guardartservicio':
        $idcliente = $_POST['cliente'];
        $tipo = $_POST['tipo'];
        $servicio = $_POST['servicio'];
        $array = $cliente->grsrcliente($idcliente,$tipo,$servicio);
        echo '<script>servicioscliente('.$idcliente.');</script>';
        break;
        
    case 'eliminarservicioc':
        $id = $_POST['id'];
        $idcliente = $_POST['cliente'];        
        $array = $cliente->eliminarservicicliente($id);
        if ($array == true) {
            echo '<script>swal("¡Bien!", "Usuario Eliminado:)", "success");servicioscliente('.$idcliente.');</script>';
        } else {
            echo '<script>swal("¡Error!","Usuario No Elimiado","error");servicioscliente('.$idcliente.');</script>';
        }
        break;
}

    