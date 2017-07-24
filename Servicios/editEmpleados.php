 <?php 
	include ("../includes/sql.php");
	extract($_POST);
	try 
	{
		$SQLConexion = new SQL();
		
		$query="UPDATE Direccion SET Calle='$_POST[Calle]',
			Colonia='$_POST[Colonia]',
			Numero='$_POST[Numero]',
			CodigoPostal='$_POST[CodigoPostal]',
			ReferenciaUbicacion='$_POST[ReferenciaUbicacion]',
			Localidad='$_POST[Localidad]' 
			WHERE id='$_POST[idDireccion]'";
			
		$registro= $SQLConexion->Insertar($query);
		
		if($registro)
		{
		 	$valor = true;
		}
		else
		{
		 	$valor = false;
		}
		
		
		/*Modificaar Empleado*/
		$query="UPDATE Empleados set Nombre='$Nombre',
					ApPaterno='$ApPaterno',
					ApMaterno='$ApMaterno',
					RFC='$RFC',
					Telefono='$Telefono',
					idDireccion='$idDireccion',
					idSucursal='$idSucursal' WHERE id='$id'";
		$ActualizarEmpleado=$SQLConexion->Insertar($query);
		
		if($registro || $ActualizarEmpleado)
		{
		 	$valor1 = true;
		}
		else
		{
		 	$valor1 = false;
		}
		
		/*Modificaar Usuario*/
		$query="UPDATE Usuarios set NombreUsuario='$NombreUsuario',
					Contrasena='$Contrasena',
					RolUsuario='$RolUsuario',
					idEmpleados='$id' WHERE id='$idEmpleados'";
		$ActualizarEmpleado=$SQLConexion->Insertar($query);
		
		if($registro || $ActualizarEmpleado)
		{
		 	$valor2 = true;
		}
		else
		{
		 	$valor2 = false;
		}
		
		/*Modificaar Horarios*/
		// print_r($HoraComida); 
		$query="UPDATE Horarios set HoraEntrada='$HoraEntrada',
					HoraSalida='$HoraSalida',
					HoraComida='$HoraComida',
					idEmpleados='$id' WHERE id='$id'";
		$ActualizarEmpleado=$SQLConexion->Insertar($query);
		
		if($registro || $ActualizarEmpleado)
		{
		 	$valor3 = true;
		}
		else
		{
		 	$valor3 = false;
		}
		
		if($valor1 || $valor2 || $valor3 || $valor)
		{
			echo json_encode(array('Mensaje'=>"Se modificó la información correctamente", 'Insercion'=>true));
		}
		else
		{
			echo json_encode(array('Mensaje'=>'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','Insercion'=>false));
		}
		
		 $SQLConexion->Desconectar();
	} 
	catch (Exception $e) 
	{
		echo json_encode($e->getMessage());
	}
 ?>