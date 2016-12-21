<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../dist/img/<?php echo $_SESSION["logo"];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['nombres'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
            </div>
        </div>
        <!-- search form -->      
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <?php ?>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Inventarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Productos</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Servicio</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Categorias</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Kardex</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Reporte Productos o Sevcios</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Reporte Categoria</a></li>
                </ul>
            </li>
            
            <?php ?>
            
            <!-- generate menu 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Inventarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Productos</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Servicio</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Categorias</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Kardex</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Reporte Productos o Sevcios</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Reporte Categoria</a></li>
                </ul>
            </li>  
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book-o"></i> <span>Clientes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Clientes</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Diario De Clientes</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Saldo x Cliente</a></li>                    
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Reporte Clientes</a></li>                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>Facturación</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Factura</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Nota de Credito</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Anulacion</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Resumen de Facturacion</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Resumen de Nota de Credito</a></li>                 
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cc-diners-club"></i> <span>Combranzas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Pagos</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Cobros</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Flujo</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Casos</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Tramites</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Graficos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-right"></i> ChartJS</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Morris</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Flot</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Inline charts</a></li>
                </ul>
            </li>                                
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Reportes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Simple tables</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>                    
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-o"></i> <span>Usuarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../forms/usuarios.php"><i class="fa fa-chevron-right"></i> Registro</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Lista de Usuario</a></li>
                </ul>
            </li>            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Configuraciones</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../forms/empresa.php"><i class="fa fa-chevron-right"></i> Empresa</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i> Punto de Venta</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Mantenimiento
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Ciudad</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Forma de Pago</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Tipo de Producto</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Tipo de Servicio</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Genero</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Estados</a></li>
                        </ul>
                    </li>                    
                </ul>
            </li>
            
            -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>