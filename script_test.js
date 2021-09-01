// function get_avg() {
//   var xhttp;  
//   xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//   xhttp.open("GET", "get_avg_day.php", true);
//   xhttp.send();
// }

  $(document).ready(function() {
      get_avg();
   });

function get_avg(){
    $.getJSON('get_avg.php', function(data) {
        var tempavg0d  = data.tempavg0d;
        var tempavg1d  = data.tempavg1d;  
        var tempavg6d  = data.tempavg0d; 
        var tempavg29d  = data.tempavg29d; 

        var humavg0d  = data.humavg0d; 
        var humavg1d  = data.humavg1d;
        var humavg6d  = data.humavg6d; 
        var humavg29d  = data.humavg29d; 
           
        var tempoutavg0d  = data.tempoutavg0d; 
        var tempoutavg1d  = data.tempoutavg1d; 
        var tempoutavg6d  = data.tempoutavg0dd; 
        var tempoutavg29d  = data.tempoutavg29d; 
           
        var humoutavg0d  = data.humoutavg0d; 
        var humoutavg1d  = data.humoutavg1d; 
        var humoutavg6d  = data.humoutavg6d; 
        var humoutavg29d  = data.humoutavg29d; 


        console.log('tempavg0d');
        console.log(tempavg0d);

        // $(".ultemperature").html('<li>Yesterday Avg: ' +tempavg0d+'°C</li>');
    $(".ultemperature").html('<li>Yesterday : ' +tempavg1d+'°C</li>'
                                 +'<li>Today Avg: ' +tempavg0d+'°C</li>'
                                 +'<li>Week Avg: ' +tempavg6d+'°C</li>'
                                 +'<li>Mont Avg: ' +tempavg29d+'°C</li>');

    $(".ulhumidity").html('<li>Yesterday : ' +humavg1d+'°C</li>'
                                 +'<li>Today Avg: ' +humavg0d+'°C</li>'
                                 +'<li>Week Avg: ' +humavg6d+'°C</li>'
                                 +'<li>Mont Avg: ' +humavg29d+'°C</li>');

    $(".ultemperatureout").html('<li>Yesterday : ' +tempoutavg1d+'°C</li>'
                                 +'<li>Today Avg: ' +tempoutavg0d+'°C</li>'
                                 +'<li>Week Avg: ' +tempoutavg6d+'°C</li>'
                                 +'<li>Mont Avg: ' +tempoutavg29d+'°C</li>');

    $(".ulhumidityout").html('<li>Yesterday : ' +humoutavg1d+'°C</li>'
                                 +'<li>Today Avg: ' +humoutavg0d+'°C</li>'
                                 +'<li>Week Avg: ' +humoutavg6d+'°C</li>'
                                 +'<li>Mont Avg: ' +humoutavg29d+'°C</li>');



      });
  }