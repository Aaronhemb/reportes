
<?php include ("head.php"); ?>


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
					$con->close();
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
