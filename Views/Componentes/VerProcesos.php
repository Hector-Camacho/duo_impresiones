
<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Procesos Registrados</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Procesos</strong> registrados.
                    </p>
                </div>
            </div>
            
            <div class="table-responsive" id="TablaP">
                <table id="TablaProcesos" name="TablaProcesos" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th class="ocultar">Identificador</th>
                            <th>Nombre del Proceso</th>
                            <th>Nombre del Servicio al que pertenece</th>
                            <th>Tiempo en Minutos</th>
                            <th>Departamento que lo realiza</th>
                        </tr>
                    </thead>
                    <tbody id="DatosProcesos"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-dialogProc" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información del Proceso</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST"  id="FormVerProcesos" data-parsley-validate="true">
                   <div class="form-group" hidden>
                        <label for="NombreProceso">Identificador:</label>
                        <input type="text" class="form-control" name="IdentificadorProceso" id="IdentificadorProceso" placeholder="Id..." >
                   </div>
                    <div class="form-group" hidden>
                        <label for="NombreProceso">Identificador:</label>
                        <input type="text" class="form-control" name="idProcesoServicios" id="idProcesoServicios" placeholder="Id..." >
                   </div>
                   <div class="form-group">
                        <label for="NombreProceso">Nombre del proceso:</label>
                        <input type="text" class="form-control" name="NombreProcesoModal" id="NombreProceso" placeholder="Nombre del Proceso..." data-parsley-required="true">
                   </div>
                   <div class="form-group">
                        <label for="TiempoProceso">Tiempo que se lleva el proceso (Minutos):</label>
                        <input type="text" class="form-control" name="TiempoProcesoModal" onkeypress="return soloNumeros(event)" id="TiempoProceso" placeholder="Tiempo..."data-parsley-required="true" data-parsley-type="number">
                   </div>
                   
                   
                   <div class="form-group">
                            <label for="Tiempo">Servicio:</label>
                              <select class="form-control" name="ServiciosProcesos" id="ServiciosProcesos" data-parsley-required="true"></select>
                        </div>
                        
                    <div class="form-group">
                        <label for="Tiempo">Nivel de prioridad:</label>
                          <select class="form-control" name="NivelPrioridad" id="NivelPrioridad" data-parsley-required="true">
                            <option value="1">Primer proceso</option>
                            <option value="2">Segundo proceso</option>
                            <option value="3">Tercer proceso</option>
                            <option value="4">Cuarto proceso</option> 
                            <option value="5">Quinto proceso</option> 
                            <option value="6">Sexto proceso</option> 
                            <option value="7">Septimo proceso</option>   
                          </select>
                    </div>
                   
                   <div class="form-group">
                        <label for="Tiempo">Departamento que lo realiza:</label>
                        <select class="form-control" name="RolRealiza" id="RolRealiza" data-parsley-required="true">
                           <option value="Offset">Offset</option>
                           <option value="Diseñador">Diseño</option>
                           <option value="Gran Formato">Gran Formato</option>s
                           <option value="Acabados">Acabados</option> 
                        </select>
                    </div>
                   <br>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4"></label>
                        <button class="btn btn-sm btn-white resetForm" type="submit" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="ModificarProceso" class="btn btn-sm btn-primary resetForm">Modificar información</button>
                        <button class="btn btn-sm btn-danger resetForm" type="submit" id="EliminarProceso" data-dismiss="modal">Eliminar información</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

<script src="assets/jsduo/ConsultaProcesos.js"></script>
