<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Configuraciones Registradas</h4>
        </div>
        <div class="panel-body">
            
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Configuraciones de Servicios</strong> registradas.
                    </p>
                </div>
            </div>
            
            <div class="table-responsive" id="TablaC">
                <table id="TablaConfiguraciones" name="TablaConfiguraciones" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th class="ocultar">Identificador</th>
                            <th>Nombre de la configuracion</th>
                            <th>Servicio al que pertenece</th>
                            <th>Tiempo (Minutos) </th>
                        </tr>
                    </thead>
                    <tbody id="DatosConfiguraciones">
                        
                    </tbody>
                </table>
            </div>
           
        </div>
    
    </div>
</div>
<div class="modal fade" id="modal-dialogConf" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información del Configuraciones</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="FormularioConfiguraciones">
                    <div class="form-group" hidden>
                        <label for="NombreConfiguraciones">Identificador:</label>
                        <input type="text" class="form-control" name="IdentificadorConfiguraciones" id="IdentificadorConfiguraciones" placeholder="Id...">
                   </div>
                   <div class="form-group">
                        <label for="NombreConfiguraciones">Nombre de la configuracion:</label>
                        <input type="text" class="form-control" name="NombreConfiguracionesModal" id="NombreConfiguraciones" placeholder="Nombre de la configuracion..." data-parsley-required="true">
                   </div>
                    <div class="form-group">
                        <label for="NombreConfiguraciones">Servicio al que pertenece:</label>
                        <select class="form-control" name="ServiciosConfiguraciones"id="Servicios"></select>
                   </div>
                   
                   <div class="form-group">
                        <label for="TiempoConfiguraciones">Tiempo (Minutos):</label>
                        <input type="text" class="form-control" onkeypress="return soloNumeros(event)" name="TiempoConfiguracionesModal" id="TiempoConfiguraciones" placeholder="Tiempo en minutos..." data-parsley-required="true" data-parsley-type="number">
                   </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4"></label>
                        <button class="btn btn-sm btn-white resetForm" type="submit" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="ModificarConfiguraciones" class="btn btn-sm btn-primary resetForm">Modificar información</button>
                        <button class="btn btn-sm btn-danger resetForm" type="submit" id="EliminarConfiguraciones" data-dismiss="modal">Eliminar información</button>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <!-- <a href="javascript:;" class="btn btn-sm btn-white"  data-dismiss="modal">Cerrar</a>
                <a href="javascript:;" class="btn btn-sm btn-primary" id="ModificarConfiguraciones" data-dismiss="modal">Modificar información</a>
                <a href="javascript:;" class="btn btn-sm btn-danger" id="EliminarConfiguraciones" data-dismiss="modal">Eliminar información</a> -->
            </div>
        </div>
    </div>
</div>

<script src="assets/jsduo/ConsultaConfiguraciones.js"></script>