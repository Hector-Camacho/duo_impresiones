var TablaPedidoDiseno=$("[name=TablaDiseno]")
var NombreImagen
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
      console.log(Pedido);
      var idEncabezado="",idServicio="";
        idServicio=Pedido.idServicios;
        idEncabezado=Pedido.idPedido
        renglon+='<tr class="renglon" href="#modal-dialogModificarPedido" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
        <td class="Identificador">'+Pedido.Folio+'</td>\
        <td class="Nombre">'+Pedido.FechaDeAsignacion+'</td>\
        <td class="Cantidad">'+Pedido.Cantidad+'</td>\
        <td class="Material">'+Pedido.Nombre+'</td>\
        <td class="Servicio">'+Pedido.NombreServicio+'</td>\
        <td class="Medidas">'+Pedido.Medidas+'</td>\
        <td class="Imagen" hidden>'+Pedido.Imagen+'</td>\
        <td class="status"><a href="'+Pedido.IdPrioServPed+'" value="'+Pedido.IdPrioServPed+'" class="btn btn-xs btn-success" id="CambiarStatus"  data-dismiss="modal" title="Finalizar pedido!"><i class="fa fa-check-square-o"></i></a>\
        <a href="'+Pedido.idPedido+'" value="'+Pedido.Imagen+'" class="btn btn-xs btn-info" id="VerImagen" data-dismiss="modal" title="Ver Imagen"><i class="fa fa-file-image-o"></i></a></td>\
        </tr>';
        $("#DatosPedidosProcesoDiseno").html(renglon);
            });
            TableManageDefault.init();
            TablaPedidoDiseno.dataTable();
  }
  else{
    $("#Noti").show()
    $("#tab").hide()
  }
}
function cargardatos()
{
  ajaxgeneral({Accion:"ConsultaGeneral"},"Servicios/editDisenoPedido.php","JSON").success(function(respuesta)
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
var idEncabezadoSeleccionado
var idPedidoC
var idServicioElegido
$("#DatosPedidosProcesoDiseno").on("click","#CambiarStatus",function(evt)
{
  
  evt.preventDefault();
  idEncabezadoSeleccionado=$(this).attr('href')
  idPedidoC=$("#VerImagen").attr('href')
  console.log(idPedidoC);
  idServicioElegido=$(this).attr('value')
  $("#ChangeStatus").modal('show')
});
$("#DatosPedidosProcesoDiseno").on("click","#VerImagen",function(evt)
{
  evt.preventDefault();
  NombreImagen=$("#Imagen").val()
  NombreImagen=$(this).attr('value')
  var Extension
  console.log(NombreImagen);
  Extension= "."+ NombreImagen.split('.').pop()
  Extnatural = NombreImagen.split('.').pop();
  switch(Extnatural){
    case "jpg":
      $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
      $("#notaimagen").html('La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "jpeg":
      $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
      $("#notaimagen").html('La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;    
    
    case "gif":
      $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
      $("#notaimagen").html('La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "png":
      $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
      $("#notaimagen").html('La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "bmp":
      $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
      $("#notaimagen").html('La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "tiff":
      $("#ImagenModal").attr("src",'Imagenes/icos/tiff.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "psd":
      $("#ImagenModal").attr("src",'Imagenes/icos/psd.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "crd":
      $("#ImagenModal").attr("src",'Imagenes/icos/crd.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "dwg":
      $("#ImagenModal").attr("src",'Imagenes/icos/dwg.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "svg":
      $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
      $("#notaimagen").html('La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "ai":
      $("#ImagenModal").attr("src",'Imagenes/icos/ai.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "rar":
      $("#ImagenModal").attr("src",'Imagenes/icos/rar.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "zip":
      $("#ImagenModal").attr("src",'Imagenes/icos/zip.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "ico":
      $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
      $("#notaimagen").html('La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "pdf":
      $("#ImagenModal").attr("src",'Imagenes/icos/pdf.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "nef":
      $("#ImagenModal").attr("src",'Imagenes/icos/raw.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;   
     
    case "doc":
      $("#ImagenModal").attr("src",'Imagenes/icos/word.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
         
    case "ppt":
      $("#ImagenModal").attr("src",'Imagenes/icos/pp.png');
      $("#notaimagen").html('El archivo no se puede visualizar, pero puedes descargarlo en el boton de descarga.<br> La descarga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
  }
  console.log(Extension);
  
  $("#imagen-modal").modal('show');
  $(".NombreImagenAlv").html(NombreImagen);
  // $("#ImagenModal").attr("src",'Imagenes/imgUploads/'+NombreImagen+'');
  $(".BotonDescarga").attr("href",'Imagenes/imgUploads/'+NombreImagen+'');
});
$("[name=Cambiar]").click(function  () {
  NombreImagen=$("#ImagenNueva").val()
  console.log(NombreImagen);
  var filename = NombreImagen.replace(/^.*[\\\/]/, '')
  console.log(filename);
  ajaxgeneral({Accion:"CambiarStatusPedidoServicio",EncabezadoElegido:idEncabezadoSeleccionado,ServicioElegido:idServicioElegido,NuevaImagen:filename,idPedidoC:idPedidoC},"Servicios/editDisenoPedido.php","JSON").success(function  (respuesta) {
    alerta(respuesta.Insersion, respuesta.Mensaje)
  })
  // TablaPedidoDiseno.fnDestroy()
  // cargardatos()
});