 <?php  
	include ("../includes/sql.php");
	extract($_POST);
	$SQLConexion= new SQL();
	/*Porbablemente cambie esto*/
	function GenerarCodigoCliente()
	{
		$llave="";
		$patron="1234567890";
		$maximo=strlen($patron)-1;
		for($i=0;$i < 10;$i++) $llave .= $patron{mt_rand(0,$maximo)};
		return $llave;
	}
	// Falta Validar que no se repita
	$ClaveCliente= GenerarCodigoCliente();
	/*Para comprobar si es representante de una empresa, contiene el booleano*/
	$Representante=$_POST['RepresentanteEmpresa'];
	try {
		$SQLConexion->beginTransaction();
		$query="INSERT INTO direccion values('',
			'$_POST[Calle]',
			'$_POST[Colonia]',
			'$_POST[Numero]',
			'$_POST[CodigoPostal]',
			'$_POST[ReferenciaUbicacion]',
			'$_POST[Localidad]')";
		$registro=$SQLConexion->Insertar($query);
		$ultimo= $SQLConexion->Ultimo();
		if($registro)
		{
			
			$query="INSERT INTO clientes VALUES('',
				'$_POST[Nombre]',
				'$_POST[ApellidoPaterno]',
				'$_POST[ApellidoMaterno]',
				'$_POST[RFC]',
				'$_POST[TelefonoReferencia]',
				'$_POST[Email]',
				'$_POST[TelefonoCelular]',
				'$ultimo',
				'$_POST[RedSocial]',
				'$ClaveCliente',
				'$_POST[RepresentanteEmpresa]')";
			$cliente= $SQLConexion->Insertar($query);
			$UltimoCliente=$SQLConexion->Ultimo();
			if($cliente){
				
				
				if($Representante==="0"){
				
					// $SQLConexion->commit();
					echo json_encode(array('msg' => "Se registro la información correctamente",'insercion'=>true,'ClaveClienteNuevo'=>$ClaveCliente)) ;
				}
				else{
					
					$query="INSERT INTO empresas VALUES('',
						'$_POST[NombreNuevaEmpresa]',
						'$_POST[RFCempresa]',
						'$UltimoCliente')";
 					$Empresa= $SQLConexion->Insertar($query);
 					if($Empresa){
 						
 						// $SQLConexion->commit();
						echo json_encode(array('msg' => "Se registró la información correctamente",'insercion'=>true)) ;
						// ,'ClaveClienteNuevo'=>$ClaveCliente
 					}
				}
			}
			else{
			
			}			
		}
		else{
			$SQLConexion->rollback();
			echo json_encode(array('msg' => 'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','insercion'=>false)) ;
		}
		$SQLConexion->Desconectar();
	} 
	catch (Exception $e) {
		echo json_encode($e->getMessage());
	}
 ?>