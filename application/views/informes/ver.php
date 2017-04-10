<h1> <?php echo $informe->titulo ?> (Nivel : <?php echo $informe->prioridad; ?>) </h1>
<div> <?php echo nl2br($informe->descripcion) ?> </div>
<br />
<div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/Informes"> Volver atrás </a> </div>