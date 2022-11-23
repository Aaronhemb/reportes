

<div class="respuestas">
  <div class="container">
    <a href="#demo" class="btn btn-info" data-toggle="collapse">Responder</a>
    <div id="demo" class="collapse">
      <form id="manage_ticket" class="needs-validation"   action="./comentarios/proceso_guardar.php" enctype="multipart/form-data" method="post">
      <input type="text" name="user_id" value="<?php echo $row['nombreR']; ?>">
      <input type="text" name="user_type" value="<?php echo $row['departamento']; ?>">
      <input type="text" name="ticket_id" value="<?php echo $row['id_ticket']; ?>">
      <input type="text" name="id_perfil" value="<?php echo $row['perfil']; ?>">
      <label class="control-label">Responder ticket:</label>
      <textarea name="comentario" id="hint2basic" cols="30" rows="10" class="form-control summernote"><?php echo isset($comentario) ? $comentario : '' ?></textarea>
      <?php
      date_default_timezone_set('America/Mexico_City');
      $fechaActual = date('d/m/y H:i:s'); ?>
      <input type="text" readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_crea" value="<?php echo $fechaActual ?>" >



      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <button class="btn btn-primary" id="save" class="btn btn-primary" onclick="save()" type="submit">Responder Ticket</button>

      </form>
    </div>
  </div>
</div>
