<?php 
	include ("../includes/sql.php");
	extract($_POST);
	$SQLConexion=new SQL();
	try {
		$query= "INSERT INTO materiales (Nombre) VALUES ('$_POST[NombreMaterial]')";
		$NuevoMaterial =$SQLConexion->Insertar($query);
		$ultimo=$SQLConexion->Ultimo();
		if($NuevoMaterial){
			$query="INSERT INTO materialesservicios(Servicios_idServicios, Materiales_idMateriales) VALUES ('$_POST[ServiciosDisponibles]', $ultimo)";
			$RegistroFinal=$SQLConexion->Insertar($query);
			if($RegistroFinal){
				echo json_encode(array('Mensaje'=>'Se registró la información correctamente','Insersion'=>true));
			}else{
				echo json_encode(array('Mensaje'=>'Hubo un problema al añadir el material al servicio','Insersion'=>false));
			}
		}
		else{
		
		}
	} catch (Exception $e) {
		
	}


 ?>