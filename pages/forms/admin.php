<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $perfil = $_SESSION['perfil'];
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Numeros AS</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <link rel="icon" type="image/png" href="../../dist/img/numeros.fw.png" />
            <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="../../dist/js/menu.js"></script>
            <script>
                function cargarfunciones() {
                    cargarmenu();
                }
            </script>            
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
            <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
            <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
            <link rel="stylesheet" href="../../plugins/morris/morris.css">
            <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
            <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
            <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
            <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">            
        </head>
        <body class="hold-transition skin-blue sidebar-mini" onload="cargarfunciones()">
            <div class="wrapper">
                <?php include 'header.php'; ?>
                <!-- Left side column. contains the logo and sidebar -->
                <div id="mostrar-menu"></div>          
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Inicio
                            <small>Panel de Control</small>
                        </h1>                    
                    </section>
                    <?php include 'inicio.php'; ?>
                </div>
                <?php include 'footer.php'; ?>
            </div>           
            <script src="../../dist/js/jquery-ui.min.js"></script>
            <script>
            $.widget.bridge('uibutton', $.ui.button);
            </script>
            <script src="../../bootstrap/js/bootstrap.min.js"></script>
            <script src="../../dist/js/raphael-min.js"></script>
            <script src="../../plugins/morris/morris.min.js"></script>
            <script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
            <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="../../plugins/knob/jquery.knob.js"></script>
            <!-- daterangepicker -->
            <script src="../../dist/js/moment.min.js"></script>
            <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
            <!-- datepicker -->
            <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <!-- Slimscroll -->
            <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="../../plugins/fastclick/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="../../dist/js/app.min.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="../../dist/js/pages/dashboard.js"></script>
            <!-- AdminLTE for demo purposes 
            <script src="dist/js/demo.js"></script>  -->
        </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}
