var datasource= new Array();
var TablaEmpresas=$("[name=TablaEmpresas]");
EmpresaModificado={
    Id:"",
    Nombre:"",
    RFC:""
}
function CargarTabla(Datos) 
{
  var renglon;
  if(Datos.length>0)
  {
    $("#Noti").hide()
    $("#TablaEm").show()
    datasource=Datos;
    $.each(Datos, function(index, Empresas) {
            renglon+='<tr class="renglon" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="Identificador">'+Empresas.idEmpresas+'</td>\
            <td class="Nombre">'+Empresas.NombreEmpresa+'</td>\
            <td class="RFC">'+Empresas.RFCempresa+'</td>\
            </tr>';
            $("#DatosEmpresas").html(renglon);
          });
          TablaEmpresas.dataTable();
  }
  else{
    $("#Noti").show()
    $("#TablaEm").hide()
  }   
}
function cargardatos()
{
  ajaxgeneral("","Servicios/setEmpresas.php","JSON").success(function(respuesta)
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
var Formulario= $("[name=FormularioEmpresas]")
$("#DatosEmpresas").on('click','.renglon',function () {  
  var Id =$(".Identificador",$(this)).html();
  var Nombre =$(".Nombre",$(this)).html();
  var RFC =$(".RFC", $(this)).html();
  //Pasar valores del renglon al modal
  $("[name=IdentificadorEmpresa]").val(Id);
  $("[name=NombreEmpresaModal]").val(Nombre);
  $("[name=RFCEmpresaModal]").val(RFC);
  $("#modal-dialogEmp").modal('show')
});
$("#ModificarEmpresa").click(function (qaz) {
  if(Formulario.parsley().isValid()){
    EmpresaModificado.Id=$("[name=IdentificadorEmpresa]").val();
    EmpresaModificado.Nombre=$("[name=NombreEmpresaModal]").val();
    EmpresaModificado.RFC=$("[name=RFCEmpresaModal]").val();
    ajaxgeneral(EmpresaModificado,"Servicios/editEmpresas.php","JSON").success(function (respuesta){
      alerta(respuesta.Insercion,respuesta.Mensaje);
      cargardatos();
      Formulario.parsley().destroy()
      $("#modal-dialogEmp").modal('hide')
    });
  }
   else{
    alerta(false,"Inserte los campos necesarios para modificar el registro")
  }
});
$("#EliminarEmpresa").click(function(){
    var EmpresaEliminado={
      Id:""
    }
    EmpresaEliminado.Id=$("[name=IdentificadorEmpresa]").val();
    ajaxgeneral(EmpresaEliminado, "Servicios/deleteEmpresa.php", "JSON").success(function (respuesta){
      alerta(respuesta.Insercion,respuesta.Mensaje);
      TablaEmpresas.fnDestroy()
      cargardatos()
      $("#modal-dialogEmp").modal('hide')
      Formulario.parsley().destroy()
    });
});
$("[name=FormularioEmpresas]").submit(function (frmEmpresa) {
  frmEmpresa.preventDefault()
})