
<div class="input-group mb-3" style="
display: inline-flex;
width: 25%;">

<?php
$servidor= "localhost";
$usuario= "root";
$password = "";
$nombreBD= "db_modular";
$conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}
$conexion->set_charset('utf8');

$query ="SELECT * FROM tickets";
$sql = $conexion->query($query);
$row = $resultado->fetch_assoc();

 ?>
<form id="manage_ticket" class="needs-validation"  enctype="multipart/form-data" method="post">
    <input type="text"  readonly id="c_ticket"   value="No.<?php echo $row['id_ticket']; ?>">
    <select class="custom-select" id="inputGroupSelect04" name="status" style="height: 34px; font-size:15px;">
    <option selected>Cambiar status...</option>
    <option value="1">Pendiente</option>
    <option value="2">Proceso</option>
    <option value="3">Espera de usuario</option>
    <option value="3">Espera de tercero</option>
    <option value="4">cerrado</option>
  </select>
  <input type="text" hidden name="user_id" value="<?php echo $_SESSION['usr_name'] ?>">
  <input type="text" hidden name="user_type" value="<?php echo 	$_SESSION['usr_departamento'] ?>">
  <input type="text" hidden name="ticket_id" value="<?php echo $row['id_ticket']; ?>">
  <input type="text" hidden name="id_perfil" value="<?php echo $_SESSION['usr_perfil'] ?>">
  <label class="control-label">Responder ticket:</label>
  <textarea name="comentario"   cols="30" rows="10" class="summernote" placeholder="comentario real"><?php echo isset($comentario) ? $comentario : '' ?></textarea>
  <?php
  date_default_timezone_set('America/Mexico_City');
  $fechaActual = date('d-m-y H:i:s'); ?>
  <input type="text" hidden readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_crea" value="<?php echo $fechaActual ?>" >

  <div class="input-group-append">

  <button name="cambio_status" onclick="funcionAlerta()" class="btn btn-info" type="submit">Aceptar</button>


  </div>
    </form>

</div>
