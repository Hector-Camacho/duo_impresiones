<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Materiales Registrados</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Materialesz</strong> registrados.
                    </p>
                </div>
            </div>
            <div class="table-responsive" id="TablaMA">
                <table id="data-table" id="TablaMateriales" name="TablaMateriales" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Numero de Identificación</th>
                            <th>Nombre Material</th>
                        </tr>
                    </thead>
                    <tbody id="DatosMateriales" name="DatosMateriales"></tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-MaterialesModificar" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información del material</h4>
            </div>
            <div class="modal-body">
                <form id="MaterialesModificar" data-parsley-validate="true">
                    <div class="form-group ocultar">
                        <label>Id:</label>
                        <input type="text" name="IdentificadorMaterial" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nombre material:</label>
                        <input type="text" name="NombreMaterial" class="form-control" data-parsley-group="wizard-step-1" data-parsley-required="true"  >
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-xs-7 col-md-7 col-sm-7"></label>
                        <button class="btn btn-sm btn-white resetForm" type="submit" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="ModificarMaterial" class="btn btn-sm btn-primary resetForm">Modificar información</button>
                        <!-- <button class="btn btn-sm btn-danger resetForm" type="submit" id="EliminarMaterial" data-dismiss="modal">Eliminar información</button> -->
                    </div> 
                    
                                      
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<script src="assets/jsduo/ConsultaMateriales.js"></script>
<style type="text/css">
    .ocultar{
        display:none;
    }
</style>