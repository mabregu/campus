<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Profesores</title>
    </head>
    <body>
        <br>
        <h1 class='page-header' style="margin-top: -5px ;">Listado de Profesores</h1>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Alta">Nuevo Profesor</button><br><br>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>#Legajo</th>  
                    <th>Nombre(s)</th>
                    <th>Apellido</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($Profesores as $profesores):
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $profesores->legajo ?></td>
                        <td><?php echo $profesores->nombre ?></td>
                        <td><?php echo $profesores->apellido ?></td>
                        <td><?php echo '<button type="button" onclick="ver(' . $profesores->id . ')" class="btn btn-link" data-toggle="modal" data-target="#Ver" id="ver' . $profesores->id . '" data-id="' . $profesores->id . '" data-name="' . $profesores->nombre . '" data-ape="' . $profesores->apellido . '" data-leg="' . $profesores->legajo . '"><span class="glyphicon glyphicon-search"></button>' ?></td>
                        <td><?php echo '<button type="button" onclick="modif(' . $profesores->id . ')" class="btn btn-link" data-toggle="modal" data-target="#Editar" id="editar' . $profesores->id . '" data-id="' . $profesores->id . '" data-name="' . $profesores->nombre . '" data-ape="' . $profesores->apellido . '" data-leg="' . $profesores->legajo . '"><span class="glyphicon glyphicon-pencil"></button>' ?></td>
                        <td><?php echo '<button type="button" onclick="elim(' . $profesores->id . ')" class="btn btn-link" data-toggle="modal" data-target="#Eliminar" id="eliminar' . $profesores->id . '" data-id="' . $profesores->id . '" data-name="' . $profesores->nombre . '" data-ape="' . $profesores->apellido . '" data-leg="' . $profesores->legajo . '"><span class="glyphicon glyphicon-trash"></button>' ?></td>
                    <?php $i++; ?>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>

<!-- Modal Modificar-->
<div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="EditarLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditarLabel">Modificar datos del Profesor</h4>
            </div>
            <div class="modal-body">
                <label>Nombre</label>
                <input id="nomb" name="name" class="form-control" style="width: 250px ;">
                <label>Apellido</label>
                <input id="apel" name="ape" class="form-control" style="width: 250px ;">
                <input type="hidden" id="id" name="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary " onclick="guardarCambios($('#Editar #id').val(), $('#Editar #apel').val(), $('#Editar #nomb').val());
                        return false;">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ver-->
<div class="modal fade" id="Ver" tabindex="-1" role="dialog" aria-labelledby="EditarLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditarLabel">Datos del Profesor</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline">
                    <label>Id</label>
                    <input id="id" name="id" class="form-control" style="width: 50px ;" readonly="readonly">
                    <label>Legajo</label>
                    <input id="leg" name="leg" class="form-control" style="width: 100px ;" readonly="readonly">
                </form><br>
                <label>Nombre</label>
                <input id="nomb" name="name" class="form-control" style="width: 250px ;" readonly="readonly">
                <label>Apellido</label>
                <input id="apel" name="ape" class="form-control" style="width: 250px ;" readonly="readonly">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Alta-->
<div class="modal fade" id="Alta" tabindex="-1" role="dialog" aria-labelledby="EditarLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditarLabel">Alta de Profesor</h4>
            </div>
            <div class="modal-body">
                <label>DNI</label>
                <input id="dni" name="dni" class="form-control" style="width: 150px ;" required>
                <label>Nombre</label>
                <input id="nomb" name="name" class="form-control" style="width: 250px ;" required>
                <label>Apellido</label>
                <input id="apel" name="ape" class="form-control" style="width: 250px ;" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary " onclick="nuevo($('#Alta #dni').val(), $('#Alta #apel').val(), $('#Alta #nomb').val(), $('#Alta #carr').val());
                        return false;">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar-->
<div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="EditarLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditarLabel">¿Está seguro de que desea eliminar el Profesor?</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline">
                    <label>Id</label>
                    <input id="id" name="id" class="form-control" style="width: 50px ;" readonly="readonly">
                    <label>Legajo</label>
                    <input id="leg" name="leg" class="form-control" style="width: 100px ;" readonly="readonly">
                </form><br>
                <label>Nombre</label>
                <input id="nomb" name="name" class="form-control" style="width: 250px ;" readonly="readonly">
                <label>Apellido</label>
                <input id="apel" name="ape" class="form-control" style="width: 250px ;" readonly="readonly">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary " onclick="eliminar($('#Eliminar #id').val());
                        return false;">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function modif(id) {
        var datos = {
            "id": $('#editar' + id).data('id'),
            "legajo": $('#editar' + id).data('leg'),
            "apellido": $('#editar' + id).data('ape'),
            "nombre": $('#editar' + id).data('name')
        };

        $("#Editar #id").val(datos["id"]);
        $("#Editar #nomb").val(datos["nombre"]);
        $("#Editar #apel").val(datos["apellido"]);
    }

    function ver(id) {
        var datos = {
            "id": $('#editar' + id).data('id'),
            "legajo": $('#editar' + id).data('leg'),
            "apellido": $('#editar' + id).data('ape'),
            "nombre": $('#editar' + id).data('name')
        };

        $("#Ver #id").val(datos["id"]);
        $("#Ver #leg").val(datos["legajo"]);
        $("#Ver #nomb").val(datos["nombre"]);
        $("#Ver #apel").val(datos["apellido"]);
    }

    function elim(id) {
        var datos = {
            "id": $('#eliminar' + id).data('id'),
            "legajo": $('#eliminar' + id).data('leg'),
            "apellido": $('#eliminar' + id).data('ape'),
            "nombre": $('#eliminar' + id).data('name')
        };

        $("#Eliminar #id").val(datos["id"]);
        $("#Eliminar #leg").val(datos["legajo"]);
        $("#Eliminar #nomb").val(datos["nombre"]);
        $("#Eliminar #apel").val(datos["apellido"]);
    }

    function guardarCambios(id, apellido, nombre) {
        var parametros = {
            "id": id,
            "ape": apellido,
            "nom": nombre
        };

        $.ajax({
            data: parametros,
            url: '<?php echo site_url('index.php/Profesores/guardarCambios/') ?>' + parametros['id'],
            method: 'POST',
            success: function (result) {
                window.location.replace("<?php echo site_url('index.php/Profesores/Lista') ?>");
            },
            error: function () {
                alert("Ocurrio un error!");
                window.location.replace("<?php echo site_url('index.php/Profesores/Lista') ?>");
            }
        });
    }

    function eliminar(id) {
        var id_alumno = id;

        $.ajax({
            data: id_alumno,
            url: '<?php echo site_url('index.php/Profesores/eliminar/') ?>' + id_alumno,
            method: 'POST',
            success: function (result) {
                window.location.replace("<?php echo site_url('index.php/Profesores/Lista') ?>");
            },
            error: function () {
                alert("Ocurrio un error!");
                window.location.replace("<?php echo site_url('index.php/Profesores/Lista') ?>");
            }
        });
    }

    function nuevo(dni, apellido, nombre) {

        var parametros = {
            "dni": dni,
            "ape": apellido,
            "nom": nombre
        };

        if (parametros['dni'] && parametros['ape'] && parametros['nom']) {
            $.ajax({
                data: parametros,
                url: '<?php echo site_url('index.php/Profesores/guardarCambios/') ?>',
                method: 'POST',
                success: function (result) {
                    window.location.replace("<?php echo site_url('index.php/Profesores/Lista') ?>");
                },
                error: function () {
                    alert("Ocurrio un error!");
                    window.location.replace("<?php echo site_url('index.php/Profesores/Lista') ?>");
                }
            });
        } else {
            alert('Faltan datos!');
        }

    }
</script>