var datasource= new Array();
ProcesoModificado={
    Id:"",
    Nombre:"",
    Tiempo:""
}
var NombreImagen;
var TablaPedidosRealizar=$("[name=TablaPedidosRealizar]")
function CargarTabla(Datos) 
{
  $("#NotificacionSinPedidosPendientes").hide()
  $("#Tabla").hide()
  var renglon;
  datasource=Datos;
  var NombreCliente="", Correo="",Telefono="", Fecha=""
  if(Datos.length>0)
  {
  $("#Tabla").show()
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
        <td class="NombreServicio">'+Pedido.Nombre+'</td>\
        <td class="NombreCliente">'+NombreCliente+'</td>\
        <td class="CorreoCliente ocultar">'+Correo+'</td>\
        <td class="TelefonoCliente ocultar">'+Telefono+'</td>\
        <td class="Fecha">'+Pedido.Fecha+'</td>\
        <td class="idServicios ocultar">'+Pedido.idServicios+'</td>\
        <td class="Encabezadoid ocultar">'+Pedido.id+'</td>\
        </tr>';
        $("#DatosPedidosRealizar").html(renglon);
      });
      TablaPedidosRealizar.dataTable();
      NombreCliente="", Correo="",Telefono=""
  }
  else{
    $("#NotificacionSinPedidosPendientes").show()
    $("#Tabla").hide()
  }
  
}
function cargardatos()
{
  ajaxgeneral({TipoAccion:"SeleccionarPedidos"},"Servicios/PedidosRealizar.php","JSON").success(function(respuesta)
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

function subirimagen() {
  var formData = new FormData( $("[name=FormOrdenVentaNP]")[0] )
  var ruta ="Servicios/cargarimagen.php";
  $.ajax({
      url: ruta,
      type: 'POST',
      data: formData,
      contentType:false,
      processData:false,
      success: function(data) 
      {
      }
    }); 
}


$("#DatosPedidosRealizar").on('click','.renglon',function () {
  var FolioPedidoSeleccionado,ServicioSeleccionado, idServicios;
  ServicioSeleccionado=$(".NombreServicio",$(this)).html()
  if(ServicioSeleccionado==="Gran formato"){
    $(".Medidas").show();
  }
  else {
    $(".Medidas").hide();
  }
  idServicios=$(".idServicios",$(this)).html()
  NombreCliente=$(".NombreCliente",$(this)).html()
  Correo=$(".CorreoCliente",$(this)).html()
  Telefono=$(".TelefonoCliente",$(this)).html()
  Fecha=$(".Fecha",$(this)).html()
  idEncabezado=$(".Encabezadoid",$(this)).html();
  $("#NombreCliente").html(NombreCliente)
  $("#CorreoCliente").html(Correo)
  $("#TelefonoCliente").html(Telefono)
  $("#Fechav").html(Fecha)
  $("#IdPedidoAsignar").html(idEncabezado);
  InformacionPedidoSeleccionado(idEncabezado);
});
// Funcion para llenar el modal
// Verificar el tipo de servicio para mostrar la info marcada eue
function InformacionPedidoSeleccionado (idEncabezado) {
  ajaxgeneral({FolioPedido:idEncabezado, TipoAccion:"ConsultaPedidoSeleccionado"},"Servicios/PedidosRealizar.php","JSON").success( function  (InfoPedido) {
      $("#NomSer").html(InfoPedido[0].NombreServicio)
      $("#MedidasFormat").html(InfoPedido[0].Medidas)
      $("#MatUtilizado").html(InfoPedido[0].Materialutilizado)
      $("#CantidadPedido").html(InfoPedido[0].Cantidad)
      $("#Proceso").html(InfoPedido[0].Proceso)
      $("#Observaciones").html(InfoPedido[0].Observaciones)
      var Proceso={Proceso:InfoPedido[0].Proceso}
      ajaxgeneral(Proceso, 'Servicios/SelectEmpleadosProcesos.php', 'JSON').success(function (Empleados){
        if(Empleados.length==0){
            $("[name=Empleados]").empty();
            $("[name=Empleados]").html('<option value="0">No hay personal para iniciar el pedido</option>');
        }
        else{
          $("[name=Empleados]").empty();
          $.each(Empleados, function(index, Empleado) 
            {
                var seleccts=$('<option value="'+Empleado.id+'">'+Empleado.Nombre+'</option>');
                $("[name=Empleados]").append(seleccts);
            });
        }//Llave del else
      })//Llave del ajax selectEmpleadosProcesos
  })//Llave ajax consulta de pedido seleccionado
}//Llave de la funcion Informacion Pedido Seleccionado
$("#AsignarPedido").click(function(){
  var fecha = new Date();
  var ActualFecha = fecha.getFullYear() + '/'+fecha.getUTCMonth() + '/' +fecha.getDate();
  
  var UsuarioPedido={
    idPedido:"",
    idUsuario:"",
    FechaAsignacion:"",
    StatusPedido:"En proceso"
  }
  UsuarioPedido.idPedido=$("#IdPedidoAsignar").html();
  UsuarioPedido.idUsuario=$("select[name=Empleados]").val()
  UsuarioPedido.FechaAsignacion=ActualFecha;
  
  ajaxgeneral(UsuarioPedido, "Servicios/addUsuariosPedido.php", "JSON").success(function(Respuesta){
      alerta(Respuesta.Insercion,Respuesta.Mensaje)
      $("#modal-dialogProc").modal('hide')
      TablaPedidosRealizar.fnDestroy()
      cargardatos()
  });
});