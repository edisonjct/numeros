<?php
session_start();
if (isset($_SESSION['usuario'])) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Numeros AS</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
            <!-- Bootstrap 3.3.6 -->
            <script src="../../dist/js/empresas.js"></script>
            <script>
                function cargarfunciones() {
                    cargarmenu();
                    cargarempresa();                    
                }
            </script>
            <script src="../../dist/js/menu.js"></script>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
            <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
            <link rel="stylesheet" href="../../plugins/iCheck/all.css">
            <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
            <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
            <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
            <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
            <link rel="stylesheet" href="../../plugins/morris/morris.css">
            <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">        
            <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
            <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
            <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
            <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
            <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css"> 

        </head>
        <body class="hold-transition skin-blue sidebar-mini" onload="cargarfunciones()">
            <div class="wrapper">
                <?php include './header.php'; ?>            
                <div id="mostrar-menu"></div>           
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Datos Generales de la Empresa
                            <small>Vista</small>
                        </h1>   


                    </section>
                    <!-- Main content -->

                    <section class="content">
                        <button type="button" class="btn btn-foursquare" id="btn-nuevaempresa">Nuevo</button>

                        <div class="row" id="llenardatosempresa">                                               
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Datos de Empresa</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                                
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre Empresa">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Propietario</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre Del Propietario">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Direccion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Direccion">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Telefono</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Telefono">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Ruc</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputPassword3" placeholder="Ruc">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Iva</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputPassword3" placeholder="Iva">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Logo</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" id="inputPassword3" placeholder="Direccion">
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-default" id="btn-cancelanueaempresa">Cancelar</button>
                                            <button type="submit" class="btn btn-info pull-right">Guardar</button>
                                        </div>
                                        <!-- /.box-footer -->
                                    </form>
                                </div>                                                                                    
                            </div>                        
                        </div>


                        <div class="row" id="mostrardatosempresa">                                               
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Lista de Empresas</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                                
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="box-body" id="agrega-registros"></div>
                                    </div>
                                </div>                                                                                    
                            </div>                        
                        </div>
                    </section>                
                </div>


                <?php include './footer.php'; ?>
            </div>

            <!-- ./wrapper -->

            <!-- jQuery 2.2.3 -->

            <script src="../../bootstrap/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="../../plugins/fastclick/fastclick.js"></script>
            <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
            <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <script src="../../plugins/fastclick/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="../../dist/js/app.min.js"></script>
            <!-- AdminLTE for demo purposes -->        

            <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
            </script>
        </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}