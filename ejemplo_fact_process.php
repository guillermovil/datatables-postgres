<?php

include('ssp.class.pg.php');
ini_set("memory_limit","128M");

/* DB tables to use with necesary joins */
$table = "facturacion.comprobante inner join nacer.smiafiliados using(clavebeneficiario)";

// Table's primary key
$primaryKey = 'id_comprobante';

// Array of database columns which should be read and sent back to DataTables. The `db` parameter represents the column name in the database
//, while the `dt` parameter represents the DataTables column identifier.
$columns = array(
	array( 'db' => 'id_comprobante', 'dt' => 0),
	array( 'db' => 'fecha_comprobante', 'dt' => 1,
		'formatter' => function( $d, $row ) {
			if (!is_null($d))
				return date( 'd-m-Y', strtotime($d));
		} ),
	array( 'db' => 'afiapellido', 'dt' => 2 ),
	array( 'db' => 'afinombre', 'dt' => 3 ),
	array( 'db' => 'afidni', 'dt' => 4, 'alias'=>'doc' ),
	array( 'db' => 'clavebeneficiario', 'dt' => 5 )
);

//Condiciones adicionales para el WHERE
$filtroAdd=" comprobante.fecha_comprobante between date_trunc('month', now()-'5 month'::interval) and date_trunc('month', now()) and
	id_factura is null and
	coalesce(marca,'0')<>'1' ";

	//Parámetros de conexión
$pg_details = array(
 'user' => 'postgres',
 'pass' => 'password',
 'db'   => 'nacer',
 'host' => '10.0.0.200'
);

echo json_encode(
 SSP::simple( $_GET, $pg_details, $table, $primaryKey, $columns,$filtroAdd )
);

?>