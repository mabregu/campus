<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $msj = "<h1 class='page-header'>Calendario Académico 2017</h1>";
        $cursosVerano = "<button type='button' class='btn btn-link' data-toggle='collapse' data-target='#demo'>Inscripción Cursos de Verano 2017</button>
                  <div id='demo' class='collapse'>
                    <ul>
                        <li>Inscripción -SOLO POR INTERNET-: 24 y 25 de noviembre de 2016.</li>
                        <li>Publicación de listas y reclamos: 13 de diciembre de 2016.</li>
                        <li>Clase Introductoria Obligatoria: 15 de diciembre de 2016.</li>
                        <li>Ciclo de clases: 6 de febrero al 10 de marzo de 2017.</li>
                    </ul>
                  </div>";
        $cursosRegulares = "<button type='button' class='btn btn-link' data-toggle='collapse' data-target='#demo1'>Cursos regulares e inscripciones</button>
                  <div id='demo1' class='collapse'>
                        <h4>Primer Per&iacute;odo Lectivo 2017</h4>
                <p>- <strong>Entrega de documentaci&oacute;n de Ingresantes del CBC:</strong></p>
                <ul>
                  <li>19 al 21 de diciembre de 2016</li>
                </ul>
                <blockquote>
                  <p>La entrega de documentaci&oacute;n prevista para los  ingresantes provenientes del Ciclo B&aacute;sico Com&uacute;n en el mes de diciembre implica  exclusivamente su inscripci&oacute;n a la   Carrera, mientras que la inscripci&oacute;n de asignaturas se  realizar&aacute; por INTERNET en las fechas previstas por este Calendario.</p>
                </blockquote>
<p><strong>- 1ra. inscripci&oacute;n: </strong> (SOLO POR INTERNET - incluye los cursos de Pr&aacute;ctica de la Carrera de Procuraci&oacute;n y Pr&aacute;ctica Profesional)</p>
                <ul>
                  <li>del 2 al 5 de febrero de 2017</li>
                </ul>
                <p>-<strong> 1ra. Inscripci&oacute;n – ingresantes CBC: </strong></p>
                <ul>
                    <li> 2 y 3 de febrero de 2017</li>
                </ul>
                <p>-<strong> Publicaci&oacute;n de listas de 1era. inscripci&oacute;n; 2da. inscripci&oacute;n y reclamos de 1era.:</strong> (SOLO POR INTERNET)</p>
                <ul>
                    <li> 16 y 17 de febrero de 2017<br />
                    </li>
                </ul>
                <p>- <strong>Publicaci&oacute;n de listas 1ra. y 2da. Inscripci&oacute;n, reclamos de 2da. Inscripci&oacute;n y 3ra. Inscripci&oacute;n: </strong>(SOLO POR INTERNET)</p>
                <ul>
                  <li>2 de marzo de 2017</li>
                </ul>
                <p>-<strong> Inicio Curso Pr&aacute;ctica Profesional: </strong></p>
                <ul>
                    <li>20 de febrero de 2017</li>
                </ul>
                <p>- <strong>Publicaci&oacute;n listas de 1era., 2da. y 3ra. Inscripci&oacute;n; y reclamos de 3era.:  </strong>(SOLO POR INTERNET)</p>
                <ul>
                  <li>11  de marzo de 2017</li>
                </ul>
                <p>- <strong>Ciclo de Clases: </strong></p>
                <ul>
                    <li> Asignaturas Cuatrimestrales: del 13 de marzo al 1 de julio de 2017</li>
                    <li> Asignaturas Correspondientes al Primer Bimestre: del 13 de marzo al 6 de mayo de 2017</li>
                    <li> Asignaturas Correspondientes al Segundo Bimestre: del 8 de mayo al 1 de julio de 2017</li>
                    <li> Asignaturas Trimestrales: del 13 de marzo al 3 de junio de 2017</li>
                    <li>Asignaturas Mensual: del 5 de junio al 1 de julio de 2017</li>
                </ul>
                <p>- <strong>Plazo para entrega definitiva de calificaciones</strong>: </p>
                <ul>
                    <li>hasta el 1 de julio de 2017<br />
                    </li>
                </ul>
                  </div>";
        $cursosInvierno = "<button type='button' class='btn btn-link' data-toggle='collapse' data-target='#demo2'>Inscripción Cursos de Invierno 2017</button>
                  <div id='demo2' class='collapse'>
                    <ul>
                        <li>Inscripción -SOLO POR INTERNET-: 24 y 25 de noviembre de 2016.</li>
                        <li>Publicación de listas y reclamos: 13 de diciembre de 2016.</li>
                        <li>Clase Introductoria Obligatoria: 15 de diciembre de 2016.</li>
                        <li>Ciclo de clases: 6 de febrero al 10 de marzo de 2017.</li>
                    </ul>
                  </div>";
        $renunciaCursos = "<button type='button' class='btn btn-link' data-toggle='collapse' data-target='#demo3'>Renuncias a los cursos regulares</button>
                  <div id='demo3' class='collapse'>
                    <ul>
                  <li><strong>Cursos de Verano:</strong> del 2 al 12 de febrero de 2017</li>
                  <li><strong>Materias regulares a marzo 2017:</strong> del 2 al 5 de febrero de 2017</li>
                  <li><strong>Materias anuales que dieron comienzo en agosto de 2016:</strong> 17 y 18 de febrero de 2017<br>
                  </li>
                  <li><strong>Materias anuales que den comienzo en marzo de 2017:</strong> del 13 de marzo al 23 de abril de 2017<br>
                  </li>
                  <li><strong>Materias cuatrimestrales (marzo/junio):</strong> del 13 de marzo al 23 de abril de 2017</li>
                  <li><strong>Materias bimestrales (marzo/abril): </strong>del 13  al 2 de abril de 2017</li>
                  <li><strong>Materias bimestrales (mayo/junio): </strong>del 13 de marzo al 28 de mayo de 2017</li>
                  <li><strong>Materias trimestrales (marzo/mayo):</strong> del 13 de marzo al 9 de abril de 2017</li>
                  <li><strong>Materia mensual (junio):</strong> del 13 de marzo al 11 de junio de 2017</li>
                  <li><strong>Cursos de Invierno 2017:</strong> del 10 al 16 de julio de 2017</li>
                  <li><strong>Materias regulares a agosto 2017:</strong> del 1 al 4 de julio de 2017</li>
                  <li><strong>Materias anuales que den comienzo en marzo de 2017:</strong> 24 y 25 de julio de 2017</li>
                  <li><strong>Materias anuales que den comienzo en agosto de 2017: </strong>14 de agosto al 24 de septiembre de 2017</li>
                  <li><strong>Materias cuatrimestrales (agosto/noviembre): </strong>del 14 de agosto al 24 de septiembre de 2017</li>
                  <li><strong>Materias bimestrales (agosto/septiembre):</strong> del 14  de agosto al 10 de septiembre de 2017</li>
                  <li><strong>Materias bimestrales (octubre/noviembre):</strong> del 14 de agosto al 22 de octubre de 2017</li>
                  <li><strong>Materias trimestrales (agosto/octubre): </strong>del 14 de agosto al 17 de septiembre de 2017</li>
                  <li><strong>Materia mensual (noviembre): </strong>del 14 de agosto al 12 de noviembre de 2017</li>
                </ul>
                  </div>";
        $readmision = "<button type='button' class='btn btn-link' data-toggle='collapse' data-target='#demo4'>Inscripción Cursos de Invierno 2017</button>
                  <div id='demo4' class='collapse'>
                    <h3>Primer cuatrimestre 2017</h3>
                    <ul>
                      <li><strong>Inscripci&oacute;n:</strong> 17 y 18 de abril de 2017</li>
                      <li> <strong>Publicaci&oacute;n de listas:</strong> 2 de mayo de 2017</li>
                      <li> <strong>Curso de apoyo:</strong> del 3 al 26 de mayo de 2017</li>
                      <li> <strong>Examen:</strong> 14 junio de 2017</li>
                      <li> <strong>Publicaci&oacute;n de resultados:</strong> 26 de junio de 2017</li>
                      </ul>
                    <h3>Segundo cuatrimestre 2017</h3>
                    <ul>
                      <li><strong>Inscripci&oacute;n:</strong> 18 y 19 de septiembre de 2017</li>
                      <li> <strong>Publicaci&oacute;n de listas:</strong> 3 de octubre de 2017</li>
                      <li> <strong>Curso de apoyo:</strong> 4 al 25 de octubre de 2017</li>
                      <li> <strong>Examen:</strong> 15 de noviembre de 2017</li>
                      <li> <strong>Publicaci&oacute;n de resultados:</strong> 4 de diciembre de 2017</li>
                    </ul>
                  </div>";
        $instituto = "<ul><li>" . $cursosVerano . "</li><li>" . $cursosRegulares . "</li><li>" . $cursosInvierno . "</li>
        <li>" . $renunciaCursos . "</li><li>" . $readmision . "</li></ul>";
        ?>
        <style>
            #map {
                height: 100%;
            }
        </style>
        <div class="row">
            <div class="col-lg-12">
                <?php echo $msj; ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Información General
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php
                        echo $instituto;
                        //include_once "result/mapa.html"; 
                        ?>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </body>
</html>
