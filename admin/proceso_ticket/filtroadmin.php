


</form>

<div class="table-responsive"  style="    width: 90%;
    margin-left: 117px;
margin-bottom: 150px;
    " >
        <table id="tabla_ticket" class="table  " style="    width: 95%; text-align: center;">
                <thead>
                        <tr>
                          <td id="arriba_abajo" style="text-align:center;">Ticket</td>
                          <td id="arriba_abajo" style="text-align:center;">Titulo</td>
                          <td id="arriba_abajo" style="text-align:center;">Reporta</td>
                          <td id="arriba_abajo" style="text-align:center;">Perfil</td>
                          <td id="arriba_abajo" style="text-align:center;">Area</td>
                          <td id="arriba_abajo" style="text-align:center;">Status</td>
                          <td id="arriba_abajo" style="text-align:center;">Status</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Creacion</td>
                          <td id="arriba_abajo" style="text-align:center;">view</td>
                        </tr>

                </thead>
                <tbody>


                      <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                            <?php include("color_tabla.php");  ?>
                                <td id="i_ticket"><?php echo $rowSql['id_ticket']; ?></td>
                                <td id="titulo">  <?php echo $rowSql ["titulo"]; ?></td>
                                <td id="nombre"><?php echo $rowSql ["nombreR"]; ?></td>
                                <td id="perfil"><?php echo $rowSql ["perfil"]; ?></td>
                                <td id="sede"><?php echo $rowSql ["departamento"]; ?></td>
                                <td id="status">
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

                                 </td>
                                <?php
                                ?>
                                <?php if ($rowSql['status'] == 0): ?>
                                <td id="status"> <button type="button" id="status" name="button"></button> </td>
                              <?php elseif ($rowSql['status'] == 1):?>
                                  <td id="status"> <button type="button" id="status2" name="button"></button> </td>
                                <?php elseif ($rowSql['status'] == 2):?>
                                  <td id="status"> <button type="button" id="status3" name="button"></button> </td>
                                  <?php elseif ($rowSql['status'] == 3):?>
                                  <td id="status"> <button type="button" id="status3" name="button"></button> </td>
                                <?php elseif ($rowSql['status'] == 4):?>
                                  <td id="status"> <button type="button" id="status4" name="button"></button> </td>
                                <?php endif; ?>


                                <?php

                                date_default_timezone_set('America/Mexico_City');
                                $newDate = date("y-m-d h:i", strtotime($rowSql["fecha_crea"])); ?>
                                <td id="fecha"><?php echo  $newDate; ?>  </td>
                              <td>
                                <?php if ($rowSql['status'] == 4): ?>
                                  <a class="disable"  href="./comentarios.php?id=<?php echo $rowSql['id_ticket']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                 <?php else: ?>
                                      <a href="./comentarios.php?id=<?php echo $rowSql['id_ticket']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <?php endif; ?>


                    </tr><?php } ?>
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
