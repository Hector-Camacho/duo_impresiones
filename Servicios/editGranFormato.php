<?php 
	include ("../includes/sql.php");
	//extract($_POST);
	//print_r($_POST);
	$SQLConexion= new SQL();
	try 
	{
		$queryModificar="UPDATE PrioridadProcesos SET estatus='$_POST[StatusPedido]', Observacionespp='$_POST[Observaciones]' WHERE idPrioridadesServiciosPedido='$_POST[id]'";
		
		$Modificar= $SQLConexion->Insertar($queryModificar);
		
		if($Modificar)
		{
			echo json_encode(array('Mensaje'=>"Se modificó la información correctamente", 'Insercion'=>true));
		}
		else
		{
			echo json_encode(array('Mensaje'=>"Ha ocurrido un error al modificar la información", 'Insercion'=>false));
		}
	} 
	catch (Exception $e) 
	{
		echo json_encode($e->getMessage());
	}
 ?>