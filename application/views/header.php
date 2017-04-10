<?php
include_once "Login/chkUsuario.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Campus V1.0">
        <meta name="author" content="mabregu">

        <title>Campus-Admin-ISMI</title>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>publico/img/bug.png"/>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>publico/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>publico/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url(); ?>publico/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url(); ?>publico/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/Instituto">Campus V0.1</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <a href="#">
                                    <div>
                                        <strong><?php echo $_SESSION['name']; ?></strong>
                                        <span class="pull-right text-muted">
                                            <em>Hoy</em>
                                        </span>
                                    </div>
                                    <div>Necesitamos su ayuda urgente!</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong><?php echo $_SESSION['name']; ?></strong>
                                        <span class="pull-right text-muted">
                                            <em>Ayer</em>
                                        </span>
                                    </div>
                                    <div>Fechas de Finales...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong><?php echo $_SESSION['name']; ?></strong>
                                        <span class="pull-right text-muted">
                                            <em>Hace una semana.</em>
                                        </span>
                                    </div>
                                    <div>Desinfección del instituto...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Read All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> Nuevo Comentario
                                        <span class="pull-right text-muted small">4 minutos</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 Nuevos seguidores
                                        <span class="pull-right text-muted small">12 minutos</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Mensaje enviado
                                        <span class="pull-right text-muted small">4 minutos</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> Nueva tarea
                                        <span class="pull-right text-muted small">4 minutos</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Reiniciar servidor
                                        <span class="pull-right text-muted small">4 minutos</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Ver todas las Alertas</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['name']; ?> </a>
                                <!-- el input oculto es para el chat -->
                                <input type="hidden" id="nombreUsuario" value="<?php echo $_SESSION['name']; ?>" >
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Login/CerrarSesion"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Instituto"><!--i class="fa fa-dashboard fa-fw"></i--> Inicio </a>
                            </li>
                            <li>
                                <a href="#"><!--i class="fa fa-bar-chart-o fa-fw"></i--> Instituto <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Instituto/Charlas">Charlas informátivas</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Instituto/Convenios">Convenios</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Instituto/Calendario">Calendario Academico 2017</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#">Personal<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Autoridades/Lista">Autoridades</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Profesores/Lista">Profesores</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Alumnos/Lista">Alumnos</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Carreras<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Carrera/ListarMaterias/1">Análisis de Sistemas</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Carrera/ListarMaterias/2">Gestión Parlamentaria</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/Carrera/ListarMaterias/3">Administración Publica</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Chat/index">Chat</a>
                            </li>
                        </ul>
                    </div>
            </nav>

            <div id="page-wrapper">
                <!-- Contenido -->