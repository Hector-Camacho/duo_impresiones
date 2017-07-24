var datasource= new Array();
MetodoModificado={
    Nombre:"",
}
$("#Noti").hide()
function CargarTabla(Datos) 
{
  var renglon;
  if(Datos.length>0){
    $("#Noti").hide()
    $("#TablaM").show()
    datasource=Datos;
    $.each(Datos, function(index, Metodos) {
            renglon+='<tr class="renglon"  title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="Identificador">'+Metodos.idFormasDePago+'</td>\
            <td class="Nombre">'+Metodos.FormaPago+'</td>\
            </tr>';
            $("#DatosMetodos").html(renglon);
          });
        TableManageDefault.init();
          $("[name=TableMetodos]").dataTable();
  }else{
    $("#Noti").show()
    $("#TablaM").hide()
  }
}
function cargardatos()
{
  ajaxgeneral("","Servicios/setMetodos.php","JSON").success(function(respuesta)
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
cargardatos();

$("#DatosMetodos").on('click','.renglon',function () {
  $("#modal-dialogMeto").modal('show')
  var Id =$(".Identificador",$(this)).html();
  var Nombre =$(".Nombre",$(this)).html();
  //Pasar valores del renglon al modal
  $("[name=Identificador]").val(Id);
  $("[name=NombreMetodoModal]").val(Nombre);
});

var Formulario=$("[name=FormularioServicios]")
$("#ModificarServicio").click(function (qaz) {
    qaz.preventDefault();
    MetodoModificado.Id=$("[name=Identificador]").val();
    MetodoModificado.Nombre=$("[name=NombreMetodoModal]").val();
    
    if(Formulario.parsley().isValid()){
      ajaxgeneral(MetodoModificado,"Servicios/editMetodos.php","JSON").success(function (respuesta){
        $("#modal-dialogMeto").modal('hide')
        Formulario.parsley().destroy();
        alerta(respuesta.Insersion,respuesta.Mensaje);
      	cargardatos();
      });
    }
    else
    {
      alerta(false,"Ingrese la información que se necesita para modificar")
    }
});
$("#EliminarServicio").click(function(){
   MetodoModificado.Id=$("[name=Identificador]").val();
   ajaxgeneral(MetodoModificado, "Servicios/deleteMetodos.php", "JSON").success(function(response){
      alerta(response.Insersion,response.Mensaje);
      
      cargardatos();
    });
});