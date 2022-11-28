

<div class="respuestas">
  <div class="container">
    <a href="#demo" class="btn btn-info" data-toggle="collapse" style="
      margin-left: 20px!important;">Responder</a>
      <a href="#demo1" class="btn btn-info" data-toggle="collapse" style="
        margin-left: 20px!important;">Cambiar status</a>
    <div id="demo" class="collapse">
      <form id="manage_ticket" class="needs-validation"   action="./comentarios/proceso_guardar.php" enctype="multipart/form-data" method="post">
      <input type="text" hidden name="user_id" value="<?php echo $_SESSION['usr_name'] ?>">
      <input type="text" hidden name="user_type" value="<?php echo 	$_SESSION['usr_departamento'] ?>">
      <input type="text" hidden name="ticket_id" value="<?php echo $row['id_ticket']; ?>">
      <input type="text" hidden name="id_perfil" value="<?php echo $_SESSION['usr_perfil'] ?>">
      <label class="control-label">Responder ticket:</label>
      <textarea name="comentario"   cols="30" rows="10" class="summernote" placeholder="comentario real"><?php echo isset($comentario) ? $comentario : '' ?></textarea>
      <?php
      date_default_timezone_set('America/Mexico_City');
      $fechaActual = date('d/m/y H:i:s'); ?>
      <input type="text" hidden readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_crea" value="<?php echo $fechaActual ?>" >
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <button class="btn btn-primary" id="save" class="btn btn-primary" onclick="save()" type="submit">Responder Ticket</button>
      </form>
    </div>

    <?php include("modificar_estatus.php"); ?>

  </div>
</div>
