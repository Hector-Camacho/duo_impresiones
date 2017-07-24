<div class="row">
	<div class="col-md-12">
        <div class="panel panel-success" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                </div>
                <h4 class="panel-title">Registro de Materiales</h4>
            </div>
            <div class="panel-body">
                <form id="Materiales" data-parsley-validate="true">
                    <fieldset>
                        <legend>Materiales</legend>
                        <div class="form-group">
                            <label for="NombreMaterial"> Nombre: </label>
                            <input type="text" class="form-control" id="NombreMaterial" name="NombreMaterial" placeholder="Ingrese el nombre del material"data-parsley-required="true" />
                        </div>
                        <div class="form-group">
                            <label for="ServiciosDisponibles">Seleccione servicio en que se emplea: </label>
                            <select  name="ServiciosDisponibles" class="form-control">
                            </select>
                        </div>
                        <div class="row">
                        	<div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="button" class="form-control btn btn-danger" id="CancelarMaterial"> Cancelar</button>
                                
                            </div>
                        	<div class="col-md-4">
                       			<button type="submit" class="form-control btn btn-success" id="GuardarMaterial"> Guardar</button>
                        	</div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script src="assets/plugins/parsley/dist/parsley.js"></script>  -->
<script src="assets/jsduo/AgregarMaterial.js"></script>