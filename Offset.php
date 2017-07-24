<?php
    session_start();
    // Offset
    if($_SESSION['Rol']=='Offset')
{
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>DUO Impresiones | Offset</title>
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
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.css" rel="stylesheet">
	<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
	<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet">
    <link href="assets/plugins/gritter/css/jquery.css" rel="stylesheet">
    <link href="assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
	<style>.class{height:20px;}.navbar-brand>img{display:inline;} .ocultar{display:none;}  .bwizard-steps.clearfix.clickable{padding-left: 0px!important;} .table-responsive {min-height: .01%;overflow-x: hidden;}</style>
    
    <link href="assets/css/toastr.min.css" rel="stylesheet">
    <link href="assets/css/tour.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
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
							<li><a href="javascript:;">Configuracion de cuenta</a></li>
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
							<span class="hidden-xs"><?php echo $_SESSION['Nombre']; ?></span> <b class="caret"></b>
							<small><?php echo $_SESSION['Rol']; ?></small>
						</div>
					</li>
				</ul>
				<ul class="nav">
					<li class="has-sub">
						<a href="#" class="Vistas" id="Caja">
							<i class="fa fa-tags"></i> 
							<span id="Caja">Offset</span>
						</a>
					</li>					
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="sidebar-bg"></div>
		<div id="content" class="content">
		
			<h1 class="page-header">DUO Impresiones <small>Inicio de la aplicacion ...</small></h1>
			<div class="row">
			    <div class="panel panel-success" data-sortable-id="table-basic-2">
			        <div class="panel-heading">
			            <div class="panel-heading-btn">
			            </div>
			            <h4 class="panel-title">Nuevos Pedidos</h4>
			        </div>
			        <div class="panel-body">
			        	<div class="row" id="Noti">
			                <div class="note note-info">
			                    <h4>Sin Pendientes</h4>
			                    <p>
			                        Hasta el momento no hay pedidos pendientes Asignados.
			                    </p>
			                </div>
			            </div>
			            <div class="table-responsive" id="Tabla">
			                <table id="data-table" class="table table-hover table-bordered nowrap" name="TablaOffset" width="100%">
			                    <thead>
			                        <tr>
			                            <th>Folio</th>
			                            <th>Fecha de Asignación</th>
			                            <th>Procesos</th>
			                            <th>Cantidad solicitada</th>
			                            <th>Material</th>
			                            <th>Nombre del servicio</th>
			                            <th>Medidas</th>
			                            <th hidden>Imagen</th>
			                            <th>Acciones</th>
			                        </tr>
			                    </thead>
			                    <tbody id="DatosPedidoOffset">
			                    </tbody>
			                </table>
			            </div>
			            <div class="row">
					        <div class="col-md-8">                          
					        </div>
					    </div>
			        </div>
			    </div>
			</div>
			<!-- Modal para verificar el cambio -->
			<div class="modal fade" id="ChangeStatus">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title">Terminar pedido</h4>
			        </div>
			        <div class="modal-body">
			            <div class="alert alert-info m-b-0">
			              <h4><i class="fa fa-info-circle"></i> Notificación</h4>
			              <p>¿Está seguro de terminar este servicio del Pedido? No podrá revertirse el cambio</p>
			            </div>
			        </div>
			        <div class="modal-footer">
			          <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</a>
			          <a href="javascript:;" id="Finalizar" name="Finalizar" class="btn btn-sm btn-primary" data-dismiss="modal">FINALIZAR</a>
			        </div>
			      </div>
			    </div>
			  </div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="imagen-modal">
		<div class="modal-dialog">
			<div class="panel panel-success">
				  <div class="panel-heading">
						<h3 class="panel-title NombreImagenAlv"></h3>
				  </div>
				  <div class="modal-content">
				    <div class="panel-body">
						
					<div class="modal-body">
					    <center><img class="img-responsive" alt="No se encontro imagen..." id="ImagenModal"></center>
					</div>
					<a type="button" class="btn btn-sm btn-inverse BotonDescarga" download>Descargar<i class="fa fa-download"></i></a>
								    
					</div>
				  </div>
			</div>
		</div>
	</div>
	<!-- End modal -->
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.js"></script>
	
	
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/parsley/dist/parsley.js"></script>
	<script src="assets/js/toastr.min.js"></script>
	<script src="assets/js/apps.js"></script>
	<script src="assets/js/tour.js"></script>
	<script src="assets/jsduo/jscript.js"></script>
	<script src="assets/plugins/DataTables/js/jquery.js"></script>
	<script src="assets/plugins/DataTables/scripts/dataTables.js"></script>
	<script src="assets/plugins/DataTables/scripts/jquery.dataTables.js"></script>
	<script src="assets/plugins/DataTables/scripts/dataTables.bootstrap.js"></script>
	<script src="assets/plugins/DataTables/scripts/dataTables.responsive.js"></script>
	<script src="assets/plugins/DataTables/scripts/dataTables.tableTools.min.js"></script>
	<script src="assets/js/table-manage-default.demo.js"></script>
	<script src="assets/jsduo/ConsultaOffset.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		 $(document).ready(function() {
			App.init();

		 });
	</script>
	
</body>
</html>

<?php 
}
    else
    {
        session_destroy();
        header("Location:../Servicios/logout.php");
    }
?>
