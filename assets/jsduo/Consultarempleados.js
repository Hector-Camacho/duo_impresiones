var datosmultiples={
	Identificador:"",
	ApMaterno:"",
	ApPaterno:"",
	Calle:"",
	CalleSucursal:"",
	ClaveSucursal:"",
	CodigoPostal:"",
	Colonia:"",
	ColoniaSucursal:"",
	Contrasena:"",
	HoraEntrada:"",
	HoraSalida:"",
	HoraComida:"",
	Localidad:"",
	Nombre:"",
	NombreSucursal:"",
	NombreUsuario:"",
	Numero:"",
	NumeroSucursal:"",
	RFC:"",
	ReferenciaUbicacion:"",
	RolUsuario:"",
	Telefono:"",
	TelefonoSucursal:"",
	id:"",
	idDireccion:"",
	idEmpleados:"",
	idSucursal:"",
	idSucursalesDuo:""
};

function cargardatos() {
   ajaxgeneral("","Servicios/setEmpleados.php","JSON").success(function(respuesta)
   {
      CargarTabla(respuesta);
   });
}
function ListadoSucursales()  {
  ajaxgeneral("","Servicios/setSucursales.php","json").success(function(Sucursales) 
  {
      $.each(Sucursales, function(index, sucursal)
      {
          var sucursales=$('<option class="Opc" value="'+sucursal.idSucursalesDuo+'">'+sucursal.NombreSucursal+'</option>');
          $("[name=SucursalDuo]").append(sucursales);
      });//Final del each
  })
}
ListadoSucursales();
$("#Noti").hide()
var TablaEmpleado=$("[name=TablaEmpleado]")
function CargarTabla(Datos) {
  var renglon;
  if(Datos.length>0)
  {
  	$("#TablaE").show()
	$("#Noti").hide()
	datasource=Datos;
  	$.each(Datos, function(index, empleados) {
              renglon+='<tr class="renglon" href="#modal-dialog" data-toggle="modal" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
              <td class="inicio ocultar">'+index+'</td>\
              <td class="Nombre">'+empleados.Nombre+'</td>\
              <td class="ApPaterno">'+empleados.ApPaterno+'</td>\
              <td class="ApMaterno">'+empleados.ApMaterno+'</td>\
              <td class="RFC">'+empleados.RFC+'</td>\
              <td class="Telefono">'+empleados.Telefono+'</td>\
              <td class="NombreUsuario">'+empleados.NombreUsuario+'</td>\
              <td class="RolUsuario">'+empleados.RolUsuario+'</td>\
              <td class="HoraEntrada">'+empleados.HoraEntrada+'</td>\
              <td class="HoraSalida">'+empleados.HoraSalida+'</td>\
              <td class="HoraSalida">'+empleados.NombreSucursal+'</td>\
              </tr>';
              $("#DatosEmpleados").html(renglon);
          });
          TablaEmpleado.dataTable();
  }
  else{
  	$("#Noti").show()
  	$("#TablaE").hide()
  }
 
}
cargardatos();

   $("#DatosEmpleados").on("click",".renglon",function(ev){
      var index=$(this).index(".renglon");
      
      var objeto=datasource[index];
      console.log(objeto);
      
      inicio=$(".inicio",$(this)).html();
      datosmultiples.Identificador = inicio;
      
      Nombre=$(".Nombre",$(this)).html();
      AaPaterno=$(".AaPaterno",$(this)).html();
      ApMaterno=$(".ApMaterno",$(this)).html();
      RFC=$(".RFC",$(this)).html();
      Telefono=$(".Telefono",$(this)).html();
      NombreUsuario=$(".NombreUsuario",$(this)).html();
      RolUsuario=$(".RolUsuario",$(this)).html();
      HoraEntrada=$(".HoraEntrada",$(this)).html();
      HoraSalida=$(".HoraSalida",$(this)).html();
      NombreSucursal=$(".NombreSucursal",$(this)).html();
      
      	document.getElementById("nombre").focus();
		$("[name=nombre]").val(objeto.Nombre);
		$("[name=app]").val(objeto.ApPaterno);
		$("[name=apm]").val(objeto.ApMaterno);
		$("[name=rfc]").val(objeto.RFC);
		$("[name=telefono]").val(objeto.Telefono);
		$("[name=calle]").val(objeto.Calle);
		$("[name=colonia]").val(objeto.Colonia);
		$("[name=numero]").val(objeto.Numero);
		$("[name=codigopostal]").val(objeto.CodigoPostal);
		$("[name=referenciaubicacion]").val(objeto.ReferenciaUbicacion);
		$("[name=localidad]").val(objeto.Localidad);
		$("[name=nombreusuario]").val(objeto.NombreUsuario);
		$("[name=contrasena]").val(objeto.Contrasena);
		$("[name=password2]").val(objeto.Contrasena);
		$("[name=rolusuario]").val(objeto.RolUsuario);
		$("[name=horaentrada]").val(objeto.HoraEntrada);
		$("[name=horasalida]").val(objeto.HoraSalida);
		$("[name=horaComida]").val(objeto.HoraComida)
		$("[name=SucursalDuo]").val(objeto.SucursalDuo);
		datosmultiples.id = objeto.id;
		datosmultiples.idDireccion = objeto.idDireccion;
		datosmultiples.idEmpleados = objeto.idEmpleados;
		datosmultiples.idSucursal = objeto.idSucursal;
		datosmultiples.idSucursalesDuo = objeto.idSucursalesDuo;
		
		console.log(datosmultiples);
    });
var Formulario=$("[name=demo-form]")
$("#ModificarEmpleado").click(function(evt)
{
	if(Formulario.parsley().isValid())
	{	
		datosmultiples.Nombre = $("[name=nombre]").val();
		datosmultiples.ApPaterno = $("[name=app]").val();
		datosmultiples.ApMaterno = $("[name=apm]").val();
		datosmultiples.RFC = $("[name=rfc]").val();
		datosmultiples.Telefono = $("[name=telefono]").val();
		datosmultiples.Calle = $("[name=calle]").val();
		datosmultiples.Colonia = $("[name=colonia]").val();
		datosmultiples.Numero = $("[name=numero]").val();
		datosmultiples.CodigoPostal = $("[name=codigopostal]").val();
		datosmultiples.ReferenciaUbicacion = $("[name=referenciaubicacion]").val();
		datosmultiples.Localidad = $("[name=localidad]").val();
		datosmultiples.NombreUsuario = $("[name=nombreusuario]").val();
		datosmultiples.Contrasena = $("[name=contrasena]").val();
		datosmultiples.RolUsuario = $("[name=rolusuario]").val();
		datosmultiples.HoraEntrada = $("[name=horaentrada]").val();
		datosmultiples.HoraComida = $("[name=horaComida]").val();
		datosmultiples.HoraSalida = $("[name=horasalida]").val();
		datosmultiples.SucursalDuo = $("[name=SucursalDuo]").val();
		console.log(datosmultiples);
		
		ajaxgeneral(datosmultiples,"Servicios/editEmpleados.php","JSON").success(function(respuesta)
        {
        	alerta(respuesta.Insercion,respuesta.Mensaje)
        	
			$("#modal-dialog").modal('hide');
        	Formulario.parsley().destroy()
        	cargardatos();
        });//Final del success
	}
    else
    {
    	alerta(false,"Ingrese los campos necesarios para modificar el registro")
    }
});//Final del click
$("[name=ModificarEmpleado]").parsley()
$("[name=demo-form]").submit(function(e) {
	e.preventDefault();
})

$("#EliminarEmpleado").click(function(evt)
{
    evt.preventDefault();
       ajaxgeneral(datosmultiples,"Servicios/deleteEmpleado.php","JSON").success(function(respuesta)
       {
       	alerta(respuesta.Eliminado,respuesta.mensaje)
       	TablaEmpleado.fnDestroy()
       	cargardatos()
       	Formulario.parsley().destroy()
       });//Final del success
});//Final del click

$(".resetF").click(function () {
	$("[name=demo-form]").parsley().reset();
})