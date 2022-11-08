
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
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      <!--<img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
	      -->Grupo Angeles
	    </a>
			<ul class="nav navbar-nav navbar-right">
	      <?php if (isset($_SESSION['usr_id'])) { ?>
	      <li><p class="navbar-text"><i class="btn btn-danger btn-xs" ><b><?php echo $_SESSION['usr_name']; ?></b></i></p></li>
	      <a class="nav-item nav-link" href="../login/logout.php">SALIR</a>

	      <?php }  ?>

	    </ul>

	  </div>
	</nav>
		<div id="mySidenav" class="sidebar">
		  <a href="#home" data-toggle="popover" data-trigger="hover" data-content="Dashboard"><i class="fa fa-fw fa-home"  ></i></a>
			<a href="#service" data-toggle="popover" data-trigger="hover" data-content="Tickets"><i class="bi bi-speedometer"></i></a>
				<?php if ($_SESSION['usr_roll'] ==2): ?> <!--Si la session es de Admin ingresa a ver las opciones , si es usuario entra a
					ver solo los tickets--->
					<a href="#roll" data-toggle="popover" data-trigger="hover" data-content="Departamentos" ><i class="fa fa-fw fa-wrench"></i></a>
					<a href="#clients" data-toggle="popover" data-trigger="hover" data-content="Usuarios"><i class="fa fa-fw fa-user"></i></a>
					<a href="#contact" data-toggle="popover" data-trigger="hover" data-content="Tickets"><i class="fa fa-fw fa-ticket"></i></a>
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
			$roll2[] = $data2['COUNT(roll)'];	} ?>


				?>

			<div id="C_user" class="card border-info mb-3" style="max-width: 18rem;">
		  <div class="card-header">USUARIOS</div>
		  <div class="card-body">
	    <h5 class="card-title"> TOTAL DE USUARIOS</h5>
			<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado" class="card-text"> <?php echo  $roll['0']; ?></p>
		</div> <br>
			<div id="C_adm" class="card border-info mb-3" style="max-width: 18rem;">
			<div class="card-header">ADMINISTRADORES</div>
			<div class="card-body">
			<h5 class="card-title"> TOTAL DE ADMIN</h5>
			<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado" class="card-text"> <?php echo  $roll2['0']; ?></p>
			</div>




  </body>
</html>
