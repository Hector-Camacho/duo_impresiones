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

var Procesos={	
	Nombre:"",
	Tiempo:"",
	Servicio:"",
	Prioridad:"",
	Rol:""
}
$("#GuardarProcesos").click(function(evt) {
	if($("#Procesos").parsley().validate()){
		Procesos.Nombre=$("[name=NombreProceso]").val();
		Procesos.Tiempo=$("[name=TiempoProceso]").val();
		Procesos.Servicio=$("select[name=ServiciosProcesos]").val();
		Procesos.Prioridad=$("select[name=NivelPrioridad]").val();
		Procesos.Rol=$("select[name=RolRealiza]").val();
		ajaxgeneral(Procesos, "Servicios/addProcesos.php", "JSON").success(function (respuesta){
			alerta(respuesta.insersion,respuesta.Mensaje);
			$("#Procesos").parsley().reset()
			$("input").val("");
		});
	}
	
})
$("[name=Procesos]").submit(function(procesos) {
	procesos.preventDefault()
})
$("#CancelarProcesos").click(function(eve) {
	$("#Procesos").parsley().reset()
	$("input").val("")
})

