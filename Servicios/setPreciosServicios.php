<?php
	include ('../includes/sql.php');
	include ('../includes/json.php');
	$JSON = new Json();
	$BD = new SQL();
	try {
		$query = "SELECT 
		Precios.id as 'id',
	    Servicios.Nombre as 'Servicio',
	    Precios.Precio as 'Precio',
	    Precios.PrecioMaximo as 'PrecioM',
	    Materiales.Nombre as 'Material',
	    Precios.Descripcion as 'Descripcion'
	FROM
	    ServiciosPrecios INNER JOIN
	    Servicios INNER JOIN
	    Precios INNER JOIN
	    Materiales
	ON
	    	ServiciosPrecios.idServicio = Servicios.idServicios
	        AND ServiciosPrecios.idPrecio = Precios.id
	        AND ServiciosPrecios.idMateriales = Materiales.idMateriales;";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar();
	}
	catch (Exeption $e) {
		echo $e->getMessage();
	}
?>
	