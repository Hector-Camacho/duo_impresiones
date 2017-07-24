var empleado={
  nombre:"",
  app:"",
  apm:"",
  rfc:"",
  telefono:"",
  calle:"",
  numero:"",
  colonia:"",
  codigopostal:"",
  referenciaubicacion:"",
  localidad:"",
  horaentrada:"",
  horasalida:"",
  horacomida:"",
  nombreusuario:"",
  contrasena:"",
  rolusuario:"",
  sucursal:""
}

function ListadoSucursales() 
{
  ajaxgeneral("","Servicios/setSucursales.php","json").success(function(Sucursales) 
  {
      $.each(Sucursales, function(index, sucursal)
      {
          var sucursales=$('<option class="Opc" value="'+sucursal.idSucursalesDuo+'">'+sucursal.NombreSucursal+'</option>');
          $("[name=SucursalDuo]").append(sucursales);
      });//Final del each
  })
}

ListadoSucursales()
$("#guardar_empleado").click(function(evt)
{
    evt.preventDefault();
    empleado.nombre = $("[name=nombre]").val();
    empleado.app = $("[name=app]").val();
    empleado.apm = $("[name=apm]").val();
    empleado.rfc = $("[name=rfc]").val();
    empleado.telefono = $("[name=telefono]").val();
    empleado.calle = $("[name=calle]").val();
    empleado.colonia = $("[name=colonia]").val();
    empleado.numero = $("[name=numero]").val();
    empleado.codigopostal = $("[name=codigopostal]").val();
    empleado.referenciaubicacion = $("[name=referenciaubicacion]").val();
    empleado.localidad = $("[name=localidad]").val();
    empleado.horaentrada = $("[name=horaentrada]").val();
    empleado.horasalida = $("[name=horasalida]").val();
    empleado.horacomida=$("[name=horadecomida]").val();
    empleado.nombreusuario = $("[name=nombreusuario]").val();
    empleado.contrasena = $("[name=contrasena]").val();
    empleado.rolusuario = $("[name=rolusuario]").val();
    empleado.sucursal=$("[name=SucursalDuo]").val()
    console.log(empleado);
    
    ajaxgeneral(empleado,"Servicios/addEmpleados.php","JSON").success(function(respuesta)
    {
      alerta(respuesta.insercion, respuesta.msg)
      if(respuesta.insercion){
        $('#EmpleadoForm').parsley().reset();
        $("input, textarea").val("");
        $("#Contenedor").load("../Views/Componentes/panel_rempleado.php")
      }
    });
});//Final del click
var Formulario=$('#EmpleadoForm');
    Formulario.bootstrapValidator({
        fields: {
            nombreusuario: {
                validators: {
                    remote: {
                        message: 'Este Usuario ya esta en uso',
                        url: 'Servicios/ValidUsername.php',
                        data: {
                            type: 'nombreusuario'
                        }
                    }
                }
            }
        }//Final de fields
    });//Cierre del validator del form