<?php 
	session_start();
	if(empty($_SESSION['usuario'])){
	 	header("Location:../../../index.php");
	}
      else
      {
            $_SESSION['usuario'];
            $usuario = $_SESSION['usuario'];
            $user = explode("_", $usuario);
      }
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../css/bootstrap-cerulean.css">
		<link rel="stylesheet" href="../../../css/font-awesome.css">
		<link rel="stylesheet" href="../../../css/navbar.css">
	    <link rel="stylesheet" href="../../../css/side-menu.css">
	    <link rel="shortcut icon" href="../../../favicon.ico" />
      <script src="../../../js/jquery-dateFormat.js"></script>
      <link href="../../../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
      <script src="js/datetimepicker.js"></script>
		<title>Licitaciones y Concursos | S.I.T.</title>
      <script type="text/javascript" src="../../../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../../../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      		<div class="container">
      			  	<div class="navbar-header">
      			  	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      			  	    <span class="sr-only">Toggle navigation</span>
      			  	    <span class="icon-bar"></span>
      			  	    <span class="icon-bar"></span>
      			  	    <span class="icon-bar"></span>
      			  	  </button>
      			  	  <img src="../../../recursos/img/gob.png"></img><a class="navbar-brand" href="">Licitaciones y Concursos</a>
      			  	</div>

      			 	 <div id="navbar" class="collapse navbar-collapse">
      			 	   <ul class="nav navbar-nav navbar-right">
      			 	     <li class="dropdown">
      			 	       <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo utf8_encode($user[0]); ?> <span	class="caret"></span></a>
      			 	       <ul class="dropdown-menu" role="menu">
      			 	         <li><a href="../../../controladores/cerrar_sesion.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
      			 	       </ul>
      			 	     </li>
      			 	   </ul>
      		 	 	</div><!--/.nav-collapse -->
      		</div>
    	      </nav>


            <!--Mennú
            <div class="col-lg-2 col-md-2">
                    <div id="menu-principal">
                    <div class="list-group panel-primary">
                      <a href="" class="list-group-item list-group-item active">Inicio <i class="fa fa-dashboard fa-lg"></i></a>
                      <!--<a href="#demo3" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Inicio <i class="fa fa-dashboard fa-lg"></i></a>
                      <a href="#Usuarios" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Obra o Proyecto<i class="fa fa-book" aria-hidden="true"></i></a>
                      <div class="collapse" id="Usuarios">
                        <a href="#usuario_proyecto" id="nuevo_user" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> Agregar Usuario a Proyecto</a>
                      </div>
                    </div>
                  </div>
              </div>
            -->

            <!--tabs-->

            <div class="col-lg-12">
              <div class="col-lg-12">
                <br>
                <input class="form-control input-sm" type="text" id="busqueda" placeholder="Buscar Obra...">
                <br>
              </div>
              <!---->
              <div class="col-lg-2 col-md-2">
                <div id="menu-principal">
                    <div class="list-group panel-info">
                      <div class="panel-heading">
                        <h3 class="panel-title">Panel Menu</h3>
                      </div>
                      <!--<a href="" class="list-group-item list-group-item active">Inicio <i class="fa fa-dashboard fa-lg"></i></a>-->
                      <!--<a href="#demo3" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Inicio <i class="fa fa-dashboard fa-lg"></i></a>-->
                      <a href="#Info" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Proyectos <i class="fa fa-clipboard" aria-hidden="true"></i></a>
                      <div class="collapse" id="Info">
                        <a href="#" id="todos" class="btn1 list-group-item active"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> General</a>
                        <a href="#" id="no_entre" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> Aún no Entregados</a>
                        <a href="#" id="en_sit" class="btn1 list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> En Revisión S.I.T.</a>
                        <a href="#" id="en_daop" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> En Revisión D.A.O.P.</a>
                        <a href="#" id="en_progra" class="btn1 list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> En Programación para Licitación</a>
                        <a href="#" id="en_proce" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> En Proceso de Licitación</a>
                        <a href="#" id="adju" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> Adjudicada D.A.O.P.</a>
                      </div>
                      <a href="#modulos" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Identificadores <i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                      <div class="collapse" id="modulos">
                      </div>
                    </div>
                  </div>
              </div>

              <!--

              <div class="col-lg-2">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active" id="general"><a href="#todas"><i class="fa fa-list" aria-hidden="true"></i> General</a></li>
                  <li class="" id="no_au"><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> Aún no Entregados</a></li>
                  <li class="" id="au"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> En Revisión S.I.T.</a></li>
                  <li class="" id="au"><a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i> En Revisión D.A.O.P.</a></li>
                  <li class="" id="au"><a href="#"><i class="fa fa-list-ol" aria-hidden="true"></i> En Programación para Licitación<span class="badge">3</span></a></li>
                  <li class="" id="au"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> En Proceso de Licitación</a></li>
                  <li class="" id="au"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>Adjudicada D.A.O.P.</a></li>
                </ul>
              </div>-->

              <div class="col-lg-10" id="general">
                <?php 
                  require("vistas/tabla_general.php");
                ?>
              </div>

              <div class="col-lg-10" id="no_entregados" hidden>
                <?php 
                  require("vistas/no_entregados.php");
                ?>
              </div>

              <div class="col-lg-10" id="sit" hidden>
                <?php 
                  require("vistas/revision_sit.php");
                ?>
              </div>

              <div class="col-lg-10" id="daop" hidden>
                <?php 
                  require("vistas/daop.php");
                ?>
              </div>

              <div class="col-lg-10" id="progra" hidden>
                <?php 
                  require("vistas/progra.php");
                ?>
              </div>

              <div class="col-lg-10" id="proce" hidden>
                <?php 
                  require("vistas/proceso.php");
                ?>
              </div>

              <div class="col-lg-10" id="adjudicadas" hidden>
                <?php 
                  require("vistas/adjudicadas.php");
                ?>
              </div>
            </div>

            
    <!--CUERPO MODAL-->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <?php 
            require("vistas/modal_general.php");
          ?>
        </div>
      </div>
    </div>




    	<script src="../../../js/jquery21.js"></script>
      <script src="../../../js/jquery21.js"></script>
      <script src="../../../js/bootstrap.js"></script>
      <script src="../../../js/scripts_generales.js"></script>

      <script src="js/no_entregados.js"></script>
      <script src="js/trigger_modal.js"></script>


	</body>
</html>