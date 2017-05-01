<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->    
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
                <h4 class="modal-title" id="EditarLabel">Alta de Alumno</h4>
            </div>
            <div class="modal-body">
			<form id="formulario" action="" method="post" onsubmit="return false">
                <label>DNI</label>
                <input id="dni" name="dni" class="form-control" style="width: 150px ;" required>
                <label>Nombre</label>
                <input id="nomb" name="name" class="form-control" style="width: 250px ;" required>
                <label>Apellido</label>
                <input id="apel" name="ape" class="form-control" style="width: 250px ;" required>
                <label>Seleccione su carrera</label>
                <select class="form-control" name="carr">
                    <option>Seleccionar...</option>
                    <option value="1">Técnico Superior en Análisis de Sistemas</option>
                    <option value="2">Técnico Superior en Gestión Parlamentaria</option>
                    <option value="3">Técnico Superior en Administración Publica</option>
                </select>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id='enviar' class="btn btn-primary ">Confirmar</button>
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
                <h4 class="modal-title" id="EditarLabel">¿Está seguro de que desea eliminar el Alumno?</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline" id="formulario_eliminar">
                    <div class="form-group">
                        <!--label>Id</label>
                        <div id="id"></div-->
                        <input id="id_alum" name="id" class="form-control" type="hidden">
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
                <button type="submit" class="btn btn-primary" id="borrar">Confirmar</button>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '<?php echo site_url('index.php/Alumnos/Lista') ?>';">Ok</button>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '<?php echo site_url('index.php/Alumnos/Lista') ?>';">Cerrar</button>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '<?php echo site_url('index.php/Alumnos/Lista') ?>';">Cerrar</button>
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

        //$("#Eliminar #id").html(datos["id"]);
        $("#Eliminar #id_alum").val(datos["id"]);
        $("#Eliminar #leg").html(datos["legajo"]);
        $("#Eliminar #nomb").html(datos["nombre"]);
        $("#Eliminar #apel").html(datos["apellido"]);
    }

    function guardarCambios(id, apellido, nombre) {
        var parametros = {
            "id": id,
            "ape": apellido,
            "name": nombre
        };

        $.ajax({
            data: parametros,
            url: '<?php echo site_url('index.php/Alumnos/guardarCambios/') ?>' + parametros['id'],
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
            url: '<?php echo site_url('index.php/Alumnos/eliminar/') ?>',
            method: 'POST',
            //dataType: 'JSON',
            success: function (result) {
                $("#ok-modal").modal("show");
            },
            error: function (request, status, error) {
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
            url: '<?php echo site_url('index.php/Alumnos/guardarCambios/') ?>'+nuevo,
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
