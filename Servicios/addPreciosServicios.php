<?php 
	include ("../includes/sql.php");
	extract($_POST);
	try {
		$ConexionSQL=new SQL();
		// $ConexionSQL->beginTransaction();
		$query="INSERT INTO Precios VALUES('','$_POST[PrecioServicio]','$_POST[Cantidad]','$_POST[DescripcionPrecio]','$_POST[PrecioServicioMayoreo]')";
		$registro=$ConexionSQL->Insertar($query);
		$Ultimo=$ConexionSQL->Ultimo();
		if($registro){
			// echo "Aqui inserto";
			$query="INSERT INTO ServiciosPrecios (`idServicio`, `idPrecio`, `idMateriales`) VALUES ('$_POST[Servicio]', '$Ultimo', '$_POST[Material]');
";
			$Registro=$ConexionSQL->Insertar($query);
			if($Registro){
				// $ConexionSQL->commit();
				echo json_encode(array('Mensaje'=>'Se registró la información correctamente','insercion'=>true));
			}
			else{
				echo json_encode(array('Mensaje'=>'Ha ocurrido un error al registrar','insercion'=>false));
			}
		}
		else{
			echo "No inserto";
		}
	} catch (Exception $e) {
		
	}
?>