var MetodoDePago={
	Nombre:""
}
function Agregar(Metodo){
	ajaxgeneral(Metodo, "Servicios/addMetodo.php", "JSON").success(function(response){
		alerta(response.Insersion,response.Mensaje)
	});
}
$("#GuardarMetodo").click(function(e){
	MetodoDePago.Nombre=$("#MetodosPagos").val();
	Agregar(MetodoDePago);
	$("#MetodosPagos").val("")
});