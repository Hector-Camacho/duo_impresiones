function CargarTablaCuerpoPedido(Datos){
    var renglon;
    $.each(Datos, function(index, Pedido) {
              renglon+='<tr class="renglon" title="Da clic sobre cualquier elemento de la tabla para edita la información o eliminar el registro.">\
              <td class="Nombre">'+Pedido.Servicio+'</td>\
              <td class="Cantidad">'+Pedido.Cantidad+'</td>\
              <td class="Total">'+Pedido.Total+'</td>\
              </tr>';
            });
              $("#DatosCuerpoPedido").html(renglon);
              TableManageDefault.init();
                 
  }
function cargardatosCuerpoPedido(){
    ajaxgeneral("","Servicios/setCuerpoPedido.php","JSON").success(function(respuesta)
    {
      if(respuesta)
      {
          CargarTablaCuerpoPedido(respuesta);
          
      }
      else
      {
          alert("Hubo un error");
      }
    });
 }
function selectores(respuesta){
	$("[name=UnidadVenta]").empty();
	$.each(respuesta, function(index, Servicios) 
  	  {
          var Options=$('<option value="'+Servicios.idServicios+'">'+Servicios.Nombre+'</option>');
          $("[name=UnidadVenta]").append(Options);
      });

 }
function selectorMaterial(respuesta){
	$("[name=Material]").empty();

  	var Servicio={
  		idServicios:""
  	}
	Servicio.idServicios=respuesta;
  	ajaxgeneral(Servicio,"Servicios/SelectorMateriales.php", "JSON").success(function (respuesta){
  	$.each(respuesta, function(index, Material){
          var Options=$('<option value="'+Material.Id+'">'+Material.Materiales+'</option>');
          $("[name=Material]").append(Options);
      });
  	});	
  	
 }
function Checkboxs(respuesta){
	$("[name=checkboxDiv]").empty();

  	var Servicio={
  		idServicios:""
  	}
	Servicio.idServicios=respuesta;
  	ajaxgeneral(Servicio,"Servicios/CheckboxsPedidos.php","JSON").success(function(respuesta){
  		$.each(respuesta, function(index, Proceso)
  	  	{	
	  	  	var Checks=$('<label><input type="checkbox" value="'+Proceso.idProcesos+'">'+Proceso.nombre+'</label><br>');
	  	 	$("[name=checkboxDiv]").append(Checks);
        });
  	});
 }
function TipoModal(idServicio){

	var Servicio = {idServicios:""}
	Servicio.idServicios=idServicio;
		ajaxgeneral(Servicio, "Servicios/ModalDinamico.php", "JSON").success(function(respuesta){

		if (respuesta[0].UnidadVenta == "Piezas") {
			$("#Material").html('Estilos:');
			$( "#DesaparecerAnchoAlto" ).animate({
				    left: "+=50",
				    height: "toggle"
				  }, 1000, function(){});
		}
		else{
			$( "#DesaparecerAnchoAlto" ).animate({
				    left: "+=50",
				    height: "toggle"
				  }, 1000, function(){});
		}
		
	});
 }
cargardatosCuerpoPedido();
	ajaxgeneral("","Servicios/SelectorConfiguraciones.php","JSON").success(function (respuesta){
			selectores(respuesta);
		});
$('#UnidadVenta').on('change', function() {
	var id=$(this).val()
	TipoModal(id);
	Checkboxs(id);
	selectorMaterial(id);
});	 
$(".Perimetro").change(function() {
	var Ancho =$("#Ancho").val();
	var Alto =$("#Alto").val();
	var Total = Ancho * Alto;
	$("[name=Total]").val(Total+' m²');
});


	