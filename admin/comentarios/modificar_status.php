<?php

 include '../control/conexion.php';

 $id = $_REQUEST['id'];
 $status = ($_POST["status"]);


 $query = "UPDATE tickets SET   status='$status'    WHERE id_ticket ='$id' ";



 $resultado = $con->query($query);

 if ($resultado) {
header("Location:./trae_cambio_status.php?id=$id_ticket");
 //echo "si se inserto";
 }else {
   echo "no se inserto";
 }

 ?>
