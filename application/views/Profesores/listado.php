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
					<div class="form-group">
						<label>Legajo</label>
						<div id="leg"></div>
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<div id="nomb"></div>
					</div>
					<div class="form-group">
						<label>Apellido</label>
						<div id="apel"></div>
					</div>
				</form>
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
                <form id="formulario" action="" method="post" onsubmit="return false">
                    <label>DNI</label>
                    <input id="dni" name="dni" class="form-control" style="width: 150px ;" required>
                    <label>Nombre</label>
                    <input id="nomb" name="name" class="form-control" style="width: 250px ;" required>
                    <label>Apellido</label>
                    <input id="apel" name="ape" class="form-control" style="width: 250px ;" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary " id='enviar'>Confirmar</button>
                    </div>
                </form>                
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
                <form class="form-inline" id="formulario_eliminar">
                    <div class="form-group">
                        <input id="id_prof" name="id" class="form-control" type="hidden">
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <div id="nomb"></div>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <div id="apel"></div>    
                    </div>
                    <div class="form-group">
                        <label>Legajo</label>
                        <div id="leg"></div>
                    </div>
                </form>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary " id='borrar'>Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ok-->
<div class="modal fade" id="ok-modal" tabindex="-1" role="dialog" aria-labelledby="okLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="okLabel">¡Ok!</h4>
            </div>
            <div class="modal-body">
                <p>¡Todos sus cambios fueron realizados con exito!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '<?php echo site_url('index.php/Profesores/Lista') ?>';">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Fallo-->
<div class="modal fade" id="fallo-modal" tabindex="-1" role="dialog" aria-labelledby="falloLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="falloLabel">Lo sentimos...</h4>
            </div>
            <div class="modal-body">
                <p>Lamentablemente ocurrio una falla, vuelva a intentarlo. Disculpe las molestias ocasionadas.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '<?php echo site_url('index.php/Profesores/Lista') ?>';">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ya existe-->
<div class="modal fade" id="existe-modal" tabindex="-1" role="dialog" aria-labelledby="existeLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="existeLabel">Ya existe.</h4>
            </div>
            <div class="modal-body">
                <p>La persona que intenta agregar, ya se encuentra en el sistema.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '<?php echo site_url('index.php/Profesores/Lista') ?>';">Cerrar</button>
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

        $("#Ver #id").html(datos["id"]);
        $("#Ver #leg").html(datos["legajo"]);
        $("#Ver #nomb").html(datos["nombre"]);
        $("#Ver #apel").html(datos["apellido"]);
    }

    function elim(id) {
        var datos = {
            "id": $('#eliminar' + id).data('id'),
            "legajo": $('#eliminar' + id).data('leg'),
            "apellido": $('#eliminar' + id).data('ape'),
            "nombre": $('#eliminar' + id).data('name')
        };
        
        $("#Eliminar #id_prof").val(datos["id"]);
        $("#Ver #id").html(datos["id"]);
        $("#Ver #leg").html(datos["legajo"]);
        $("#Ver #nomb").html(datos["nombre"]);
        $("#Ver #apel").html(datos["apellido"]);
    }

    function guardarCambios(id, apellido, nombre) {

        var parametros = {
            "id": id,
            "ape": apellido,
            "name": nombre
        };

        $.ajax({
            data: parametros,
            url: '<?php echo site_url('index.php/Profesores/guardarCambios/') ?>' + parametros['id'],
            method: 'POST',
            success: function (result) {
                $("#ok-modal").modal("show");
            },
            error: function () {
                $("#fallo-modal").modal("show");
            }
        });
    }
    
    $( '#borrar' ).click(function() {
        eliminar();
    });
    
    function eliminar() {

        $.ajax({
            data: $('#formulario_eliminar').serialize(),
            url: '<?php echo site_url('index.php/Profesores/eliminar/') ?>',
            method: 'POST',
            success: function (result) {
                $("#ok-modal").modal("show");
            },
            error: function () {
                $("#fallo-modal").modal("show");
            }
        });
    }
    
    $( '#enviar' ).click(function() {
        nuevo();
    });

    function nuevo() {
        var nuevo=true
        $.ajax({
            data: $('#formulario').serialize(),
            url: '<?php echo site_url('index.php/Profesores/guardarCambios/') ?>'+nuevo,
            method: 'POST',
            dataType: 'JSON',
            success: function (data) {
				if(data['status']){
					$('#ok-modal').modal('show');
				} else {
					if(data['existe']) {
						$('#existe-modal').modal('show');
					}
				}
            },
            error: function () {
                $("#fallo-modal").modal("show");
            }
        });

    }
    
    function validarFormulario() {
	   jQuery.validator.messages.required = 'Este campo es obligatorio.';
	   jQuery.validator.messages.number = 'Este campo debe ser num&eacute;rico.';
	   jQuery.validator.messages.email = 'La direcci&oacute;n de correo es incorrecta.';
	   $("#formulario").validate();
	 }
	 
	
	(function() {
	   validarFormulario();
	})();
    
</script>
<style type="text/css">
	.error {
		color: #a94442;
		background-color: #f2dede;
		border-color: #ebccd1;
		width:100%;
	}
</style>
