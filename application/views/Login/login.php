<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>publico/img/bug.png"/>
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>publico/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>publico/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>publico/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>publico/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div class='alert alert-danger' id='msj' style='display: none;'>
            <strong>Usuario o Password Invalidos!</strong> Si no recuerda sus 
            credenciales, póngase en contacto con el administrador del sistema.
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Debe identificarse</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" id="formulario" role="form"> <!--action="<?php base_url(); ?>Login/Usuarios"-->
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="user_name" type="email" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Recuérdame
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" onclick="save(event)" class="btn btn-lg btn-success btn-block">Entrar</button>
                                    <!--a href="http://mabregu.xyz/" class="btn btn-lg btn-primary btn-block">Volver</a-->
                                </fieldset>
                            </form><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>publico/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>publico/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>publico/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>publico/dist/js/sb-admin-2.js"></script>
        <div id="response-container"></div>
    </body>

</html>

<script>
function showContent() {
    element = document.getElementById("msj");
    element.style.display = 'block';
}
function save(event) {
    event.preventDefault();
    var url;
    url = "<?php echo site_url('index.php/Login/Usuarios') ?>";
    $.ajax({
        url: url,
        type: "POST",
        data: $('#formulario').serialize(),
        dataType: "JSON",
        success: function (data) {
            window.location.replace("<?php echo site_url('Inicio') ?>");
        },
        error: function () {
            showContent();
        }
    });
}
</script>