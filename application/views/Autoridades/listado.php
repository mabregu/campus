<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Autoridades</title>
    </head>
    <body>
        <br>
        <h1 class='page-header' style="margin-top: -5px ;">Listado de Autoridades</h1>
        <br>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cargo</th>
                    <th>Nombre(s)</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // put your code here
                $i = 1;
                foreach ($Autoridades as $fila) {
                    echo '<tr><td>'.$i .'</td>'
                            . '<td>'.$fila['cargo'] .'</td>'
                            . '<td>'.$fila['nombre'] .'</td>'
                            . '<td>'. $fila['apellido'] . 
                            '</td></tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
