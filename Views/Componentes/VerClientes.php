<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Clientes Registrados</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Clientes</strong> registrados.
                    </p>
                </div>
            </div>
            <div class="table-responsive" id="TablaC">
                <table id="data-table" class="table table-hover table-bordered nowrap" id="TablaCliente" name="TablaCliente" width="100%">
                    <thead>
                        <tr>
                            <th class="ocultar">Identificador cliente</th>
                            <th class="ocultar">Identificador direccion</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido paterno</th>
                            <th>RFC</th>
                            <th>Telefono referencia</th>
                            <th class="ocultar">Email</th>
                            <th class="ocultar">Telefono celular</th>
                            <th class="ocultar">Red Social</th>
                            <th>Clave asignada</th>
                            <th class="ocultar" >Representante</th>
                            <th class="ocultar">Calle</th>
                            <th class="ocultar">Numero</th>
                            <th class="ocultar">Colonia</th>
                            <th class="ocultar">Codigo postal</th>
                            <th class="ocultar">Referencias</th>
                            <th class="ocultar">Localidad</th>
                            <th class="ocultar">Nombre Empresa</th>
                            <th class="ocultar">RFC Empresa</th>
                        </tr>
                    </thead>
                    <tbody id="DatosClientes">
                       
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
<div class="modal fade" id="modal-dialogClientes" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información del Cliente</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form id="FormClientesConsulta" name="FormClientesConsulta" data-parsley-validate="true">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#default-tab-1" data-toggle="tab">Datos personales</a></li>
                            <li class=""><a href="#default-tab-2" data-toggle="tab">Dirección</a></li>
                            <li class=""><a href="#default-tab-3" data-toggle="tab">Contacto directo</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="default-tab-1">
                                <div class="form-group ocultar">
                                    <label>Identificador cliente:</label>
                                    <input type="text" name="identificadorC" class="form-control" readonly>
                                </div>
                                <div class="form-group ocultar">
                                    <label>Identificador direccion:</label>
                                    <input type="text" name="identificadorD" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text" name="Nombre" class="form-control" data-parsley-required="true">
                                </div>
                                  <div class="form-group">
                                    <label>Apellido paterno:</label>
                                    <input type="text" name="apaterno" class="form-control" data-parsley-required="true">
                                </div>
                                  <div class="form-group">
                                    <label>Apellido Materno:</label>
                                    <input type="text" name="amaterno" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="default-tab-2">
                                <div class="form-group">
                                    <label>Calle:</label>
                                    <input type="text" name="Calle" class="form-control" data-parsley-required="true">
                                </div>
                                <div class="form-group">
                                    <label>Colonia:</label>
                                    <input type="text" name="Colonia" class="form-control" data-parsley-required="true">
                                </div>
                                <div class="form-group">
                                    <label>Numero:</label>
                                    <input type="text" name="Numero" class="form-control" data-parsley-required="true">
                                </div>
                                <div class="form-group">
                                    <label>Codigo postal:</label>
                                    <input type="text" name="CP" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Referencia ubicación:</label>
                                    <textarea type="text" name="ReferenciaUbicacion" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Localidad:</label>
                                    <input type="text" name="Localidad" class="form-control" data-parsley-required="true">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="default-tab-3">
                                <div class="form-group">
                                    <label>Telefono de referencia:</label> 
                                    <input type="text" name="TelefonoReferencia" class="form-control" data-parsley-required="true">
                                </div>                            
                                <div class="form-group">
                                    <label>Telefono de celular:</label>
                                    <input type="text" name="TelefonoCelular" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" name="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Red Social:</label>
                                    <input type="text" name="RedSocial" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>RFC Cliente:</label>
                                    <input type="text" name="rfcCliente" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- Fin tab-content -->
                        <br>
                        <!-- Inician botones -->
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4"></label>
                            <button type="submit" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-sm btn-primary" id="ModificarCliente" name="ModificarCliente">Modificar información</button>
                            <button type="submit" class="btn btn-sm btn-danger" id="EliminarCliente" name="EliminarCliente">Eliminar información</button>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script src="assets/jsduo/ConsultaClientes.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">.ocultar{display:none;}</style>
<script src="assets/plugins/masked-input/masked-input.js"></script>
<script>
    $("[name=TelefonoReferencia]").mask("(999) 999-9999")
    $("[name=TelefonoCelular]").mask("(999) 999-9999")
</script>
    