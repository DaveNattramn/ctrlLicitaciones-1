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
		<title>Licitaciones y Concursos | S.I.T.</title>
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
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#todas" data-toggle="tab" aria-expanded="true"><i class="fa fa-list" aria-hidden="true"></i> Todos los Proyectos</a></li>
                          <li class=""><a href="#no_entregados" data-toggle="tab" aria-expanded="true"><i class="fa fa-clock-o" aria-hidden="true"></i> Aún no Entregados</a></li>
                          <li class=""><a href="#sit" data-toggle="tab" aria-expanded="true"><i class="fa fa-file-text" aria-hidden="true"></i> En Revisión S.I.T.</a></li>
                          <li class=""><a href="#daop" data-toggle="tab" aria-expanded="false"><i class="fa fa-list-alt" aria-hidden="true"></i> En Revisión D.A.O.P.</a></li>
                          <li class=""><a href="#progra" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol" aria-hidden="true"></i> En Programación para Licitación</a></li>
                          <li class=""><a href="#proce" data-toggle="tab" aria-expanded="true"><i class="fa fa-calendar" aria-hidden="true"></i> En Proceso de Licitación</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">

                          <div class="col-lg-9">
                            <br>
                            <input class="form-control input-sm" type="text" id="" placeholder="Buscar Obra...">
                            <br>
                          </div>

                          <div class="tab-pane fade active in" id="todas">
                            <br>
                            <?php 
                              require("vistas/tabla_general.php");
                            ?>
                          </div>

                          <div class="tab-pane fade" id="no_entregados">
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                          </div>

                          <div class="tab-pane fade" id="sit">
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                          </div>

                          <div class="tab-pane fade" id="daop">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                          </div>

                          <div class="tab-pane fade" id="progra">
                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                          </div>

                          <div class="tab-pane fade" id="proce">
                            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                          </div>

                        </div>
            </div>

            






    	<script src="../../../js/jquery21.js"></script>
      <script src="../../../js/jquery21.js"></script>
      <script src="../../../js/bootstrap.js"></script>
      <script src="../../../js/scripts_generales.js"></script>


	</body>
</html>