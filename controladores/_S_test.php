<?php
  $ubicacion = $_POST['ubicacion'];
  var_dump($ubicacion);
  imprime($ubicacion);


?>

<?php
function imprime($ubicacion){

    $ub = json_decode($ubicacion);
    var_dump($ub);
   for($i=0;$i<3;$i++){
     echo "( ".$ub[$i]->municipio."', '".$ub[$i]->localidad."')       ";
   }

   foreach ($ub as $u) {
     echo "( ".$u->municipio."', '".$u->localidad."')       ";
   }

   json_last_error();
}
 ?>
