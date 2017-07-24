var datasource= new Array()
var TablaPedidosFinalizados=$("[name=TablaPedidosFinalizados]")
$("#Noti").hide()
function CargarTabla(Datos) 
{
  if(Datos.length>0){
    $("#Noti").hide()
    $("#TablaPF").show()
    var renglon;
    datasource=Datos;
    var NombreCliente="", Correo="",Telefono="", Fecha=""
    $.each(Datos, function(index, Pedido) {
              if(Pedido.NombreClienteP===null && Pedido.CorreoP===null && Pedido.TelefonoP==null)
              {
                NombreCliente=Pedido.NombreClienteT
                Correo=Pedido.CorreoT
                Telefono=Pedido.TelefonoT
              }
              else if(Pedido.NombreClienteT===null && Pedido.CorreoT===null && Pedido.TelefonoT==null)
              {
                NombreCliente=Pedido.NombreClienteP 
                Correo=Pedido.CorreoP
                Telefono=Pedido.TelefonoP
              }
              renglon+='<tr class="renglon" href="#modal-dialogProc" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
              <td class="FolioPedido">'+Pedido.FolioPedido+'</td>\
              <td class="NombreCliente">'+NombreCliente+'</td>\
              <td class="CorreoCliente ocultar">'+Correo+'</td>\
              <td class="TelefonoCliente ocultar">'+Telefono+'</td>\
              <td class="FolioPedido">'+Pedido.Nombre+'</td>\
              <td class="TotalPagarServicio">'+Pedido.TotalPagarServicio+'</td>\
              </tr>';
              $("#DatosPedidosFinalizados").html(renglon);
    });
    TablaPedidosFinalizados.dataTable();
    NombreCliente="", Correo="",Telefono=""
  }
  else{
    $("#Noti").show()
    $("#TablaPF").hide()
    
  }
}
function cargardatos()
{
  ajaxgeneral("","Servicios/setPedidosFinalizados.php","JSON").success(function(respuesta)
  {
    if(respuesta)
    {
        CargarTabla(respuesta);
    }
    else
    {
      	alert("Hubo un error");
    }
  });
}
cargardatos()