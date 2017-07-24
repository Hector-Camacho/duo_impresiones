<div class="row">
	<div class="col-md-12">
        <div class="panel panel-success" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                </div>
                <h4 class="panel-title">Registro de Configuraciones</h4>
            </div>
            <div class="panel-body">
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" data-parsley-validate="true" name="FormConfiguracion">
                        <div class="form-group">
                            <label for="NombreConfiguracion">Nombre de configuracion:</label>
                            <input type="text" class="form-control" id="NombreConfiguracion" name="NombreConfiguracion" placeholder="Ingrese el nombre del Configuracion" data-parsley-required="true" />
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Tiempo">Tiempo que lleva la configuracion (Minutos):</label>
                            <input type="text" class="form-control" id="Tiempo" onkeypress="return soloNumeros(event)" name="TiempoConfiguracion" placeholder="Tiempo en minutos..." data-parsley-required="true" data-parsley-type="number" />
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Tiempo">Servicios:</label>
                              <select class="form-control" name="ServiciosConfiguraciones"id="Servicios">
                                
                              </select>
                        </div>
                        <br>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="button" class="form-control btn btn-danger" id="CancelarConfiguracion"> Cancelar</button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="form-control btn btn-success" id="GuardarConfiguraciones"> Guardar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="assets/plugins/parsley/dist/parsley.js"></script> -->
<script src="assets/jsduo/AgregarConfiguraciones.js"></script>