function cargardatos()
{
  ajaxgeneral({Accion:"ConsultaGeneralOffset"},"Servicios/editOffset.php","JSON").success(function(respuesta)
  {
    CargarTabla(respuesta);
  });
}
var idPedido,idServicio;
var contRenglones=0
var Tabla = $("[name=TablaOffset]");
$("#Noti").hide()
function CargarTabla(Datos) 
{
  if(Datos.length>0)
  {
    $("#DatosGranFormato").empty()
    $("#Noti").hide()
    $("#Tabla").show()
    var renglon;
    datasource=Datos;
    cadena1=""
    $.each(Datos, function(index, pedidos) 
    {
      console.log(pedidos);
      idServicio=pedidos.idServicios;
      idPedido=pedidos.idPedido
                 renglon+='<tr class="renglon" data-toggle="tooltip" title="Información del pedido">\
                  <td class="Folio">'+pedidos.Folio+'</td>\
                  <td class="Fecha">'+pedidos.FechaDeAsignacion+'</td>\
                  <td class="procesoss'+contRenglones+'">'+pedidos.NombreProceso+'</td>\
                  <td class="Cantidad">'+pedidos.Cantidad+'</td>\
                  <td class="NombreMaterial">'+pedidos.Nombre+'</td>\
                  <td class="NombreServicio">'+pedidos.NombreServicio+'</td>\
                  <td class="Medidas">'+pedidos.Medidas+'</td>\
                  <td class="Imagen" hidden>'+pedidos.Imagen+'</td>\
                  <td class="status"><a href="'+pedidos.idPedido+'" value="'+idServicio+'" class="btn btn-xs btn-success" id="CambiarStatus"  data-dismiss="modal" title="Finalizar pedido!"><i class="fa fa-check-square-o"></i></a>\
                  <a href="'+pedidos.idPedido+'" value="'+pedidos.Imagen+'" class="btn btn-xs btn-info" id="VerImagen" data-dismiss="modal" title="Ver Imagen"><i class="fa fa-file-image-o"></i></a></td>\
                  </tr>';
                  $("#DatosPedidoOffset").html(renglon);
                  contRenglones+=1              
       });
    Tabla.dataTable();
  }
  else{
    $("#Noti").show()
    $("#Tabla").hide()
  }
}
cargardatos();
var enca=0, serv=0, c,cadena1,c1

var PedidoSeleccionado, ServicioSeleccionado
$("#DatosPedidoOffset").on('click',"#CambiarStatus",function  (uwu) {
  uwu.preventDefault()
  PedidoSeleccionado=$(this).attr('href')
  ServicioSeleccionado=$(this).attr('value')
  $("#ChangeStatus").modal('show');
})
$("#DatosPedidoOffset").on("click","#VerImagen",function(evt)
{
  evt.preventDefault();
  NombreImagen=$(this).attr('value')
  console.log(NombreImagen)
  $("#imagen-modal").modal('show');
  $(".NombreImagenAlv").html(NombreImagen);
  $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
  $(".BotonDescarga").attr("href",'Imagenes/imgUploads/'+NombreImagen+'');
});
$("#Finalizar").click(function  () {
  ajaxgeneral({Accion:'CambiarStatusPedido',PedidoSele:PedidoSeleccionado,ServicioSele:ServicioSeleccionado},"Servicios/editOffset.php","json").success(function  (Response) {
    alerta(Response.Insercion,Response.Mensaje)
    Tabla.fnDestroy()
    cargardatos()
    
  })
})