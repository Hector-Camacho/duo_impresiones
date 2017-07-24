var Servicio={
	Nombre:"",
	Categoria:"",
	UnidadVenta:"",
	Estatus:""
}
$("#GuardarServicio").click( function(evt) {
	if($("#Servicios").parsley().validate()){
		Servicio.Nombre=$("[name=NombreServicio]").val();
		Servicio.Categoria=$("[name=CategoriaServicio]").val();
		Servicio.UnidadVenta=$("[name=UnidadVenta]").val()
		Servicio.Estatus=$('input:radio[name=optionsRadios]:checked').val()
		console.log(Servicio);
		ajaxgeneral(Servicio, "Servicios/addServicios.php", "JSON").success(function (respuesta) {
			alerta(respuesta.insersion,respuesta.Mensaje);
			$("input").val("");
			$("#Servicios").parsley().reset()
			
		})
	}
});
$("#Servicios").submit(function(sub) {
	sub.preventDefault()
})
$("#CancelarServicio").click(function(cancelar) {
	$("#Servicios").parsley().reset()
	$("input").val("")
})