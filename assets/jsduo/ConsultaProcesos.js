var datasource= new Array();
ProcesoModificado={
    Id:"",
    Nombre:"",
    Tiempo:""
}
$("#Noti").hide()
var TablaProcesos=$("[name=TablaProcesos]")
function CargarTabla(Datos) 
{
  var renglon;
  if(Datos.length >0){
    $("#Noti").hide()
    $("#TablaP").show()
    datasource=Datos;
    $.each(Datos, function(index, Procesos) {
            renglon+='<tr class="renglon" href="#modal-dialogProc" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="Identificador ocultar">'+Procesos.idProcesos+'</td>\
            <td class="Nombre">'+Procesos.NombreProceso+'</td>\
            <td class="NombreServicio">'+Procesos.NombreServicio+'</td>\
            <td class="Tiempo">'+Procesos.Tiempo+'</td>\
            <td class="Rol">'+Procesos.Rol+'</td>\
            </tr>';
            $("#DatosProcesos").html(renglon);
          });
          TablaProcesos.dataTable();
  }
  else{
    $("#Noti").show()
    $("#TablaP").hide()
  }
  
  
}
function cargardatos()
{
  ajaxgeneral({Accion:'ConsultaGeneral'},"Servicios/setProcesos.php","JSON").success(function(respuesta)
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


function selectores(respuesta)
{
$("[name=ServiciosProcesos]").empty();
  $.each(respuesta, function(index, Servicios) 
      {
          var seleccts=$('<option value="'+Servicios.idServicios+'">'+Servicios.Nombre+'</option>');
          $("[name=ServiciosProcesos]").append(seleccts);
      });
}
ajaxgeneral("","Servicios/SelectorProcesos.php","JSON").success(function(respuesta){
  selectores(respuesta)
});



cargardatos()
var Formulario=$("#FormVerProcesos")
$("#DatosProcesos").on('click','.renglon',function () {
  var index=$(this).index(".renglon");
  var objeto=datasource[index];
  console.log(objeto);
  console.log(objeto.NivelPrioridad);
  var Id =$(".Identificador",$(this)).html();
  console.log(Id);
  var Nombre =$(".Nombre",$(this)).html();
  var Tiempo =$(".Tiempo", $(this)).html();
  var Rol =$(".Rol", $(this)).html();
  var NivelPrioridad= objeto.NivelPrioridad
  $("[name=IdentificadorProceso]").val(Id);
  $("[name=NombreProcesoModal]").val(Nombre);
  $("[name=RolRealiza]").val(Rol);
  $("[name=TiempoProcesoModal]").val(Tiempo)
  $("[name=NivelPrioridad]").val(NivelPrioridad)
  var idProcesoServicios;
  ajaxgeneral({Accion:'NombreServicioProceso', idProcesos:Id},"Servicios/setProcesos.php","JSON").success(function(respuesta){
    console.log(respuesta[0].idServicios);
    $("[name=ServiciosProcesos]").val(respuesta[0].idServicios);
    idProcesoServicios=respuesta[0].idProcesosServicios
    $("[name=idProcesoServicios]").val(respuesta[0].idProcesosServicios)
    // idProcesoServicios
  });
});
$("#ModificarProceso").click(function (qaz) {
  if(Formulario.parsley().isValid()){
     var form=$("#FormVerProcesos").serialize()
      ajaxgeneral(form,"Servicios/editProcesos.php","JSON").success(function (respuesta){
        alerta(respuesta.insersion,respuesta.Mensaje);
        $("#modal-dialogProc").modal('hide')
        cargardatos()
        Formulario.parsley().destroy()
      });
  }
  else{
    alerta(false,"Ingrese los cmapos requeridos par modificar la información")
  }
});
$("#FormVerProcesos").submit(function  (FormVerProcesos) {
  FormVerProcesos.preventDefault()
})
$("#EliminarProceso").click(function(){
    var ProcesoEliminado={
      Id:""
    }
    ProcesoEliminado.Id=$("[name=IdentificadorProceso]").val();
    ajaxgeneral(ProcesoEliminado, "Servicios/deleteProcesos.php", "JSON").success(function (respuesta){
      alerta(respuesta.insersion,respuesta.Mensaje);
      TablaProcesos.fnDestroy()
      cargardatos()
      Formulario.parsley().destroy()
    });
});
