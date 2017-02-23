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
                        <td><a onclick="form_mostrar_clientes('<?php echo $row['id']; ?>', '<?php echo $row['cedula']; ?>', '<?php echo $row['nombres']; ?>', '<?php echo $row['id_tipo']; ?>', '<?php echo $row['direccion']; ?>', '<?php echo $row['id_ciudad']; ?>', '<?php echo $row['telefono']; ?>', '<?php echo $row['correo']; ?>', '<?php echo $row['id_cargo']; ?>', '<?php echo $row['actividad']; ?>'), servicioscliente('<?php echo $row['id']; ?>'), cargardocumentos('<?php echo $row['id']; ?>')"><?php echo $row['nombres']; ?></a></td>
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
                        <td><a onclick="form_mostrar_clientes('<?php echo $row['id']; ?>', '<?php echo $row['cedula']; ?>', '<?php echo $row['nombres']; ?>', '<?php echo $row['id_tipo']; ?>', '<?php echo $row['direccion']; ?>', '<?php echo $row['id_ciudad']; ?>', '<?php echo $row['telefono']; ?>', '<?php echo $row['correo']; ?>', '<?php echo $row['id_cargo']; ?>', '<?php echo $row['actividad']; ?>'), servicioscliente('<?php echo $row['id']; ?>'), cargardocumentos('<?php echo $row['id']; ?>')"><?php echo $row['nombres']; ?></a></td>
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
        $arraycliente = $cliente->servicios_cliente($id);
        if ($arraycliente == true) {
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
        } else {
            echo "No existen Servicios Para Este Cliente";
        }
        break;

    case 'guardartservicio':
        $idcliente = $_POST['cliente'];
        $tipo = $_POST['tipo'];
        $servicio = $_POST['servicio'];
        $array = $cliente->grsrcliente($idcliente, $tipo, $servicio);
        echo '<script>servicioscliente(' . $idcliente . ');</script>';
        break;

    case 'eliminarservicioc':
        $id = $_POST['id'];
        $idcliente = $_POST['cliente'];
        $array = $cliente->eliminarservicicliente($id);
        if ($array == true) {
            echo '<script>swal("¡Bien!", "Usuario Eliminado:)", "success");servicioscliente(' . $idcliente . ');</script>';
        } else {
            echo '<script>swal("¡Error!","Usuario No Elimiado","error");servicioscliente(' . $idcliente . ');</script>';
        }
        break;

    case 'mostrardoc' :
        $id = $_POST['id'];
        $mostrardocumentos = $cliente->mostrardocumentos($id);
        if ($mostrardocumentos == true) {
            ?>
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <td width="20px"></td>
                        <th>DESCRIPCION</th>
                        <th>VER</th>                    
                    </tr>
                </thead>
                <tbody>
            <?php foreach ($mostrardocumentos as $row) { ?>
                        <tr>
                            <td><a onclick="eliminardocumentocliente('<?php echo $row['id']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><a href="../../dist/upload/<?php echo $row['nombrearchivo']; ?>" target="_back"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a></td>                        
                        </tr>
            <?php } ?>
                </tbody>            
            </table>
        <?php
        } else {
            echo "No existen Documentos Para Este Cliente";
        }
        break;

    case 'eliminardocumento':
        $id = $_POST['id'];
        //echo '<script>alert("aqui estoy");</script>';
        $idcliente = $_POST['cliente'];
        $eliminardc = $cliente->eliminardocumentocliente($id);
        if ($eliminardc == true) {
            echo '<script>swal("¡Bien!", "Documento Eliminado:)", "success");cargardocumentos(' . $idcliente . ');</script>';
        } else {
            echo '<script>swal("¡Error!","Documento No Elimiado","error");cargardocumentos(' . $idcliente . ');</script>';
        }
        break;

    case 'modificarcliente':
        echo '<script>alert("aqui estoy");</script>';
        break;

    case 'guardarservicio':
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $direccion = $_POST['direccion'];
        $cuidad = $_POST['cuidad'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $cargo = $_POST['cargo'];
        $actividad = $_POST['actividad'];
//        echo '<script>alert("desde controlador");</script>';
//        echo '<script>alert('.$cedula.');</script>';
//        echo '<script>alert('.$nombre.');</script>';
//        echo '<script>alert('.$tipo.');</script>';
//        echo '<script>alert('.$direccion.');</script>';
//        echo '<script>alert('.$cuidad.');</script>';
//        echo '<script>alert('.$telefono.');</script>';
//        echo '<script>alert('.$correo.');</script>';
//        echo '<script>alert('.$cargo.');</script>';
//        echo '<script>alert('.$actividad.');</script>';
        $guardar = $cliente->guardarcliente($cedula, $nombre, $tipo, $direccion, $cuidad, $telefono, $correo, $cargo, $actividad);
        echo '<script>swal({title: "Bien", text: "Guardado Con Exito ", timer: 2000, showConfirmButton: false});</script>';
        break;
}

    