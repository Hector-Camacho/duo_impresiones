<?php 
	include ("../includes/sql.php");
	extract($_POST);
	try 
	{
		$SQLConexion= new SQL();
		$query="INSERT INTO direccion values('','$_POST[calle]','$_POST[colonia]','$_POST[numero]','$_POST[codigopostal]','$_POST[referenciaubicacion]','$_POST[localidad]')";
		$registro=$SQLConexion->Insertar($query);
		if($registro)
		{
			$idDireccion="select max(id) as idDir from direccion";
			$Direccion= $SQLConexion->Seleccionar($idDireccion);
			$idDireccionInsert=$Direccion[0]['idDir'];

			$queryProcedure="call InsertarInformacionEmpleado
			('$nombre','$app','$apm','$rfc','$telefono','$sucursal','$idDireccionInsert',
				'$horaentrada','$horasalida','$horacomida');";
			$RegistrarEmpleado=$SQLConexion->Seleccionar($queryProcedure);
			$queryProcedureUsuario="call InsertarInformacionUsuario('$nombreusuario','$contrasena','$rolusuario');";
			$RegistrarUser=$SQLConexion->Seleccionar($queryProcedureUsuario);
			if($RegistrarEmpleado || $RegistrarUser) {
				echo json_encode(array('msg' => "Se registró la información correctamente",'insercion'=>true));
			}
			else{
				echo mysql_error();		
			}	
		}
		else{
			echo "Heeeeh";	
		}
	} 
	catch (Exception $e) 
	{
		echo json_encode(array('msg' => $e->getMessage(),'insercion'=>false));	
	}
 ?>