<h1> Guardar informe </h1>
<form method="post" action="<?php echo base_url() ?>index.php/Informes/guardar_post/<?php echo $id ?>">
    <div class="row">
        <label> Título </label>
        <input type="text" name="titulo" value="<?php echo $titulo ?>" /><br>
        <?php echo '<div class="alert alert-danger col-md-4">'.form_error('titulo').'</div>'; ?>
    </div>
    <div class="row">
        <label> Descripción </label>
        <textarea name="descripcion" cols="100" rows="10" style="width: 100%;"><?php echo $descripcion; ?></textarea><br>
        <?php echo '<div class="alert alert-danger col-md-4">'.form_error('prioridad').'</div>'; ?>
    </div>
    <div class="row">
        <label> Prioridad </label>
        <input type="number" min="1" max="5" name="prioridad" value="<?php echo $prioridad; ?>" /><br>
        <?php echo '<div class="alert alert-danger col-md-4">'.form_error('prioridad').'</div>'; ?>
    </div>
    <div class="row">
        <input type="submit" class="btn btn-success" value="Guardar" />
        <a class="btn btn-danger" href="<?php echo base_url() ?>Informes"> Cancelar </a>
    </div>
</form>