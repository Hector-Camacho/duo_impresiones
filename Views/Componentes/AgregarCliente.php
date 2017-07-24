<div class="row">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Registro de clientes</h4>
        </div>
        <div class="panel-body">
            <form action="/" method="POST" data-parsley-validate="true" id="ClientesForm" name="form-wizard">
                <div id="wizard">
                    <ol>
                        <li>
                            Datos personales 
                            <small>Información personal referente al cliente</small>
                        </li>
                        <li>
                            Dirección
                            <small> Información de dirección del cliente</small>
                        </li>
                        <li>
                            Información de contacto
                            <small>Referencias de contacto directo del cliente</small>
                        </li>
                    </ol>
                    <div class="wizard-step-1">
                        <fieldset>
                            <legend class="pull-left width-full">Información personal</legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group block1">
                                        <label>Nombre:</label>
                                        <input type="text" name="nombre"  class="form-control" data-parsley-group="wizard-step-1" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apellido paterno:</label>
                                        <input type="text" name="ApPaterno" class="form-control" data-parsley-group="wizard-step-1" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apellido materno:</label>
                                        <input type="text" name="ApMaterno" class="form-control" data-parsley-group="wizard-step-1" >
                                    </div>
                                </div>
                            </div>
                           
                        </fieldset>
                    </div>
                    <div class="wizard-step-2">
                        <fieldset>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-md-6 control-label">¿Representanta a empresa?</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="RepresentanteEmpresa" class="RepresentanteEmpresa" id="si" value="0" checked="">
                                            No
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="RepresentanteEmpresa" class="RepresentanteEmpresa" id="no" value="1">
                                            Sí
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 Empresas">
                                    <div class="form-group ">
                                        
                                        <button type="button" class="form-control btn btn-primary" id="RegistrarEmpresa">Agregar empresa</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" id="EmpresaAgregada">
                                    <div class="form-group">
                                        <label>Nombre Empresa representada:</label>
                                        <input type="text" name="Empresa" class="form-control" data-parsley-group="wizard-step-2" readonly>
                                    </div>
                                </div>
                            </div>
                            <legend class="pull-left width-full">Dirección</legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Calle:</label>
                                        <input type="text" name="calle" class="form-control" data-parsley-group="wizard-step-2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Número:</label>
                                        <input type="text" name="numero"  class="form-control" data-parsley-group="wizard-step-2" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Colonia:</label>
                                        <input type="text" name="colonia" class="form-control" data-parsley-group="wizard-step-2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Código postal:</label>
                                        <input type="text" name="CodigoPostal" class="form-control" onkeypress="return soloNumeros(event)" data-parsley-group="wizard-step-2" data-parsley-type="number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Referencia de ubicación:</label>
                                        <textarea type="text" style="resize:none" name="referencia" class="form-control" data-parsley-group="wizard-step-2"></textarea>                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Localidad:</label>
                                        <input type="text" name="localidad" class="form-control" data-parsley-group="wizard-step-2">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="wizard-step-3">
                        <fieldset>
                            <legend class="pull-left width-full">Contacto directo</legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <div class="controls">
                                            <input type="text" name="email" placeholder="ejemplo@prueba.com" class="form-control" data-parsley-group="wizard-step-3" data-parsley-type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <div class="controls">
                                            <input type="text" name="TelefonoReferencia" placeholder="Número telefonico de referencia" class="form-control" data-parsley-group="wizard-step-3" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Teléfono celular:</label>
                                        <div class="controls">
                                            <input type="text" name="telefonocelular" placeholder="Número de celular, segunda referencia" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Red social:</label>
                                        <input type="text" name="RedSocial" class="form-control" data-parsley-group="wizard-step-3" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group block1">
                                        <label>RFC:</label>
                                        <input type="text" name="rfcCliente" placeholder="RFC del cliente"  class="form-control" data-parsley-group="wizard-step-3" required="">
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
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal para registrar la empresa en caso de que el cliente sea representante de empresa(8 -->
<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Registro de empresa</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="NombreEmpresaCliente">Nombre empresa:</label>
                            <div class="col-md-9">
                                <input type="text" id="NombreEmpresaCliente" name="NombreEmpresaCliente" class="form-control" placeholder="Nombre de la empresa a la que representa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="RFCempresa">RFC empresa:</label>
                            <div class="col-md-9">
                                <input type="text" id="RFCempresa" name="RFCempresa" class="form-control" placeholder="RFC de la empresa a la que representa">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white"  data-dismiss="modal">Cerrar</a>
                <a href="javascript:;" class="btn btn-sm btn-success" id="GuardarInfoEmpresa">Aceptar</a>
            </div>
        </div>
    </div>
</div>
<script src="assets/jsduo/formCliente.js" ></script>
<script src="assets/plugins/masked-input/masked-input.js"></script>
<script>
    $("[name=TelefonoReferencia]").mask("(999) 999-9999")
    $("[name=telefonocelular]").mask("(999) 999-9999")
    $('[name=rfcCliente]').mask('aaaa999999***');
    $("[name=RFCempresa]").mask('aaaa999999***')
    
</script>