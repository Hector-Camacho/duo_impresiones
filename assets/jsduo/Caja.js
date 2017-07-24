var idPedido,idEncabezado,Debe,Accion,Saldo, cantidad_pago,idPedidoB,idServicio
var ID;
function CargarTabla(Datos) {
  var renglon;
  var id;
   $.each(Datos, function(index, Pedido) {
            idServicio=Pedido.idServicios
            idPedidoB=Pedido.idPedido
            renglon+='<tr class="renglon">\
            <td>'+Pedido.nombre+'</td>\
            <td>'+Pedido.cantidad+'</td>\
            <td class="procesoss">'+Pedido.NombreProceso+'</td>\
            </tr>';
            $("#ServiciosSolicitados").html(renglon);
            ID=Pedido.id
            idEncabezado=Pedido.idEncabezado
          });
}
function MetodosPago(){
  ajaxgeneral("", "Servicios/SelectorMetodosPago.php", "JSON").success(function(respuesta){
      $("[name=MetodosPagos]").empty();
      $.each(respuesta, function(index, Metodo) 
        {
            var seleccts=$('<option value="'+Metodo.idFormasDePago+'">'+Metodo.FormaPago+'</option>');
            $("[name=MetodosPagos]").append(seleccts);
        });
  })
}
function ConsultaTotalPedido (idEncabezado, Folio) {
 ajaxgeneral({idEncabezadoP:idEncabezado,Folio:Folio,  TipoAccion:'SumaTotalPedido'},"Servicios/addCaja.php","JSON").success(function (Saldo) {
   console.log(Saldo);
    
    $("#SumaTotal").empty()
    $("#SumaTotal").append("$ "+ Saldo[0][0].TotalComprado)

    if(Saldo[0][0].CantidadDebe==Saldo[0][0].TotalComprado){
      $("#CantidadDebe").html("$ "+ Saldo[0][0].TotalComprado);
      $("#SaldoDebe").val(Saldo[0][0].TotalComprado)
      $("#Contenido").show()
      $("#NotificacionPagado").hide()
      $("#NotificacionNoExiste").hide()
      $("#Anticipo").show()
      
    }
    else{
      $("#CantidadDebe").html("$ "+Saldo[0][0].CantidadDebe)
      $("#NotificacionPagado").show()
      $("#Anticipo").hide()
    }
  })
}

MetodosPago();
var idEncabezadoCargado
var folio;
function PeticionCargarTabla (Folio) {
   ajaxgeneral({Folio:Folio, TipoAccion:"Status"},"Servicios/addCaja.php","JSON").success(function (Pedido) {    
      console.log(Pedido);
      if(Pedido.length>0){
        $("#NotificacionNoExiste").hide()
        $("#Contenido").show()
        CargarTabla(Pedido)
        idEncabezadoCargado=Pedido[0].Encabezado
        ConsultaTotalPedido(idEncabezadoCargado, folio);
        Accion="ConsultaPedido";
        $("#Contenido").show();
      }
      else{
        $("#NotificacionNoExiste").show()
        $("#NotificacionPagado").hide()
        $("#Contenido").hide()
      }
    });
}
$("#Contenido").hide()
$("#NotificacionPagado").hide()
$("#NotificacionNoExiste").hide()
$("#Buscar").click(function() {
    folio=$("#NumeroPedido").val();
    PeticionCargarTabla(folio);
   
});
$(".botones").click(function () {
  Accion=$(this).val()
  $("#modal-dialogAnticipo").modal('toggle')
  
  $("[name=cantidad_pago]").val("")
})
$("#MensajeCambio").hide()
$("#MensajeDeNORealizado").hide()
$("[name=AceptarPago]").click(function  (Event) {
  Event.preventDefault()
  var Saldo=$("#SaldoDebe").val()
  var CantidadDePago=$("#cantidad_pago").val();
  var ObservacionesDelPago=$("[name=ObservacionesPago]").val()
  var FormaPago=$("select[name=MetodosPagos]").val()
  ajaxgeneral({Saldo:Saldo,CantidadDePago:CantidadDePago,ObservacionesDelPago:ObservacionesDelPago,FormaPago:FormaPago,TipoAccion:Accion,idEncabezadoCargado:idEncabezadoCargado},"Servicios/addCaja.php","JSON").success(function  (RegistroPago) {
    console.log(RegistroPago);
    if(RegistroPago.SaldoInsuficiente){
      $("#MensajeDeNORealizado").show()
      $("#MensajeDeNORealizado").html(RegistroPago.Mensaje)
      
    }
    else{
      if(RegistroPago.Insertar){
        $("#modal-dialogAnticipo").modal('hide');
        alerta(RegistroPago.Insertar,RegistroPago.Mensaje)
        PeticionCargarTabla(folio);
      }
    }
  })
})