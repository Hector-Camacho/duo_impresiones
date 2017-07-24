function selectores(respuesta)
   {
    $("[name=ServiciosConfiguraciones]").empty();
      $.each(respuesta, function(index, Servicios) 
	      {
	          var seleccts=$('<option value="'+Servicios.idServicios+'">'+Servicios.Nombre+'</option>');
	          $("[name=ServiciosConfiguraciones]").append(seleccts);
	      });
   }	
ajaxgeneral("","Servicios/SelectorConfiguraciones.php","JSON").success(function(respuesta){
	selectores(respuesta)
});
var Configuraciones={	
	Nombre:"",
	Tiempo:"",
	Servicio:""
}
$("#GuardarConfiguraciones").click(function(e) {
	Configuraciones.Nombre=$("[name=NombreConfiguracion]").val();
	Configuraciones.Tiempo=$("[name=TiempoConfiguracion]").val();
	Configuraciones.Servicio=$("select[name=ServiciosConfiguraciones]").val();
	if($("[name=FormConfiguracion]").parsley().validate()){
		ajaxgeneral(Configuraciones, "Servicios/addConfiguraciones.php", "JSON").success(function(respuesta){
			if(true)
			{
				alerta(true,respuesta.Mensaje);
				$('[name=FormConfiguracion]').parsley().reset()	
				$("input").val("");
			}
			else
			{
				alerta(false,respuesta.Mensaje);
			}
		});
	}
});
$("#CancelarConfiguracion").click(function () {
	$('[name=FormConfiguracion]').parsley().reset()	
	$("input").val("");
})

$("[name=FormConfiguracion]").submit(function (ev) {
	ev.preventDefault()
})
