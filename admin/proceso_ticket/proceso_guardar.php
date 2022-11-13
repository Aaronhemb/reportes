<?php

include("../control/conexion.php");

$id_ticket= ($_POST["id_ticket"]);
$nombreR= ($_POST["nombreR"]);
$titulo = ($_POST["titulo"]);
$descripcion = ($_POST["descripcion"]);
$fecha_crea = ($_POST["fecha_crea"]);
$status = ($_POST["status"]);
$departamento = ($_POST["departamento"]);
$type_user = $_POST['type_user'];
$leido = $_POST['leido'];
$fecha_mod = $_POST['fecha_mod'];


//$password = hash_hmac("sha512", $data['clave'], "LLAVE");


$query = "INSERT INTO tickets(id_ticket,nombreR,titulo,descripcion,fecha_crea,status,departamento,type_user,leido,fecha_mod)VALUES ('$id_ticket','$nombreR','$titulo','$descripcion','$fecha_crea','$status','$departamento','$type_user','$leido','$fecha_mod')";

$resultado = $con->query($query);


if ($resultado) {
header("Location:../new_ticket.php?i=ok");
}else {
  echo "no se inserto";
}

 ?>
