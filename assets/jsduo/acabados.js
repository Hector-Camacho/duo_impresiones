function cargardatos(objeto)
{
  ajaxgeneral(objeto,"Servicios/setPedidoProgreso.php","JSON").success(function(respuesta)
  {
    if(respuesta)
    {
        generartimeline(respuesta);
        
    }
    else
    {
        alert("Hubo un error");
    }
  });
} 

//Iconos: Icono en espera: fa fa-spinner/ Icono completado: fa fa-check/ Icono error: fa fa-times
var iconos="fa fa-paper-plane";
var minutos="56";

function generartimeline(datos)
  {
      $("[name=lineadeltiempoadmin]").empty();
      $.each(datos, function(index, pedidos) 
      {
          switch(pedidos.estatus)
          {
              case 'Pendiente':
                  iconos="fa fa-paper-plane";
              break;
              
              case 'En proceso':
                  iconos="fa fa-spinner";
              break;
              
              case 'Finalizado':
                  iconos="fa fa-check";
              break;
              
              case 'Error':
                  iconos="fa fa-times";
              break;
              
          }
          var timeline='<li>'+
                          '<div class="timeline-time">'+
                              '<span class="date">Orden del proceso:</span>'+//Dia en el que estara listo
                              '<span class="time">'+ pedidos.PrioridadProceso +'</span>'+//Hora aprox en la que estara listo
                          '</div>'+
                          '<div class="timeline-icon">'+
                              '<a href="javascript:;"><i class="' +iconos+ '"></i></a>'+//Icono del timeline
                          '</div>'+
                              '<div class="timeline-body">'+
                                  '<div class="timeline-header">'+
                                      '<span class="username proceso"><a href="javascript:;">'+ pedidos.NombreProceso +'</a><small></small></span>'+//Nombre del proceso
                                      //Cuantos minutos le toma aproximadamente ese proceso aqui va esto '<span class="pull-right text-muted">Tiempo aproximado: '+minutos+' Minutos</span>'+
                                  '</div>'+
                                  '<div class="timeline-content"><i class="fa fa-quote-left fa-fw pull-left"></i>'+
                                      '<p>Observaciones: '+pedidos.Observacionespp +//Descripcion u observacion del proceso
                                      '<i class="fa fa-quote-right fa-fw pull-right"></i></p>'+
                                  '</div>'+
                                  '<div class="timeline-footer">El proceso actual esta: '+ pedidos.estatus +//Pie del timeline
                                  '</div>'+
                          '</li>';
                          $("#lineadeltiempoadmin").append(timeline);
      });
  }
    
cargardatostabla();

function cargardatostabla()
{
ajaxgeneral("","Servicios/setTimelinetabla.php","JSON").success(function(respuesta)
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

function CargarTabla(Datos) 
{
  var renglon;
  datasource=Datos;
  $.each(Datos, function(index, productos) {
              renglon+='<tr class="renglon" href="#modal-dialog" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
              <td class="inicio">'+productos.id+'</td>\
              <td class="Nombre">'+productos.Nombre+'</td>\
              <td class="Nombre">'+productos.Fecha+'</td>\
              </tr>';
              $("#DatosOrdenes").html(renglon);
          });
          $("[name=TablaProductos]").DataTable();
}


$("#regresaratras").click(function(qaz)
{
    $("#lineadeltiempo").hide();
    $("#contenidotablas").show();
});

var DatosConsulta={
    id:"",
    pos:""
};

   $("#DatosOrdenes").on("click",".renglon",function(ev)
   {
      var inicio=null;
      inicio=$(".inicio",$(this)).html();
      DatosConsulta.id=inicio;
      cargardatos(DatosConsulta);
        $("#lineadeltiempo").show();
        $("#contenidotablas").hide();
        $("#regresaratras").show();
    });
   
   $("#regresaratras").hide();