<?php Include("head_newticket.php"); ?>

<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_ticket.php" class="btn btn-success pull-right" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas tickets</a>
    </div><br><br><br>
    <div class="Reportes">
         <a href="ticket.php" class="btn btn-info pull-right" style="
         margin-left: 8px;
             padding-left: 272px;
             padding-right: 255px;

         "><span class="glyphicon glyphicon-export"></span>Ver mis tickets</a>
      </div>
    </h3>
</center>
<?php
} else{
?>
<form id="manage_ticket" class="needs-validation"   action="./proceso_ticket/proceso_guardar.php" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="col-md-2 mb-2">
      <label id="form_ticket" style="display:inline-flex!important" for="validationCustom01">
        <i class="bi bi-file-person-fill" style="width: 30px;font-size: 24px;"></i>
        <input type="text" readonly="readonly"  class="form-control" id="validationCustom01" placeholder="Nombre de quien reporta" name="nombreR" value="<?php echo ucwords($_SESSION['usr_name'])?>" required>
      </label>
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_ticket" style="display:inline-flex!important"for="validationCustom02">
        <i class="bi bi-person-lines-fill" style="width: 30px;font-size: 24px;"></i>
        <input type="text" readonly="readonly" class="form-control" id="validationCustom02" placeholder="Last name" name="departamento" value="<?php echo ucwords($_SESSION['usr_departamento'])?>" required>
      </label>
    </div>
    <div class="col-md-2 mb-2">
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <label id="form_ticket" style="display:inline-flex!important"for="validationCustom02">
          <i class="bi bi-person-rolodex" style="width: 30px;font-size: 24px;"></i>
          <input type="text" readonly="readonly"  class="form-control" id="validationCustomUsername" placeholder="tipo de usuario" name="type_user" value="
          <?php
            if($_SESSION['usr_roll'] == 1){
            echo "usuario";
          }elseif ($_SESSION['usr_roll'] == 2) {

            echo "Administrador";
          }
          ?>" aria-describedby="inputGroupPrepend" required>
        </label>
      </div>
    </div>
    <div class="col-md-2 mb-2">
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <label id="form_ticket" style="display:inline-flex!important" for="validationCustom02">
          <i class="bi bi-calendar-date" style="width: 30px;font-size: 24px;"></i>
          <?php
            date_default_timezone_set('America/Mexico_City');
            $newDate = date("y-m-d h:i:s:a", strtotime("fecha_crea")); ?>
          <?php $fechaActual = date('d/m/y H:i:s'); ?>
          <input type="text" readonly="readonly"  class="form-control" id="validationCustomUsername" placeholder="tipo de usuario" name="fecha_crea" value="<?php echo $fechaActual ?>" aria-describedby="inputGroupPrepend" required>
        </label>
      </div>
    </div>
    <div class="col-md-2 mb-2">
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <label id="form_ticket" style="display:inline-flex!important" for="validationCustom02">
          <i class="bi bi-person-bounding-box" style="width: 30px;font-size: 24px;"></i>
          <input type="text" readonly="readonly"  class="form-control" id="validationCustomUsername" placeholder="Perfil de usuario" name="perfil" value="<?php echo ucwords($_SESSION['usr_perfil'])  ?>" aria-describedby="inputGroupPrepend" required>
        </label>
      </div>
    </div>


  </div> <!--Cierre-->
  <div class="form-row">
    <div class="col-md-8 mb- 3">
      <label  id="form_ticket" style="display:inline-flex!important" for="validationCustom03">Titulo</label>
        <input type="text" class="form-control" id="validationCustom03" placeholder="ej. No puedo acceder a la plataforma xxxx"  name="titulo" required>
      <div class="invalid-feedback">
        Por favor agrege el titulo a su reporte.
      </div>
    </div>

<div class="form-row">
  <div class="col-md-12 mb- 3">
    <label  id="form_ticket" style="display:inline-flex!important" for="validationCustom03">Tema</label>

    <select type="text" class="form-control" id="validationCustom03" placeholder="tema de ayuda" name="tema" required>

      <option value="">Todos</option>
      <?php
        $con = new mysqli('localhost','root','','db_modular');
        $query ="SELECT * FROM ayuda ";
        $sql = $con->query($query);
        $con->close();
       ?>
        <?php While($rowSql = $sql->fetch_assoc()) {   ?>
      <option value="<?php echo $rowSql["tema_problema"]; ?>"> <?php echo $rowSql["tema_problema"]; ?></option>
      <?php } ?>

    </select>
    <div class="invalid-feedback">
      Por favor agrege un tema de ayuda.
    </div>
  </div>
</div>
</div>

<br>

<label class="control-label">Description</label>
<textarea name="descripcion" id="" cols="30" rows="10" class="form-control summernote"><?php echo isset($description) ? $description : '' ?></textarea>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <button class="btn btn-primary" id="save" class="btn btn-primary" onclick="save()" type="submit">Crear ticket</button>
</form>


  <?php } ?>

<!-- Ejemplo de un form en php------->


</body>



 <script>
   $(document).ready(function() {
       $('.summernote').summernote(
                    //  $('.summernote').eq(0).html('{{$texto[0]->hechos}}'),
                    //  $('.summernote').eq(1).html('{{$texto[0]->pruebas}}'),
                  //    $('.summernote').eq(2).html('{{$texto[0]->anexos}}'),
                      {
                        //  disableDragAndDrop: true,
                          height: 300,                 // set editor height
                          minHeight: null,             // set minimum height of editor
                          maxHeight: null,             // set maximum height of editor
                          lang: 'es-CO',
                          toolbar: [
                              // [groupName, [list of button]]
                              ['style', ['bold', 'italic', 'underline', 'clear']],
                              ['font', ['strikethrough', 'superscript', 'subscript']],
                              ['fontsize', ['fontsize']],
                              ['color', ['color']],
                              ['para', ['ul', 'ol', 'paragraph']],
                              ['picture', ['picture']],
                              ['undo' , ['undo']],
                              ['redo' , ['redo']]
                          ],
                      }
                  );

              });


 </script>
