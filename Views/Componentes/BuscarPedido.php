<div id="content" class="row">
    <div class="invoice">
        <div class="invoice-company">
           Busqueda de pedidos                    
        </div>        
        <div class="invoice-header">
            
            <div class="row" id="BusquedaFolio">
                <form class="form-horizontal" action="/" method="POST">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-2">
                        <label for="NumeroFolioBuscar">Número de pedido</label>
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
        <div class="invoice-content" id="ResultadoBusqueda">
            <div class="note note-danger">
            <h4>Lo sentimos!</h4>
            <p>
                Parece que el numero de folio que usted esta buscando no existe.<br>
                Favor de verificar validez del folio de pedido. 
            </p>
            </div>
        </div>
        <div class="invoice-content" id="NotificacionPedido">
            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th>Descripción del servicio</th>
                            <th>Status</th>
                            <th>Cantidad</th>
                            <th>Procesos</th>
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
                            <h3>Status:</h3>
                            <div id="SumaTotal"></div>
                        </div>
                    </div>
                </div>
                <div class="invoice-price-right" >
                    <small>Tiempo Estimado para realizar pedido:</small>
                    <h3 id="TiempoEUE" style="color:white;"></h3> 
                    <small  ></small>
                    
                </div>
            </div>
            
            
            
            <br/>
            <br>
        </div>
        <div class="invoice-footer text-muted">
            <p class="text-center m-b-5">
                Duo impresiones.
            </p>
            <p class="text-center">
                <span class="m-r-10"><i class="fa fa-building"></i> Blvd. Constitución #1791 Ote. Torreón Coahuila; México</span>
            </p>
        </div>
    </div>
</div>
<script src="assets/jsduo/BuscarPedido.js"></script>
