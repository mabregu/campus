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
        <h1 class='page-header' style="margin-top: -5px ;">Listado de Alumnos</h1>
        <?php echo validation_errors(); ?>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Alta">Nuevo Alumno</button><br><br>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>#Legajo</th>  
                    <th>Nombre(s)</th>
                    <th>Apellido</th>
                    <th>Carrera</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($Alumnos as $alumno):
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $alumno->legajo ?></td>
                        <td><?php echo $alumno->nombre ?></td>
                        <td><?php echo $alumno->apellido ?></td>
                        <td><?php echo $alumno->carrera ?></td>
                        <td><?php echo '<button type="button" onclick="ver(' . $alumno->id . ')" class="btn btn-link" data-toggle="modal" data-target="#Ver" id="ver' . $alumno->id . '" data-id="' . $alumno->id . '" data-name="' . $alumno->nombre . '" data-ape="' . $alumno->apellido . '" data-leg="' . $alumno->legajo . '"><span class="glyphicon glyphicon-search"></button>' ?></td>
                        <td><?php echo '<button type="button" onclick="modif(' . $alumno->id . ')" class="btn btn-link" data-toggle="modal" data-target="#Editar" id="editar' . $alumno->id . '" data-id="' . $alumno->id . '" data-name="' . $alumno->nombre . '" data-ape="' . $alumno->apellido . '" data-leg="' . $alumno->legajo . '"><span class="glyphicon glyphicon-pencil"></button>' ?></td>
                        <td><?php echo '<button type="button" onclick="elim(' . $alumno->id . ')" class="btn btn-link" data-toggle="modal" data-target="#Eliminar" id="eliminar' . $alumno->id . '" data-id="' . $alumno->id . '" data-name="' . $alumno->nombre . '" data-ape="' . $alumno->apellido . '" data-leg="' . $alumno->legajo . '"><span class="glyphicon glyphicon-trash"></button>' ?></td>
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
                <h4 class="modal-title" id="EditarLabel">Modificar datos de Alumnos</h4>
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
                <h4 class="modal-title" id="EditarLabel">Datos de Alumnos</h4>
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
                <h4 class="modal-title" id="EditarLabel">Alta de Alumno</h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <label>DNI</label>
                <input id="dni" name="dni" class="form-control" style="width: 150px ;" required>
                <label>Nombre</label>
                <input id="nomb" name="name" class="form-control" style="width: 250px ;" required>
                <label>Apellido</label>
                <input id="apel" name="ape" class="form-control" style="width: 250px ;" required>
                <label>Seleccione su carrera</label>
                <select class="form-control" id="carr">
                    <option>Seleccionar...</option>
                    <option value="1">Técnico Superior en Análisis de Sistemas</option>
                    <option value="2">Técnico Superior en Gestión Parlamentaria</option>
                    <option value="3">Técnico Superior en Administración Publica</option>
                </select>
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
                <h4 class="modal-title" id="EditarLabel">¿Está seguro de que desea eliminar el Alumno?</h4>
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
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });

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
            url: '<?php echo site_url('index.php/Alumnos/guardarCambios/') ?>' + parametros['id'],
            method: 'POST',
            success: function (result) {
                window.location.replace("<?php echo site_url('index.php/Alumnos/Lista') ?>");
            },
            error: function () {
                alert("Ocurrio un error!");
                window.location.replace("<?php echo site_url('index.php/Alumnos/Lista') ?>");
            }
        });
    }

    function eliminar(id) {
        var id_alumno = id;

        $.ajax({
            data: id_alumno,
            url: '<?php echo site_url('index.php/Alumnos/eliminar/') ?>' + id_alumno,
            method: 'POST',
            success: function (result) {
                window.location.replace("<?php echo site_url('index.php/Alumnos/Lista') ?>");
            },
            error: function () {
                alert("Ocurrio un error!");
                window.location.replace("<?php echo site_url('index.php/Alumnos/Lista') ?>");
            }
        });
    }

    function nuevo(dni, apellido, nombre, carrera) {

        var parametros = {
            "dni": dni,
            "ape": apellido,
            "nom": nombre,
            "carr": carrera
        };

        $.ajax({
            data: parametros,
            url: '<?php echo site_url('index.php/Alumnos/guardarCambios/') ?>',
            method: 'POST',
            success: function (data) {
                if (data['status']) {
                    alert('true');
                } else {
                    alert(data);
                    alert(data['status']);
                    alert('false');
                }
                //window.location.replace("<?php echo site_url('index.php/Alumnos/Lista') ?>");
            },
            error: function () {
                alert("Ocurrio un error!");
                //window.location.replace("<?php echo site_url('index.php/Alumnos/Lista') ?>");
            }
        });

    }
</script>