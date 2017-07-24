var Datos;
$("#GuardarInformacion").click(function(evento) {
	if($('#SucursalDUO').parsley().validate()){
		Datos=$("#SucursalDUO").serialize()
		// console.log(Datos);
		ajaxgeneral(Datos,"Servicios/addSucursales.php","JSON").success(function (Respuesta) {
			alerta(Respuesta.Insercion,Respuesta.Mensaje)
			if(Respuesta.Insercion)
			{
				$('#SucursalDUO').parsley().reset()	
				$("input").val("");
			}
		})
    }
});
$('#SucursalDUO').submit( function(e){ 
    e.preventDefault();
});


