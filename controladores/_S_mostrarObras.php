<?php
include('../modelo/_S_conexion.php');
$requestData= $_REQUEST;
$usuario="infraestructura";
$contra="123456";
$nombrebd = "Bd_Licitaciones";
$servidor = "(local)";
$config="Driver={SQL Server Native Client 10.0};Server=$servidor;Database=$nombrebd;";
$conexion = odbc_connect($config,$usuario, $contra)or die(odbc_errormsg());



      $columns = array(
// datatable column index  => database column name
	       0 =>'id_obra',
	       1 => 'no_interno',
	       2=> 'obra',
         3 => 'tipo_adj_solicitado'

      );

      $sql = "SELECT id_obra, no_interno, obra, tipo_adj_solicitado FROM obra";
      $query = odbc_exec($conexion, $sql);
      $totalData = odbc_num_rows($query);
      $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.



      $sql = "SELECT id_obra, no_interno, obra, tipo_adj_solicitado ";
      $sql.=" FROM obra WHERE 1=1";
      $req = $requestData['search']['value'];
      if( !empty($req) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
      	$sql.=" AND ( id_obra LIKE '%".$req."%' ";
      	$sql.=" OR no_interno LIKE '%".$req."%' ";
        $sql.=" OR tipo_adj_solicitado LIKE '%".$req."%' ";
      	$sql.=" OR obra LIKE '%".$req."%' )";
      }
      $query=odbc_exec($conexion, $sql);

      $totalFiltered = odbc_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
      $req_o_c = $columns[$requestData['order'][0]['column']];
      $req_o_d =$requestData['order'][0]['dir'];
      $req_s =$requestData['start'];
      $req_l =$requestData['length'];
      $sql.=" ORDER BY ". $req_o_c."   ".$req_o_d." ";
      //LIMIT ".$req_s." ,".$req_l."   ";*/
      $query=odbc_exec($conexion, $sql);

      $data = array();
while( $row= odbc_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

	$nestedData[] = $row["id_obra"];
	$nestedData[] = $row["no_interno"];
	$nestedData[] = $row["obra"];
	$nestedData[] = $row["tipo_adj_solicitado"];
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format


  ?>
