
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                </div>
                <h4 class="panel-title">Agregar Nueva Surcursal DUO</h4>
            </div>
            <div class="panel-body">
                <form id="SucursalDUO" data-parsley-validate="true">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ClaveSucursal">Clave de la sucursal:*</label>
                                <input type="text" class="form-control" id="ClaveSucursal" name="ClaveSucursal" placeholder="Clave de registro de la sucursal" data-parsley-required="true" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NombreSucursal">Nombre de la Sucursal:*</label>
                                <input type="text" class="form-control" id="NombreSucursal"  name="NombreSucursal" placeholder="Nombre de la sucursal" data-parsley-required="true" required/>
                            </div>
                        </div>       
                    </div>
                    <legend class="pull-left width-full">Dirección</legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="CalleSucursal">Calle:*</label>
                                <input type="text" class="form-control" id="CalleSucursal" name="CalleSucursal"  data-parsley-required="true" required/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="NumeroSucursal">Numero exterior:</label>
                                <input type="text" class="form-control" id="NumeroSucursal" name="NumeroSucursal" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ColoniaSucursal">Colonia:*</label>
                                <input type="text" class="form-control" id="ColoniaSucursal" name="ColoniaSucursal" data-parsley-required="true" required/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="TelefonoSucursal">Telefono:*</label>
                                <input type="text" class="form-control" id="TelefonoSucursal" name="TelefonoSucursal" placeholder="Numero telefónico" data-parsley-required="true" required 0/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="form-control btn btn-success" id="GuardarInformacion"> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script src="assets/plugins/parsley/dist/parsley.js"></script>  -->
<script src="assets/jsduo/AgregarSucursal.js"></script>
<script src="assets/plugins/masked-input/masked-input.js"></script>
<script>
    $("[name=TelefonoSucursal]").mask("(999) 999-9999")
</script>