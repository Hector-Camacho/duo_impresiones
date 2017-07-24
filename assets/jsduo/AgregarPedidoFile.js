//-----------------------------ENCABEZADO PEDIDO---------------------------//
$("#ContenedorTotales").hide()
$(".ContenedorCategorias").hide()
var ContenidoRegistrado = $("#ContenidoRegistroPedido");
var datasourceCheck= new Array()
var prioridadprocesos={Observaciones:"Sin definir",estatus:"Pendiente",Pedidos_id:""};
var numeroch={indicio:""};
function WidgetServicio(Datos){
    var Servicio;
    $.each(Datos, function(index, Servicio) {
              Servicio='<div class="col-md-6 col-sm-6 col-xs-6 col-lg-4">\
                                  <div class="widget widget-stats bg-green">\
                                    <div class="stats-icon"><i class="idServicio" value="'+Servicio.idServicios+'">'+Servicio.idServicios+'</i></div>\
                                    <div class="stats-info">\
                                      <p class="NombreServicio">'+Servicio.Nombre+'</p>\
                                      <p class="UnidadVenta" hidden>'+Servicio.UnidadVenta+'</p>\
                                    </div>\
                                    <div class="stats-link">\
                                      <a>Ordenar ... <i class="fa fa-arrow-circle-o-right"></i></a>\
                                    </div>\
                                  </div>\
                                </div>';
                  $("#ContenedorServicios").append(Servicio);
            });
   }
function CargarWidServicios(){
    ajaxgeneral({NombreFuncion:"MostrarServPedido"},"Servicios/setServicios.php","JSON").success(function(respuesta)
    {
      if(respuesta)
      {
          WidgetServicio(respuesta);
      }
      else
      {
          alert("Hubo un error");
      }
    });
   } 
function CargarTabla(Datos) 
   {
    var renglon;
    datasource=Datos;
    $.each(Datos, function(index, Clientes) {
              renglon+='<tr class="Cliente" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
              <td class="Nombre">'+Clientes.Nombre+'</td>\
              <td class="Codigo" >'+Clientes.ClaveCliente+'</td>\
              <td class="Email" hidden>'+Clientes.Email+'</td>\
              <td class="TelefonoCelular" hidden>'+Clientes.TelefonoCelular+'</td>\
              </tr>';
              $("#DatosBusquedaCliente").html(renglon);
            });
            TableManageDefault.init();
            $("#BusquedaCliente").DataTable();
              
   }
function cargardatos()
   {
      ajaxgeneral("","Servicios/setClientes.php","JSON").success(function(respuesta)
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
function TipoModal(UnidadVenta) {
  if (UnidadVenta == "Piezas") {
     $(".Perimetro").hide();
     $("[name=Alto]").val("");
     $("[name=Ancho]").val("");
      $("[name=TipoEstilo]").html('Estilo')
  }
  else {
    $(".Perimetro").show();
    $("[name=TipoEstilo]").html('Material que será utilizado:')
  }
 }
 function selectores(respuesta)
    {
    $("[name=Material]").empty();
      $.each(respuesta, function(index, Material) 
        {
            var seleccts=$('<option value="'+Material.Id+'">'+Material.Materiales+'</option>');
            $("[name=Material]").append(seleccts);
        });
    }    
function Checkboxs(respuesta)
 {
  idServicios=respuesta;
    $("[name=ProcesosCheck]").empty();

    ajaxgeneral({idServicios:idServicios, Accion:"GenerarChecks"},"Servicios/CheckboxsPedidos.php","JSON").success(function(respuesta){
      datasourceCheck=respuesta
      $.each(respuesta, function(index, Proceso)
        { 
          var Checks=$('<label><input type="checkbox" class="checkeue" name="'+Proceso.idProcesos+'" id="'+Proceso.Tiempo+'" value="'+Proceso.nivelprioridad+'">'+ '<span class="nombreProceso">'+Proceso.nombre+'</span></label><br>');
          $("[name=ProcesosCheck]").append(Checks);
          numeroch.indicio = index;
        });
    });
 }
  var nombrecheck;
  var contRenglones=0;
  var valordelcheck; 
  var SumaTiempoCheckMarcados=0
  var Tiempo=0
  $(".ProcesosCheck").on('click','.checkeue',function  () {
    if($(this).is(':checked')){
      var idPro=$(this).attr('name')
      ajaxgeneral({idProceso:idPro, Accion:'TiempoProceso'},"Servicios/CheckboxsPedidos.php","json").success(function  (RespTiempo) {
        Tiempo=RespTiempo[0].Tiempo
        SumaTiempoCheckMarcados+=parseInt(Tiempo)
      })
      var index= $(this).index(".checkeue")
      var objeto=datasourceCheck[index]
      if($.inArray(objeto.nombre,nombrecheck)<0){
        nombrecheck.push(objeto.nombre);
        valordelcheck.push(objeto.nivelprioridad);
      }
    }
    else{
      Tiempo=$(this).attr('id')
      SumaTiempoCheckMarcados-=parseInt(Tiempo)
    }
  })
function SaldoPedido (TotalAlMomento) {
  TotalPedido+=parseFloat(TotalAlMomento)
  $("#valorapagar").html("$ " + TotalPedido)
 }
function AgregarPedidoGuardar (Pedido) {
  ajaxgeneral({NombreFuncion:"Guardar",Pedido:Pedido}, "Servicios/addPedido.php", "JSON").success(function(response){
        TotalPedido=0;
        prioridadprocesos.Pedidos_id = response.Registros[0].id
        GuardarProcesos(valordelcheck,nombrecheck,prioridadprocesos)
        subirimagen()
        
  });
}
function GuardarProcesos (valores, nombres, prioridadprocesos) {
  ajaxgeneral({NombreFuncion:"GuardarProcesos",ArrayValores:valores,ArrayNombres:nombres,ArrayPP:prioridadprocesos}, "Servicios/addPedido.php", "JSON").success(function  (resp) {
    RegistroPedidos()
  })
}
var idPedido,idServicio;
var TotalTiempoSuma=0
function RegistroPedidos()  {
  var renglon, TotalAlMomento, TotalAlMomentoTiempo;
  ajaxgeneral({NombreFuncion:"MostrarReg",Pedido:Pedido},"Servicios/addPedido.php","JSON").success(function  (Datos) {
    datasource=Datos;
  $.each(Datos, function(index, RegistroPedido) {
    c=ConcatenarProcesos(RegistroPedido.idServicios,RegistroPedido.id,contRenglones)
    // console.log(RegistroPedido.TiempoProcesosPedido)
    var Time= HorasDias(RegistroPedido.TiempoProcesosPedido)
    renglon+='<tr class="RegistroPedido" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="ident">'+RegistroPedido.id+'</td>\
            <td class="Servicio">'+RegistroPedido.Servicio+'</td>\
            <td class="Cantidad" >'+RegistroPedido.Cantidad+'</td>\
            <td class="Tiempo" >'+Time+'</td>\
            <td class="procesoss'+contRenglones+'">'+c+'</td>\
            <td class="Total" id="'+index+'">'+RegistroPedido.Total+'</td>\
            <td class="iconoEliminar"><a data-toggle="modal" href="#BorrarPedido"><span class="fa fa-minus-circle"></a></span></td>\
            </tr>';
            $("#ContenidoRegistroPedido").html(renglon);
            contRenglones+=1
            var TotalAlMomento=parseFloat(RegistroPedido.Total);
            TotalAlMomentoTiempo=parseInt(RegistroPedido.TiempoProcesosPedido)
            SaldoPedido(TotalAlMomento)
    });
TotalTiempoSuma+=TotalAlMomentoTiempo
  })
}
function HorasDias(TiempoMinutos) {
  var horasCompletas=Math.floor(TiempoMinutos/60);
  var DiasCompletos=Math.floor(horasCompletas/24)
  TiempoMinutos=TiempoMinutos%60;
  horasCompletas=horasCompletas%24
   if(TiempoMinutos<10) TiempoMinutos = "0" + TiempoMinutos;
   if(horasCompletas<10) horasCompletas = "0" + horasCompletas;
  return DiasCompletos + " Días, " + horasCompletas + " horas, "+ TiempoMinutos + " Minutos"
}
// console.log(HorasDias(90)); 
var enca=0, serv=0, c,cadena1,c1
function ConcatenarProcesos (idServicio, idPedido,contRenglones) {
    c=""
    if(enca!=idPedido){
      enca=idPedido
      ajaxgeneral({idSer:idServicio,idP:idPedido,Accion:"ProcesosServicioPedidos"},"Servicios/editOffset.php","json").success(function  (Procesos) { 
        c=Procesos[0].NombreProceso
        $(".procesoss"+contRenglones).html(c)
      })
      return c
    }
    else{
      return c;
    }
}
function Actualizar () {
  var renglon, TotalAlMomento;
  $("#ContenidoRegistroPedido").empty();
  ajaxgeneral({NombreFuncion:"Actualizados",idEncabezado:Pedido.idEncabezado},"Servicios/addPedido.php","json").success(function  (actualizados) {
    if(actualizados.length>0)
    {
      $("#ContenedorTotales").show()
      $.each(actualizados, function(index, RegistroPedido) {
      renglon+='<tr class="RegistroPedido" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="Servicio">'+RegistroPedido.Servicio+'</td>\
            <td class="Cantidad" >'+RegistroPedido.Cantidad+'</td>\
            <td class="Tiempo" >'+RegistroPedido.TiempoProcesosPedido+'</td>\
            <td class="Total" id="'+index+'">'+RegistroPedido.Total+'</td>\
            <td class="iconoEliminar"><a data-toggle="modal" href="#BorrarPedido"><span class="fa fa-minus-circle"></a></span></td>\
            </tr>';
            $("#ContenidoRegistroPedido").html(renglon);
          });
    }
    else{
      alert("No hay datos del pedido")
      $("#ContenedorTotales").hide()
    }
  })
}
function subirimagen()
{
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
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------------------------------------------------------//

// Logica logistica de pedidos
 CargarWidServicios();
 cargardatos();
 var fecha = new Date();
 var Mes = (fecha.getMonth()+1)
 var Dia=fecha.getDate()
 var NumMes
 if(Mes < 10){  NumMes= "0"+Mes  }
 else{   NumMes=Mes  }
 if(Dia<10){ Dia="0"+Dia}
var NombreImagen
 
 var ActualFecha = fecha.getFullYear() + '/'+ NumMes  +'/' +Dia;
 var CadenaFecha= String(fecha.getFullYear() + NumMes +Dia) 
 console.log(CadenaFecha);
 var datasource= new Array();
 var Encabezado={Fecha:"",idEmpleado:"",NumeroCliente:"",FolioPedido:""};
 var Cliente={Nombre:"",Email:"",Telefono:"",Clave:""};
 var Pedido={idEncabezado:"",idMaterial:"",Cantidad:"",Total:"",Observaciones:"",UnidadDeVenta:"",AnchoGF:"",AltoGF:"", Empleado:"",TiempoProceso:0,NombreImagen:""};
  $("#DatosBusquedaCliente ").on('click','tr',function () {
      var index=$(this).index(".NombreServicio");
      var objeto=datasource[index];
      if($(this).hasClass("success")){
        $(this).removeClass("success");
      }
      else {
        $("tr").removeClass("success");
        $(this).addClass( "success" );
      }
      Nombre=$(".Nombre",$(this)).html();
      Email=$(".Email",$(this)).html();
      Telefono=$(".TelefonoCelular",$(this)).html();
      Codigo=$(".Codigo", $(this)).html();
  });
  var AccionBotonClickeado="";
  var Empleado=$("[name=ClaveEmpleadoLog]").val();
  $("#SeleccionarCliente").click(function() {
      $("[name=Nombre]").val(Nombre);
      $("[name=Email]").val(Email);
      $("[name=Telefono]").val(Telefono);
      $("[name=ClaveCliente]").val(Codigo);
      $("#BuscarCliente").modal('toggle');
      AccionBotonClickeado="Existente"
      $(".FormCliente").attr('disabled')
  });
  $("#AgregarClienteTemp").click(function() {
      $(".FormCliente").val("");
      $(".FormCliente").removeAttr("disabled");
      $("[name=ClaveCliente]").val("1");
      AccionBotonClickeado="Temporal"
  });
  var Folio, idEncGeneral
  $("#RegClienteTemp").click(function(){
    if($("[name=ClientesTB]").parsley().isValid()){
      Cliente.Nombre=$("[name=Nombre]").val();
      Cliente.Email=$("[name=Email]").val();
      Cliente.Telefono=$("[name=Telefono]").val();
      Cliente.Clave=$("[name=ClaveCliente]").val()
      Clave=$("[name=ClaveCliente]").val();
      ajaxgeneral({NombreFuncion:"Folio"}, "Servicios/addPedido.php", "JSON").success(function(response){
        console.log(response.Folio);
        if(response.FolioPedido==1){
          Folio=response.FolioPedido
          idEncGeneral=response.id
        }
        else if(response.Folios[0].FolioPedido!=null){
          Folio=response.Folios[0].FolioPedido
          idEncGeneral=response.id[0].id
        }
        Encabezado.Fecha=ActualFecha;
        Encabezado.idEmpleado=Empleado ;
        Encabezado.NumeroCliente=Clave;
        Encabezado.FolioPedido=Folio;
          ajaxgeneral({Pedido:Encabezado,NombreFuncion:"RegistroCliente",Cliente:Cliente,Accion:AccionBotonClickeado}, "Servicios/addPedido.php", "JSON").success(function(response){
            alerta(response.Insertar,response.Mensaje);
            $("[name=ClientesTB]").parsley().destroy()
            $(".ContenedorCategorias").show()
            $("#InfoRegistroClientes").hide()
          });       
      });
      $("[name=Nombre]").attr('disable')
      $("[name=Email]").attr('disable')
      $("[name=Telefono]").attr('disable')
      $("[name=ClaveCliente]").attr('disable')
    }
    $("#FechaVenta").html(ActualFecha)
    $("#NombreCliente").html(Cliente.Nombre)
  });
  var SumaConfiguraciones=0;
 $("#ContenedorServicios").on('click','.widget',function () {
  $("#NotificacionCheck").hide()
  NombreImagen=""
  $('#subirimagen').attr('src',"data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzEiIGhlaWdodD0iMTgwIj48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijg1LjUiIHk9IjkwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTcxeDE4MDwvdGV4dD48L3N2Zz4=")
  $("#file-info").html("No hay archivo")
  $(".Detalle").val("")
  $("#notaimagen").html("")
  var identificadorServicio=$(".idServicio", $(this)).html()
  ajaxgeneral({NombreFuncion:"SumaConfiguracionTiempo",idServicioElegido:identificadorServicio},"Servicios/addPedido.php","json").success(function  (Tiempos) {
    SumaConfiguraciones=parseInt(Tiempos[0].Tiempo)
  })
  $("#modal-idServicioPedido").modal('show')
  nombrecheck = new Array();
  valordelcheck = new Array();
   var index=$(this).index(".NombreServicio");
   var objeto=datasource[index];
   UnidadVenta=$(".UnidadVenta",$(this)).html();
   idServicios=$(".idServicio",$(this)).html();
   TipoModal(UnidadVenta);
   Pedido.UnidadDeVenta=UnidadVenta
   ajaxgeneral({idServicios:idServicios}, "Servicios/SelectorMaterialesAddPedido.php", "JSON").success(function(response){
      selectores(response)
   });
   Checkboxs(idServicios);
  });
  $(".Perimetro").change(function() {
    var Ancho =$("#Ancho").val();
    var Alto =$("#Alto").val();
    var Total = Ancho * Alto;
    $("[name=Total]").val(Total);
  });
idServicios=$(".idServicio",$("widget")).html();
var   MultiplicacionTiempoPedido=0;
$("#AgregarServicioPedido").click(function(){
  if($("[name=FormOrdenVentaNP]").parsley().validate() &&  valordelcheck.length>0 && nombrecheck.length>0 ) {
    $("#modal-idServicioPedido").modal('hide')
    $("#ContenedorTotales").show();
    var MetrosC=parseInt($("[name=Total]").val());
        TE=SumaTiempoCheckMarcados+SumaConfiguraciones
        NombreImagen=$("#Imagen").val()
        var filename = NombreImagen.replace(/^.*[\\\/]/, '')
        Pedido.idServicio=idServicios;
        Pedido.idEncabezado=idEncGeneral;
        Pedido.Cantidad=$("[name=Cantidad]").val();
        Pedido.Observaciones=$("[name=Observaciones]").val();
        Pedido.idMaterial=$("[name=Material]").val();
        Pedido.AnchoGF=$("#Ancho").val()
        Pedido.AltoGF=$("#Alto").val()
        Pedido.Empleado=Empleado;
        Pedido.NombreImagen=filename
        // Multiplica la cantidad de metros cuadrado de cada lona por la cantidad de lonas pedidas
        // Posteriormente se multiplica con el tiempo que se tardara en realizar
        MultiplicacionTiempoPedido=(MetrosC*Pedido.Cantidad)*TE
        //("Es el tiempo en minutos: "+ MultiplicacionTiempoPedido);
        Pedido.TiempoProceso=MultiplicacionTiempoPedido
        $("#InfoRegistroClientes").hide()
        $("[name=FormOrdenVentaNP]").parsley().destroy()
        ajaxgeneral({idServicio:idServicios, idMaterial:Pedido.idMaterial,NombreFuncion:"Precio"}, "Servicios/addPedido.php", "JSON").success(function(response){
          if(Pedido.Cantidad>=response[0].CantidadDeProducto) {
            Pedido.Total=parseFloat(response[0].PrecioMaximo*(MetrosC*Pedido.Cantidad))
          } 
          else {
            Pedido.Total=parseFloat(response[0].Precio*(MetrosC*Pedido.Cantidad))
          }
          AgregarPedidoGuardar(Pedido)
          SumaTiempoCheckMarcados=0
          SumaConfiguraciones=0
          Tiempo=0
        });
        $(document).ajaxStop(function  () {
          
        })
  }
  else {
    $("#NotificacionCheck").show()
  }
});
$("[name=FormOrdenVentaNP]").submit(function (FormOrdenVenta){
  FormOrdenVenta.preventDefault()
})
$("[name=ClientesTB]").submit(function  (ClientesTB) {
  ClientesTB.preventDefault()
})
$(".Terminar").show()
$("#NotificacionFinalizado").hide()
$("[name=Guardar_PedidoF]").click(function  (qws) {
  qws.preventDefault();
  $(".Terminar").hide()
  $("#NotificacionFinalizado").show()
  $("#NumeroFolio").html(Encabezado.FolioPedido)
  $("[name=CancelarOrden]").hide()
  $("[name=Guardar_PedidoF]").hide()
  Pedido.Fecha=ActualFecha;
  
  ajaxgeneral({TiempoMin:TotalTiempoSuma,NombreFuncion:"TiempoFinalPedido"},"Servicios/addPedido.php","JSON").success(function  (Respuesta) {
    $("#Tiempo").html(Respuesta.Fecha[0].TiempoTotalasd);
    console.log(Respuesta.HorasCompletas[0].HorasCompletas);
    ajaxgeneral({CadenaFecha:CadenaFecha,NombreFuncion:"FechaPromesa",horasC:Respuesta.HorasCompletas[0].HorasCompletas},"Servicios/addPedido.php","json").success(function (FechaPromesa) {
      console.log(FechaPromesa.Fecha[0].FechaPrometida);
      $("[name=FechaPromesaEntrega]").val(FechaPromesa.Fecha[0].FechaPrometida)
    })
  })
  
});





var idePedidoPE;
var totalp;
$("#ContenidoRegistroPedido").on('click','.RegistroPedido',function  () {
  var index=$(this).index(".RegistroPedido");
  var objeto=datasource[index];
  idePedidoPE=objeto.id
  totalp=objeto.Total
})
$("#EliminarPedido").click(function  (EliminarPedido) {
  ajaxgeneral({idpedidoEliminar:idePedidoPE,NombreFuncion:"EliminarPedido"},"Servicios/addPedido.php","json").success(function  (resp) {
    if(resp.Eliminado){
      TotalPedido=0
      RegistroPedidos()
    }
    else{
      alert("Error del servidor")
    }
  })
})
$("[name=NuevaOrden]").click(function  (NuevaOrden) {
  NuevaOrden.preventDefault()
  $("#Contenedor").load('../Views/Componentes/Orden_venta_file.php')
})
var UsuariosPedidos={idUsuario:"",idEncabezadoPedido:"",statusPedido:0,FechaDeAsignacion:""};
$(".resetTime").click(function  (qwert) {
  SumaTiempoCheckMarcados=0
  Tiempo=0
  SumaConfiguraciones=0
})
$('#ImagenModal').hide();
$('#subirimagen').show();
$("input[type=file]").on("change",function(){
  NombreImagen=$(this).attr('value');
  Extnatural = NombreImagen.split('.').pop();
  switch(Extnatural)
  {
    case "jpg":
      $("#notaimagen").html('La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
      $('#subirimagen').show();
      $('#ImagenModal').hide();
    break;
    
    case "jpeg":
      $("#notaimagen").html('La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
      $('#subirimagen').show();
      $('#ImagenModal').hide();
    break;    
    
    case "gif":
      $("#notaimagen").html('La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
      $('#subirimagen').show();
      $('#ImagenModal').hide();
    break;
    
    case "png":
      $("#notaimagen").html('La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
      $('#subirimagen').show();
      $('#ImagenModal').hide();
    break;
    
    case "bmp":
      $("#notaimagen").html('La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
      $('#subirimagen').show();
      $('#ImagenModal').hide();
    break;
    
    case "tiff":
      $("#ImagenModal").attr("src",'Imagenes/icos/tiff.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "psd":
      $("#ImagenModal").attr("src",'Imagenes/icos/psd.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "crd":
      $("#ImagenModal").attr("src",'Imagenes/icos/crd.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "dwg":
      $("#ImagenModal").attr("src",'Imagenes/icos/dwg.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "svg":
      $("#notaimagen").html('La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
      $('#subirimagen').show();
      $('#ImagenModal').hide();
    break;
    
    case "ai":
      $("#ImagenModal").attr("src",'Imagenes/icos/ai.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "rar":
      $("#ImagenModal").attr("src",'Imagenes/icos/rar.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "zip":
      $("#ImagenModal").attr("src",'Imagenes/icos/zip.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "ico":
      $("#notaimagen").html('La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
      $('#subirimagen').show();
      $('#ImagenModal').hide();
    break;
    
    case "pdf":
      $("#ImagenModal").attr("src",'Imagenes/icos/pdf.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
    
    case "nef":
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#ImagenModal").attr("src",'Imagenes/icos/raw.png');
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;   
     
    case "doc":
      $("#ImagenModal").attr("src",'Imagenes/icos/word.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
         
    case "ppt":
      $("#ImagenModal").attr("src",'Imagenes/icos/pp.png');
      $('#subirimagen').hide();
      $('#ImagenModal').show();
      $("#notaimagen").html('El archivo no se puede visualizar.<br> La carga puede variar depende del tamaño del archivo y de el ancho de banda de tu internet.');
    break;
  }
})
$("[name=CancelarOrden]").click(function (evento) {
  evento.preventDefault();
  ajaxgeneral({idEncabezadoAEliminar:idEncGeneral,NombreFuncion:"EliminarPedidoCompleto"},"Servicios/addPedido.php","JSON").success(function  (RespuestaRecibida) {
  }); //Fin del ajax lml
  alerta(true,"Ha cancelado el pedido. :3");
  $("#Contenedor").load('../Views/Componentes/Orden_venta_file.php')
});
var Fechas={
  FechaPromesa:"",
  FechaReal:"",
  idEncabezadoPedido:""
}
$("[name=NuevaOrden]").hide()
$("#RegistrarFechas").click(function () {
    Fechas.idEncabezadoPedido=idEncGeneral;
    Fechas.FechaPromesa=$("#FechaPromesaEntrega").val()
    Fechas.FechaReal=$("#FechaPromesaEntrega2").val()
    console.log(Fechas);
    ajaxgeneral({Fechas:Fechas,NombreFuncion:"RegistrarFecha"},"Servicios/addPedido.php","JSON").success(function  (RegistroDeLasFechas) {
        if(RegistroDeLasFechas.Insertado){
          alert('Ya se insertaron las fechas del pedido')
          $("#RegistrarFechas").hide()
          $("[name=NuevaOrden]").show()
        }
        else{
          alert("Ocurrio un error")
        }
    }) 
})