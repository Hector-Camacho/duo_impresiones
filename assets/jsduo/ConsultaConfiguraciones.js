//INIJIALIJIAJION DEL ARRAYTL
var datasource= new Array();
ConfiguracionesModificado={
    Id:"",
    Nombre:"",
    Tiempo:"",
    Servicio:""
}
function selectores(respuesta)
{
$("[name=ServiciosConfiguraciones]").empty();
  $.each(respuesta, function(index, Servicios) 
    {
        var seleccts=$('<option value="'+Servicios.idServicios+'">'+Servicios.Nombre+'</option>');
        $("[name=ServiciosConfiguraciones]").append(seleccts);
    });
}
ajaxgeneral("","Servicios/SelectorConfiguraciones.php","JSON").success(function(respuesta){
  selectores(respuesta)
});
var TablaConfiguraciones=$("[name=TablaConfiguraciones]")
$("#Noti").hide()
function CargarTabla(Datos) 
{
  var renglon;
  //AJIJNAJION DE DATOJ
  if(Datos.length>0)
  {
    $("#TablaC").show()
    $("#Noti").hide()
   datasource=Datos;
   $.each(Datos, function(index, Configuraciones) {
            renglon+='<tr class="renglon" href="#modal-dialogConf" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="Identificador ocultar">'+Configuraciones.idConfiguraciones+'</td>\
            <td class="Nombre">'+Configuraciones.Nombre+'</td>\
            <td class="Servicio">'+Configuraciones.NombreServicio+'</td>\
            <td class="Tiempo">'+Configuraciones.Tiempo+'</td>\
            </tr>';
            $("#DatosConfiguraciones").html(renglon);
          });
          // TableManageDefault.init();
          TablaConfiguraciones.dataTable(); 
  }
  else{
    $("#Noti").show()
    $("#TablaC").hide()
  }
  
           
}
function cargardatos()
{
  ajaxgeneral("","Servicios/setConfiguraciones.php","JSON").success(function(respuesta)
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
var Formulario=$("[name=FormularioConfiguraciones]")
$("#DatosConfiguraciones").on('click','.renglon',function () {
  //EJ EJTO
  var index=$(this).index(".renglon");
  var objeto=datasource[index];
 //AJTA AKI
  var Id =$(".Identificador",$(this)).html();
  var Nombre =$(".Nombre",$(this)).html();
  var Tiempo =$(".Tiempo", $(this)).html();
  var Servicio= $(".Servicio",$(this)).html()
  $("[name=IdentificadorConfiguraciones]").val(Id);
  $("[name=NombreConfiguracionesModal]").val(Nombre);
  $("[name=TiempoConfiguracionesModal]").val(Tiempo);
  $("[name=ServiciosConfiguraciones]").val(Servicio)
});
$("#ModificarConfiguraciones").click(function (qaz) {
  if(Formulario.parsley().isValid()){
    ConfiguracionesModificado.Id=$("[name=IdentificadorConfiguraciones]").val();
    ConfiguracionesModificado.Nombre=$("[name=NombreConfiguracionesModal]").val();
    ConfiguracionesModificado.Tiempo=$("[name=TiempoConfiguracionesModal]").val();
    ConfiguracionesModificado.Servicio=$("select[name=ServiciosConfiguraciones]").val();
    ajaxgeneral(ConfiguracionesModificado,"Servicios/editConfiguraciones.php","JSON").success(function (respuesta){
      cargardatos()
      alerta(respuesta.insersion,respuesta.Mensaje); 
      Formulario.parsley().destroy()
      $("#modal-dialogConf").modal('hide');
    });
  }
  else {
    alerta(false,"Inserte los campos necesarios para modificar el registro")
  }
});
$("#EliminarConfiguraciones").click(function(){
    var ConfiguracionesEliminado={
      Id:""
    }
    ConfiguracionesEliminado.Id=$("[name=IdentificadorConfiguraciones]").val();
    ajaxgeneral(ConfiguracionesEliminado, "Servicios/deleteConfiguraciones.php", "JSON").success(function (respuesta){
        alerta(respuesta.insersion,respuesta.Mensaje);
        TablaConfiguraciones.fnDestroy()
        cargardatos()
        Formulario.parsley().destroy()
        $("#modal-dialogConf").modal('hide');
    });
});
$("[name=FormularioConfiguraciones]").submit(function  (FormularioConfiguraciones) {
  FormularioConfiguraciones.preventDefault()
});
