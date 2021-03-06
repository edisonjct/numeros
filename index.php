<?php
if (isset($_GET["error"]) && $_GET["error"] != "login") {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Numeros AS | Login</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" type="image/png" href="dist/img/numeros.fw.png" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a><img src="dist/img/numeros.fw.png" width="270px" height="80px"></a>                
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Inicie sesión</p>
                <?php
                if (isset($_GET["error"])) {
                    echo "<p class='error'>Usuario y / o Contrasea erroneos. Intentelo de nuevo.</p>";
                }
                ?>
                <form action="pages/controlador/LoginControlador.php" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" required="required" name="usuario" id="usuario" placeholder="Usuario">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" required="required" name="password" id="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">        
                        <div class="col-xs-4">
                            <button type="submit" name="enviar" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#usuario").focus();
            });
        </script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/iCheck/icheck.min.js"></script>
    </body>
</html>
