
<?php
include("control/conexion.php"); //conexion con el servidor

?>
<?php
//Control de la session , cuando un usuario intente ingresar con el link a una de las paginas , debera logearse primero
	session_start();

	if(!isset($_SESSION['usr_id'])) {
		header("Location:../login/login.php");
	}

	include_once '../login/dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
						<!--Link para css-->
        <link rel="stylesheet" href="css/style_dashboard.css">
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
					<!--Link para bootstrap-->
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
				<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				<!--Link para iconos de la pagina-->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title></title>

  </head>
  <body>
		<nav class="navbar bg-light">
			<?php //notificaciones de tickets
			$con = new mysqli('localhost','root','','db_modular');
			$query = $con->query("
			SELECT COUNT(status) FROM tickets WHERE status = 0
			");
			foreach($query as $data)
			{
			$status[] = $data['COUNT(status)'];}?>
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	  	Grupo Angeles <i class="bi bi-bell-fill"></i>
			<?php if  ($data['0'] = 0 ){
							echo "<div id='notif2' class='notif2 trans2' style='display:none'  >";
							echo "</div>";
					}elseif ($status['0'] != 0) {
						echo "<div id='notif2' class='notif2 trans2'  >";
						echo  $status['0'];
						echo "</div>";
					}
						?>


	    </a>
			<ul class="nav navbar-nav navbar-right">
	      <?php if (isset($_SESSION['usr_id'])) { ?>


	      <?php }  ?>
				<div class="dropdown" style="position:fixed;">
				<a href="javascript:void(0)" class="brand-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							<span class="brand-text font-weight-light"><?php echo ucwords($_SESSION['usr_name']) ?></span>

					</a>
					<div class="dropdown-menu" style="">
					<!---	<a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['usr_name'] ?>">Administrar cuenta</a>--->
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Administrar Usuario</a>
						<a class="dropdown-item" href="../login/logout.php">Salir</a>
					</div>
				</div>



	    </ul>

	  </div>
	</nav>
		<div id="mySidenav" class="sidebar">

			<a href="index.php" data-toggle="popover" data-trigger="hover" data-content="Dashobard"><i class="bi bi-speedometer"></i></a>
					<?php //notificaciones de tickets
					$con = new mysqli('localhost','root','','db_modular');
					$query = $con->query("
					SELECT COUNT(status) FROM tickets WHERE status = 0
					");
					foreach($query as $data)
					{
					$status[] = $data['COUNT(status)'];}?>

						<a href="#tickets" data-toggle="popover" data-trigger="hover" data-content="Tickets"><i class="fa fa-fw fa-ticket"></i>
							<?php if  ($data['0'] = 0 ){
											echo "<div id='notif' class='notif trans' style='display:none'  >";
											echo "</div>";
									}elseif ($status['0'] != 0) {
										echo "<div id='notif' class='notif trans'  >";
										echo  $status['0'];
										echo "</div>";
									}
										?>
				</a>
				<?php if ($_SESSION['usr_roll'] ==2): ?> <!--Si la session es de Admin ingresa a ver las opciones , si es usuario entra a
					ver solo los tickets--->
					<a href="#Departamentos" data-toggle="popover" data-trigger="hover" data-content="Departamentos" ><i class="fa fa-fw fa-wrench"></i></a>
					<a href="#usuarios" data-toggle="popover" data-trigger="hover" data-content="Usuarios"><i class="fa fa-fw fa-users"></i></a>
					<a href="#admin" data-toggle="popover" data-trigger="hover" data-content="Admin"><i class="fa fa-fw fa-user"></i></a>
					<a href="#mesa_ayuda" data-toggle="popover" data-trigger="hover" data-content="Conocimiento"><i class="bi bi-info-circle"></i></i></a>
					<a href="#Descargas" data-toggle="popover" data-trigger="hover" data-content="extraer Info"><i class="bi bi-file-earmark-x"></i></a>
				<?php endif; ?>

		</div>
		<script> // scrip para los popover´s
		$(document).ready(function(){
		    $('[data-toggle="popover"]').popover();
		});
		</script>
		<div class="main">
		  <h2>DASHBOARD</h2>
		</div>
		<?php
		$con = new mysqli('localhost','root','','db_modular');
		$query = $con->query("
		SELECT COUNT(roll) FROM users WHERE roll = 1");
		foreach($query as $data){
			$roll[] = $data['COUNT(roll)'];	}
		$query2 = $con->query("
		SELECT COUNT(roll) FROM users WHERE roll = 2");
			foreach($query2 as $data2){
			$roll2[] = $data2['COUNT(roll)'];	}
			$query3 = $con->query("
			SELECT COUNT(sede) FROM departamentos ");
				foreach($query3 as $data3){
				$sede = $data3['COUNT(sede)'];	}

				$query4 = $con->query("
				SELECT COUNT(id_ticket) FROM tickets ");
					foreach($query4 as $data4){
					$ticket = $data4['COUNT(id_ticket)'];	}

			?>


			<br><br>

			<div id="C_user" class="card border-info mb-3"
			style="margin-right: 951px!important;


			" >
			  <div class="card-header">USUARIOS</div>
				  <div class="card-body">
				    <h5 class="card-title"> TOTAL DE USUARIOS</h5>
					<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado"  style="margin-left: 83px!important;"  class="card-text"> <?php echo  $roll['0']; ?></p>
	 			</div>
			</div>
			<br>
			<div id="C_adm" class="card border-info mb-3" style="
			 			margin-bottom: -1rem!important;
						margin-right: 677px !important;
						margin-top: -177px !important;
						margin-left: 406px !important;
			      position: absolute!important;"  >
			  <div class="card-header">ADMINISTRADOR</div>
				  <div class="card-body">
				    <h5 class="card-title"> TOTAL DE ADMINISTRADOR</h5>
					<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado" style="margin-left: 83px!important;"  class="card-text"> <?php echo  $roll2['0']; ?></p>
				</div>
			</div>
			<br>
			<div id="C_depa" class="card border-info mb-3" style="
			     margin-right: 434px!important;
			  margin-top: -199px !important;
			    margin-left: 650px!important;
			  position: absolute!important;
			 	margin-bottom: -1rem!important;"  >
				<div class="card-header">DEPARTAMENTOS</div>
					<div class="card-body">
						<h5 class="card-title"> TOTAL DE DEPARTAMENTOS</h5>
					<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado" style="margin-left: 83px!important;"  class="card-text"> <?php echo  $sede; ?></p>
			</div>
		</div>
			<br>
			<div id="C_tick" class="card border-info mb-3" style="
			margin-bottom: -1rem!important;
			margin-right: 231px!important;
	    margin-left: 899px!important;
	    margin-top: -220px!important;
	    "  >
				<div class="card-header">TICKETS</div>
					<div class="card-body">
						<h5 class="card-title"> TOTAL DE TICKETS</h5>
				<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado"  style="margin-left: 83px!important;"  class="card-text"> <?php echo  $ticket; ?></p>
			</div>
		</div>
			<br>







  </body>
</html>
