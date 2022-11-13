
<!--Conexion a base de datos-->
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

if (!isset($_POST['id_ticket'])){$_POST['id_ticket'] = '';}
if (!isset($_POST['status'])){$_POST['status'] = '';}
if (!isset($_POST['nombreR'])){$_POST['nombreR'] = '';}
if (!isset($_POST['departamento'])){$_POST['departamento'] = '';}


?>

<div class="container mt-5" style="
    width: 1299px!important;
    max-width: 2521px!important;
    margin-left: -76px!important;">
    <div class="col-12">


    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card" >
          <div class="card-body">

        <form id="form2" name="form2" method="POST" action="ticket.php">
          <div class="col-12 row">

            <div class="mb-3" style="margin: auto;">
                    <label id="context"  class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreR" name="nombreR" value="<?php echo $_POST["nombreR"] ?>" >
            </div>
            <div class="mb-3" style="margin: auto;">
                    <label id="context" class="form-label">Orden a buscar</label>
                    <input type="text" class="form-control" id="id_ticket" name="id_ticket" value="<?php echo $_POST["id_ticket"] ?>" >

            </div>
              <div class="mb-3" style="margin: auto;">
                      <label id="context" class="form-label">Status a buscar</label>
                      <select type="text" class="form-control" id="status" name="status" value="<?php echo $_POST["status"] ?>" >
                        <option value="">Todos</option>
                        <option value="0">Pendiente</option>
                        <option value="1">Proceso</option>
                        <option value="2">Esperando a usuario</option>
                        <option value="3">Esperando a tercero</option>
                        <option value="4">Cerrado</option>
                      </select>
              </div>
              <div class="mb-3" style="margin: auto;">
                      <label id="context" class="form-label">Departamento a buscar</label>
                      <select type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $_POST["departamento"] ?>" >
                        <option value="">Todos</option>
                        <?php
                        $con = new mysqli('localhost','root','','db_modular');
                          $query ="SELECT * FROM tickets ";
                          $sql = $con->query($query);
                          $con->close();
                         ?>
                          <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                        <option value="<?php echo $rowSql["departamento"]; ?>"> <?php echo $rowSql["departamento"]; ?></option>
                        <?php } ?>
                      </select>
              </div>



                      <div class="col-1">
                          <input type="submit" class="btn" value="Ver" style="margin-top: 23px; background-color: #69696A; color: white;">
                  </div>
          </div>

             <?php
        /*FILTRO de busqueda////////////////////////////////////////////*/
        if ($_POST['nombreR'] == ''){ $_POST['nombreR'] = ' ';}
        $aKeyword = explode(" ", $_POST['nombreR']);


        if ($_POST["nombreR"] == '' AND $_POST['status'] == '' AND $_POST['id_ticket'] == '' AND $_POST['departamento'] == '' AND $_POST['buscafechahasta'] == ''AND $_POST['buscapreciodesde'] == '' AND $_POST['buscapreciohasta'] == ''){
                $query ="SELECT * FROM tickets  ";
        }else{


                $query ="SELECT * FROM tickets ";

        if ($_POST["nombreR"] != '' ){
                $query .= "WHERE (nombreR LIKE LOWER('%".$aKeyword[0]."%') OR status LIKE LOWER('%".$aKeyword[0]."%')) ";

        for($i = 1; $i < count($aKeyword); $i++) {
           if(!empty($aKeyword[$i])) {
               $query .= " OR nombreR LIKE '%" . $aKeyword[$i] . "%' OR status LIKE '%" . $aKeyword[$i] . "%'";
           }
         }

        }
        if ($_POST["status"] != '' ){
               $query .= " AND status = '".$_POST['status']."' ";
        }
        if ($_POST["id_ticket"] != '' ){
               $query .= " AND id_ticket = '".$_POST['id_ticket']."' ";
        }
        if ($_POST["departamento"] != '' ){
               $query .= " AND departamento = '".$_POST['departamento']."' ";
        }

}


         $sql = $conexion->query($query);

         $numeroSql = mysqli_num_rows($sql);



        ?>
</form>

<div class="table-responsive">
        <table id="tabla_ticket" class="table">
                <thead>
                        <tr style="
                          background-color: #f9f9f9;
                          color: #371bd5;
                          text-align: center;
                          ">
                          <td id="arriba_abajo" style="text-align:center;"></i> </td>
                        </tr>
                </thead>
                <tbody>
                <?php While($rowSql = $sql->fetch_assoc()) {   ?>


                            <?php include("color_tabla.php");  ?>
                                <div id="i_ticket">No.<?php echo $rowSql['id_ticket']; ?></div>
                                <div id="titulo">Asunto:    <?php echo $rowSql ["titulo"]; ?>  </div>
                                <div id="nombre">Reporta:  <?php echo $rowSql ["nombreR"]; ?></div>
                                  <div id="sede">Sede:  <?php echo $rowSql ["departamento"]; ?></div>
                                <div id="status">Status:
                                  <?php
                                    if($rowSql["status"] == 0){
                                      echo "Pendiente";
                                    }elseif ($rowSql["status"] == 1) {
                                      echo "Proceso";
                                    }elseif ($rowSql["status"] == 2) {
                                      echo "Esperando respuesta de usuario";
                                    }elseif ($rowSql["status"] == 3) {
                                      echo "Esperando respuesta de tercero";
                                    }elseif ($rowSql["status"] == 4) {
                                      echo "Cerrado";
                                      }
                                   ?>

                                 </div>
                                <?php   $newDate = date("d-m-y h:i", strtotime($rowSql["fecha_crea"])); ?>
                                <div id="fecha">Creacion:<?php echo  $newDate; ?>  </div>
                              </th>


                    </tr>

               <?php } ?>
                </tbody>
        </table>
</div>


</div>
</div>
</div>
</div>


    </div>
</div>
<?php 	$conexion->close(); ?>
