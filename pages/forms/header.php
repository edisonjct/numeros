<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>N</b>AS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Numeros AS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-fixed-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->          
                <!-- Notifications: style can be found in dropdown.less -->          
                <!-- Tasks: style can be found in dropdown.less -->          
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../../dist/img/<?php echo $_SESSION["logo"]; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $_SESSION['nombres'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../../dist/img/<?php echo $_SESSION["logo"]; ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $_SESSION['nombres']; ?> - <?php echo $_SESSION['tipo']; ?>                             
                            </p>
                        </li>
                        <!-- Menu Body -->              
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="../controlador/DestruirSessionControlador.php" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->          
            </ul>
        </div>
    </nav>
    <br><br>
</header>