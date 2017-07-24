<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Pedidos pendientes<strong>  Gran Formato</strong> </h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-info">
                    <h4>Sin Pendientes</h4>
                    <p>
                        Hasta el momento no hay pedidos pendientes Asignados.
                    </p>
                </div>
            </div>
            <div class="table-responsive" id="tab">
                <table id="data-table" class="table table-hover table-bordered nowrap" id="TablaGranFormato" width="100%" name="TablaGranFormato">
                    <thead>
                        <tr>
                            <th>Folio pedido</th>
                            <th>Fecha de Asignación</th>
                            <th>Procesos</th>
                            <th>Cantidad solicitada</th>
                            <th>Material</th>
                            <th>Nombre del servicio</th>
                            <th>Medidas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="DatosGranFormato">
                       
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

<!-- Modal para verificar -->
<div class="modal fade" id="ChangeStatus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Terminar pedido</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-info m-b-0">
              <h4><i class="fa fa-info-circle"></i> Notificación</h4>
              <p>¿Está seguro de terminar este servicio del Pedido? No podrá revertirse el cambio</p>
            </div>
        </div>
        <div class="modal-footer">
          <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</a>
          <a href="javascript:;" id="Cambiar" class="btn btn-sm btn-primary" data-dismiss="modal">FINALIZAR</a>
        </div>
      </div>
    </div>
  </div>
<script src="assets/jsduo/ConultaGranFormato.js" type="text/javascript" charset="utf-8"></script>

<style type="text/css">
    .ocultar{
        display:none;
    }
</style>

    