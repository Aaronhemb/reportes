


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="comentarios.php" class="btn btn-success pull-right" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas departamento</a>
    </div><br><br><br>

    </h3>
</center>
<?php
} else{
?>


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
<form id="manage_ticket" class="needs-validation"   action="./comentarios/modificar_status.php" enctype="multipart/form-data" method="post">
    <input type="text"  readonly id="c_ticket"   value="No.<?php echo $row['id_ticket']; ?>">
    <select class="custom-select" id="inputGroupSelect04" name="status" style="height: 34px; font-size:15px;">
    <option selected>Cambiar status...</option>
    <option value="1">Pendiente</option>
    <option value="2">Proceso</option>
    <option value="3">Espera de usuario</option>
    <option value="3">Espera de tercero</option>
    <option value="4">cerrado</option>
  </select>
  <div class="input-group-append">
    <button class="btn btn-info" type="submit">Aceptar</button>
  </div>
    </form>

</div>
<?php } ?>
