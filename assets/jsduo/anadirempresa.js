var empresa={
	nombreempresa:"",
	rfcempresa:"",
	idclienterepresentante:""	
}

$("#guardar_empresa").click(function(evt)
{
    evt.preventDefault();
    empresa.nombreempresa = $("[name=nombreempresa]").val();
    empresa.rfcempresa = $("[name=rfcempresa]").val();
    empresa.idclienterepresentante = $("[name=idclienterepresentante]").val();
       ajaxgeneral(empresa,"Servicios/addEmpresa.php","JSON").success(function(respuesta)
       {
           alerta(true,respuesta);
       });
});//Final del click

    function cargardatos()
    {
       ajaxgeneral("","Servicios/setRepresentanteEmpresa.php","JSON").success(function(respuesta)
       {
          selectores(respuesta);
       });
   }

   function selectores(respuesta)
   {
    $("[name=idclienterepresentante]").empty();
      $.each(respuesta, function(index, cliente) 
        {
            var seleccts=$('<option value="'+cliente.idClientes+'">'+cliente.Nombre+' '+cliente.ApellidoPaterno+' '+cliente.ApellidoMaterno+'</option>');
            $("[name=idclienterepresentante]").append(seleccts);
        });
   }
   
   cargardatos();