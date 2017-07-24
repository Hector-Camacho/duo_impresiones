var datasource= new Array();
var TablaServicios=$("[name=TableServicio]");
ServicioModificado={
    Id:"",
    Nombre:"",
    Categoria:"",
    UnidadVenta:"",
    estatusHab:""
}
$("#Noti").hide()
function CargarTabla(Datos) 
{
  var renglon;
  if(Datos.length>0){
    $("#Noti").hide()
    $("#TablaS").show()
    $.each(Datos, function(index, Servicios) {
            renglon+='<tr class="renglon"  title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="Identificador ocultar">'+Servicios.idServicios+'</td>\
            <td class="Nombre">'+Servicios.Nombre+'</td>\
            <td class="Categoria">'+Servicios.Categoria+'</td>\
            <td class="UnidadVenta">'+Servicios.UnidadVenta+'</td>\
            <td class="estatusHab">'+Servicios.estatusHab+'</td>\
            </tr>';
            $("#DatosServicios").html(renglon);
          });
          TablaServicios.dataTable();
  }
  else{
    $("#Noti").show()
    $("#TablaS").hide()
  }
  datasource=Datos;
}
function cargardatos()
{
  ajaxgeneral({NombreFuncion:"ModificarServicios"},"Servicios/setServicios.php","JSON").success(function(respuesta)
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
$("[name=DatosServicios]").on('click','.renglon',function  () {
  $("#modal-dialogServ").modal('show');
  var Id =$(".Identificador",$(this)).html();
  var Nombre =$(".Nombre",$(this)).html();
  var Categoria =$(".Categoria", $(this)).html();
  var UnidadVenta=$(".UnidadVenta",$(this)).html();
  var UnidadVenta=$(".UnidadVenta",$(this)).html();
  var estatusHab=$(".estatusHab",$(this)).html();
  
  //Pasar valores del renglon al modal
  $("[name=IdentificadorServicio]").val(Id);
  $("[name=NombreServicioModal]").val(Nombre);
  $("[name=CategoriaServicioModal]").val(Categoria);
  $("[name=UnidadVentaServicioModal]").val(UnidadVenta);
  $("[name=optionsRadios]:radio[value="+estatusHab+"]").attr('checked',true);
})

var Formulario=$("[name=FormularioServicios]")
$("#ModificarServicio").click(function (qaz) {
    ServicioModificado.Id=$("[name=IdentificadorServicio]").val();
    ServicioModificado.Nombre=$("[name=NombreServicioModal]").val();
    ServicioModificado.Categoria=$("[name=CategoriaServicioModal]").val();
    ServicioModificado.UnidadVenta=$("[name=UnidadVentaServicioModal]").val();
    ServicioModificado.estatusHab=$('input:radio[name=optionsRadios]:checked').val()
    
    if(Formulario.parsley().isValid()){
      ajaxgeneral(ServicioModificado,"Servicios/editServicios.php","JSON").success(function (respuesta){
        alerta(respuesta.insersion,respuesta.Mensaje);
        cargardatos()
        $("#modal-dialogServ").modal('hide')
        Formulario.parsley().destroy();
      });
    }
    else
    {
      alerta(false,"Ingrese la información que se necesita para modificar")
    }
});
$("#EliminarServicio").click(function(){
    var ServicioEliminado={
      Id:""
    }
    ServicioEliminado.Id=$("[name=IdentificadorServicio]").val();
    ajaxgeneral(ServicioEliminado, "Servicios/deleteServicios.php", "JSON").success(function (respuesta){
      alerta(respuesta.Insersion,respuesta.Mensaje);
      TablaServicios.fnDestroy();
      cargardatos()
    });
  $("[name=FormularioServicios]").parsley().reset()
    
});
$("[name=FormularioServicios]").submit(function(ev) {
  ev.preventDefault();
})