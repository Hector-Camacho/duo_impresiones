<?php 
	include ("includes/sql.php");
	$SQLConexion= new SQL();
	$encriptada1 = crypt("qazwsx");
	try 
	{
		$SQLConexion->beginTransaction();
		$query="INSERT INTO Direccion values('','123123','123','123123','1231231','123123','123123')";
		$registro=$SQLConexion->Insertar($query);
		$ultimo= $SQLConexion->Ultimo();
		
		if($registro)
		{
			echo "Se insert direccion";
			$query="INSERT INTO Empleados values('','Luis Alfonso','Bárcenas','Aguirre','123','123',$ultimo)";
			$registro=$SQLConexion->Insertar($query);
			
			if($registro)
				{
					echo "Se inserto los datos del empleado...";
					$query="INSERT INTO Usuarios values('','admin1','$encriptada1','Administrador',$ultimo)";
					$registro=$SQLConexion->Insertar($query);
					$ultimoempleado= $SQLConexion->Ultimo();
				}
					if($registro)
					{
						echo "Se inserto los datos del login...";
						$query="INSERT INTO Horarios values('','12:12','13:13',$ultimoempleado)";
						$registro=$SQLConexion->Insertar($query);
					}
				// return array('msg' => "Se guardó la información correctamente",'insercion'=>true);
				
				
		}
		else
		{
			$SQLConexion->rollback();
			// return array('msg' => "Ocurrio un error durante el proceso de registro",'insercion'=>false);
		}
	} 
	catch (Exception $e) 
	{

	}

 ?>