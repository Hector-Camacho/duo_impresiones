<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Sucursales registradas</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Sucursales</strong> registradas.
                    </p>
                </div>
            </div>
            <div class="table-responsive" id="TablaSU">
                <table id="TablaSucursales" name="TablaSucursales" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th class="ocultar">Identificador</th>
                            <th>Clave de la sucursal</th>
                            <th>Nombre de la sucursal</th>
                            <th>Calle</th>
                            <th>Numero</th>
                            <th>Colonia</th>
                            <th>Telefono</th>
                            
                        </tr>
                    </thead>
                    <tbody id="DatosSucursales">
                       
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="modal-Sucursales" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información de la Sucursal</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form" id="FormModificarSucursal" data-parsley-validate="true">
                   <div class="form-group" hidden>
                        <label for="idSucursalesDuo">Identificador:</label>
                        <input type="text" class="form-control" name="idSucursalesDuo" id="idSucursalesDuo" >
                   </div>
                   <div class="form-group">
                        <label for="NombreSucursal">Nombre de la Sucursal:</label>
                        <input type="text" class="form-control" name="NombreSucursal" data-parsley-required="true" id="NombreSucursal" >
                   </div>
                   <div class="form-group">
                        <label for="CalleSucursal">Calle:</label>
                        <input type="text" class="form-control" name="CalleSucursal" data-parsley-required="true" id="CalleSucursal">
                   </div>
                   <div class="form-group">
                        <label for="NumeroSucursal">Numero:</label>
                        <input type="text" class="form-control" name="NumeroSucursal"data-parsley-required="true" id="NumeroSucursal" >
                   </div>
                   <div class="form-group">
                        <label for="ColoniaSucursal">Colonia:</label>
                        <input type="text" class="form-control" name="ColoniaSucursal" data-parsley-required="true" id="ColoniaSucursal">
                   </div>
                   <div class="form-group">
                        <label for="TelefonoSucursal">Telefono:</label>
                        <input type="text" class="form-control" name="TelefonoSucursal" id="TelefonoSucursal" >
                   </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4"></label>
                        <button class="btn btn-sm btn-white resetForm" type="submit" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="ModificarSucursal" class="btn btn-sm btn-primary resetForm" data-dismiss="modal">Modificar información</button>
                        <button class="btn btn-sm btn-danger resetForm" type="submit" id="EliminarSucursal" data-dismiss="modal">Eliminar información</button>
                    </div>
                   
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script src="assets/jsduo/ConsultaSucursales.js"></script>
<script>
    $("[name=TelefonoSucursal]").mask("(999) 999-9999")
</script>