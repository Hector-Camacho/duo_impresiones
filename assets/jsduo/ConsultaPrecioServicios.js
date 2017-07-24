var datasource = new Array();
var Tabla = $('#TableServPrecio');
var arrDescripcion = new Array();
ServicioPrecioModificado = {
	Id:'',
	Servicio:'',
	Precio:'',
	PrecioM:'',
	Descripcion:''
};
$("#Noti").hide()
function CargarTabla(Datos) {
	var renglon;
	if(Datos.length>0){
		$("#Noti").hide()
		$("#TablaSP").show()
		datasource = Datos;
		$.each(Datos, function(index, ServPrecio) {
		renglon += '<tr class="renglon" href="#modal-dialogPrecioServ" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
			<td class="Identificador ocultar">'+ServPrecio.id+'</td>\
			<td class="Nombre">'+ServPrecio.Servicio+'</td>\
			<td class="Material">'+ServPrecio.Material+'</td>\
			<td class="Precio">'+ServPrecio.Precio+'</td>\
			<td class="PrecioM">'+ServPrecio.PrecioM+'</td>\
			<td class="Descripcion">'+ServPrecio.Descripcion+'</td>\
		</tr>';
		$('#DatosPrecioServicios').html(renglon);
		arrDescripcion[ServPrecio.idServicioPrecio] = ServPrecio.Descripcion;
	});
	Tabla.dataTable();
	}
	else{
		$("#Noti").show()
		$("#TablaSP").hide()
	}
	
}

function CargarDatos() {
	ajaxgeneral('', 'Servicios/setPreciosServicios.php','JSON').success(function(respuesta) {
		if (respuesta) {
			CargarTabla(respuesta);
		}
		else {
			alert("Hubo un error");
		}
	});
}

CargarDatos();

$('#DatosPrecioServicios').on('click', '.renglon', function() {
	
	var index = $(this).index('.renglon');
	var objeto = datasource[index];
	var Id = $('.Identificador', $(this)).html();
	var Nombre = $('.Nombre', $(this)).html();
	var Precio = $('.Precio', $(this)).html();
	var PrecioM = $('.PrecioM', $(this)).html();
	var Descripcion = arrDescripcion[$('.Descripcion', $(this)).html()];

	//Pasar valores del renglon al modal
	$('[name=IdentificadorPrecioServicio]').val(Id);
	$('[name=NombrePrecioServicio]').val(Nombre);
	$('[name=PrecioServicio]').val(Precio);
	$('[name=PrecioServicioMayoreo]').val(PrecioM);
	$('[name=DescripcionServicio]').val(Descripcion);
});

$('#ModificarPrecioServicio').click(function(qaz) {
	qaz.preventDefault();
	ServicioPrecioModificado.Id = $('[name=IdentificadorPrecioServicio]').val();
	ServicioPrecioModificado.Servicio = $('[name=NombrePrecioServicio]').val();
	ServicioPrecioModificado.Precio = $('[name=PrecioServicio]').val();
	ServicioPrecioModificado.PrecioM = $('[name=PrecioServicioMayoreo]').val();
	ServicioPrecioModificado.Descripcion = $('[name=DescripcionServicio]').val();
	console.log(ServicioPrecioModificado);
		ajaxgeneral(ServicioPrecioModificado, 'Servicios/editPreciosServicios.php','JSON').success(function(respuesta) {
			alerta(respuesta.insersion,respuesta.Mensaje);
			$('#modal-dialogPrecioServ').modal('hide');
			CargarDatos();
		});
});
$('#EliminarPrecioServicio').click(function(qaz){
	qaz.preventDefault();
	ServicioPrecioModificado.Id = $('[name=IdentificadorPrecioServicio]').val();
	ajaxgeneral({NombreFuncion:"EliminarPrecio",Precio:ServicioPrecioModificado}, 'Servicios/deleteServicios.php', 'JSON').success(function(response){
		alerta(response.Insersion,response.Mensaje);
	});
	
	CargarDatos();
});


$("[name=FormularioPrecioServicios]").submit(function(e) {
	e.preventDefault();
});

$(".resetForm").click(function(click) {
	$("[name=FormularioPrecioServicios]").parsley().reset()
});
