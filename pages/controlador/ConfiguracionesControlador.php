<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$proceso = $_POST['proceso'];
header("Content-Type: text/html;charset=utf-8");
require_once '../modelo/ConfiguracionesModelo.php';
$configuraciones = new ConfiguracionesModelo();
?>

<?php
switch ($proceso) {

    case 'ciudad':
        $arrayconfiguracion = $configuraciones->combo_ciudad();
        if (isset($proceso)) {
            ?>
            <?php foreach ($arrayconfiguracion as $row) { ?>
                <option value="<?php echo $row['codtab']; ?>"><?php echo $row['nombre']; ?></option>                
            <?php } ?>
            <?php
        }
        break;
    case 'cargo':
        $arrayconfiguracion = $configuraciones->combo_cargos();
        if (isset($proceso)) {
            ?>
            <?php foreach ($arrayconfiguracion as $row) { ?>
                <option value="<?php echo $row['codtab']; ?>"><?php echo $row['nombre']; ?></option>                
            <?php } ?>
            <?php
        }
        break;
            
    case 'tiposervicio':
        $arrayconfiguracion = $configuraciones->tipo_servicio();
        if (isset($proceso)) {
            ?>
            <?php foreach ($arrayconfiguracion as $row) { ?>
                <option value="<?php echo $row['codtab']; ?>"><?php echo $row['nombre']; ?></option>                
            <?php } ?>
            <?php
        }
        break;    
}
