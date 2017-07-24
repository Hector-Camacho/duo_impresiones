
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-heading-btn">

                </div>
                <h4 class="panel-title">Registro del empleado</h4>
            </div>
            <div class="panel-body">
                <form action="/" method="POST" data-parsley-validate="true" id="EmpleadoForm" name="form-wizard">
                    <div id="wizard">
                        <ol>
                            <li>
                                Registro del empleado. 
                                <small>Informacion personal del empleado.</small>
                            </li>
                            <li>
                                Direccion
                                <small>Direccion del empleado.</small>
                            </li>
                            <li>
                                Login
                                <small>Registra el usuatio y contraseña del empleado.</small>
                            </li>
                            <li>
                                Horario
                                <small>Registra el horario del nuevo empleado.</small>
                            </li>
                            <li>
                                Proceso completado
                                <small>Finaliza el registro de un nuevo empleado.</small>
                            </li>
                        </ol>
                        <div class="wizard-step-1">
                            <fieldset>
                                <legend class="pull-left width-full">Registro del empleado</legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group block1">
                                            <label for="nombre">Nombre* </label>
                                            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" data-parsley-group="wizard-step-1" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="app">Apellido Paterno* </label>
                                            <input type="text" name="app" id="app" placeholder="Apellido Paterno" class="form-control" data-parsley-group="wizard-step-1" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="apm">Apellido Materno </label>
                                            <input type="text" name="apm" id="apm" placeholder="Apellido Materno" class="form-control" data-parsley-group="wizard-step-1" />
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="rfc">RFC* </label>
                                            <input type="text" name="rfc" id="rfc" placeholder="RFC*" class="form-control" data-parsley-group="wizard-step-1" required />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telefono">Telefono </label>
                                            <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control" data-parsley-group="wizard-step-1"/>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="wizard-step-2">
                            <fieldset>
                                <legend class="pull-left width-full">Direccion</legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="calle">Calle*</label>
                                            <input type="text" name="calle" id="calle" placeholder="Calle" class="form-control" data-parsley-group="wizard-step-2" required />
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="numero">Numero</label>
                                            <input type="text" name="numero" id="numero" placeholder="Numero" class="form-control" data-parsley-group="wizard-step-2" data-parsley-type="number" />
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="colonia">Colonia*</label>
                                            <input type="text" name="colonia" id="colonia" placeholder="Colonia" class="form-control" data-parsley-group="wizard-step-2"  required />
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="referenciaubicacion">Referencia de Ubicacion</label>
                                            <input type="text" name="referenciaubicacion" id="referenciaubicacion" placeholder="Referencia de Ubicacion" class="form-control" data-parsley-group="wizard-step-2" />
                                        </div>
                                    </div> 
                                    
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="localidad">Localidad*</label>
                                            <input type="text" name="localidad" id="localidad" placeholder="Localidad" class="form-control" data-parsley-group="wizard-step-2"  required />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="codigopostal">Codigo Postal</label>
                                            <input type="text" name="codigopostal" id="codigopostal" placeholder="Codigo postal" class="form-control" data-parsley-group="wizard-step-2" data-parsley-type="number"  />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    
                                    
                                </div>
                            </fieldset>
                        </div>
                        <div class="wizard-step-3">
                            <fieldset>
                                <legend class="pull-left width-full">Login</legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombreusuario">Nombre de usuario*</label>
                                            <div class="controls">
                                                <input type="text" id="nombreusuario" name="nombreusuario" placeholder="Nombre de usuario" class="form-control" data-parsley-group="wizard-step-3"  required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contrasena">Contraseña*</label>
                                            <div class="controls">
                                                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" class="form-control" data-parsley-group="wizard-step-3" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password2">Confirmar Contraseña*</label>
                                            <div class="controls">
                                                <input type="password" id="password2" name="password2" placeholder="Confirmar Contraseña" class="form-control" data-parsley-group="wizard-step-3" data-parsley-equalto="#contrasena"/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="rolusuario">Rol del usuario*</label>
                                            <div class="controls">
                                                <select name="rolusuario" id="rolusuario" class="form-control">
                                                    <option value="">Seleccione un rol</option>
                                                    <option value="Diseño">Diseño</option>
                                                    <option value="Ventas">Ventas</option>
                                                    <option value="Cajero">Cajero</option>
                                                    <option value="Gran Formato">Gran Formato</option>
                                                    <option value="Acabados">Acabados</option>
                                                    <option value="Offset">Offset</option>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="wizard-step-4">
                            <fieldset>
                                <legend class="pull-left width-full">Horarios</legend>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="horaentrada">Horario de entrada*</label>
                                            <div class="controls">
                                                <input type="time" id="horaentrada" name="horaentrada" placeholder="Horario de entrada" class="form-control" data-parsley-group="wizard-step-4" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="horariosalida">Horario de salida*</label>
                                            <div class="controls">
                                                <input type="time" id="horariosalida" name="horasalida" placeholder="Horario de salida" class="form-control" data-parsley-group="wizard-step-4" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="horadecomida">Hora de comida*</label>
                                            <div class="controls">
                                                <input type="time" id="horadecomida" name="horadecomida" placeholder="Hora de comida" class="form-control" data-parsley-group="wizard-step-4" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="SucursalDuo">Seleccione sucursal*</label>
                                        <select  name="SucursalDuo" class="form-control" required>
                                        </select>
                                    </div>
                                </div>  
                            </fieldset>
                        </div>
                        <div>
                            <div class="jumbotron m-b-0 text-center">
                                <h1>Guardar informacion</h1>
                                <p></p>
                                <p><a class="btn btn-success btn-lg" role="button" id="guardar_empleado" name="guardar_empleado">Guardar empleado</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/jsduo/validacionrempleado.js"></script> 
<script src="assets/jsduo/rempleado.js"></script> 
<script src="assets/plugins/masked-input/masked-input.js"></script>
 <script>
 FormWizardValidation.init();
    $("[name=telefono]").mask("(999) 999-9999")
    $('[name=rfc]').mask('aaaa999999***');
 
 </script>
