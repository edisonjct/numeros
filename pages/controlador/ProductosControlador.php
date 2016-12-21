<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$proceso = $_POST['proceso'];
header("Content-Type: text/html;charset=utf-8");
require_once '../modelo/ProductosModelo.php';
$productos = new ProductosModelo();
?>

<?php
switch ($proceso) {

    case 'servicio':
        $arrayproductos = $productos->servicios();
        if (isset($proceso)) {
            ?>
            <?php foreach ($arrayproductos as $row) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_producto']; ?></option>                
            <?php } ?>
            <?php
        }
        break;    
}
