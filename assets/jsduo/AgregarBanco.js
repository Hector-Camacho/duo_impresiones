function Agregar(Banco){
	ajaxgeneral(Banco, "Servicios/addBanco.php", "JSON").success(function(response){
		alerta(response.Insersion,response.Mensaje)
	});
}
$("#GuardarBanco").click(function(e){
	var Banco={Nombre:""}
	Banco.Nombre=$("#Nombrebanco").val()
	Agregar(Banco)
	$("#Nombrebanco").val("")
});