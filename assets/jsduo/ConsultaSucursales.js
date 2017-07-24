var datasource= new Array();
var TablaSucursales=$("[name=TablaSucursales]");
$("#Noti").hide()
function CargarTabla(Datos) 
{
  var renglon;
  if(Datos.length>0){
    $("#Noti").hide()
    $("#TablaSU").show()
    datasource=Datos;
    $.each(Datos, function(index, SucursalesDuo) {
            renglon+='<tr class="renglon" href="#modal-Sucursales" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="idSucursalesDuo ocultar">'+SucursalesDuo.idSucursalesDuo+'</td>\
            <td class="ClaveSucursal">'+SucursalesDuo.ClaveSucursal+'</td>\
            <td class="NombreSucursal">'+SucursalesDuo.NombreSucursal+'</td>\
            <td class="CalleSucursal">'+SucursalesDuo.CalleSucursal+'</td>\
            <td class="NumeroSucursal">'+SucursalesDuo.NumeroSucursal+'</td>\
            <td class="ColoniaSucursal">'+SucursalesDuo.ColoniaSucursal+'</td>\
            <td class="TelefonoSucursal">'+SucursalesDuo.TelefonoSucursal+'</td>\
            </tr>';
            $("#DatosSucursales").html(renglon);
          });
          TablaSucursales.dataTable();
  }
  else{
    $("#Noti").show()
    $("#TablaSU").hide()
  }
  
            
}
function cargardatos()
{
  ajaxgeneral("","Servicios/setSucursales.php","JSON").success(function(respuesta)
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

$("#DatosSucursales").on('click','.renglon',function () {
  
  idSucursalesDuo=$(".idSucursalesDuo",$(this)).html()
  NombreSucursal=$(".NombreSucursal",$(this)).html()
  CalleSucursal=$(".CalleSucursal",$(this)).html()
  NumeroSucursal=$(".NumeroSucursal",$(this)).html()
  ColoniaSucursal=$(".ColoniaSucursal",$(this)).html()
  TelefonoSucursal=$(".TelefonoSucursal",$(this)).html()
  $("[name=idSucursalesDuo]").val(idSucursalesDuo);
  $("[name=NombreSucursal]").val(NombreSucursal);
  $("[name=CalleSucursal]").val(CalleSucursal);
  $("[name=NumeroSucursal]").val(NumeroSucursal);
  $("[name=ColoniaSucursal]").val(ColoniaSucursal);
  $("[name=TelefonoSucursal]").val(TelefonoSucursal);
});
var Formulario=$("#FormModificarSucursal")
var DatosModificar;
var DatosEliminar;
$("#ModificarSucursal").click(function (qaz) {
  if(Formulario.parsley().isValid()){
    DatosModificar= Formulario.serialize()
    ajaxgeneral(DatosModificar,"Servicios/editSucursales.php","JSON").success(function (respuesta){
      alerta(respuesta.Insercion,respuesta.Mensaje);
      cargardatos()
      Formulario.parsley().destroy()
    });
  }
  else{
    alerta(false,"Ingrese los datos necesarios para modificar el registro")
  }
});
$("#EliminarSucursal").click(function(){
   DatosEliminar= Formulario.serialize()
    ajaxgeneral(DatosEliminar, "Servicios/deleteSucursales.php", "JSON").success(function (respuesta){
      alerta(respuesta.Insercion,respuesta.Mensaje);
      TablaSucursales.fnDestroy()
      cargardatos()
      Formulario.parsley().destroy()
    });
    });
$("#FormModificarSucursal").submit(function  (FormModificarSucursal) {
  FormModificarSucursal.preventDefault()
  $("#modal-dialogEmp").modal('hide')
})