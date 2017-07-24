 <?php 
	include ("../includes/sql.php");
	extract($_POST);
	try {
		$SQLConexion= new SQL();
		$query="UPDATE Direccion SET Calle='$_POST[Calle]',
			Colonia= '$_POST[Colonia]',
			Numero= '$_POST[Numero]',
			CodigoPostal= '$_POST[CodigoPostal]',
			ReferenciaUbicacion= '$_POST[ReferenciaUbicacion]',
			Localidad= '$_POST[Localidad]' 
			WHERE id= '$_POST[idD]'; ";
		$registro= $SQLConexion->Insertar($query);
		/*Modificaar cliente*/
		$query="UPDATE Clientes set Nombre='$Nombre',
					ApellidoPaterno='$ApellidoPaterno',
					ApellidoMaterno='$ApellidoMaterno',
					RFC='$RFC',
					TelefonoReferencia='$TelefonoReferencia',
					Email='$Email',
					TelefonoCelular='$TelefonoCelular',
					RedesSociales='$RedSocial' WHERE idClientes='$idC' ";
		$ActualizarCliente=$SQLConexion->Insertar($query);
		if($registro || $ActualizarCliente){
		 	echo json_encode(array('msg' => 'Se modificó la información correctamente','insercion'=>true));
		}
		else{
		 	echo json_encode(array('msg' => 'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','insercion'=>false));
		}
		 $SQLConexion->Desconectar();
	} 
	catch (Exception $e) {
		echo json_encode($e->getMessage());
	}
 ?>