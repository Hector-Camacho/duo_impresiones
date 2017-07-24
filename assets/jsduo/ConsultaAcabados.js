var TablaPedidoAcabados=$("[name=TablaAcabados]")
var contRenglones=0
$("#Noti").hide()
function CargarTabla(Datos) 
{
  if(Datos.length>0)
  {
    $("#Noti").hide()
    $("#tab").show()
    var renglon;
    datasource=Datos;
    $.each(Datos, function(index, Pedido) {
      var idEncabezado="",idServicio="";
        idServicio=Pedido.idServicios;
        idEncabezado=Pedido.idPedido
        renglon+='<tr class="renglon" data-toggle="tooltip" title="Información del pedido">\
                  <td class="Folio">'+Pedido.Folio+'</td>\
                  <td class="Fecha">'+Pedido.FechaDeAsignacion+'</td>\
                  <td class="procesos">'+Pedido.NombreProceso+'</td>\
                  <td class="Cantidad">'+Pedido.Cantidad+'</td>\
                  <td class="NombreMaterial">'+Pedido.Nombre+'</td>\
                  <td class="NombreServicio">'+Pedido.NombreServicio+'</td>\
                  <td class="Medidas">'+Pedido.Medidas+'</td>\
                  <td class="Imagen" hidden>'+Pedido.Imagen+'</td>\
                  <td class="status"><a href="'+Pedido.IdPrioServPed+'" value="'+idServicio+'" class="btn btn-xs btn-success" id="CambiarStatus"  data-dismiss="modal" title="Finalizar pedido!"><i class="fa fa-check-square-o"></i></a>\
                  </tr>';
        $("#DatosPedidosAcabados").html(renglon);
            });
            TablaPedidoAcabados.dataTable();
  }
  else{
    $("#Noti").show()
    $("#tab").hide()
  }
}
var enca=0, serv=0, c,cadena1,c1
function ConcatenarProcesos (idServicio, idEncabezado,contRenglones) {
	c=""
	if(enca!=idEncabezado){
	  cadena1=""
	  enca=idEncabezado
	  serv=idServicio
	  ajaxgeneral({idSer:serv,idE:enca,Accion:"ConsultaProcesoServicio"},"Servicios/editAcabadosPedidos.php","json").success(function  (Procesos) {
	      if(Procesos.length>0){
	        cadena1=""
	        $.each(Procesos,function(index,Proceso) {
	          cadena1 = Proceso.NombreProceso + "," + cadena1;
	          $(".procesoss"+contRenglones).html(cadena1)
	          c=cadena1
	        })
	      }
	      else{
	        $.each(Procesos,function(index,Proceso) {
	          cadena1 = Proceso.NombreProceso + "," + cadena1;
	          $(".procesoss"+contRenglones).html(cadena1)
	          c=cadena1
	        })
	      }
	  })
	  return c
	}
	else{
	  cadena1=""
	  c=cadena1
	  return c;
	}
	cadena1=""
}
function cargardatos()
{
  NombreUsuario=$("#NombreUsuario").html()
  ajaxgeneral({Accion:"ConsultaGeneral",NombreUsuario:NombreUsuario},"Servicios/editAcabadosPedidos.php","JSON").success(function(respuesta)
  {
    if(respuesta) {
        CargarTabla(respuesta);
    }
    else {
      	alert("Hubo un error");
    }
  });
}
cargardatos()
$("#DatosPedidosAcabados").on("click","#CambiarStatus",function(evt)
{
  evt.preventDefault();
  idPrioridadServicio=$(this).attr('href')
  idServicio=$(this).attr('value')
  $("#ChangeStatus").modal('show')
});
$("#Cambiar").click(function(evt){
  evt.preventDefault();
  console.log(idPrioridadServicio)  ;
  console.log(idServicio);

  ajaxgeneral({Accion:"CambiarStatusPedidoServicio",idPrioridadServicio:idPrioridadServicio,ServicioElegido:idServicio},"Servicios/editAcabadosPedidos.php","JSON").success(function  (respuesta) {
    alerta(respuesta.Insercion, respuesta.Mensaje)
    TablaPedidoAcabados.fnDestroy()
    cargardatos()
  })
})
