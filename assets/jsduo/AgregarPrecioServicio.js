function selectorMaterial(idServicios){
  if(idServicios.length>0)
  {
    $("[name=Material]").empty();
    var Servicio={idServicios:""}
    Servicio.idServicios=idServicios;
      ajaxgeneral(Servicio,"Servicios/SelectorMateriales.php", "JSON").success(function (respuesta){
        $.each(respuesta, function(index, Material){
              var Options=$('<option value="'+Material.Id+'">'+Material.Materiales+'</option>');
              $("[name=Material]").append(Options);
          });
      });
  }
  else{
    alert("jksdgfzh")
  }
 }
function cargardatos(){
   ajaxgeneral({NombreFuncion:"MostrarServPedido"},"Servicios/setServicios.php","JSON").success(function(respuesta)
   {
      selectores(respuesta);
      idServicios=$("[name=Servicio]").val();
      selectorMaterial(idServicios);
   });
}

function selectores(respuesta)
{
  $("[name=Servicio]").empty();
    $.each(respuesta, function(index, Servicio) 
      {
          var seleccts=$('<option value="'+Servicio.idServicios+'">'+Servicio.Nombre+'</option>');
          $("[name=Servicio]").append(seleccts);
    });
}
cargardatos();
$("[name=Servicio]").on('change',function(){
  idServicios=$("[name=Servicio]").val();
  selectorMaterial(idServicios);
});
var DatosPrecios=$("#PreciosServicios")
$("#GuardarPrecio").click(function(evento) {
  evento.preventDefault();
  if(DatosPrecios.parsley().validate()){
    Datos=DatosPrecios.serialize();
    ajaxgeneral(Datos,"Servicios/addPreciosServicios.php","json").success(function (respuesta) {
      alerta(respuesta.insercion, respuesta.Mensaje)
      $("input, textarea").val("");
      DatosPrecios.parsley().destroy()
      cargardatos()
    })
  }
})
$("#PreciosServicios").submit(function(formSer) {
  formSer.preventDefault()
})
$("#CancelarPrecio").click(function () {
  $("input, textarea").val("")
  DatosPrecios.parsley().destroy()
})
