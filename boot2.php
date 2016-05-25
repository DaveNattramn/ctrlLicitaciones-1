<?php
  session_start();

  if(empty($_SESSION['usuario']))
  {
    header("Location: index.php");
  }
  else
  {
      $_SESSION['usuario'];
      $usuario = $_SESSION['usuario'];
      $user = explode("_", $usuario);
      if ($user[0] != "David Flores Alvarez")
      {
        session_destroy();
        header("Location: index.php");
      }
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	 <meta charset="UTF-8">
	 <link rel="stylesheet" href="css/bootstrap-cerulean.css">
	 <link rel="stylesheet" href="css/font-awesome.css">
	 <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/side-menu.css">
    <link rel="stylesheet" href="css/toastr.css">
    <link rel="shortcut icon" href="favicon.ico" />
	 <title>Secretaría de Infraestructura y Transportes</title>


</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="	navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="recursos/img/gob.png"></img><a class="navbar-brand" href="">Licitaciones y Concursos</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo utf8_encode($user[0]); ?> <span class="	caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="controladores/cerrar_sesion.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="row">
        <div class="col-lg-3 col-md-3">
              <div id="menu-principal">
              <div class="list-group panel-primary">
                <a href="" class="list-group-item list-group-item active">Inicio <i class="fa fa-dashboard fa-lg"></i></a>
                <!--<a href="#demo3" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Inicio <i class="fa fa-dashboard fa-lg"></i></a>-->
                <a href="#Usuarios" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Usuarios <i class="fa fa-user fa-lg"></i></a>
                <div class="collapse" id="Usuarios">
                  <a href="#Todos_los_Usuarios" id="todos" class="btn1 list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> Todos los Usuarios</a>
                  <a href="#Agregar_Nuevo_Usuario" id="nuevo_user" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> Agregar Nuevo Usuario</a>
                </div>
                <a href="#modulos" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Modulos <i class="fa fa-cubes fa-lg"></i></a>
                <div class="collapse" id="modulos">
                </div>
              </div>
            </div>
        </div>

        <div class="info col-lg-9">
                  <h1 id="info">Bienvenido Admin!</h1>
                  <p>Aquí podrá tener control total del sistema de Licitaciones así como funciones unicas como:</p>
                  <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Agregar Usuarios</p>
                  <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Agregar Obras</p>
                  <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Modificar Información General</p>
                  <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Generar Reportes</p>
                  <p>Del lado izquierdo se encuentra el menu desplegable con las diferentes funciones antes mencionadas.</p>
        </div>


        <div class="usuarios col-lg-9" style="display:none;">

              <ul class="nav nav-tabs">
                <li class="active"><a href="#1" class="tabs" data-toggle="tab"> <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Todos los Usuarios</a></li>
                <li><a href="#2" class="tabs" data-toggle="tab"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Usuarios Licitaciones y Concursos</a></li>
                <li><a href="#3" class="tabs" data-toggle="tab"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Usuarios Normativa</a></li>
                <li><a href="#4" class="tabs" data-toggle="tab"><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> Usuarios Agua</a></li>
              </ul>

              <div class="tab-content"> <!--CONTENIDO DE TABS-->



                <div class="tab-pane active" id="1"> <!--TAB 1 TODOS LOS USUARIOS-->
                                          <br>
                          <div class="alert alert-dismissible alert-info">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <strong>Ups!</strong> No existe ningun usuario.
                          </div>
                          <br>
                          <div class="list-group">
                            <a class="list-group-item active">
                                Usuarios Existentes en el Sistema
                            </a>
                            <div class="table-responsive table-bordered">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nombre</th>
                                      <th>Puesto</th>
                                      <th>Área</th>
                                      <th>Modulo</th>
                                    </tr>
                                  </thead>
                                  <tbody>



                                  </tbody>
                                </table>
                              </div>
                            </div>
                </div>



              </div>

        </div>

      <div class="col-lg-9" id="Agregar_Nuevo_Usuario" style="display:none;">
        <h3>Nuevo Usuario</h3>
          <legend> </legend>

          <div class="myform">
            <div id="nom" class="col-lg-4">
              <label for="">Nombre</label>
              <input type="text" class="form-control" id="_nombre">
              <br>
            </div>

            <div id="pue" class="col-lg-4">
              <label for="">Puesto</label>
              <input type="text" class="form-control" id="puesto">
              <br>
            </div>

            <div id="t_use" class="col-lg-4">
              <label for="">Tipo de Usuario</label>
              <select name="" id="tp_user" class="form-control" required="required">
                <option value=""></option>
                <option>Usuario</option>
              </select>
              <br>
            </div>

            <div class="col-lg-3">
              <label for="">Área</label>
              <select name="" id="area" class="form-control" required="required">
                <option></option>
                <option>Dpto. de Licitaciones y Concursos</option>
                <option>Dpto. de Normatividad</option>
                <option>Dpto. de Agua</option>
              </select>
              <br>
            </div>

            <div id="mod" class="col-lg-3">
              <label for="">Modulo</label>
              <select name="" id="modulo" class="form-control" required="required">
                <option></option>
                <option value="">Licitaciones</option>
                <option value="">Normatividad</option>
                <option value="">Agua</option>
              </select>
              <br>
            </div>

            <div class="col-lg-3">
              <label for="">Teléfono</label>
              <input type="text" class="form-control" id="tel">
              <br>
            </div>

            <div class="col-lg-3">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="mail">
              <br>
            </div>

            <legend></legend>

            <div id="us" class="col-lg-6">
              <label for="">Usuario</label>
              <input type="text" class="user form-control" id="">
              <br>
            </div>

            <div id="pa" class="col-lg-6">
              <label for="">Contraseña</label>
              <input type="password" class="pass form-control" id="">
              <br>
            </div>
            <center><button type="submit" id="guardar_usuario" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button></center>
          </div>
      </div>





      </div><!--ROW FILA -->






<script src="js/jquery21.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/scripts_generales.js"></script>
<script src="js/modal_usuarios.js"></script>
<script src="js/toastr.js"></script>
<script src="js/modal_modif_user.js"></script>
<script src="js/agregar_usuario.js"></script>
<script src="js/eliminar_usuario.js"></script>


<script>
  $(document).ready(function(){
      $(".btn1").click(function(){
          $(".info").css("display", "none");
          $("#Agregar_Nuevo_Usuario").css("display", "none");
          $(".usuarios").fadeIn(300);
      });
  });
</script>

<script>
  $(document).ready(function(){
      $("#nuevo_user").click(function(){
          $(".info").css("display", "none");
          $(".usuarios").css("display", "none");
          $("#Agregar_Nuevo_Usuario").fadeIn(300);
      });
  });
</script>





</body>
</html>
