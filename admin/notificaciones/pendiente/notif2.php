<?php //notificaciones de tickets
$con = new mysqli('localhost','root','','db_modular');
$query = $con->query("
SELECT COUNT(status) FROM tickets WHERE status = 0 
");
foreach($query as $data)
{
$status[] = $data['COUNT(status)'];}
$con->close();

?>

<?php if  ($data['0'] = 0 ){
        echo "<div id='notif2' class='notif2 trans2' style='display:none'  >";
        echo "</div>";
    }elseif ($status['0'] != 0) {
      echo "<div id='notif2' class='notif2 trans2'  >";
      echo  $status['0'];
      echo "</div>";
    }
      ?>
