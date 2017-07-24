var Formularios={
	href:null,
	aux:""
}

$(".Vistas").click(function(evento) {
	evento.preventDefault();
	Formularios.href=$(this).attr('href');
    $("#Contenedor").load("Views/Componentes/"+ Formularios.href)
  if(Formularios.href!=Formularios.aux){
		Formularios.aux=Formularios.href;
	}
});


function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
    if (tecla==44) return true; //Coma ( En este caso para diferenciar los decimales )
    if (tecla==48) return true;
    if (tecla==49) return true;
    if (tecla==50) return true;
    if (tecla==51) return true;
    if (tecla==52) return true;
    if (tecla==53) return true;
    if (tecla==54) return true;
    if (tecla==55) return true;
    if (tecla==56) return true;
    if (tecla==57) return true;
    patron = /1/; //ver nota
    te = String.fromCharCode(tecla);
    return patron.test(te); 
} 
function ajaxgeneral(datosmandar,ruta,tipo)
       {
            return $.ajax({
            url: ruta,
            type: 'POST',
            dataType: tipo,
            data: datosmandar
                            }); //Llave del ajax
       }
       
       
  function alerta(estado,insercion)
        {
          if(estado == true)
          {
              setTimeout(function() 
              {
                    toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "progressBar": true,
                      "positionClass": "toast-bottom-right",
                      "onclick": null,
                      "showDuration": "400",
                      "hideDuration": "1000",
                      "timeOut": "4500",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    };
                    toastr.success(insercion, 'Enhorabuena.');
                }, 900);
          }
          else
          {
              setTimeout(function() 
              {
                    toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "progressBar": true,
                      "positionClass": "toast-bottom-right",
                      "onclick": null,
                      "showDuration": "400",
                      "hideDuration": "1000",
                      "timeOut": "4500",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    };
                    toastr.error(insercion, 'Error');
                }, 2600);
          }
        }
        
        
        
             intro = introJs();
                  intro.setOptions({
                        'nextLabel':"Siguiente",
                        'prevLabel':"Anterior",
                        'skipLabel':'Terminar',
                        'doneLabel':'Terminar',
                        'steps': [
                          {
                            element: document.querySelectorAll('.menu')[0],
                            intro: "Opciones para guardar, consultar y eliminar algun cliente.",
                            position:"right"
                          },
                          {
                            element: document.querySelectorAll('.menu')[1],
                            intro: "En este apartado podras dar de alta un nuevo empleado junto a su información para iniciar sesión en el sistema.",
                            position:"right"

                          },
                          {
                            element: document.querySelectorAll('.menu')[2],
                            intro: "Aquí podrás controlar el flujo de trabajo y generar pedidos así como consultar el estado de cada uno de ellos.",
                            position:"right"
                            
                          },
                          
                          {
                            element: document.querySelectorAll('.menu')[3],
                            intro: "Con este botón podrás minimizar el menú prinicipal y de igual forma una vez minimizado, poder maximizarlo.",
                            position:"right"

                          },
                          
                            {
                            element: '#Contenedor',
                            intro: "En este apartado se muestra todas las partes para interactuar con el sistema",
                            position: 'bottom'
                          },
                          //      {
                          //   element: '#Frm_Ficha',
                          //   intro: 'Introducir la información necesaria para generar la Ficha',
                          //   position: 'top'
                          // },
                        ]
                      });


                $(".start-tour").on("click",function(){
                        intro.start();
                });