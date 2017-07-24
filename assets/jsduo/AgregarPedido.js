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
              Servicio='<div class="col-md-4 col-sm-7">\
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
    ajaxgeneral("","Servicios/setServicios.php","JSON").success(function(respuesta)
    {
      console.log(respuesta);
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
    $("[name=TipoEstilo]").html('Material')
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
  var valordelcheck; 
  var SumaTiempoCheckMarcados=0
  var Tiempo=0
  $(".ProcesosCheck").on('click','.checkeue',function  () {
    if($(this).is(':checked')){
      var idPro=$(this).attr('name')
      ajaxgeneral({idProceso:idPro, Accion:'TiempoProceso'},"Servicios/CheckboxsPedidos.php","json").success(function  (RespTiempo) {
        console.log("Tiempo del proceso: "+ RespTiempo[0].Tiempo);
        Tiempo=RespTiempo[0].Tiempo
        SumaTiempoCheckMarcados+=parseInt(Tiempo)
        console.log("Tiempo Marcados: " + SumaTiempoCheckMarcados);
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
      console.log(Tiempo);
      SumaTiempoCheckMarcados-=parseInt(Tiempo)
      console.log( "Tiempo despues de la resta: "+SumaTiempoCheckMarcados);
    }
  })
function SaldoPedido (TotalAlMomento) {
  TotalPedido+=parseFloat(TotalAlMomento)
  $("#valorapagar").html("$ " + TotalPedido)
 }
function AgregarPedidoGuardar (Pedido) {
  console.log(Pedido);
  ajaxgeneral({NombreFuncion:"Guardar",Pedido:Pedido}, "Servicios/addPedido.php", "JSON").success(function(response){
        TotalPedido=0;
        console.log(response);
        consultaridpedido()
  });
  } 
function consultaridpedido() {
    ajaxgeneral({NombreFuncion:"idpedido"}, "Servicios/addPedido.php", "JSON").success(function(response) {
      prioridadprocesos.Pedidos_id = response[0].id;
      GuardarProcesos(valordelcheck,nombrecheck,prioridadprocesos)
    });
}
function GuardarProcesos (valores, nombres, prioridadprocesos) {
  ajaxgeneral({NombreFuncion:"GuardarProcesos",ArrayValores:valores,ArrayNombres:nombres,ArrayPP:prioridadprocesos}, "Servicios/addPedido.php", "JSON").success(function  (resp) {
      RegistroPedidos()
  })
}
var idPedido,idServicio;
var contRenglones=0
var TotalTiempoSuma=0
function RegistroPedidos()  {
  var renglon, TotalAlMomento, TotalAlMomentoTiempo;
  ajaxgeneral({NombreFuncion:"MostrarReg",Pedido:Pedido},"Servicios/addPedido.php","JSON").success(function  (Datos) {
    datasource=Datos;
  $.each(Datos, function(index, RegistroPedido) {
    c=ConcatenarProcesos(RegistroPedido.idServicios,RegistroPedido.id,contRenglones)
    renglon+='<tr class="RegistroPedido" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="ident">'+RegistroPedido.id+'</td>\
            <td class="Servicio">'+RegistroPedido.Servicio+'</td>\
            <td class="Cantidad" >'+RegistroPedido.Cantidad+'</td>\
            <td class="Tiempo" >'+RegistroPedido.TiempoProcesosPedido+'</td>\
            <td class="procesoss'+contRenglones+'">'+c+'</td>\
            <td class="Total" id="'+index+'">'+RegistroPedido.Total+'</td>\
            <td class="iconoEliminar"><a data-toggle="modal" href="#BorrarPedido"><span class="fa fa-minus-circle"></a></span></td>\
            </tr>';
            $("#ContenidoRegistroPedido").html(renglon);
            contRenglones+=1
            var TotalAlMomento=parseFloat(RegistroPedido.Total);
            TotalAlMomentoTiempo=parseInt(RegistroPedido.TiempoProcesosPedido)
            SaldoPedido(TotalAlMomento)
            console.log(TotalAlMomentoTiempo);
    });
TotalTiempoSuma+=TotalAlMomentoTiempo
console.log("Suma: "+ TotalTiempoSuma);
  })
}

function MinutosHoras () {
  var hrs = Math.floor(TotalTiempoSuma/60);
  TotalTiempoSuma = TotalTiempoSuma % 60;
  if(TotalTiempoSuma<10) TotalTiempoSuma = "0" + TotalTiempoSuma;
  return hrs + " Horas " + TotalTiempoSuma + " Minutos";
}

var enca=0, serv=0, c,cadena1,c1
function ConcatenarProcesos (idServicio, idPedido,contRenglones) {
  console.log(idServicio);
    c=""
    if(enca!=idPedido){
      cadena1=""
      enca=idPedido
      serv=idServicio
      ajaxgeneral({idSer:serv,idP:idPedido,Accion:"ProcesosServicioPedidos"},"Servicios/editOffset.php","json").success(function  (Procesos) { 
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
 var ActualFecha = fecha.getFullYear() + '/'+fecha.getUTCMonth() + '/' +fecha.getDate();
 var datasource= new Array();
 var Encabezado={Fecha:"",idEmpleado:"",NumeroCliente:"",FolioPedido:""};
 var Cliente={Nombre:"",Email:"",Telefono:"",Clave:""};
 var Pedido={idEncabezado:"",idMaterial:"",Cantidad:"",Total:"",Observaciones:"",UnidadDeVenta:"",AnchoGF:"",AltoGF:"", Empleado:"",TiempoProceso:0};
  $("#DatosBusquedaCliente ").on('click','tr',function () {
      var index=$(this).index(".NombreServicio");
      var objeto=datasource[index];
      if($(this).hasClass("success"))
      {
        $(this).removeClass("success");
      }
      else
      {
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
      AccionBotonClickeado="ClienteExistente"
      $(".FormCliente").attr('disabled')
  });
  $("#AgregarClienteTemp").click(function() {
      $(".FormCliente").val("");
      $(".FormCliente").removeAttr("disabled");
      AccionBotonClickeado="ClienteTemporal"
  });
  $("#RegClienteTemp").click(function(){
    if($("[name=ClientesTB]").parsley().isValid()){
      Cliente.Nombre=$("[name=Nombre]").val();
      Cliente.Email=$("[name=Email]").val();
      Cliente.Telefono=$("[name=Telefono]").val();
      Cliente.Clave=$("[name=ClaveCliente]").val()
      Clave=$("[name=ClaveCliente]").val();
      ajaxgeneral({NombreFuncion:"Folio"}, "Servicios/addPedido.php", "JSON").success(function(response){
      
        if(response.FolioPedido==1){
          Folio=response.FolioPedido
        }
        else if(response[0].FolioPedido!=null){
          Folio=parseInt(response[0].FolioPedido)+1
        }
        Encabezado.Fecha=ActualFecha;
        Encabezado.idEmpleado=Empleado ;
        Encabezado.NumeroCliente=Clave;
        Encabezado.FolioPedido=Folio;
        if(AccionBotonClickeado==="ClienteTemporal") {
          ajaxgeneral({Pedido:Encabezado,NombreFuncion:"Temporal",Cliente:Cliente}, "Servicios/addPedido.php", "JSON").success(function(response){
            alerta(response.Insertar,response.Mensaje);
            $("[name=ClientesTB]").parsley().destroy()
            $("#BotonesDespuesDeAgregar").hide()
            $(".ContenedorCategorias").show()
          });         
        }else {
          ajaxgeneral({Pedido:Encabezado,NombreFuncion:"Existente"}, "Servicios/addPedido.php", "JSON").success(function(response){
            alerta(response.Insertar,response.Mensaje);
            $("[name=ClientesTB]").parsley().destroy()
            $("#BotonesDespuesDeAgregar").hide()
            $(".ContenedorCategorias").show()
          });       
        }         
      });
      // $("#BotonesDespuesDeAgregar").hide()
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
  var identificadorServicio=$(".idServicio", $(this)).html() 
  console.log(identificadorServicio);
  ajaxgeneral({NombreFuncion:"SumaConfiguracionTiempo",idServicioElegido:identificadorServicio},"Servicios/addPedido.php","json").success(function  (Tiempos) {
    SumaConfiguraciones=parseInt(Tiempos[0].TiempoSuma) 
    console.log(SumaConfiguraciones);
    
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
   ajaxgeneral({idServicios:idServicios}, "Servicios/SelectorMateriales.php", "JSON").success(function(response){
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
$("#AgregarServicioPedido").click(function(){
  
  if($("[name=FormOrdenVentaNP]").parsley().validate())
  {
    $("#modal-idServicioPedido").modal('hide')
    $("#ContenedorTotales").show();
    ajaxgeneral({NombreFuncion:"id"}, "Servicios/addPedido.php", "JSON").success(function(response)
    {
      var MetrosC=parseInt($("[name=Total]").val());
      // No se cuanto le agregaran de margen a los tiempos
      // Suma los tiempos de las configuraciones, mas un margen mas el tiempo de los check marcados
        TE=(SumaTiempoCheckMarcados/2)+SumaTiempoCheckMarcados+SumaConfiguraciones
        Pedido.idServicio=idServicios;
        Pedido.idEncabezado=response[0].id;
        Pedido.Cantidad=$("[name=Cantidad]").val();
        Pedido.Observaciones=$("[name=Observaciones]").val();
        Pedido.idMaterial=$("[name=Material]").val();
        Pedido.AnchoGF=$("#Ancho").val()
        Pedido.AltoGF=$("#Alto").val()
        Pedido.Empleado=Empleado;
        // Multiplica la cantidad por la suma de Arriba por la suma de los metros cuadrados
        ToT=(TE*Pedido.Cantidad)*MetrosC
        console.log(ToT);
        Pedido.TiempoProceso=ToT
        ajaxgeneral({idServicio:idServicios, idMaterial:Pedido.idMaterial,NombreFuncion:"Precio"}, "Servicios/addPedido.php", "JSON").success(function(response)
        {
          var Total1, Total2;
          var Cantidad=$("[name=Cantidad]").val()
          if(Pedido.UnidadDeVenta==="Piezas")
          {
            Total2=parseFloat(response[0].Precio * Cantidad);
            Pedido.Total=parseFloat(Total2);
            console.log(Total2);
            AgregarPedidoGuardar(Pedido)
            SumaTiempoCheckMarcados=0
            Tiempo=0
            SumaConfiguraciones=0
          }
          else 
          {
            Total1= $("[name=Total]").val();
            Total2=parseFloat(response[0].Precio * Total1* Cantidad);
            Pedido.Total=Total2;
            AgregarPedidoGuardar(Pedido)
            SumaTiempoCheckMarcados=0
            Tiempo=0
            SumaConfiguraciones=0
          }
        });
     }); 
    $("#InfoRegistroClientes").hide()
    $("[name=FormOrdenVentaNP]").parsley().destroy()
  }
  else{
    alert()
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
  $(".Terminar").hide()
  $("#NotificacionFinalizado").show()
  $("#NumeroFolio").html(Encabezado.FolioPedido)
  $("[name=Guardar_PedidoF]").hide()
  var Ti=MinutosHoras()
  $("#Tiempo").html(Ti);
  Pedido.Fecha=ActualFecha;
  ajaxgeneral({Pedido:Pedido, NombreFuncion:"UsuariosPedidos"}, "Servicios/addPedido.php", "JSON").success(function(response){
    
  });
});
// -----------------------------------------------------------------------------------------------------------------//

 // ---------------------------------------------------------------------------------------------------------------------------- //
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
     Actualizar()
     MenosPedido(totalp)
    }
    else{
      alert("Error del servidor")
    }
  })
})
function MenosPedido (totalp) {
  TotalPedido-=totalp
  $("#valorapagar").html("$ " + TotalPedido)
}
// Esta es despues de que elimina
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
$("[name=NuevaOrden]").click(function  (NuevaOrden) {
  NuevaOrden.preventDefault()
  $("#Contenedor").load('../Views/Componentes/OrdenVenta.php')
})



var UsuariosPedidos={idUsuario:"",idEncabezadoPedido:"",statusPedido:0,FechaDeAsignacion:""};
function usuariospedidos(UsuariosPedidos)
{
    ajaxgeneral({userpedidos:UsuariosPedidos, NombreFuncion:"UsuariosPedidos"}, "Servicios/addPedido.php", "JSON").success(function(response)
    {
    }); 
}
$(".resetTime").click(function  (qwert) {
  SumaTiempoCheckMarcados=0
  Tiempo=0
  SumaConfiguraciones=0
})