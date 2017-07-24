<?php 
	include ("../includes/sql.php");
	extract($_POST);
		
	$SQLConexion= new SQL();
	try {
		$queryModificar="UPDATE Empresas set NombreEmpresa='$_POST[Nombre]', RFCempresa='$_POST[RFC]' where idEmpresas='$_POST[Id]'";
		$Modificar= $SQLConexion->Insertar($queryModificar);
		if($Modificar){
			echo json_encode(array('Mensaje'=>"Se modificó la información correctamente", 'Insercion'=>true));
		}
		else{
			echo json_encode(array('Mensaje'=>"Ha ocurrido un error al modificar la información", 'Insercion'=>false));
			
		}
	} catch (Exception $e) {
		echo json_encode($e->getMessage());
	}
	
	

 ?>