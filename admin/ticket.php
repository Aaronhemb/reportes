<?php include("head.php");
include("control/conexion.php") ?>


<div>

    <table id="table_tickets" class="table table-success table-striped" style="background-color: #b8eaeb;">
        <?php
          $query = "SELECT * FROM tickets";
          $resultado = $con->query($query);
          while($row = $resultado->fetch_assoc()){
          ?>
        <thead>

            <th id="fila">
              <div id="i_ticket">#<?php echo $row['id_ticket']; ?></div>
              <div id="titulo">Asunto:    <?php echo $row ["titulo"]; ?>  </div>
              <div id="nombre">Reporta:  <?php echo $row ["nombreR"]; ?></div>

              <div id="status">Status:
                <?php echo $row ["status"];
                  if($row["status"] == 0){
                    echo "Pendiente";
                  }elseif ($row["status"] == 1) {
                    echo "Proceso";
                  }elseif ($row["status"] == 2) {
                    echo "Esperando Respuesta de usuarios";
                  }elseif ($row["status"] == 3) {
                    echo "Esperando Respuesta de tercero";
                  }elseif ($row["status"] == 4) {
                    echo "Cerrado";
                    }
                 ?>

               </div>
              <?php   $newDate = date("d-m-y h:i", strtotime($row["fecha_crea"])); ?>
              <div id="fecha">Creacion:<?php echo  $newDate; ?>  </div>
            </th>
    </tr>

  <?php } ?>

      </thead>
    </table>


  </form>
</div>
