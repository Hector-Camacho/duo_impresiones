<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Metodos registrados</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Métodos de pago</strong> registrados.
                    </p>
                </div>
            </div>
            <div class="table-responsive" id="TablaM">
                <table id="TableMetodos" name="TableMetodos" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre del Metodo</th>
                        </tr>
                    </thead>
                    <tbody id="DatosMetodos">
                        
                    </tbody>
                </table>
            </div>
           
        </div>
    
    </div>
</div>
<div class="modal fade" id="modal-dialogMeto" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información del Metodo</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="FormularioServicios">
                    <div class="form-group" hidden>
                        <label for="NombreMetodo">Identificador:</label>
                        <input type="text" class="form-control" name="Identificador" id="Identificador" placeholder="Nombre del servicio..." data-parsley-required="true">
                    </div>
                    <div class="form-group">
                        <label for="NombreMetodo">Nombre del Metodo:</label>
                        <input type="text" class="form-control" name="NombreMetodoModal" id="NombreMetodo" placeholder="Nombre del servicio..." data-parsley-required="true">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4"></label>
                        <button class="btn btn-sm btn-white resetServicios" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-sm btn-primary resetServicios" id="ModificarServicio" data-dismiss="modal">Modificar información</button>
                        <button class="btn btn-sm btn-danger resetServicios" id="EliminarServicio" data-dismiss="modal">Eliminar información</button>
                    </div>
                </form>
            </div>
            
            
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script src="assets/jsduo/VerMetodos.js"></script>