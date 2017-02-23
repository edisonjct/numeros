<?php
session_start();
if (isset($_SESSION['usuario'])) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Numeros AS</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script>
                function cargarfunciones() {
                    cargarmenu();
                    cargarciudad();
                    cargarcargos();
                    tipoclientes();
                    cargar_clientes();
                    cargartiposervicio();
                    cargarservicioscombo();
                }
            </script>
            <script src="../../dist/js/menu.js"></script>
            <script src="../../dist/js/configuraciones.js"></script>
            <script src="../../dist/js/clientes.js"></script>
            <script src="../../dist/js/producto.js"></script>
            <script src="../../plugins/sweetalert/sweetalert.min.js"></script>            
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../plugins/sweetalert/sweetalert.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
            <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
            <link rel="stylesheet" href="../../plugins/iCheck/all.css">
            <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
            <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
            <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
            <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
            <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
            <link rel="stylesheet" href="../../plugins/morris/morris.css">
            <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">                    
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
                        <p id="parrafo"></p>
                    </section>
                    <section class="content">
                        <div class="row">
                            <div class="col-md-4">                                             
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Buscar Clientes</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                                
                                        </div>
                                    </div>
                                    <form class="form-horizontal" id="formulario">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" required="required" id="txt-bs-cliente" onkeyup="buscar_clientes()" placeholder="Nombre de Cliente">                                                
                                                </div>                                            
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div id="mostrar-clientes" class="table-responsive"></div>
                                                </div>                                            
                                            </div>
                                        </div>                                    
                                    </form>
                                </div>                                                                                    
                            </div>

                            <div class="col-md-8">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1" data-toggle="tab">Datos Personales</a></li>
                                        <li><a href="#tab_2" data-toggle="tab">Servicios</a></li>
                                        <li><a href="#tab_3" data-toggle="tab">Documentos</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">                                            
                                            <form class="form-horizontal">
                                                <div class="box-body" id="datos-personales">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label" ><code>*</code>Cedula</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="hidden" id="txt-id">
                                                            <input type="text" class="form-control" required="required" id="txt-cedulacliente" placeholder="Cedula Cliente">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label"><code>*</code>Nombres</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required="required" id="txt-nombrecliente" placeholder="Nombre de Cliente">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">Tipo Cliente</label>
                                                        <div class="col-sm-10">
                                                            <select id="tipo-cliente" class="form-control" required="required"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label"><code>*</code>Direccion</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required="required" id="txt-direccioncliente" placeholder="Direccion Cliente">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">Ciudad</label>
                                                        <div class="col-sm-10">
                                                            <select id="carga-combo-ciudad" class="form-control" required="required"></select>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label"><code>*</code>Telefono</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" required="required" id="txt-telefonocliente" placeholder="Telefono Cliente">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label"><code>*</code>Correo</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" required="required" id="txt-correocliente" placeholder="E-mail Cliente">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">Cargo</label>
                                                        <div class="col-sm-10">
                                                            <select id="carga-combo-cargo" class="form-control" required="required"></select>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">Actividad Economica</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required="required" id="txt-actividad" placeholder="Actividad Economica">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="div-mensaje"></div>
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-default" onclick="nuevo_clientes();">Nuevo</button>
                                                    <button type="button" class="btn btn-info pull-right" id="btn-guardar-cliente" onclick="guardardatospersonales();">Guardar</button>
                                                    <button type="button" class="btn btn-google pull-right" id="btn-modificar-cliente" onclick="">Modificar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_2">
                                            <form class="form-horizontal" id="formulario">
                                                <div class="box-body">
                                                    <div class="form-group">                                                       
                                                        <div class="col-sm-5">
                                                            <select id="tipo-servicio-cliente" class="form-control" required="required"></select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select id="servicio" class="form-control" required="required"></select>
                                                        </div>          
                                                        <div class="col-sm-1">
                                                            <button type="button" class="btn btn-info pull-right" onclick="agregarserviciocliente();">+</button>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                                <div class="box-footer">                                                    
                                                    <div id="mostrar-servicios-cliente" class="table table-responsive"></div>
                                                </div>
                                                <div id="div-mensaje"></div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_3">
                                            <form class="form-horizontal" id="documentos-cliente" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-5">
                                                            <input type="text" class="hidden" id="txt-id">
                                                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Descripcion del Archivo">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="file" class="form-control" id="foto" name="foto" > 
                                                        </div>          
                                                        <div class="col-sm-1">
                                                            <button type="button" class="btn btn-info pull-right" id="btn-subir-archivo" onclick="uploadAjax();">+</button>
                                                        </div>
                                                    </div>                          
                                                    <div id="mostrar-documentos"></div>
                                                </div>
                                            </form>
                                            <!-- MODAL PARA VISUALIZAR LOS DOCUMENTOS SUBIDOS -->
                                            <div>
                                                <div id="myModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Modal Header</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="dynamic-content"></div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </section>
                </div>
                <?php include './footer.php'; ?>
            </div>
            <script src="../../bootstrap/js/bootstrap.min.js"></script>
            <script src="../../plugins/fastclick/fastclick.js"></script>
            <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
            <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <script src="../../plugins/fastclick/fastclick.js"></script>
            <script src="../../dist/js/app.min.js"></script>
        </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}