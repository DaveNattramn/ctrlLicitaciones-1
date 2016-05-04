<?php
    include('../modelo/conexion_admin.php');
    $bd = new ADMIN();
    $resul = $bd->todos_usuarios();
    $contador = odbc_num_rows($resul);
    $arre = odbc_fetch_array($resul);
    $bd->cerrar();

?>
