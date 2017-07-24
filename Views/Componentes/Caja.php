<style type="text/css" media="screen">input[type=number]::-webkit-outer-spin-button,input[type=number]::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0; }input[type=number] { -moz-appearance:textfield;}
</style>
<div id="content" class="row">
    <div class="invoice">
        <div class="invoice-company">
            <span class="pull-right hidden-print">
                <!-- <a href="javascript:;" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Exportar a  PDF</a> -->
                <a href="javascript:;" id="Imprimir" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Imprimir</a>                    
            </span>
            Cobro de caja                    
        </div>        
        <div class="invoice-header">
            
            <div class="row" id="BusquedaFolio">
                <form class="form-horizontal" action="/" method="POST">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-2">
                        <label for="NumeroFolioBuscar">N° de FOLIO del pedido</label>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <input type="text" id="NumeroPedido" name="NumeroPedido" class="form-control" placeholder="Ingrese el número de folio del pedido" >
                            <span class="input-group-btn">
                            <button type="button" id="Buscar" name="Buscar" class="btn btn-success" >Aceptar</button>
                            </span>   
                        </div>
                    </div>
                    <div class="form-group col-md-2"></div>
                </form>
            </div>
        </div>
        <div class="row" id="NotificacionPagado">
            <div class="note note-success">
                <h4>Éste pedido está pagado!</h4>
                <p>
                    El pedido solicitado ya ha sido pagado
                    <span id="FechaPagada"></span>
                </p>
            </div>
        </div>
        <div class="row" id="NotificacionNoExiste">
            <div class="note note-danger">
                <h4>Error!</h4>
                <p>
                    Éste número de pedido no existe
                </p>
            </div>
        </div>
        
        <div class="invoice-content" id="Contenido">
            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th>Descripción del servicio</th>
                            <th>Cantidad comprada</th>
                            <th>Procesos del servicio seleccionados</th>
                        </tr>
                    </thead>
                    <tbody id="ServiciosSolicitados">
                    </tbody>
                </table>
            </div>
            <div class="invoice-price">
                <div class="invoice-price-left">
                    <div class="invoice-price-row">
                        <div class="sub-price">
                            <h3>TOTAL COMPRADO</h3>
                            <p id="SumaTotal"> </p>
                        </div>
                    </div>
                </div>
                <div class="invoice-price-right" >
                    <small>Debe:</small>
                    <h1 id="CantidadDebe" style="color:white;"></h1> 
                    <small  ></small>
                    <div>
                        <span class="label label-default" id="MensajeCambio">Cambio $</span>
                    </div>
                    
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button type="submit" id="Anticipo" name="Anticipo" class="btn btn-info btn-block botones" value="Anticipo">Pagar</button>
                </div>
            </div>
            <br>
            
            <br>
        </div>
        <div class="invoice-footer text-muted">
            <p class="text-center m-b-5">
                Gracias por su compra.
            </p>
            <p class="text-center">
                <span class="m-r-10"><i class="fa fa-building"></i> Blvd. Constitución #1791 Ote. Torreón Coahuila; México</span>
            </p>
        </div>
    </div>
</div>

<!-- Modales -->
<div class="modal fade" id="modal-dialogAnticipo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Pago de anticipo</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="FormularioPagoCaja">
                   <div class="form-group">
                        <label for="MetodoPago">Seleccione un metodo de pago:</label>
                        <select name="MetodosPagos" id="MetodosPagos" class="form-control"></select>
                   </div> 
                   <div class="form-group" >
                        <label for="SaldoDebe">Total a pagar:</label>
                        <input type="text" class="form-control" name="SaldoDebe" id="SaldoDebe" placeholder="Total a pagar del pedido" readonly>
                   </div>
                   <div class="form-group">
                        <label for="cantidad_pago">Pago realizado:</label>
                        <input type="number" class="form-control" name="cantidad_pago" id="cantidad_pago" placeholder="Cantidad a pagar" data-parsley-required="true" >
                   </div>
                    <div class="form-group">
                        <label for="ObservacionesPago">Comentarios:</label>
                        <textarea name="ObservacionesPago" class="form-control" style="resize: none;"rows="3" resize></textarea>
                   </div>
                   <br>
                <div class="form-group">
                        <div class="col-md-8">
                            <span class="label label-danger" style="font-size:15px;" id="MensajeDeNORealizado">Cantidad de pago insuficiente.</span>
                            
                        </div>
                        <div class="col-md-4">
                            <button type="submit" id="AceptarPago" name="AceptarPago" class="btn btn-inverse btn-block">Realizar pago</button>
                        </div>
                    </div> 
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>



<script src="assets/jsduo/Caja.js"></script>        