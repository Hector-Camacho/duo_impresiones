<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                </div>
                <h4 class="panel-title">Registro de Metodo de banco</h4>
            </div>
            <div class="panel-body">
                <form id="Servicios" data-parsley-validate="true">
                    <fieldset>
                        <div class="form-group">
                            <label for="NombreServicio">Metodo de pagos</label>
                            <input type="text" class="form-control" id="MetodosPagos" name="MetodosPagos" placeholder="Ingrese el nombre del metodo de pago"  data-parsley-required="true"/>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="button" class="form-control btn btn-danger" id="CancelarMetodo"> Cancelar</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="form-control btn btn-success" id="GuardarMetodo"> Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script src="assets/plugins/parsley/dist/parsley.js"></script>  -->
<script src="assets/jsduo/AgregarMetodo.js"></script>