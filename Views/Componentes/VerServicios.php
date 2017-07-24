<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Servicios Registrados</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Servicios</strong> registrados.
                    </p>
                </div>
            </div>
            <div class="table-responsive" id="TablaS">
                <table id="TableServicio" name="TableServicio" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th class="ocultar">Identificador</th>
                            <th>Nombre del servicio</th>
                            <th>Categoria</th>
                            <th>Unidad de venta</th>
                            <th>Estatus del Servicio</th>
                        </tr>
                    </thead>
                    <tbody id="DatosServicios" name="DatosServicios">
                        
                    </tbody>
                </table>
            </div>
           
        </div>
    
    </div>
</div>
<div class="modal fade" id="modal-dialogServ" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información del Servicio</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="FormularioServicios">
                    <div class="row" hidden>
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="IdentificadorServicio">Identificador:</label>
                                <input type="text" class="form-control" name="IdentificadorServicio" id="IdentificadorServicio" placeholder="Id...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <label for="NombreServicio">Nombre del servicio:</label>
                                <input type="text" class="form-control" name="NombreServicioModal" id="NombreServicio" placeholder="Nombre del servicio..." data-parsley-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <label for="CategoriaServicio">Categoria:</label>
                                <input type="text" class="form-control" name="CategoriaServicioModal" id="CategoriaServicio" placeholder="Categoria..." data-parsley-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <label for="UnidadVenta">Unidad de Venta:</label>
                                <select  name="UnidadVentaServicioModal" class="form-control" data-parsley-required="true">
                                    <option value="Piezas">Piezas</option>
                                    <option value="Metros Cuadrados"> Metros Cuadrados</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Para habilitar si se usa o no y esas cosas -->
                        <div class="row">
                            <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <div class="col-md-3">
                                    <label class="control-label">Seleccione el estado de inicio del servicio:</label>    
                                </div>
                                <div class="col-md-9">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" value="Activo"/>
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
                        </div>    
                        </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-xs-7 col-md-7 col-sm-7"></label>
                        <button class="btn btn-sm btn-white resetServicios" type="submit" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-sm btn-primary resetServicios" type="submit" id="ModificarServicio">Modificar información</button>
                    </div>
                </form>
            </div>
            
            
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script src="assets/jsduo/ConsultaServicios.js"></script>