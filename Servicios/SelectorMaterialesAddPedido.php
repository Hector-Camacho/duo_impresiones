<?php
	include ('../includes/sql.php');
	include ('../includes/json.php');
	$BD= new SQL();
	$JSON=new Json();
	try{	
		$query="SELECT Materiales.idMateriales as 'Id', Materiales.Nombre 'Materiales'  from
				Materiales inner join MaterialesServicios on Materiales.idMateriales=MaterialesServicios.Materiales_idMateriales
				where Materiales.idMateriales in (select ServiciosPrecios.idMateriales from ServiciosPrecios)
				and MaterialesServicios.Servicios_idServicios = '$_POST[idServicios]' group by(Materiales.Nombre);";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	}
	catch(Exeption$e){
		echo $e->getMessage();
	}
?>