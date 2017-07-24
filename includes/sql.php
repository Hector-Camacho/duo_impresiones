<?php
include("cofiguracion.php");
Class SQL
	{
		private $PDOLocal=Null;
		
		public function __construct()
		{
			$this->PDOLocal=new PDO(
				'mysql:host='.Parametros::Host.
				';port='.Parametros::Port.
				';dbname='.Parametros::DBName,
				Parametros::User,
				Parametros::Password,
				array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
				);
		}
		public function Desconectar()
		{
			$this->PDOLocal=NULL;
		}
		public function Insertar($Query)
		{
			return $this->PDOLocal->exec($Query);
		}
		
		public function Actualizar($Query)
		{
			return $this->Insertar($Query);
		}
		
		public function Eliminar($Query)
		{
			return $this->Insertar($Query);
		}		
		public function Seleccionar($Query)
		{
			$Select=$this->PDOLocal->query($Query);
			$Datos=array();
			while($renglon = $Select->fetch(PDO::FETCH_ASSOC))
			{
				$Datos[]=$renglon;
			}
			return $Datos;
		}
		/*Para las transacciones*/
		public function beginTransaction()
		{
			mysql_query("BEGIN");
		}
		public function commit(){
		    mysql_query("COMMIT");
		}
		public function Ultimo()
		{
			return $this->PDOLocal->lastInsertId();
		}
		public function SeleccionarUno($query)
		{
			return $this->PDOLocal->exec($query);
		}
		
		public function Existe($Query)
		{
			$Selected=$this->PDOLocal->query($Query);
			return $Selected->fetchColumn();
		}
		
		
	}
	
?>