<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if (isset($_SESSION['usuario'])) {
    $proceso = $_POST['proceso'];
    header("Content-Type: text/html;charset=utf-8");
    require_once '../modelo/MenuModelo.php';
    $menu = new MenuModelo();    
    ?>
    <?php
    switch ($proceso) {
        case 'cargamenu':
            $array = $menu->get_menu($_SESSION['perfil']);
            ?>
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../../dist/img/<?php echo $_SESSION["logo"]; ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION['nombres']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="header">MENU</li>                            
                        <?php foreach ($array as $row) { ?>
                            <li class="treeview">
                                <a href="<?php echo $row['accion']; ?>">
                                    <i class="<?php echo $row['icono']; ?>"></i> <span><?php echo $row['nombre']; ?></span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php
                                    $menu = new MenuModelo();
                                    $subarray = $menu->get_submenu($row['id'],$_SESSION['perfil']);
                                    foreach ($subarray as $subrow) { ?>
                                    <li><a href="../forms/<?php echo $subrow['accion'];?>"><i class="fa fa-chevron-right"></i> <?php echo $subrow['nombre'];?></a></li>                                   
                                        <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>  
                    </ul>
                </section>
            </aside>
            <?php
            break;
    }
}