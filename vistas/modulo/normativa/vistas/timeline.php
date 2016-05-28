<?php
	session_start();

	$_SESSION['usuario'];
	$usuario = $_SESSION['usuario'];
	$user = explode("_", $usuario);
	if(empty($_SESSION['usuario'])){
	 	header("Location:../../../index.php");
	}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../../../../css/bootstrap-cerulean.css">
	<link rel="stylesheet" href="../../../../css/font-awesome.css">
	<link rel="stylesheet" href="../../../../css/navbar.css">
	<link rel="stylesheet" href="../../../../css/side-menu.css">
	<link rel="shortcut icon" href="../../../../favicon.ico" />

	<script src="../../../../js/jquery21.js"></script>
	<script src="../../../../js/bootstrap.js"></script>

	<script src="../../../../js/_S_agregar_obra.js"></script>
	<script src="../../../../js/_S_tabla_obra.js"></script>

	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->

	<script src="js/main.js"></script> <!-- Resource jQuery -->
	<title>Responsive Vertical Timeline</title>
</head>
<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
      		<div class="container">
      			  	<div class="navbar-header">
      			  	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="	navbar"	>
      			  	    <span class="sr-only">Toggle navigation</span>
      			  	    <span class="icon-bar"></span>
      			  	    <span class="icon-bar"></span>
      			  	    <span class="icon-bar"></span>
      			  	  </button>
      			  	  <img src="../../../../recursos/img/gob.png"></img><a class="navbar-brand" href="">Departamento de Normativa</a>
      			  	</div>

      			 	 <div id="navbar" class="collapse navbar-collapse">
      			 	   <ul class="nav navbar-nav navbar-right">
      			 	     <li class="dropdown">
      			 	       <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo utf8_encode($user[0]); ?> <span	 	class="		caret"></span></a>
      			 	       <ul class="dropdown-menu" role="menu">
      			 	         <li><a href="../../../controladores/cerrar_sesion.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
      			 	       </ul>
      			 	     </li>
      			 	   </ul>
      		 	 	</div><!--/.nav-collapse -->
      		</div>
    	</nav>

	<section id="cd-timeline" class="cd-container">
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Obs</h2>
				<span class="cd-date">Enero 14</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>ejemplo 2</h2>
				<span class="cd-date">Enero 18</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>ejemplo 3</h2>
				<span class="cd-date">Enero 24</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-location">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>ejemplo 4</h2>
				<span class="cd-date">Febrero 14</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-location">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2>
				<h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2><h2>ejemplo 5</h2>
				<span class="cd-date">Feb 18</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->


	</section> <!-- cd-timeline -->

</body>
</html>
