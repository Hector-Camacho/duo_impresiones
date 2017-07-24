    $('#iniciarsesion').click(function(e)
    {
	    $.ajax({
	        url: 'Servicios/login.php',
	        type: 'POST',
	        dataType: 'JSON',
	        data: $('#validaUsuario').serialize(),
	        success: function(Datos)
	        {
	            switch(Datos)
	            {
	                case null:
	                {
	                    alert("Usuario No Valido");
	                    $('input').val('');
	                    
	                    break;
	                }
	                case true:
	                {
	                    window.location=Datos;
	                    break;
	                }
	                default:
	                {
	                    window.location=Datos;
	                    break;
	                }
	            }
	        }
	    });
    });

    