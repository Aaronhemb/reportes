
 <?php
include("../control/conexion.php");

 $con->set_charset('utf8');

 $id= ($_POST["id"]);
 $user_id= ($_POST["user_id"]);
 $user_type= ($_POST["user_type"]);
 $ticket_id = ($_POST["ticket_id"]);
 $id_perfil = ($_POST["id_perfil"]);
 $status = ($_POST["status"]);
 $fecha_crea = ($_POST["fecha_crea"]);
 //$password = hash_hmac("sha512", $data['clave'], "LLAVE");
 $query = "INSERT INTO comentarios(user_id,user_type,ticket_id,id_perfil,status,fecha_crea)VALUES ('$user_id','$user_type','$ticket_id','$id_perfil','$status','$fecha_crea')";

 $resultado = $con->query($query);

 if ($resultado == 1) {

    $id = $_REQUEST['id'];
    $status = ($_POST["status"]);


    $query = "UPDATE tickets SET   status='$status'    WHERE id_ticket ='$id' ";
     $resultado2 = $con->query($query);
     header("Location:../comentarios.php?id=$id");
 }else {
   echo "no se inserto";
 }


 $conexion->close();

  ?>
