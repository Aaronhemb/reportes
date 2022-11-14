<?php Include("head_newticket.php"); ?>


<form class="needs-validation" novalidate action="./proceso_ticket/proceso_guardar.php" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="col-md-3 mb-2">
      <label id="form_ticket" style="display:inline-flex!important" for="validationCustom01">
        <i class="bi bi-file-person-fill" style="width: 30px;font-size: 24px;"></i>
        <input type="text" disabled class="form-control" id="validationCustom01" placeholder="Nombre de quien reporta" name="nombreR" value="<?php echo ucwords($_SESSION['usr_name'])?>" required>
      </label>
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_ticket" style="display:inline-flex!important"for="validationCustom02">
        <i class="bi bi-person-lines-fill" style="width: 30px;font-size: 24px;"></i>
        <input type="text" disabled class="form-control" id="validationCustom02" placeholder="Last name" name="departamento" value="<?php echo ucwords($_SESSION['usr_departamento'])?>" required>
      </label>
    </div>
    <div class="col-md-3 mb-2">
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <label id="form_ticket" style="display:inline-flex!important"for="validationCustom02">
          <i class="bi bi-person-rolodex" style="width: 30px;font-size: 24px;"></i>
          <input type="text"  disabled class="form-control" id="validationCustomUsername" placeholder="tipo de usuario" name="type_user" value="
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
    <div class="col-md-3 mb-2">
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <label id="form_ticket" style="display:inline-flex!important" for="validationCustom02">
          <i class="bi bi-calendar-date" style="width: 30px;font-size: 24px;"></i>
          <?php $fechaActual = date('d/m/y H:i:s'); ?>
          <input type="text"  disabled class="form-control" id="validationCustomUsername" placeholder="tipo de usuario" name="type_user" value="<?php echo $fechaActual ?>" aria-describedby="inputGroupPrepend" required>
        </label>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-8 mb- 3">
      <label  id="form_ticket" style="display:inline-flex!important" for="validationCustom03">Titulo</label>
      <select type="text" class="form-control" id="validationCustom03" placeholder="Titulo" required>
        <?php  ?>
        <option value=""></option>
      </select>
      <div class="invalid-feedback">
        Por Favor Agrege el titulo a su reporte , por favor
      </div>
    </div>

<div class="form-row">
  <div class="col-md-12 mb- 3">
    <label  id="form_ticket" style="display:inline-flex!important" for="validationCustom03">Titulo</label>
    <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>

    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
</div>
</div>

<br>
  <div id="summernote"><p>Hello Summernote</p></div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <button class="btn btn-primary" type="submit">Submit form</button>
</form>

<body>

<!-- Ejemplo de un form en php------->

<div class="container">
  <div class="row">

    <div class="col-sm-2">
    </div>

    <?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
    <h3> La informacion se genero correctamente , gracias!
      <br><br>  <div class="Reportes">
           <a href="view.php" class="btn btn-success pull-right" style="
           margin-left: 8px;
               padding-left: 272px;
               padding-right: 255px;

           "><span class="glyphicon glyphicon-export"></span>IR A REPORTES GENERADOS</a>
        </div><br>
        <div class="Reportes">
             <a href="modificarw.php" class="btn btn-info pull-right" style="
             margin-left: 8px;
                 padding-left: 272px;
                 padding-right: 255px;

             "><span class="glyphicon glyphicon-export"></span>GENERAR MAS REPORTES</a>
          </div>
        </h3>
</center>
    <?php
    } else{
    ?>
    <div class="col-sm-8 text-center">


          <form class="" action="./proceso_ticket/proceso_guardar.php" enctype="multipart/form-data" method="post">
            <div class="card"> <br>
              <input class="form-contol"  type="text" name="nombreR" placeholder="Nombre" required
             ><br>
             <input class="form-contol"  type="text" name="titulo" placeholder="titulo" required
             ><br>
             <textarea class="form-contol"  type="text" name="descripcion" placeholder="descripcion" required
             ></textarea><br>
             <input class="form-contol"  type="date" name="fecha_crea" placeholder="Fecha" required
             ><br>
             <input class="form-contol"  type="text" name="status" placeholder="status"
             ><br>
             <input class="form-contol"  type="text" name="departamento" placeholder="departamento" required
             ><br>
             <input class="form-contol"  type="text" name="type_user" placeholder="type_user" required
             ><br>
             <input class="form-contol"  type="text" name="leido" placeholder="leido" required
             ><br>
             <input class="form-contol"  type="date" name="fecha_mod" placeholder="Fecha" required
             ><br>
              <input class="btn btn-info" type="submit" value="Aceptar"> <br>
            </div>
          </form>
      </div>


<?php } ?>







    <div class="col-sm-2">
    </div>




















 <script>
   $(document).ready(function() {
       $('#summernote').summernote();
   });
 </script>
</body>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
