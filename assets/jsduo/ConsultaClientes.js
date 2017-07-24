var DatosClientesModificado={
  idC:"",
  idD:"",
  Nombre:"",
  ApellidoPaterno:"",
  ApellidoMaterno:"",
  RFC:"",
  TelefonoReferencia:"",
  Email:"",
  TelefonoCelular:"",
  RedSocial:"",
  Calle:"",
  Colonia:"",
  Numero:"",
  CodigoPostal:"" ,
  ReferenciaUbicacion:"",
  Localidad:""
};
var TablaClientesR=$("[name=TablaCliente]")
$("#Noti").hide()
function CargarTabla(Datos) 
{
  var renglon;
  if(Datos.length>0)
  {
    $("#Noti").hide()
    $("#TablaC").show()
    $.each(Datos, function(index, Clientes) {
            renglon+='<tr class="renglon"  title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="identificadorCliente ocultar">'+Clientes.idClientes+'</td>\
            <td class="identificadorDireccion ocultar">'+Clientes.id+'</td>\
            <td class="Nombre">'+Clientes.Nombre+'</td>\
            <td class="ApPaterno">'+Clientes.ApellidoPaterno+'</td>\
            <td class="ApMaterno">'+Clientes.ApellidoMaterno+'</td>\
            <td class="RFC">'+Clientes.RFC+'</td>\
            <td class="TelefonoReferencia">'+Clientes.TelefonoReferencia+'</td>\
            <td class="Email ocultar">'+Clientes.Email+'</td>\
            <td class="TelefonoCelular ocultar">'+Clientes.TelefonoCelular+'</td>\
            <td class="RedSocial ocultar">'+Clientes.RedesSociales+'</td>\
            <td class="ClaveCliente">'+Clientes.ClaveCliente+'</td>\
            <td class="Representante ocultar">'+Clientes.RepresentanteEmpresa+'</td>\
            <td class="Calle ocultar">'+Clientes.Calle+'</td>\
            <td class="Numero ocultar">'+Clientes.Numero+'</td>\
            <td class="Colonia ocultar">'+Clientes.Colonia+'</td>\
            <td class="CodigoPostal ocultar">'+Clientes.CodigoPostal+'</td>\
            <td class="Referencias ocultar">'+Clientes.ReferenciaUbicacion+'</td>\
            <td class="Localidad ocultar">'+Clientes.Localidad+'</td>\
            <td class="NombreEmpresa ocultar">'+Clientes.NombreEmpresa+'</td>\
            <td class="RFCempresa ocultar">'+Clientes.RFCempresa+'</td>\
            </tr>';
            $("#DatosClientes").html(renglon);
          });
            TablaClientesR.dataTable();
  }
  else{
    
    $("#TablaC").hide()
    $("#Noti").show()
  }
  
                 
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
cargardatos()
$("#DatosClientes").on('click','.renglon',function () {
  $("#modal-dialogClientes").modal('show')
  
  idCliente=$(".identificadorCliente",$(this)).html();
  idDireccion=$(".identificadorDireccion",$(this)).html();
  nombre=$(".Nombre",$(this)).html();
  ApPaterno=$(".ApPaterno",$(this)).html();
  ApMaterno=$(".ApMaterno",$(this)).html();
  rfc=$(".RFC",$(this)).html();
  TelReferencia=$(".TelefonoReferencia",$(this)).html();
  TelCelular=$(".TelefonoCelular",$(this)).html();
  email=$(".Email",$(this)).html();
  redSocial=$(".RedSocial",$(this)).html();
  calle=$(".Calle",$(this)).html();
  numero=$(".Numero",$(this)).html();
  colonia=$(".Colonia",$(this)).html();
  codigopostal=$(".CodigoPostal",$(this)).html();
  referencias=$(".Referencias",$(this)).html();
  localidad=$(".Localidad",$(this)).html();
  $("[name=identificadorC]").val(idCliente);
  $("[name=identificadorD]").val(idDireccion);
  $("[name=Nombre]").val(nombre);
  $("[name=apaterno]").val(ApPaterno);
  $("[name=amaterno]").val(ApMaterno);
  $("[name=Calle]").val(calle);
  $("[name=Colonia]").val(colonia);
  $("[name=Numero]").val(numero)
  $("[name=CP]").val(codigopostal)
  $("[name=Localidad]").val(localidad);
  $("[name=TelefonoReferencia]").val(TelReferencia)
  $("[name=TelefonoCelular]").val(TelCelular)
  $("[name=Email]").val(email)
  $("[name=RedSocial]").val(redSocial)
  $("[name=rfcCliente]").val(rfc)
  $("[name=ReferenciaUbicacion]").val(referencias)
});
$("#FormClientesConsulta").submit(function(FormClientesConsulta) {
  FormClientesConsulta.preventDefault()
})
var Formulario=$("#FormClientesConsulta")
$("#ModificarCliente").click(function(qaz) {
  if(Formulario.parsley().isValid()){
    DatosClientesModificado.idC=$("[name=identificadorC]").val()
    DatosClientesModificado.idD=$("[name=identificadorD]").val()
    DatosClientesModificado.Nombre=$("[name=Nombre]").val()
    DatosClientesModificado.ApellidoPaterno=$("[name=apaterno]").val()
    DatosClientesModificado.ApellidoMaterno=$("[name=amaterno]").val()
    DatosClientesModificado.RFC=$("[name=rfcCliente]").val()
    DatosClientesModificado.TelefonoReferencia=$("[name=TelefonoReferencia]").val()
    DatosClientesModificado.Email=$("[name=Email]").val()
    DatosClientesModificado.TelefonoCelular=$("[name=TelefonoCelular]").val()
    DatosClientesModificado.RedSocial=$("[name=RedSocial]").val()
    DatosClientesModificado.Calle=$("[name=Calle]").val()
    DatosClientesModificado.Colonia=$("[name=Colonia]").val()
    DatosClientesModificado.Numero=$("[name=Numero]").val()
    DatosClientesModificado.CodigoPostal=$("[name=CP]").val()
    DatosClientesModificado.ReferenciaUbicacion=$("[name=ReferenciaUbicacion]").val()
    DatosClientesModificado.Localidad=$("[name=Localidad]").val()
    ajaxgeneral(DatosClientesModificado,"Servicios/editClientes.php","JSON").success(function (respuesta) {
      alerta(respuesta.insercion, respuesta.msg);
      cargardatos();
      Formulario.parsley().destroy();
      $("#modal-dialogClientes").modal('hide')
    })
  }
  else{
    alerta(false,"Inserte los campos necesarios para modificar el registro")
  }
});
$("#EliminarCliente").click(function (wq) {
  DatosClientesModificado.idC=$("[name=identificadorC]").val()
  DatosClientesModificado.idD=$("[name=identificadorD]").val()
  ajaxgeneral(DatosClientesModificado,"Servicios/deleteClientes.php","JSON").success(function (respuesta) {
      alerta(respuesta.Eliminado, respuesta.mensaje)
      TablaClientesR.fnDestroy();
      cargardatos()
      Formulario.parsley().destroy();
      $("#modal-dialogClientes").modal('hide')
  })
 
  // TablaClientesR.fnDestroy()
  
})