$("#GuardarMaterial").click(function(evento) {
	// evento.preventDefault();
	if($("#Materiales").parsley().validate()){
		var Datos =$("#Materiales").serialize();
		ajaxgeneral(Datos,"Servicios/addMaterial.php","JSON").success(function (respuesta) {
			$("input").val("")
			alerta(respuesta.Insersion, respuesta.Mensaje)
			$("#Materiales").parsley().reset();
			
		})
		// $("#Materiales").parsley().reset()
	}
})
function cargardatos()
{
   ajaxgeneral({NombreFuncion:"MostrarServPedido"},"Servicios/setServicios.php","JSON").success(function(respuesta)
   {
      selectores(respuesta);
   });
}
function selectores(respuesta)
{
$("[name=ServiciosDisponibles]").empty();
  $.each(respuesta, function(index, Servicio) 
    {
        var seleccts=$('<option value="'+Servicio.idServicios+'">'+Servicio.Nombre+'</option>');
        $("[name=ServiciosDisponibles]").append(seleccts);
    });
}
cargardatos()
$("#Materiales").submit(function(Material) {
	Material.preventDefault()
})
$("#CancelarMaterial").click(function () {
	$("#Materiales").parsley().reset();
})