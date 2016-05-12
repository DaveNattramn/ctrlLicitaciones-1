<?php
include('../modelo/_S_conexion.php');
$requestData= $_REQUEST;

$bd = new ADMIN();

      $columns = array(
// datatable column index  => database column name
	       0 =>'id_obra',
	       1 =>'no_obra',
	       2=>'obra',
         3=>'municipio',
         4=>'localidad',
         5=>'total',
         6 =>'tipo_adj_solicitado',
         7=> 'estatus_general'
      );

      $query = $bd->selectObraNormativa();
      $totalData = odbc_num_rows($query);
      $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
      $query = $bd->buscaSelectObraNormativa($requestData['search']['value']);
      $totalFiltered = odbc_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.

      $query= $bd->ordenaSelectObraNormativa($requestData['search']['value'],$columns[$requestData['order'][0]['column']],$requestData['order'][0]['dir'],$requestData['start'],$requestData['length']);

      $data = array();


      while( $row= odbc_fetch_array($query) ) {  // preparing an array
	         $nestedData=array();

	          $nestedData[] = $row["id_obra"];
	           $nestedData[] = $row["no_obra"];
	            $nestedData[] = $row["obra"];
              $nestedData[] = $row["municipio"];
              $nestedData[] = $row["localidad"];
              $nestedData[] = '$' . number_format($row["total"],2);
	             $nestedData[] = $row["tipo_adj_solicitado"];
               $nestedData[] = $row["estatus_general"];
	              $data[] = $nestedData;
              }

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

$bd->cerrar();
echo json_encode($json_data);  // send data as json format

  ?>
