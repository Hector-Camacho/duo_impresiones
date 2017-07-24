    function cargardatos()
    {
       ajaxgeneral("","Servicios/charinicio.php","JSON").success(function(respuesta)
       {
          GenerarChart(respuesta);
       });
   }

   
   
   
   
   
   
  cargardatos();
   
   
   
  // var arraydinamicovalores = [];
  // var arraydinamicotitulos = [];
  
  
  var arreglo = [];
  var val = [];

   
   
function GenerarChart(Datos) 
{
   $.each(Datos, function(index, Valores) 
   {
    // arraydinamicovalores.push(Valores.count);
    // arraydinamicotitulos.push(Valores.Nombre);
    
    
    val.count = Valores.Valor;
    val.Nombre = Valores.Nombre;
    
    //arreglo.push(val.count, val.Nombre);
    
    
    arreglo.push({Valorchar: parseInt(val.count), Nombrechar: val.Nombre});
    });

   //setTimeout(function(){  
      var height = 500;
      var width = 500;
   
         nv.addGraph(function() 
          {
              var chart = nv.models.pieChart()
                  .x(function(d) { return d.Nombrechar })
                  .y(function(d) { return d.Valorchar })
                  .width(width)
                  .height(height);
              d3.select("#test1")
                  .datum(arreglo)
                  .attr('width', width)
                  .attr('height', height)
                  .call(chart);

          });
          
          
          
          nv.addGraph(function() 
          {
              var chart = nv.models.pieChart()
                  .x(function(d) { return d.Nombrechar })
                  .y(function(d) { return d.Valorchar })
                  .color(d3.scale.category20().range().slice(8))
                  .growOnHover(false)
                  .labelType('value')
                  .width(width)
                  .height(height);

              chart.pie
                  .startAngle(function(d) { return d.startAngle/2 -Math.PI/2 })
                  .endAngle(function(d) { return d.endAngle/2 -Math.PI/2 });
              return chart;
          });
 
   //}, 1000);//Intervalo
    
    
    // for (var i = 0; i <= arreglo.length - 1; i++) 
    // {
    //   console.log(arreglo[i]);
    // }
    
    
      console.log(arreglo);
    
    
  
}
   

    var testdata2 = [
        {key: "One", y: 5},
        {key: "Two", y: 2},
        {key: "Three", y: 9},
        {key: "Four", y: 7},
        {key: "Five", y: 4},
        {key: "Six", y: 3},
        {key: "Seven", y: 0.5}
    ];
 //console.log(testdata2);
 
 



