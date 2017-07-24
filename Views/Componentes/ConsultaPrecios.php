<div class="row">
	<div class="panel panel-success" data-sortable-id="table-basic-2">
		<div class="panel-heading">
			<div class="panel-heading-btn"></div>
			<h4 class="panel-title">Precios Registrados</h4>
		</div>
		<div class="panel-body">
			<div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay Precios de servicios registrados.
                    </p>
                </div>
            </div>
			
			<div class="table-responsive" id="TablaSP">
				<table id="TableServPrecio" class="table table-hover table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th class="ocultar">Identificador</th>
							<th>Servicio</th>
							<th>Material</th>
							<th>Precio Menudeo</th>
							<th>Precio Mayoreo</th>
							<th>Descripción</th>
						</tr>
					</thead>
					<tbody id="DatosPrecioServicios"></tbody>
				</table>
			</div> 
		</div>
	</div>
</div>

<div class="modal fade" id="modal-dialogPrecioServ" data-backdrop="static" data-keyboard="false" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"> Información del Servicio</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" data-parsley-validate="true" name="FormularioPrecioServicios">
					<div class="form-group" hidden>
						<label for="IdentificadorServicio">Identificador:</label>
						<input readonly type="text" class="form-control" name="IdentificadorPrecioServicio" id="IdentificadorPrecioServicio" placeholder="Id...">
					</div>
					<div class="form-group">
						<label for="NombreServicio">Nombre del servicio:</label>
						<input readonly type="text" class="form-control" name="NombrePrecioServicio" id="NombrePrecioServicio" placeholder="Nombre del servicio..." data-parsley-required="true">
					</div>
					<div class="form-group">
						<label for="Precio">Precio Menudeo:</label>
						<input type="text" step="any" min="0" class="form-control" name="PrecioServicio" id="PrecioServicio" placeholder="Precio del servicio..." data-parsley-required="true" data-parsley-type="number">
					</div>
					<div class="form-group">
						<label for="Precio">Precio Mayoreo:</label>
						<input type="text" step="any" min="0" class="form-control" name="PrecioServicioMayoreo" id="PrecioServicioMayoreo" placeholder="Precio del servicio..." data-parsley-required="true" data-parsley-type="number">
					</div>
					<div class="form-group">
						<label for="Descripcion">Descripcion:</label>
						<textarea type="text" class="form-control" name="DescripcionServicio" id="DescripcionServicio" placeholder="Descripcion del Servicio..." style="resize:none;" rows="3" data-parsley-required="true"></textarea>
					</div>
					<br>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4"></label>
						<button class="btn btn-sm btn-white resetForm" type="submit" data-dismiss="modal">Cerrar</button>
						<button id="ModificarPrecioServicio" class="btn btn-sm btn-primary resetForm" data-dismiss="modal">Modificar información</button>
						<button class="btn btn-sm btn-danger resetForm" id="EliminarPrecioServicio" data-dismiss="modal">Eliminar información</button>
					</div>
				</form>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<!-- <script src="assets/plugins/parsley/dist/parsley.js"></script> -->
<script src="assets/jsduo/ConsultaPrecioServicios.js"></script>
