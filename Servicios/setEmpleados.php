<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	$query=("SELECT * FROM Empleados INNER JOIN Direccion ON Empleados.idDireccion = Direccion.id
	INNER JOIN Horarios ON Empleados.id = Horarios.idEmpleados 
	INNER JOIN SucursalesDuo ON Empleados.idSucursal = SucursalesDuo.idSucursalesDuo 
	INNER JOIN Usuarios ON Empleados.id = Usuarios.idEmpleados");
	echo $JSON->getJson($SQLConexion->Seleccionar($query));
	$SQLConexion->Desconectar();
 ?>