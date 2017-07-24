$("#NotificacionPedido").hide();
$("#ResultadoBusqueda").hide();
var Total;
var idPedido;
var Debe;
var Accion;
var Saldo, cantidad_pago;
var idPedido,idServicio
var contRenglones=0
var TotalTiempoSuma=0
function CargarTabla(Datos) 
{
  TotalTiempoSuma=0
  Total=0
  pendiente=0
  proceso=0
  finalizado=0
  error=0
  var estado="";
  var renglon;
  var id;
  var tamañoarray= Datos.length;
  var TotalAlMomentoTiempo;
  if(Datos.length==0){
    $("#ResultadoBusqueda").show();
    $("#NotificacionPedido").hide();
  }else{
   $("#ResultadoBusqueda").hide(); 
   $("#NotificacionPedido").show(); 
  $.each(Datos, function(index, Pedido) {
       //-----------No funciona el medidor del tiempo------------------------
          renglon+='<tr class="renglon">\
            <td>'+Pedido.nombre+'</td>\
            <td><center><span>'+Pedido.EstatusPedido+'</span></center></td>\
            <td>'+Pedido.cantidad+'</td>\
            <td>'+Pedido.NombreProceso+'</td>\
            </tr>';
            $("#ServiciosSolicitados").html(renglon);
          }); 
 // Fin del each
  }
}
function MinutosHoras () {
  var hrs = Math.floor(TotalTiempoSuma/60);
  TotalTiempoSuma = TotalTiempoSuma % 60;
  if(TotalTiempoSuma<10) TotalTiempoSuma = "0" + TotalTiempoSuma;
  return hrs + " Horas " + TotalTiempoSuma + " Minutos";
}
$("#Buscar").click(function() {
    var folio=$("#NumeroPedido").val();
    ajaxgeneral({Folio:folio, TipoAccion:"Status"},"Servicios/addCaja.php","JSON").success(function (Pedido) {
        if (Pedido){
            CargarTabla(Pedido);
        }else{
          alert("Hubo error al cargar los datos");
        }
  })
})