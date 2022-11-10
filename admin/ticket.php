<?php include("head.php");
include("control/conexion.php") ?>


<div>

    <table id="table_tickets" class="table table-success table-striped">
        <?php
          $query = "SELECT * FROM tickets";

          $resultado = $con->query($query);
          while($row = $resultado->fetch_assoc()){
         ?>
        <thead>
          <?php

           ?>
            <th id="fila">
              <div id="i_ticket"><?php echo $row['id_ticket']; ?><div>
              <div id="titulo"><?php echo $row ["titulo"]; ?>  </div>
              <div id="nombre"><?php echo $row ["nombreR"]; ?></div>
              <div id="status"><?php echo $row ["status"]; ?>  </div>
              <?php   $newDate = date("d-m-y h:i", strtotime($row["fecha_crea"])); ?>
              <div id="fecha"><?php echo  $newDate; ?>  </div>
            </th>
    </tr>

  <?php } ?>

      </thead>
    </table>
    <?php

    $con->close();

    ?>

  </form>
</div>
