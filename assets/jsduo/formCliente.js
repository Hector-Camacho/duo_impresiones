FormWizardValidation.init();
// $("[name=TelefonoReferencia]").mask("(999) 999-9999");
// $("[name=telefonocelular]").mask("(999) 999-9999");
// $('[name=rfcCliente]').mask('aaaa999999***');

var DatosClientes={
	Nombre:"",
	ApellidoPaterno:"",
	RFC:"",
	TelefonoReferencia:"",
	Email:"",
	TelefonoCelular:"",
	RedSocial:"",
	RepresentanteEmpresa:"",
	
	Calle:"",
	Colonia:"",
	Numero:"",
	CodigoPostal:"" ,
	ReferenciaUbicacion:"",
	Localidad:"",
	
	NombreNuevaEmpresa:"",
	RFCempresa:""
};
/*Para mostrar la empresa en caso de ser un cliente representante*/
$(".Empresas").hide()
$("#EmpresaAgregada").hide()
$("[name=RepresentanteEmpresa]").change( function(event) {
	var Value;
	Value=this.value;
	if(Value==="1"){
		$(".Empresas").show();
		$("#EmpresaAgregada").hide()
		$("#Empresa").val("")
	}
	else{
		$(".Empresas").hide()
	}
});
$("#GuardarInformacion").click(function(evento) {
	evento.preventDefault();
	DatosClientes.Nombre=$("[name=nombre]").val();
	DatosClientes.ApellidoPaterno=$("[name=ApPaterno]").val()
	DatosClientes.ApellidoMaterno=$("[name=ApMaterno]").val()
	DatosClientes.RFC=$("[name=rfcCliente]").val();
	DatosClientes.TelefonoReferencia=$("[name=TelefonoReferencia]").val()
	DatosClientes.Email=$("[name=email]").val();
	DatosClientes.TelefonoCelular=$("[name=telefonocelular]").val()
	DatosClientes.RedSocial=$("[name=RedSocial]").val();
	DatosClientes.RepresentanteEmpresa=$("input[type='radio'][name='RepresentanteEmpresa']:checked").val();
	
	DatosClientes.Colonia=$("[name=colonia]").val();
	DatosClientes.Calle=$("[name=calle]").val();
	DatosClientes.Numero=$("[name=numero]").val();
	DatosClientes.CodigoPostal=$("[name=CodigoPostal]").val();
	DatosClientes.ReferenciaUbicacion=$("[name=referencia]").val();
	DatosClientes.Localidad=$("[name=localidad]").val();
	
	DatosClientes.NombreNuevaEmpresa=$("[name=NombreEmpresaCliente]").val();
	DatosClientes.RFCempresa=$("[name=RFCempresa]").val();
	ajaxgeneral(DatosClientes,"Servicios/addClientes.php","JSON").success(function (Respuesta) {

		alerta(Respuesta.insercion,Respuesta.msg)

		if(Respuesta.insercion)
		{
			$('#ClientesForm').parsley().reset();
			$("input, textarea").val("");
			$(".Empresas").hide()
			$("#EmpresaAgregada").hide()
			$("#Contenedor").load("../Views/Componentes/AgregarCliente.php")
		}

	})
})
$("#RegistrarEmpresa").click(function(edc) {
	$("#modal-dialog").modal('show');
});
$("#GuardarInfoEmpresa").click(function(qaz) {
	$("#modal-dialog").modal('hide');
	$("[name=Empresa]").val($("[name=NombreEmpresaCliente]").val())
	$("#EmpresaAgregada").show()
	
})