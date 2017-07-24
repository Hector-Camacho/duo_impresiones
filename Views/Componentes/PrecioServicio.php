<div class="row">
	<div class="col-md-12">
        <div class="panel panel-success" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                </div>
                <h4 class="panel-title">Registro de precios por Servicio</h4>
            </div>
            <div class="panel-body">
                
                <form id="PreciosServicios" data-parsley-validate="true">
                    <fieldset>
                        
                        <legend>Precios</legend>
                        
                        <div class="form-group">
                            <label for="Servicio">Seleccione servicio: </label>
                            <select  name="Servicio" class="form-control" data-parsley-required="true">
                                <option>Nombre del Servicio</option>
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Material">Seleccione material: </label>
                            <select  name="Material" class="form-control" data-parsley-required="true">
                            </select>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PrecioServico"> Precio menudeo: </label>
                                    <input step="0.01" min="0" class="form-control" id="PrecioServicio" name="PrecioServicio"  placeholder="Ingrese el precio para este servicio, ejemplo 100.00" data-parsley-required="true" data-parsley-type="number" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PrecioServico"> Precio mayoreo: </label>
                                    <input step="0.01" min="0" class="form-control" id="PrecioServicioMayoreo" name="PrecioServicioMayoreo"  placeholder="Ingrese el precio para este servicio, ejemplo 100.00" data-parsley-required="true" data-parsley-type="number" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Cantidad"> Cantidad minima aplicada al precio Mayorista: </label>
                                    <input type="number" min="1" class="form-control" id="Cantidad" name="Cantidad"  placeholder="Ingrese la cantidad de piezas a la cual aplica el precio Mayorista, en número" data-parsley-required="true" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="DescripcionPrecio"> Descripción del precio: </label>
                            <textarea type="text" class="form-control" id="DescripcionPrecio" name="DescripcionPrecio" ></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="button" class="form-control btn btn-danger" id="CancelarPrecio"> Cancelar</button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="form-control btn btn-success" id="GuardarPrecio"> Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script src="assets/plugins/parsley/dist/parsley.js"></script>  -->
<script src="assets/jsduo/AgregarPrecioServicio.js"></script>
