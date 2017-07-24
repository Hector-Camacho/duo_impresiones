<?php
session_start();
if($_SESSION['Rol']=='Administrador') {
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>DUO Impresiones | Flujo de trabajo</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link rel="shortcut icon" href="favicon.png" type="image/png">
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.css" rel="stylesheet">
	<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme">
	<link href="assets/blind/fonts/glyphicons-halflings-regular.svg">
	<style>.class{height:20px;}.navbar-brand>img{display:inline;} .ocultar{display:none;}  .bwizard-steps.clearfix.clickable{padding-left: 0px!important;} .table-responsive {min-height: .01%;overflow-x: hidden;}</style>
	<style>
	.bootstrap-datetimepicker-widget.dropdown-menu.picker-open.top {
    	width: 350px;
  	}
	</style>
	<!-- ================== END BASE CSS STYLE ================== -->
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
    <link href="assets/css/toastr.min.css" rel="stylesheet">
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<link rel="stylesheet" href="assets/build/css/bootstrap-datetimepicker.min.css">
	
	<script src="assets/plugins/pace/pace.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" class="navbar-brand"><img height="95%" src="../assets/img/duologo.png"> Impresiones</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="assets/img/user-13.jpg" alt=""> 
							<span class="hidden-xs"><?php echo $_SESSION['Nombre']; ?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;" class="start-tour">Tour de ayuda</a></li>
							<li class="divider"></li>
							<li><a href="Servicios/logout.php">Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div id="sidebar" class="sidebar">
			<div data-scrollbar="true" data-height="100%">
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="assets/img/user-13.jpg" alt=""></a>
						</div>
						<div class="info">
							<?php echo $_SESSION['Nombre']; ?>
							<small><?php echo $_SESSION['Rol']?></small>
						</div>
					</li>
				</ul>
				<ul class="nav">
					<li class="nav-header"><span>CATALOGOS</span></li>
					<!--Clientes-->
					<li class="has-sub menu">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-slideshare"></i>
						    <span>Clientes</span>
					    </a>
						<ul class="sub-menu">
						    <li ><a class="Vistas" href="AgregarCliente.php">Agregar Cliente</a></li>
						    <li ><a class="Vistas" href="VerClientes.php">Consulta de Clientes</a></li>
						</uL>
						<!--Servicios-->
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-edit "></i>
						    <span>Servicios</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="AgregarServicio.php">Agregar Servicio</a></li>
							<li><a class="Vistas" href="VerServicios.php">Consulta de Servicios</a></li>
							
						</ul>
					</li>
					
					<li class="has-sub">
						<a href="charinicio.php" class="Vistas" id="timeline_apedido">
						    <i href="VistaAcabados.php" class="fa fa-scissors"></i>
						    <span>Graficos</span> 
						</a>
					</li>
					
					
					<!--Materiales-->
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-files-o"></i>
						    <span>Materiales</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="AgregarMateriales.php">Agregar Material</a></li>
							<li><a class="Vistas" href="VerMateriales.php">Consulta de Materiales</a></li>
						</ul>
					</li>
					<!--Precios-->
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-dollar"></i>
						    <span>Precios</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="PrecioServicio.php">Agregar precios</a></li>
							<li><a class="Vistas" href="ConsultaPrecios.php">Consulta de precios</a></li>
							
						</ul>
					</li>

					<!--Empresas-->
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-briefcase"></i>
						    <span>Empresas</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="VerEmpresas.php">Consultar empresas</a></li>
						</ul>
					</li>
					<!--Empelados-->
					<li class="has-sub menu">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-users"></i>
						    <span>Empleados</span>
					    </a>
						<ul class="sub-menu">
						    <li><a class="Vistas" href="panel_rempleado.php">Agregar Empleado</a></li>
						    <li ><a class="Vistas" href="VerEmpleados.php">Consulta de Empleados</a></li>
						</ul>
					</li>
					<!--Procesos-->
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-tasks"></i>
						    <span>Procesos</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="AgregarProcesos.php">Agregar Proceso</a></li>
							<li><a class="Vistas" href="VerProcesos.php">Consulta de Procesos</a></li>
						</ul>
					</li>
					<!--Configuraciones-->
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-gears"></i>
						    <span>Configuraciones</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="AgregarConfiguracion.php">Agregar Configuración</a></li>
							<li><a class="Vistas" href="VerConfiguraciones.php">Consulta de Configuraciones</a></li>
						</ul>
					</li>
					
					<!--Sucursales-->
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-building-o"></i>
						    <span>Sucursales</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="AgregarSucursal.php">Agregar Sucursal DUO</a></li>
							<li><a class="Vistas" href="VerSucursales.php">Consulta de Sucursales DUO</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-university "></i>
						    <span>Bancos</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="AgregarBanco.php">Agregar Banco</a></li>
							<li><a class="Vistas" href="VerBancos.php">Consulta de Bancos</a></li>	
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-credit-card"></i>
						    <span>Metodos de pago</span> 
						</a>
						<ul class="sub-menu">
							<li><a class="Vistas" href="AgregarMetodo.php">Agregar Método de pago</a></li>
							<li><a class="Vistas" href="VerMetodos.php">Consulta de Métodos de pago</a></li>
						</ul>
					</li>
					<li class="nav-header"><span>VENTAS</span></li>
					<li class="has-sub">
						<a href="Orden_venta_file.php" class="Vistas" id="OrdenVenta">
							<i class="fa fa-calculator"></i> 
							<span id="OrdenVenta">Realizar venta</span>
						</a>
					</li>
					<li class="has-sub">
						<a href="BuscarPedido.php" class="Vistas" id="BuscarPedido">
							<i class="fa fa-search"></i> 
							<span id="OrdenVenta">Busqueda de pedido</span>
						</a>
					</li>
					<li class="has-sub">
						<a href="timeline_apedido.php" class="Vistas" id="timeline_apedido">
							<i class="fa fa-share"></i> 
							<span id="OrdenVenta">Seguimiento de orden</span>
						</a>
					</li>
					<li class="nav-header"><span>GRAN FORMATO</span></li>
					<li class="has-sub">
						<a href="Ordenes_GranFormato.php" class="Vistas" id="timeline_apedido">
							<i class="fa fa-file-image-o"></i> 
							<span id="OrdenVenta">Gran formato</span>
						</a>
					</li>

					<li class="has-sub">
						<a href="Ordenes_GranFormato.php" class="Vistas" id="timeline_apedido">
						    <i href="VistaAcabados.php" class="fa fa-scissors"></i>
						    <span>Acabados</span> 
						</a>
					</li>
					<li class="nav-header"><span>PEDIDOS POR REALIZAR</span></li>
					<li class="has-sub">
						<a href="ConsultaPedidosRealizar.php" class="Vistas" id="timeline_apedido">
							<i class="fa fa-file-image-o"></i> 
							<span >Pedidos pendientes</span>
						</a>
					</li>
					
					<li class="nav-header"><span>OFFSET</span></li>
					<li><a href="javascript:;" class="sidebar-minify-btn menu" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="sidebar-bg"></div>
		<div id="content" class="content">
		
			<h1 class="page-header">Bienvenido! <small><?php echo $_SESSION['Nombre']?></small></h1>
			<div id="Contenedor">
				
			</div>
			
		</div>
	</div>
	<script type="text/javascript">
	</script>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/build/jquery.min.js" ></script>
	<script src="assets/plugins/jquery/jquery-1.9.1.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.js"></script>
	
	
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	
	<link rel="stylesheet" type="text/css" href="assets/jsValidatorB/bootstrapValidator.min.css">
	<script src="assets/jsValidatorB/bootstrapValidator.min.js"></script> 
	<script src="assets/build/js/moment.js" type="text/javascript"></script>
	<script src="assets/build/js/bootstrap-datetimepicker.min.js" ></script>
	
	<script src="assets/plugins/parsley/dist/parsley.js"></script>
	<script src="assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
	<script src="assets/js/form-wizards-validation.demo.js"></script>
	<script src="assets/plugins/parsley/dist/parsley.js"></script>
	<script src="assets/js/toastr.min.js"></script>
	<script src="assets/js/apps.js"></script>
	<script src="assets/js/tour.js"></script>
	<script src="assets/jsduo/jscript.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js"></script>
	<script src="assets/js/char.js"></script>
	<!--<script src="assets/char/chart.js"></script>-->
	
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script src="assets/plugins/DataTables/js/jquery.js"></script>
	<script src="assets/plugins/DataTables/scripts/dataTables.js"></script>
	<script src="assets/plugins/DataTables/scripts/jquery.dataTables.js"></script>
	<script src="assets/plugins/DataTables/scripts/dataTables.bootstrap.js"></script>
	<script src="assets/plugins/DataTables/scripts/dataTables.responsive.js"></script>
	<script src="assets/plugins/DataTables/scripts/dataTables.tableTools.min.js"></script>
	<script src="assets/js/table-manage-default.demo.js"></script>
	
	
	<script>
		 $(document).ready(function() {
			App.init();
			// FormPlugins.init();
		 });
	</script>
	
</body>
</html>

<?php 
}
else {
	session_destroy();
	header("Location:../Servicios/logout.php");
}
?>
