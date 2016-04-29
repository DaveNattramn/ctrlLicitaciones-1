<?php
  session_start();
  if(isset($_SESSION['usuario'])){
      header('Location:admin.php');
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap-cerulean.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/toastr.css">
  <link rel="shortcut icon" href="favicon.ico" />
	<title>S. I. T. | Inicio de Sesión</title>
</head>
<body>
  <div class="container">
    <div class="jumbotron">

      <div class="col-lg-12">
          <img class="img-responsive" src="recursos/img/seinfra.png" id="imagenlogo">
          <div class="form-group">
           <input class="form-control input-lg" type="text" id="txtusuario" placeholder="Usuario" required autofocus>
          </div>

          <div class="form-group">
             <input class="form-control input-lg" type="password" id="txtpass" placeholder="Contraseña" required>
          </div>
          <button type="button" class="btn btn-primary buttonBlue" id="btniniciar">Iniciar Sesión</button>
          <div class="spinner" id="loader" style="display:none;">
            <div class="spinner-container container1">
              <div class="circle1"></div>
              <div class="circle2"></div>
              <div class="circle3"></div>
              <div class="circle4"></div>
            </div>
            <div class="spinner-container container2">
              <div class="circle1"></div>
              <div class="circle2"></div>
              <div class="circle3"></div>
              <div class="circle4"></div>
            </div>
            <div class="spinner-container container3">
              <div class="circle1"></div>
              <div class="circle2"></div>
              <div class="circle3"></div>
              <div class="circle4"></div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <script src="js/jquery21.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/toastr.js"></script>
  <script src="js/login.js"></script>
</body>
</html>
