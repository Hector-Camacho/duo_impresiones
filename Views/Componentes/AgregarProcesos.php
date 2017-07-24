<div class="row">
	<div class="col-md-12">
        <div class="panel panel-success" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                </div>
                <h4 class="panel-title">Registro de Procesos</h4>
            </div>
            <div class="panel-body">
                <form id="Procesos" name="Procesos" data-parsley-validate="true">
                    <fieldset>
                        <div class="form-group">
                            <label for="NombreServicio">Nombre de proceso:</label>
                            <input type="text" class="form-control" id="NombreProceso" name="NombreProceso" placeholder="Ingrese el nombre del proceso" data-parsley-required="true" />
                        </div>
                        <div class="form-group">
                            <label for="Tiempo">Tiempo que lleva el proceso (Minutos) :</label>
                            <input type="text" class="form-control" id="TiempoProceso" name="TiempoProceso" onkeypress="return soloNumeros(event)" placeholder="El tiempo del proceso se especifica en minutos..." data-parsley-required="true" data-parsley-type="number" />
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
                            <label for="Tiempo">Persona que lo realiza:</label>
                              <select class="form-control" name="RolRealiza" id="RolRealiza" data-parsley-required="true">
                                <option value="Offset">Offset</option>
                                <option value="Diseño">Diseño</option>
                                <option value="Gran Formato">Gran Formato</option>s
                                <option value="Acabados">Acabados</option> 
                              </select>
                        </div>
                        
                        
                        <div class="row">
                        	<div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="button" class="form-control btn btn-danger" id="CancelarProcesos"> Cancelar</button>
                            </div>
                        	<div class="col-md-4">
                       			<button type="submit" class="form-control btn btn-success" id="GuardarProcesos">Guardar</button>
                        	</div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/jsduo/AgregarProceso.js"></script>