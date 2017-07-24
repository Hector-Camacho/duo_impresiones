var Tabla =$("[name=TablaMateriales]")
$("#Noti").hide()
function CargarTabla(Datos) 
{
  var renglon;
  if(Datos.length>0){
   $("#TablaMA").show()
   $("#Noti").hide() 
   $.each(Datos, function(index, Materiales) {
            renglon+='<tr class="renglon" href="#modal-MaterialesModificar" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
            <td class="identificadorMaterial">'+Materiales.idMateriales+'</td>\
            <td class="Nombre">'+Materiales.Nombre+'</td>\
            </tr>';
          });
            $("[name=DatosMateriales]").html(renglon);
            Tabla.dataTable();
  }
  else{
    $("#Noti").show()
    $("#TablaMA").hide()
  }
  
}

function cargardatos()
{ 
  ajaxgeneral("","Servicios/setMateriales.php","JSON").success(function(respuesta)
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
var Formulario=$("#MaterialesModificar")
$("[name=DatosMateriales]").on('click','.renglon',function () {
  idM=$(" .identificadorMaterial",$(this)).html();
  Nombre=$(".Nombre",$(this)).html();
  $("[name=IdentificadorMaterial]").val(idM);
  $("[name=NombreMaterial]").val(Nombre);
});
$("#ModificarMaterial").click(function (qaz) {
  if(Formulario.parsley().isValid()){
    var Datos=Formulario.serialize()
    ajaxgeneral(Datos,"Servicios/editMateriales.php","JSON").success(function (respuesta) {
      $("#modal-dialog").modal('hide')
      alerta(respuesta.insercion, respuesta.msg);
      cargardatos();
      Formulario.parsley().destroy()
      $("#modal-MaterialesModificar").modal('hide')
    })
  }
  else{
    alerta(false,"Inserte los campos necesarios para modificar el registro")
  }
});
$("#EliminarMaterial").click(function (wq) {
  var Datos=$("#MaterialesModificar").serialize()
  ajaxgeneral(Datos,"Servicios/deleteMateriales.php","JSON").success(function (respuesta) {
      alerta(respuesta.insercion, respuesta.Mensaje)
      Tabla.fnDestroy();
      cargardatos()
      Formulario.parsley().destroy()
      $("#modal-MaterialesModificar").modal('hide')
  })
  
})
$("#MaterialesModificar").submit(function (MaterialesModificar) {
  MaterialesModificar.preventDefault()
})