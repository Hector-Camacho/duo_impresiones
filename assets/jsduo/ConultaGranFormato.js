function cargardatos()
{
  ajaxgeneral({Accion:"ConsultaTabla"},"Servicios/setGranFormato.php","JSON").success(function(respuesta)
  {
    CargarTabla(respuesta);
  });
}
   var idEncabezado,idServicio;
   var contRenglones=0
   var tablatables = $("[name=TablaGranFormato]");
   $("#Noti").hide()
	function CargarTabla(Datos) 
	{
    console.log(Datos);
    if(Datos.length>0)
    {
      $("#DatosGranFormato").empty()
      $("#Noti").hide()
      $("#tab").show()
      var renglon;
      datasource=Datos;
      cadena1=""
      $.each(Datos, function(index, pedidos) 
      {
        // NombreServicio
        idServicio=pedidos.idServicios;
        idEncabezado=pedidos.idPedido
        // c=ConcatenarProcesos(idServicio,idEncabezado,contRenglones)
                  renglon+='<tr class="renglon" data-toggle="tooltip" title="Información del pedido">\
                  <td class="Folio">'+pedidos.Folio+'</td>\
                  <td class="Fecha">'+pedidos.FechaDeAsignacion+'</td>\
                  <td class="procesos">'+pedidos.NombreProceso+'</td>\
                  <td class="Cantidad">'+pedidos.Cantidad+'</td>\
                  <td class="NombreMaterial">'+pedidos.Nombre+'</td>\
                  <td class="NombreServicio">'+pedidos.NombreServicio+'</td>\
                  <td class="Medidas">'+pedidos.Medidas+'</td>\
                  <td class="Imagen" hidden>'+pedidos.Imagen+'</td>\
                  <td class="status"><a href="'+pedidos.IdPrioServPed+'" value="'+idServicio+'" class="btn btn-xs btn-success" id="CambiarStatus"  data-dismiss="modal" title="Finalizar pedido!"><i class="fa fa-check-square-o"></i></a>\
                  <a href="'+pedidos.idPedido+'" value="'+pedidos.Imagen+'" class="btn btn-xs btn-info" id="VerImagen" data-dismiss="modal" title="Ver Imagen"><i class="fa fa-file-image-o"></i></a></td>\
                  </tr>';
                  $("#DatosGranFormato").html(renglon);
                  contRenglones+=1             
         });
      tablatables.dataTable();
    }
    else{
      $("#Noti").show()
      $("#tab").hide()
    }
	}
cargardatos();
  var enca=0, serv=0, c,cadena1,c1
var idEncabezadoSeleccionado
var idServicioElegido
/*Aqui empieza el desmadre de cambiar los estatus*/
$("#DatosGranFormato").on("click","#CambiarStatus",function  (evt) {
  evt.preventDefault();
  idEncabezadoSeleccionado=$(this).attr('href')
  idServicioElegido=$(this).attr('value')
	$("#ChangeStatus").modal('show')
})
$("#DatosGranFormato").on("click","#VerImagen",function(evt)
{
  evt.preventDefault();
  NombreImagen=$(this).attr('value')
  var Extension
  Extension= "."+ NombreImagen.split('.').pop()
  
  $("#imagen-modal").modal('show');
  $(".NombreImagenAlv").html(NombreImagen);
  $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
  $(".BotonDescarga").attr("href",'Imagenes/imgUploads/'+NombreImagen+'');
});
$("#Cambiar").click(function  (argument) {
	ajaxgeneral({Accion:"CambiarStatusPedidoServicio",EncabezadoElegido:idEncabezadoSeleccionado,ServicioElegido:idServicioElegido},"Servicios/setGranFormato.php","JSON").success(function  (respuesta) {
    alerta(respuesta.Insersion, respuesta.Mensaje)
	})
  cargardatos()
  tablatables.fnDestroy()
})
/*--------------------------------------------------------------------------------------------------------------------*/
var datosmultiples={
Identificador:"",
id:"",
StatusPedido:"",
Observaciones:""
};
$("#ModificarGranFormato").click(function(evt)
{	
		datosmultiples.Identificador = inicio
		datosmultiples.StatusPedido = $("[name=selectorestado]").val();
		datosmultiples.Observaciones = $("[name=Observaciones]").val();
		ajaxgeneral(datosmultiples,"Servicios/editGranFormato.php","JSON").success(function(respuesta)
        {
            if(respuesta.Insercion)
            {
              alerta(respuesta.Insercion,respuesta.Mensaje);
              
            }
            else
            {
              alerta(respuesta.Insercion,respuesta.Mensaje);
            }
            tablatables.fnDestroy();
            cargardatos();
        });//Final del success
		$("#modal-dialog").modal('hide');
});//Final del click