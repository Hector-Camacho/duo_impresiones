
<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Pedidos Finalizados sin Pagar</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Pedidos Finalizados sin pagar</strong>.
                    </p>
                </div>
            </div>
            
            <div class="table-responsive" id="TablaPF">
                <table id="TablaPedidosFinalizados" name="TablaPedidosFinalizados" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th >Folio del pedido</th>
                            <th>Nombre del Cliente</th>
                            <th>Correo Electrónico</th>
                            <th>Número</th>
                            <th>Servicio solicitado</th>
                            <th>Total a pagar</th>
                        </tr>
                    </thead>
                    <tbody id="DatosPedidosFinalizados"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="assets/jsduo/PedidosFinalizados.js"></script>
