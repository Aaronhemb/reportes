<?php //notificaciones de tickets
$con = new mysqli('localhost','root','','db_modular');
$query = $con->query("
SELECT COUNT(status) FROM tickets WHERE status = 1
");
foreach($query as $data)
{
$status[] = $data['COUNT(status)'];}?>

<?php if  ($data['0'] = 0 ){
        echo "<div id='notif4' class='notif4 trans4' style='display:none'  >";
        echo "</div>";
    }elseif ($status['0'] != 0) {
      echo "<div id='notif4' class='notif4 trans4'  >";
      echo  $status['0'];
      echo "</div>";
    }
      ?>
