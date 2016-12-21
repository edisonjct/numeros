<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$proceso = $_POST['proceso'];

require_once '../modelo/EmpresaModelo.php';

$empresa = new EmpresaModelo();

switch ($proceso) {
    case 0:
        $arrayempresabase = $empresa->get_empresas();
        ?>
        <table id="example1" class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>PROPIETARIO</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>RUC</th>
                    <th>IVA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arrayempresabase as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['propietario']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['ruc']; ?></td>
                        <td><?php echo $row['iva']; ?></td>                
                    </tr>
                <?php } ?>    
            </tbody>
            <tfoot>
                <tr>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>PROPIETARIO</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>RUC</th>
                    <th>IVA</th>
                </tr>
            </tfoot>
        </table>
        <?php
        break;

    case 1:
        break;
    case 2:
        break;
    case 3:
        $arrayempresabase = $empresa->get_empresas();
        if (isset($proceso)) {
            ?>
                <?php foreach ($arrayempresabase as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>                
                <?php } ?>
            <?php
        }
        break;
}
?>





