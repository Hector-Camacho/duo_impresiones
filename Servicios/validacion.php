<?php
	class Validacion
	{
		
		public function __construct()
		{
		}

		public function Limpia($valor)
		{
			$valor=str_replace("'","",$valor);
			$valor=stripslashes($valor);
			$valor=htmlspecialchars($valor);
			
			return $valor;
		}
				
		public function Redireccion($Rol)
		{
			switch($Rol)
			{
				case "Administrador":
				{
					return "vista.php";
					break;
				}
                case "Gran Formato":
				{
					return "gran_formato.php";
					break;
				}
				case "Diseñador":
				{
					return "vistaDiseno.php";
					break;
				}
				case "Cajero":
				{
					return "vistaCaja.php";
					break;
				}
				case "Ventas":
				{
					return "Ventas.php";
					break;
				}
				case "Acabados":
				{
					return "Acabados.php";
					break;
				}
				case "Offset":
				{
					return "Offset.php";
					break;
				}
				case "Diseño":
				{
					return "vistaDiseno.php";
					break;
				}
			}
		}
		
		public function __destruct()
		{
		}
	}
?>