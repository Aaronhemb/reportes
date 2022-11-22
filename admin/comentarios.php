<?php Include("head_newticket.php"); ?>

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

  $query = "SELECT * FROM tickets WHERE id_ticket ='$id' ";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();

$conexion->close();

 ?>


<div class="card" style="width:80%;">
  <div class="card-header" >
    <input type="text" readonly id="c_ticket"   value="<?php echo $row['id_ticket']; ?>">
    <input type="text" readonly id="c_nombre"   value="<?php echo $row['nombreR']; ?>">
    <input type="text"  readonly id="c_depa"   value="<?php echo $row['departamento']; ?>">
    <input type="text" readonly id="c_perfil"   value="<?php echo $row['perfil']; ?>">
   <?php   $newDate = date("d-m-y h:i:a", strtotime($row["fecha_crea"])); ?>
    <input id="c_fecha"for="" readonly value="Fecha: <?php echo $newDate; ?>"> <br><br>
      <input type="text" readonly id="c_titulo"   value="<?php echo $row['titulo']; ?>">
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">



      	<?php echo html_entity_decode($row["descripcion"]); ?>
        <input name="descripcion" id="summernote" cols="30" rows="10" class="form-control summernote" value="<?php echo html_entity_decode($row["descripcion"]); ?>">
        <textarea name="name" rows="8" cols="80"><?php echo $row['descripcion']; ?></textarea>
        <textarea  id="summernote" cols="30" rows="10" class="form-control summernote" value="<?php echo $row["descripcion"]; ?>"></textarea>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div>


 <script>
   $(document).ready(function() {
       $('.summernote').summernote(


                    //  $('.summernote').eq(0).html('{{$texto[0]->hechos}}'),
                    //  $('.summernote').eq(1).html('{{$texto[0]->pruebas}}'),
                  //    $('.summernote').eq(2).html('{{$texto[0]->anexos}}'),
                      {
                        //  disableDragAndDrop: true,
                          height: 300,                 // set editor height
                          minHeight: null,             // set minimum height of editor
                          maxHeight: null,             // set maximum height of editor
                          lang: 'es-CO',
                          toolbar: [
                              // [groupName, [list of button]]
                              ['style', ['bold', 'italic', 'underline', 'clear']],
                              ['font', ['strikethrough', 'superscript', 'subscript']],
                              ['fontsize', ['fontsize']],
                              ['color', ['color']],
                              ['para', ['ul', 'ol', 'paragraph']],
                              ['picture', ['picture']],
                              ['undo' , ['undo']],
                              ['redo' , ['redo']]
                          ],
                      }
                  );

              });

 </script>

 <script type="text/javascript">
 var save = function() {
var markup = $('.click2edit').summernote('code');
$('.click2edit').summernote('destroy');
};
 </script>
 <?php
