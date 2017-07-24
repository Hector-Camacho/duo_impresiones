  <link href="assets/plugins/gritter/css/jquery.css" rel="stylesheet">
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <div class="panel panel-success">
                  <div class="panel-heading">
                        <h3 class="panel-title">Cliente</h3>
                  </div>
                  <div class="panel-body">
                    
                    <form id="ClientesTB" name="ClientesTB" parsley-validate="true">
                      <div class="form-group" hidden>
                          <input type="text" name="ClaveCliente" class="form-control FormCliente">
                      </div>
                      
                      <div class="form-group" hidden>
                      
                        <input type="text" name="ClaveEmpleadoLog" class="form-control FormCliente" value="<?php session_start(); echo $_SESSION['Id']; ?>">
                        
                      </div>
                      <div class="form-group">
                          <label>Nombre: </label>
                          <input type="text" name="Nombre" class="form-control FormCliente" data-parsley-required="true" disabled>
                      </div>
                      <div class="form-group">
                          <label>Correo electronico: </label>
                          <input type="text" name="Email" class="form-control FormCliente" disabled>
                      </div>
                      <div class="form-group">
                          <label>Telefono: </label>
                          <input type="text" name="Telefono" class="form-control FormCliente" data-parsley-required="true" disabled>
                      </div>
                      <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <a class="btn btn-sm btn-info" data-toggle="modal" href='#BuscarCliente'>Buscar cliente</a>
                            <button type="button" id="AgregarClienteTemp" class="btn btn-sm btn-info">cliente temporal</button>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                               <button type="submit" id="RegClienteTemp" class="btn btn-sm btn-success pull-right">Iniciar Pedido</button>
                          </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="ContenedorTotales" >
          <div class="panel panel-success">
            <div class="panel-heading">
                  <h3 class="panel-title">Total</h3>
            </div>
                  <div class="panel-body">
                    <div class="invoice-content">
                      <div class="table-responsive">
                          <table class="table table-invoice table-condensed" name="TablaRegistroPedido" id="TablaRegistroPedido">
                              <thead>
                                  <tr>
                                      <th>DESCRIPCION DEL SERVICIO</th>
                                      <th>CANTIDAD</th>
                                      <th>TOTAL</th>
                                  </tr>
                              </thead>
                              <tbody id="ContenidoRegistroPedido">
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                     
                                  </tr>
                                  <tr>
                                      
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="invoice-price">
                              <div class="invoice-price-right" id="MuestraTotal">
                                  <small>TOTAL</small> <p id="valorapagar"></p>
                              </div>
                      </div>
                      <br>
                      <button class="btn btn-large btn-block btn-sm btn-success" id="Guardar_Pedido" name="Guardar_Pedido">Guardar pedido</button>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <!-- Panel que carga las categorias -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="ContenedorCategorias" >
          <div class="panel panel-success">
                <div class="panel-heading">
                      <h3 class="panel-title">Categorias</h3>
                </div>
                <div id="ContenedorServicios" class="panel-body">
                </div>
          </div>
        </div>
      </div>
      <!-- Fin del panel que carga las categorias -->
      <!-- Modal para la buscqueda de los clientes -->
      <div class="modal fade" id="BuscarCliente">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Listado de clientes</h4>
            </div>
            <div class="modal-body">
                <table id="BusquedaCliente" class="table table-hover table-condensed table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre </th>
                      <th>Codigo </th>
                      <th hidden>Email</th>
                      <th hidden>Telefono</th>
                    </tr>
                  </thead>
                  <tbody id="DatosBusquedaCliente">
                    
                  </tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-sm btn-primary" id="SeleccionarCliente">Seleccionar cliente</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin del modal para la busqueda de los clientes -->
            <div class="modal fade" id="modal-idServicioPedido">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Agregar servicio al pedido</h4>
                  </div>
                  <div class="modal-body">
                    <form id="FormOrdenVentaNP" name="FormOrdenVentaNP" data-parsley-validate="true">
                      <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label name="TipoEstilo" for="Material">Material:</label>
                              <select class="form-control" name="Material" id="Material" data-parsley-required="true"></select>
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group">
                              <label>Cantidad: </label>
                              <input type="text" name="Cantidad" class="form-control " data-parsley-required="true" data-parsley-type="number" >
                          </div>
                        </div>                  
                      </div>
                      <div class="row Perimetro">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                          <div class="form-group">
                              <label>Ancho: </label>
                              <input type="text" name="Ancho" id="Ancho" class="form-control " data-parsley-type="number" >
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                          <div class="form-group">
                              <label>Alto: </label>
                              <input type="text" name="Alto" id="Alto" class="form-control" data-parsley-type="number" >
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                          <div class="form-group">
                              <label>Total: </label>
                              <input type="text" name="Total" class="form-control" disabled>
                          </div>
                        </div>
                      </div>
                    
                      <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label>Observaciones</label>
                            <textarea name="Observaciones" class="form-control" style="resize: none;"rows="3" resize></textarea>
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                           <div class="form-group">
                             <label>Procesos:</label>
                              <div class="ProcesosCheck" name="ProcesosCheck">
                                
                              </div>
                            </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-7">
                          
                        </div>
                        <div class="col-md-5">
                          <button type="submit" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-sm btn-primary" id="AgregarServicioPedido">Agregar al pedido</button>
                        </div>
                      </div>
                    </form>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button> -->
                    <!-- <button type="button" class="btn btn-sm btn-primary" id="AgregarServicioPedido">Agregar al pedido</button> -->
                  </div>
                
                </div>
                
                
                
              </div>
            </div>
<!-- <script src="assets/plugins/parsley/dist/parsley.js"></script>
<script src="assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
<script src="assets/jsduo/validacionrempleado.js"></script>
<script src="assets/plugins/DataTables/js/jquery.js"></script>
<script src="assets/plugins/DataTables/scripts/dataTables.js"></script>
<script src="assets/plugins/DataTables/scripts/jquery.dataTables.js"></script>
<script src="assets/plugins/DataTables/scripts/dataTables.bootstrap.js"></script>
<script src="assets/plugins/DataTables/scripts/dataTables.responsive.js"></script>
<script src="assets/plugins/DataTables/scripts/dataTables.tableTools.min.js"></script>
<script src="assets/js/table-manage-default.demo.js"></script>
<script src="assets/plugins/parsley/dist/parsley.js"></script>  -->
<script src="assets/jsduo/AgregarPedido.js"></script>
<!--<script src="assets/jsduo/ConsultaPedidos.js"></script>-->