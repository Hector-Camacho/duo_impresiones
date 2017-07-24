<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Pedidos por realizar</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive" id="Tabla">
                <table id="TablaPedidosRealizar" name="TablaPedidosRealizar" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Folio del pedido</th>
                            <th>Servicio</th>
                            <th>Datos del cliente</th>
                            <th class="ocultar">Correo</th>
                            <th class="ocultar">Telefono</th>
                            <th>Fecha de compra</th>
                            <th class="ocultar">idS</th>
                            <th class="ocultar">idE</th>
                        </tr>
                    </thead>
                    <tbody id="DatosPedidosRealizar"></tbody>
                </table>
            </div>
            
            <div class="row" id="NotificacionSinPedidosPendientes">
                <div class="note note-info">
                    <h4>Sin Pendientes</h4>
                    <p>
                        Hasta el momento no hay pedidos pendientes por asignar.
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="modal-dialogProc" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información del Pedido </h4>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="NombreCliente"><span>Nombre del Cliente:</span></label>
                                <label class="control-label"><strong id="NombreCliente" name="NombreCliente"></strong></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="CorreoCliente"><span>Correo electrónico:</span></label>
                                <label class="control-label"><strong id="CorreoCliente" name="CorreoCliente"></strong></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="TelefonoCliente"><span>Teléfono del Cliente:</span></label>
                                <label class="control-label" ><strong id="TelefonoCliente" name="TelefonoCliente"></strong></label>
                            </div>
                            <legend>Proceso inicial</legend>
                            <div class="invoice-content" >
                                <div class="note note-success">
                                <h4><i class="fa fa-check fa-1x"></i><span  id="Proceso"></span></h4>
                                <p>
                                    Sera el primer proceso al cual se sometera este servicio<br>
                                    Por favor verifica que los datos del pedido sean correctos <br>
                                    antes de asignarlo a uno de sus trabajadores. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <fieldset>
                                    <legend>Detalles del pedido</legend>
                                    <div class="form-group">
                                        <span>Fecha de venta:</span> <label class="control-label"><strong id="Fechav"></strong> </label>
                                    </div>
                                    <div class="form-group">
                                        <span>Nombre del Servicio:</span> <label class="control-label"><strong id="NomSer"></strong> </label>
                                    </div>
                                    <div class="form-group Medidas">
                                        <span>Medidas:</span> <strong id="MedidasFormat"></strong>
                                    </div>
                                        
                                    <div class="form-group">
                                        <span>Material utilizado:</span> <label class="control-label"><strong id="MatUtilizado"></strong> </label>
                                    </div>
                                        
                                    <div class="form-group">
                                        <span>Cantidad:</span> <label class="control-label"><strong id="CantidadPedido"></strong> </label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                   
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <br>
                            <hr>
                            <div clas="form-group">
                                <label for="Observaciones">Observaciones del pedido</label>
                                <textarea type="text" id="Observaciones" style="resize:none" name="Observaciones" rows="4" class="form-control col-xs-4 col-sm-4 col-md-4 col-lg-4" placeholder="Observaciones del pedido"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 Asignacion" id="Asignacion">
                            <fieldset>
                                <legend>Asignación de pedido</legend>
                                <div class="form-group">
                                    <label for="Empleados">Empleado que iniciará pedido:</label>
                                    <select name="Empleados" class="form-control"></select>
                                </div>

                                <div class="form-group">
                                    <button type="button" id="AsignarPedido" class="btn btn-sm btn-success btn-block col-xs-6 col-sm-6 col-md-6 col-lg-6" data-dismiss="modal-dialogProc">Asignar</button>
                                    <p id="IdPedidoAsignar" hidden></p>
                                </div>
                            </fieldset> 

                            
                        </div>
                        
                    </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<script src="assets/jsduo/ConsultaPedidosRealizar.js"></script>