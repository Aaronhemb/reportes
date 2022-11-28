
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



$id = $_REQUEST['id'];
  $query = "SELECT * FROM tickets WHERE id_ticket = '$id' ";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();

$conexion->close();

 ?>

<div id="demo1" class="collapse">
  <form id="manage_ticket" class="needs-validation" action="./comentarios/modificar_status.php?id=<?php echo $row['id_ticket'];  ?>" enctype="multipart/form-data" method="post">

  <select type="text"  name="status" value="<?php echo $row['status']; ?>">
    <option selected value="">seleccionar opcion</option>
    <option value="0">Pendiente</option>
    <option value="1">Proceso</option>
    <option value="2">Esperando a usuario</option>
    <option value="3">Esperando a tercero</option>
    <option value="4">Cierre</option>
  </select>

  <button class="btn btn-primary" type="submit" >Cambiar status</button>

<br><br><br>
  </form>
</div>
