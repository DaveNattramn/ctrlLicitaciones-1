<?php
  include('../modelo/conexion_admin.php');
  $bd = new ADMIN();
  $id = $_POST['id'];

  if ($id) {
    $resultado= $bd->info_usuario($id);
    $arreglo = odbc_fetch_array($resultado);

    ?>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Área</th>
                <th>Modulo</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Tipo de Usuario</th>
                <th>Usuario</th>
                <th>Contraseña</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo utf8_encode($arreglo['nombre']); ?></td>
                <td><?php echo $arreglo['puesto']; ?></td>
                <td><?php echo $arreglo['area']; ?></td>
                <td><?php echo $arreglo['modulo']; ?></td>
                <td><?php echo $arreglo['mail']; ?></td>
                <td><?php echo $arreglo['telefono']; ?></td>
                <td><?php echo $arreglo['tipo_usuario']; ?></td>
                <td><?php echo $arreglo['usuario']; ?></td>
                <td><?php echo $arreglo['contrasenia']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>

     <?php
  }
  
  $bd->cerrar();
?>