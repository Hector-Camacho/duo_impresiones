
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                </div>
                <h4 class="panel-title">Registro de Servicio</h4>
            </div>
            <div class="panel-body">
                <form id="Servicios" data-parsley-validate="true">
                    <fieldset>
                        <div class="form-group">
                            <label for="NombreServicio">Nombre del servicio</label>
                            <input type="text" class="form-control" id="NombreServicio" name="NombreServicio" placeholder="Ingrese el nombre del servicio"  data-parsley-required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="Tiempo">Categoria del Servicio:</label>
                            <input type="text" class="form-control" id="CategoriaServicio" name="CategoriaServicio" placeholder="Ingrese la categoria del servicio" data-parsley-required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="UnidadVenta">Unidad de Venta:</label>
                            <select  name="UnidadVenta" class="form-control">
                                <option value="Piezas">Piezas</option>
                                <option value="Metros Cuadrados"> Metros Cuadrados</option>
                            </select>
                        </div>
                        <!-- Para habilitar si se usa o no y esas cosas -->
                        <div class="form-group">
                            <label class="col-md-2 control-label">Seleccione el estado de inicio del servicio:</label>
                            <div class="col-md-9">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="Activo" checked />
                                        Habilitado para su venta
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="Inactivo" />
                                        Inhabilitado
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="button" class="form-control btn btn-danger" id="CancelarServicio"> Cancelar</button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="form-control btn btn-success" id="GuardarServicio"> Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script src="assets/plugins/parsley/dist/parsley.js"></script>  -->
<script src="assets/jsduo/AgregarServicio.js"></script>