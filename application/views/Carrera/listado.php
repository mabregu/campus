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
        <br>
        <h1 class='page-header' style="margin-top: -5px ;">Carrera <?php echo $Carrera[0]['descripcion']; ?></h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info">
                    <strong>Plan de Materias.</strong>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Primer año.
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Materias</th>
                                                <th>Cuatrimestre</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($Carrera as $fila) {
                                                if ($fila['año'] == 1) {
                                                    echo '<tr><td>' . $i . '</td>'
                                                    . '<td>' . $fila['materia'] . '</td>'
                                                    . '<td>' . $fila['cuatrimestre'] . '</td>';
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Segundo año.
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Materias</th>
                                                <th>Cuatrimestre</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $l = 1;
                                            foreach ($Carrera as $fila) {
                                                if ($fila['año'] == 2) {
                                                    echo '<tr><td>' . $l . '</td>'
                                                    . '<td>' . $fila['materia'] . '</td>'
                                                    . '<td>' . $fila['cuatrimestre'] . '</td>';
                                                    $l++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Tercer año.
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Materias</th>
                                                <th>Cuatrimestre</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $b = 1;
                                            foreach ($Carrera as $fila) {
                                                if ($fila['año'] == 3) {
                                                    echo '<tr><td>' . $b . '</td>'
                                                    . '<td>' . $fila['materia'] . '</td>'
                                                    . '<td>' . $fila['cuatrimestre'] . '</td>';
                                                    $b++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingImg">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseImg" aria-expanded="false" aria-controls="collapseThree">
                                    Correlativas.
                                </a>
                            </h4>
                        </div>
                        <div id="collapseImg" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <a href="<?php echo base_url(); ?>publico/pdf/<?php echo $Carrera[4]['abreviatura']; ?>_correlatividades.pdf">PDF</a>                                
                                <img style="width: 1000px;" src="<?php echo base_url(); ?>publico/img/<?php echo $Carrera[4]['abreviatura']; ?>_correlatividades.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
