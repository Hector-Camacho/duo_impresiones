<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Empleados Registrados</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data-table" class="table table-hover table-bordered nowrap" name="TablaEmpleado" width="100%">
                    <thead>
                        <tr>
                            <th class="ocultar">N°</th>
                            <!-- <th>Nombre</th> -->
                            <th>ADescripcion</th>
                            <th>Fecha</th>
                            <th>Estado del pedido</th>
                        </tr>
                    </thead>
                    <tbody id="DatosPedidos">
                       
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
<div class="modal fade" id="modal-dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Gran Formato</h4>
            </div>
            <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Estado del proceso</label>
                        
                            <select class="form-control"id="selectorestado" name="selectorestado">
                                <option value="Finalizado">Finalizado</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Error">Error</option>
                            </select>
                       
                    </div>
                    <div class="form-group">
                        <label for="Observaciones">Observaciones</label>
                        <textarea type="text" class="form-control" id="Observaciones" name="Observaciones" placeholder="Ingresa una obsercavión sobre lo que estas realizando." data-parsley-required="true" ></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                <a href="javascript:;" class="btn btn-sm btn-success" id="ModificarGranFormato" data-dismiss="modal">Editar Información</a>
            </div>
        </div>
    </div>
</div>



<!-- <script src="assets/plugins/DataTables/js/jquery.js"></script>
<script src="assets/plugins/DataTables/scripts/dataTables.js"></script>
<script src="assets/plugins/DataTables/scripts/jquery.dataTables.js"></script>
<script src="assets/plugins/DataTables/scripts/dataTables.bootstrap.js"></script>
<script src="assets/plugins/DataTables/scripts/dataTables.responsive.js"></script>
<script src="assets/plugins/DataTables/scripts/dataTables.tableTools.min.js"></script>
<script src="assets/js/table-manage-default.demo.js"></script>
<script src="assets/plugins/parsley/dist/parsley.js"></script>  -->
<style type="text/css">
    .ocultar{
        display:none;
    }
</style>