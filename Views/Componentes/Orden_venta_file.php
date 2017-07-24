<style type="text/css" media="screen">
  .Referencias {
    display: block;
    padding-left: 15px;
    text-indent: -15px;
  }  
  .bootstrap-datetimepicker-widget.dropdown-menu.picker-open {
    width: 350px;
  }
</style>
<link href="assets/css/style2.css" rel="stylesheet">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-success Terminar" id="InfoRegistroClientes">
            <div class="panel-heading">
                  <h3 class="panel-title">Clientes</h3>
            </div>
            <div class="panel-body">
              
              <form id="ClientesTB" name="ClientesTB" parsley-validate="true">
                <div class="row">
                  <div class="form-group" hidden>
                    <input type="text" name="ClaveCliente" class="form-control FormCliente">
                  </div>
                  <div class="form-group" hidden>
                    <input type="text" name="ClaveEmpleadoLog" class="form-control FormCliente" value="<?php @session_start(); echo $_SESSION['idEmpleados'];?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                      <label>Nombre: </label>
                      <input type="text" name="Nombre" class="form-control FormCliente" data-parsley-required="true" disabled>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                      <label>Correo electronico: </label>
                      <input type="text" name="Email" class="form-control FormCliente" disabled data-parsley-type="email">
                    </div>

                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                      <label>Telefono: </label>
                      <input type="text" name="Telefono" class="form-control FormCliente" data-parsley-required="true" disabled placeholder="(999) 999-9999">
                    </div>
                  </div>
                </div>
                <div class="row" id="BotonesDespuesDeAgregar">
                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                      <a class="btn btn-sm btn-info " data-toggle="modal" href='#BuscarCliente'>Búsqueda de Cliente</a>                            
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                      <button type="button" id="AgregarClienteTemp" class="btn btn-sm btn-info">Registro rápido de Cliente</button>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                         <button type="submit" id="RegClienteTemp" class="btn btn-sm btn-success pull-right btn-block">Iniciar Pedido</button>
                    </div>
                  </div>
              </form>
            </div>
      </div>
  </div>
  
</div>
<!-- Panel que carga las categorias -->
<div class="row ContenedorCategorias">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 Terminar" id="ContenedorCategorias" name="ContenedorCategorias" >
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
      
<!-- Notificaciones -->
<div class="row" id="NotificacionFinalizado">
      <div class="note note-success">
        <div class="row">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">                       
                  <input  name="FechaPromesaEntrega" readonly id="FechaPromesaEntrega" class="form-control" data-parsley-type="number" >
                  <label name="Referencias" class="Referencias"> <center>Fecha promesa de entrega</center>  </label>
                </div>
              </div>
              <div class='col-sm-6'>
                  <div class="form-group" id="datetimepicker">
                    <input type='text' name="FechaPromesaEntrega" id="FechaPromesaEntrega2" class="form-control Fecha" placeholder="Ejemplo de Fecha: 2016-01-01 12:00:00"/>
                     <label name="Referencias" class="Referencias"> <center>Fecha real de entrega</center>  </label>
                  </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="button" id="RegistrarFechas" name="RegistrarFechas" class="btn btn-sm btn-success pull-right btn-block">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <h4>Compra Finalizada</h4>
            <p>
                Su número de folio registrado es
                <span id="NumeroFolio"></span>
            </p>
            <p>
                Tiempo estimado calculado del pedido:
                <span id="Tiempo"></span>
            </p>
            <p>
         <li><a class="btn btn-sm btn-white Vistas"  href="#" name="NuevaOrden">Realizar Nueva Orden</a></li>
        </p>
          </div>
        </div>
      </div>            
  </div>
        <!-- Fin de la notificaion -->
      <!-- Panel de totales -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="ContenedorTotales" >
          <div class="panel panel-success">
            <div class="panel-heading">
                  <h3 class="panel-title">Total</h3>
            </div>
                  <div class="panel-body">
                    <div class="invoice-content">
                      
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-5">
                            <label class="col-md-5 control-label">Nombre del cliente:</label>
                            <div class="col-md-7">
                                <label class="control-label" id="NombreCliente"></label>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <label class="col-md-5 control-label">Fecha de la compra:</label>
                            <div class="col-md-7">
                                <label class="control-label" id="FechaVenta"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <hr>
                      <div class="row">
                        <div class="table-responsive">
                          <table class="table table-invoice table-condensed" name="TablaRegistroPedido" id="TablaRegistroPedido">
                              <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>DESCRIPCION DEL SERVICIO</th>
                                    <th>CANTIDAD</th>
                                    <th>TIEMPO ESTIMADO</th>
                                    <th>PROCESOS</th>
                                    <th>TOTAL PAGAR</th>
                                    <th></th>
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
                      </div>
                      <br>
                      <div class="form-group">
                       <div class="col-md-6">
                          <a class="btn btn-md btn-success btn-block Vistas"  href="#" id="Guardar_PedidoF" name="Guardar_PedidoF">Guardar orden</a></li>
                        </div>
                        <div class="col-md-6">
                          <a class="btn btn-md btn-white btn-block Vistas"  href="#" name="CancelarOrden">Cancelar orden</a></li>
                        </div>
                      </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <!-- Fin del panel de totales -->
      <!-- Modal para eliminar pedido -->
      
<div class="modal fade" id="BorrarPedido">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Eliminar pedido de la lista</h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger m-b-0">
            <h4><i class="fa fa-info-circle"></i> Notificación</h4>
            <p>¿Está seguro de realizar esta acción? No podrá revertirse el cambio</p>
          </div>
          
      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</a>
        <a href="javascript:;" id="EliminarPedido" class="btn btn-sm btn-danger" data-dismiss="modal">Eliminar del pedido</a>
      </div>
    </div>
  </div>
</div>
      <!-- Fin del modal para eliminar pedido -->
      
      <!-- Modal para la buscqueda de los clientes -->
<div class="modal fade" id="BuscarCliente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
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
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Agregar servicio al pedido</h4>
      </div>
      <div class="modal-body">
        <form id="FormOrdenVentaNP" name="FormOrdenVentaNP" data-parsley-validate="true">
          
          <div class="row Perimetro">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                  <label>Cantidad: </label>
                  <input type="text" name="Cantidad" class="form-control Detalle"onkeypress="return soloNumeros(event)" data-parsley-required="true" data-parsley-type="number" >
              </div>
            </div>  
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                  <label>Medida Ancho: </label>
                  <input  step="0.01" min="0" name="Ancho"  id="Ancho" class="form-control Detalle " data-parsley-type="number" >
              </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                  <label>Medida Alto: </label>
                  <input  step="0.01" min="0" name="Alto"  id="Alto" class="form-control Detalle" data-parsley-type="number" >
              </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                  <label>Total en Metros cuadrados: </label>
                  <input type="text" name="Total" class="form-control Detalle" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <label name="TipoEstilo" for="Material">Material que será utilizado:</label>
                  <select class="form-control" name="Material" id="Material" data-parsley-required="true"></select>
              </div>
            </div>
            <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6">
              <div class="form-group">
                <label>Observaciones</label>
                <textarea name="Observaciones" class="form-control Detalle" style="resize: none;"rows="5" resize placeholder="Describa más a detalle las especificaciones dadas por el cliente (Color, Dimensiones, Tipo de letra, etc)."></textarea>
              </div>
            </div>            
          </div>
        
          <div class="row">
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">    
                <label class=" control-label">Archivo a subir:</label>
                    <div id="preview" class="thumbnail">
                        <a href="#" id="file-select" class="btn btn-default">Elegir archivo</a>
                        <img class="img-rounded" id="subirimagen" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzEiIGhlaWdodD0iMTgwIj48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijg1LjUiIHk9IjkwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTcxeDE4MDwvdGV4dD48L3N2Zz4="/>
                    </div>
                    <center>
                      <img class="img-responsive" id="ImagenModal">
                        <span  id="file-info">No hay archivo aún</span>
                        <span  id="file-info2">*Para subir múltiples archivos, sube un archivo comprimido rar o zip.</span> 
                    </center>
              </div>
              <div>
                  <input id="Imagen" name="Imagen" type="file"/>
              </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                <span class="label label-info" id="NotificacionCheck">Selecciona al menos un proceso para poder registrar</span>
                <br>
                 <label>Procesos:</label>
                  <div class="ProcesosCheck" name="ProcesosCheck">
                    
                  </div>
                </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-8">
             
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary" id="AgregarServicioPedido">Agregar al pedido</button>
              </div>
            </div>
          </div>
        </form>
          
      
      
      <div class="modal-footer">
       <p id="notaimagen"></p>
      </div>
    
    </div>
  </div>
</div>
<script>
  $("#Imagen").hide()
  $('#preview').hover(
          function() {
              $(this).find('a').fadeIn();
          }, function() {
              $(this).find('a').fadeOut();
          }
      )
      $('#file-select').on('click', function(e) {
           e.preventDefault();
          
          $('#Imagen').click();
      })

      $('input[type=file]').change(function() {
          var file = (this.files[0].name).toString();
          var reader = new FileReader();
          
          $('#file-info').text('');
          $('#file-info').text(file);
          
           reader.onload = function (e) {
               $('#preview img').attr('src', e.target.result);
         }
           
           reader.readAsDataURL(this.files[0]);
      });
</script>

<script src="assets/jsduo/AgregarPedidoFile.js"></script>
<script src="assets/plugins/masked-input/masked-input.js"></script>

<script>
  $(function () {
    $("[name=Telefono]").mask("(999) 999-9999")
    $("#Fecha").datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      pick12HourFormat: false
    })
    $('.Fecha').mask("9999-99-99 99:99:99");
  })
  console.log($(".picker-switch accordion-toggle").html());
</script>

