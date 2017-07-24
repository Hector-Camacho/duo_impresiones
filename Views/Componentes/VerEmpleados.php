<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Empleados Registrados</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Empleados</strong> registrados.
                    </p>
                </div>
            </div>
            
            <div class="table-responsive" id="TablaE">
                <table id="data-table" class="table table-hover table-bordered nowrap" name="TablaEmpleado" width="100%">
                    <thead>
                        <tr>
                            <th class="ocultar">N°</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>RFC</th>
                            <th>Telefono del empleado</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Horario entrada</th>
                            <th>Horario salida</th>
                            <th>Sucursal</th>
                        </tr>
                    </thead>
                    <tbody id="DatosEmpleados">
                       
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

<div class="modal fade" id="modal-dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información del Empleado</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#default-tab-1" data-toggle="tab">Datos personales</a></li>
                            <li class=""><a href="#default-tab-2" data-toggle="tab">Dirección</a></li>
                            <li class=""><a href="#default-tab-3" data-toggle="tab">Login</a></li>
                            <li class=""><a href="#default-tab-4" data-toggle="tab">Horarios</a></li>
                        </ul>
                        <div class="tab-content">    
                            <div class="tab-pane fade active in" id="default-tab-1">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre*</label>
                                        <input type="text" name="nombre" data-parsley-required="true" class="form-control" id="nombre" placeholder="Nombre"   />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="app">Apellido Paterno* </label>
                                        <input type="text" name="app" id="app" placeholder="Apellido Paterno" class="form-control" data-parsley-required="true" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="apm">Apellido Materno </label>
                                        <input type="text" name="apm" id="apm" placeholder="Apellido Materno" class="form-control" />
                                    </div>
                                </div>
                                
                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="rfc">RFC* </label>
                                        <input type="text" name="rfc" id="rfc" placeholder="RFC*" class="form-control" data-parsley-required="true" />
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="telefono">Telefono </label>
                                        <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control" />
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="tab-pane fade" id="default-tab-2">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="calle">Calle*</label>
                                        <input type="text" name="calle" id="calle" placeholder="Calle" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="colonia">Colonia*</label>
                                        <input type="text" name="colonia" id="colonia" placeholder="Colonia" class="form-control"  required />
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="numero">Numero</label>
                                        <input type="text" name="numero" id="numero" placeholder="Numero" class="form-control" />
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="codigopostal">Codigo Postal</label>
                                        <input type="text" name="codigopostal" id="codigopostal" placeholder="Codigo postal" class="form-control"  />
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="referenciaubicacion">Referencia de Ubicacion</label>
                                        <input type="text" name="referenciaubicacion" id="referenciaubicacion" placeholder="Referencia de Ubicacion" class="form-control" />
                                    </div>
                                </div> 
                                
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="localidad">Localidad*</label>
                                        <input type="text" name="localidad" id="localidad" placeholder="Localidad" class="form-control"  required />
                                    </div>
                                </div>
                            </div> 
                            <div class="tab-pane fade" id="default-tab-3">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombreusuario">Nombre de usuario*</label>
                                        <div class="controls">
                                            <input type="text" id="nombreusuario" name="nombreusuario" placeholder="Nombre de usuario" class="form-control" data-parsley-remote="http://url.ext" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contrasena">Contraseña*</label>
                                        <div class="controls">
                                            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password2">Confirmar Contraseña*</label>
                                        <div class="controls">
                                            <input type="password" id="password2" name="password2" placeholder="Confirmar Contraseña" class="form-control" data-parsley-equalto="#contrasena" required/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="rolusuario">Rol del usuario*</label>
                                        <div class="form-group">
                                                <select name="rolusuario" id="rolusuario" class="form-control">
                                                    <option value="">Seleccione un rol</option>
                                                    <option value="Ventas">Ventas</option>
                                                    <option value="Cajero">Cajero</option>
                                                    <option value="Gran Formato">Gran Formato</option>
                                                    <option value="Acabado">Acabado</option>
                                                    <option value="Offset">Offset</option>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="default-tab-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="horaentrada">Horario de entrada*</label>
                                        <div class="controls">
                                            <input type="time" id="horaentrada" name="horaentrada" placeholder="Horario de entrada" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="horariosalida">Horario de salida*</label>
                                        <div class="controls">
                                            <input type="time" id="horariosalida" name="horasalida" placeholder="Horario de salida" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="horaComida">Horario de comida*</label>
                                        <div class="controls">
                                            <input type="time" id="horaComida" name="horaComida" placeholder="Horario de Comida" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="SucursalDuo">Seleccione sucursal*</label>
                                        <select  name="SucursalDuo" class="form-control" required>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="form-group">
                            <p><b>Nota:</b> Los campos marcados con un <b>*</b> son obligatorios.</p>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-xs-7 col-md-7 col-sm-7"></label>
                            <button class="btn btn-sm btn-white resetF" type="submit" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="ModificarEmpleado" class="btn btn-sm btn-primary resetF">Modificar información</button>
                            <!-- <button class="btn btn-sm btn-danger resetF" type="submit" id="EliminarEmpleado" data-dismiss="modal">Eliminar información</button> -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>


<script src="assets/jsduo/Consultarempleados.js" type="text/javascript"></script>
<style type="text/css">.ocultar{display:none;}</style>
<script src="assets/plugins/masked-input/masked-input.js"></script>
<script>
    $("[name=telefono]").mask("(999) 999-9999")
</script>