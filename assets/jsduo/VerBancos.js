var datasource= new Array();
BancoModificado={
    Nombre:"",
}
$("#Noti").hide()
function CargarTabla(Datos) 
{
  var renglon;
  if(Datos.length>0)
  {
    $("#Noti").hide()
    $("#TablaB").show()
    datasource=Datos;
    $.each(Datos, function(index, Bancos) {
            renglon+='<tr class="renglon"  title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="Identificador">'+Bancos.idBancos+'</td>\
            <td class="Nombre">'+Bancos.NombreBanco+'</td>\
            </tr>';
            $("#DatosBancos").html(renglon);
          });
          $("[name=TableBancos]").dataTable();
  }
  else{
    $("#Noti").show()
    $("#TablaB").hide()
  }
  
            
}
function cargardatos()
{
  ajaxgeneral("","Servicios/setBancos.php","JSON").success(function(respuesta)
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

$("#DatosBancos").on('click','.renglon',function () {
  $("#modal-dialogBanc").modal('show')
  var Id =$(".Identificador",$(this)).html();
  var Nombre =$(".Nombre",$(this)).html();
  console.log(Id+' '+Nombre);
  //Pasar valores del renglon al modal
  $("[name=Identificador]").val(Id);
  $("[name=NombreBancoModal]").val(Nombre);
});
var Formulario=$("[name=FormularioServicios]")

$("#ModificarServicio").click(function (qaz) {
    qaz.preventDefault();
    BancoModificado.Id=$("[name=Identificador]").val();
    BancoModificado.Nombre=$("[name=NombreBancoModal]").val();
    
    if(Formulario.parsley().isValid()){
      ajaxgeneral(BancoModificado,"Servicios/editBanco.php","JSON").success(function (respuesta){
        cargardatos()
        $("#modal-dialogBanc").modal('hide')
        Formulario.parsley().destroy();
        alerta(respuesta.Insersion,respuesta.Mensaje);
      });
    }
    else
    {
      alerta(false,"Ingrese la información que se necesita para modificar")
    }
});
$("#EliminarServicio").click(function(){
   BancoModificado.Id=$("[name=Identificador]").val();
   ajaxgeneral(BancoModificado, "Servicios/deleteBancos.php", "JSON").success(function(response){
      alerta(response.Insersion,response.Mensaje);
      cargardatos();
   });
});