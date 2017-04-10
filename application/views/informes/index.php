<h1> Lista de informes </h1>
<p> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/Informes/guardar"> Crear nuevo informe </a> </p>
<?php if (count($informes)): ?>
    <table class="table tableborder">
        <thead>
            <tr>
                <th> Título </th>
                <th> Prioridad </th>
                <th> &nbsp; </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($informes as $item): ?>
                <tr>
                    <td style="width: 35%"> <?php echo $item->titulo ?> </td>
                    <td style="width: 35%"> <?php echo $item->prioridad ?> </td>
                    <td> 
                        <a class="btn btn-info" href="<?php echo base_url() ?>index.php/Informes/ver/<?php echo $item->id ?>"> Ver </a>
                        <a class="btn btn-info" href="<?php echo base_url() ?>index.php/Informes/guardar/<?php echo $item->id ?>"> Editar </a>
                        <a class="btn btn-danger eliminar_informe" href="<?php echo base_url() ?>index.php/Informes/eliminar/<?php echo $item->id ?>"> Eliminar </a> 
                    </td>
                </tr>
            <?php endforeach; ?>
<!--            <pre>
                <?php var_dump($informes)//foreach ($Alumnos as $alumno): ?>
            </pre>-->
        </tbody>
    </table>
<?php else: ?>
    <p> No hay informes </p>
<?php endif; ?>
<script type="text/javascript">
    $(".eliminar_informe").each(function() {
        var href = $(this).attr('href');
        $(this).attr('href', 'javascript:void(0)');
        $(this).click(function() {
            if (confirm("¿Seguro desea eliminar este informe?")) {
                location.href = href;
            }
        });
    });
</script>
