<!doctype html>
<html lang="en">
  <head>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


    <!-- UNTUK RADIAL CHART -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" language="JavaScript"></script>
    <script src="https://pandameister.github.io/chartjs-chart-radial-gauge/docs/js/Chart.RadialGauge.umd.js" language="JavaScript"></script>
    <script src="https://pandameister.github.io/chartjs-chart-radial-gauge/docs/samples/utils.js" language="JavaScript"></script>


    <!-- JQUERY AJAX UNTUK RELOAD DIV SANGAT-SANGAT-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- MY font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- JAVASCRIPT -->
    <script src="script.js"></script>


  <title>MINI GREENHOUSE</title>
  </head>
  <body> 

    <div class="judul">
        <h3>MINI GREENHOUSE</h3>
    </div>


    <!-- AWAL CHART -->
    <div class="container chart">
         <canvas id="linechart"></canvas>
    </div>
    <div class="tombol">
        <button class="btn btn-outline-primary btn-sm"   id="day"  type="button">DAY</button>
        <button class="btn btn-outline-secondary btn-sm"   id="week"   type="button">WEEK</button>
        <button class="btn btn-outline-success btn-sm"   id="month"  type="button">MONTH</button>
    </div>
    <!-- AKHIR CHART -->


     <!-- GAUGE -->
    <div class="container gauge_chart">
  <div class="row">

    <div class="col">
      <div class="col temperature" >
          <div class="row">
            <div class="col temperature-gauge" style="width:100%">
              <canvas id="chart-area-tem" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="col avg-temperature">
              <h5>Temperature</h5>
              <ul class="ultemperature">
                <li>Yesterday : --°C</li>
                <li>Today Avg : --°C</li>
                <li>Week Avg  : --°C</li>
                <li>Month Avg  : --°C</li>
              </ul>
            </div>
          </div>
        </div>
    </div>

    <div class="col">
      <div class="col humidity">
          <div class="row">
            <div class="col humidity-gauge">
             <canvas id="chart-area-hum" class="chartjs-render-monitor"></canvas>
           </div>
           <div class="col avg-humidity">
            <h5>Humidity</h5>
            <ul class="ulhumidity">
              <li>Yesterday : --%</li>
              <li>Today Avg : --%</li>
              <li>Week Avg  : --%</li>
              <li>Month Avg  : --%</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
       <div class="col sunshine">
          <div class="row">
            <div class="col sunshine-gauge">
              <canvas id="chart-area-sun" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="col avg-sunshine">
              <h5>Sunshine</h5>
              <ul>
                <li>Yesterday : --°C</li>
                <li>Today Avg : --°C</li>
                <li>Week Avg  : --°C</li>
                <li>Month Avg  : --°C</li>
              </ul>
            </div>
          </div>
        </div>
    </div>

    <div class="w-100"></div>

    <div class="col">
      <div class="col temperatureLuar">
          <div class="row">
            <div class="col temperatureLuar-gauge">
              <canvas id="chart-area-tem-out" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="col avg-temperatureLuar">
              <h5>Temp. Luar</h5>
              <ul class="ultemperatureout">
                <li>Yesterday : --°C</li>
                <li>Today Avg : --°C</li>
                <li>Week Avg  : --°C</li>
                <li>Month Avg  : --°C</li>
              </ul>
            </div>
          </div>
        </div>
    </div>

    <div class="col">
      <div class="col humidityLuar">
        <div class="row">
          <div class="col humidityLuar-gauge">
            <canvas id="chart-area-hum-out" class="chartjs-render-monitor"></canvas>
          </div>
          <div class="col avg-humidityLuar">
            <h5>Humidity Luar</h5>
            <ul class="ulhumidityout">
              <li>Yesterday : --%</li>
              <li>Today Avg : --%</li>
              <li>Week Avg  : --%</li>
              <li>Month Avg  : --%</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="col soil">
        <div class="row">
          <div class="col soil-gauge">
            <canvas id="chart-area-soil" class="chartjs-render-monitor"></canvas>
          </div>
          <div class="col avg-soil">
            <h5>Soil</h5>
            <ul>
              <li>Yesterday : --°C</li>
              <li>Today Avg : --°C</li>
              <li>Week Avg  : --°C</li>
              <li>Month Avg  : --°C</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="w-100"></div>

    <div class="col">
      <div class="col soil1">
          <div class="row">
            <div class="col soil1-gauge">
              <canvas id="chart-soil1" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="col avg-soil1">
              <h5>SOIL 1</h5>
              <ul class="ulsoil1">
                <li>Yesterday : --%</li>
                <li>Today Avg : --%</li>
                <li>Week Avg  : --%</li>
                <li>Month Avg  : --%</li>
              </ul>
            </div>
          </div>
        </div>
    </div>
    
    <div class="col">
      <div class="col soil2">
        <div class="row">
          <div class="col soil2-gauge">
            <canvas id="chart-soil2" class="chartjs-render-monitor"></canvas>
          </div>
          <div class="col avg-soil2">
            <h5>SOIL 2</h5>
            <ul class="ulsoil2">
              <li>Yesterday : --%</li>
              <li>Today Avg : --%</li>
              <li>Week Avg  : --%</li>
              <li>Month Avg  : --%</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="col soil3">
        <div class="row">
          <div class="col soil3-gauge">
            <canvas id="chart-soil3" class="chartjs-render-monitor"></canvas>
          </div>
          <div class="col avg-soil3">
            <h5>SOIL 3</h5>
            <ul class="ulsoil3">
              <li>Yesterday : --%</li>
              <li>Today Avg : --%</li>
              <li>Week Avg  : --%</li>
              <li>Month Avg  : --%</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
    <!-- AKHIR GAUGE -->


      <!-- CONTROL -->
    <div class="control justify-content-center">
      <div class="row">
        <div class="col fan">
          <div class="row">
            <h5>FAN</h5>
          </div>
          <div class="row">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="custom-control custom-switch fan-box">
              <input type="checkbox" class="custom-control-input" id="fan" onclick="change_function(fan) ">
              <label class="custom-control-label " for="fan"></label>
            </div>
          </div>
        </div>
        <div class="col pump">
          <div class="row">
            <h5>pump</h5>
          </div>
          <div class="row">
            <div class="custom-control custom-switch ">
              <input type="checkbox" class="custom-control-input" id="pump" onclick="change_function(pump)">
              <label class="custom-control-label " for="pump"></label>
            </div>
          </div>
        </div>
        <div class="col fan">
          <div class="row">
            <h5>mist</h5>
          </div>
          <div class="row">
            <div class="custom-control custom-switch ">
              <input type="checkbox" class="custom-control-input " id="mist" onclick="change_function(mist)">
              <label class="custom-control-label " for="mist"></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- AKHIR CONTROL -->



    <!-- AWAL POWER CHART -->
    <div class="container chart-power">
      <h4>power chart</h4>
         <canvas id="linechart_power"></canvas>
    </div>
    <div class="tombol-power">
        <button class="btn btn-outline-primary btn-sm"   id="day"  type="button">DAY</button>
        <button class="btn btn-outline-secondary btn-sm"   id="week"   type="button">WEEK</button>
        <button class="btn btn-outline-success btn-sm"   id="month"  type="button">MONTH</button>
    </div>
    <!-- AKHIR POWER CHART -->



     <div class="lastdatain">
      <div class="row">
        <div class="col-sm">
          <p id="lastdata"> </p>
        </div>
      </div>
    </div>



<!-- AWAL CEK LAST DATA  -->

<div class="lastdata">
<?php 
   include"dbh.php";
   $sql = "SELECT time, date FROM greenhouse ORDER BY id DESC LIMIT 1";
   $lasttime = $conn->query($sql);
   $lastdate = $conn->query($sql);
 ?>

 <script type="text/javascript">
   var last_time = [<?php while($a = mysqli_fetch_array($lasttime)) { echo '"' . $a['time'] . '",'; } ?>];
   var last_date = [<?php while($b = mysqli_fetch_array($lastdate)) { echo '"' . $b['date'] . '",'; } ?>];   
   document.getElementById("lastdata").innerHTML = "Last data in = " + last_time +" / "+ last_date;
 </script>
</div>


<script type="text/javascript">
      function load_lastdata(){
        $("#lastdata").load("load-update-lastdata.php", {
               //   commentNewCount : commentCount
        });
      };    

      setInterval(function(){
        load_lastdata()
        }, 1000);
</script>

<!-- AKHIR CEK LAST DATA -->




<script type="text/javascript">
      function load_cekstatus(){
        $("#cekstatus").load("load-update-cekstatus.php", {
               //   commentNewCount : commentCount
        });
      };    

      setInterval(function(){
        load_cekstatus()
        }, 1000);
</script>
<!-- AKHIR CEK STATUS FAN MIST -->


<script type="text/javascript">
  
  //AWAL TEMPERATURE GAUGE
  function temperature_gauge(){
      $.getJSON('get_gauge_data.php', function(json) {
        var data_gauge = json.temperature;
        console.log('data_temp = ' +data_gauge);
        Chart.defaults.global.defaultFontFamily = "Verdana";
        var color = 'rgb(233,31,99)';
        var config = {
         type: "radialGauge",
         data: {
          labels: ["Temperature"],
          datasets: [
           {
            data: [data_gauge],
            backgroundColor: [color],
            borderWidth: 0,
            label: "Score"
           }
          ]
         },
         options: {
          responsive: true,
          legend: {},
          title: {
           display: false,
           text:''
          },
          centerPercentage: 80
         }
        };

      var ctx = document.getElementById("chart-area-tem").getContext("2d");
      window.myRadialGauge = new Chart(ctx, config);

        setInterval(function(){
          $.getJSON('get_gauge_data.php', function(json) {
            var new_data = json.temperature;
            config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
             return new_data;
            });                   
          });
        });
        window.myRadialGauge.update();
      }, 5000);

    });
  }
//AKHIR TEMPERATURE GAUGE


//AWAL TEMPERATURE-OUT GAUGE
function temperatureout_gauge(){
    $.getJSON('get_gauge_data.php', function(json) {
      var data_gauge = json.temperatureout;
      console.log('data_temp = ' +data_gauge);
      Chart.defaults.global.defaultFontFamily = "Verdana";
      var color = 'rgb(153,171,213)';
      var config = {
       type: "radialGauge",
       data: {
        labels: ["Temperature-out"],
        datasets: [
         {
          data: [data_gauge],
          backgroundColor: [color],
          borderWidth: 0,
          label: "Score"
         }
        ]
       },
       options: {
        responsive: true,
        legend: {},
        title: {
         display: false,
         text:''
        },
        centerPercentage: 80
       }
      };

    var ctx = document.getElementById("chart-area-tem-out").getContext("2d");
    window.myRadialGauge = new Chart(ctx, config);

      setInterval(function(){
        $.getJSON('get_gauge_data.php', function(json) {
          var new_data = json.temperatureout;
          config.data.datasets.forEach(function(dataset) {
          dataset.data = dataset.data.map(function() {
           return new_data;
          });                   
        });
      });
      window.myRadialGauge.update();
    }, 5000);

  });
}
//AKHIR TEMPERATURE-OUT GAUGE

//AWAL HUMIDITY GAUGE
function humidity_gauge(){
    $.getJSON('get_gauge_data.php', function(json) {
      var data_gauge = json.humidity;
      console.log('data_temp = ' +data_gauge);
      Chart.defaults.global.defaultFontFamily = "Verdana";
      var color = 'rgb(1,188,214)';
      var config = {
       type: "radialGauge",
       data: {
        labels: ["humidity"],
        datasets: [
         {
          data: [data_gauge],
          backgroundColor: [color],
          borderWidth: 0,
          label: "Score"
         }
        ]
       },
       options: {
        responsive: true,
        legend: {},
        title: {
         display: false,
         text:''
        },
        centerPercentage: 80
       }
      };

    var ctx = document.getElementById("chart-area-hum").getContext("2d");
    window.myRadialGauge = new Chart(ctx, config);

      setInterval(function(){
        $.getJSON('get_gauge_data.php', function(json) {
          var new_data = json.humidity;
          config.data.datasets.forEach(function(dataset) {
          dataset.data = dataset.data.map(function() {
           return new_data;
          });                   
        });
      });
      window.myRadialGauge.update();
    }, 5000);

  });
}
//AKHIR HUMIDITY GAUGE

//AWAL HUMIDITY-OUT GAUGE
function humidityout_gauge(){
    $.getJSON('get_gauge_data.php', function(json) {
      var data_gauge = json.humidityout;
      console.log('data_temp = ' +data_gauge);
      Chart.defaults.global.defaultFontFamily = "Verdana";
      var color = 'rgb(142,176,33)';
      var config = {
       type: "radialGauge",
       data: {
        labels: ["humidity-out"],
        datasets: [
         {
          data: [data_gauge],
          backgroundColor: [color],
          borderWidth: 0,
          label: "Score"
         }
        ]
       },
       options: {
        responsive: true,
        legend: {},
        title: {
         display: false,
         text:''
        },
        centerPercentage: 80
       }
      };

    var ctx = document.getElementById("chart-area-hum-out").getContext("2d");
    window.myRadialGauge = new Chart(ctx, config);

      setInterval(function(){
        $.getJSON('get_gauge_data.php', function(json) {
          var new_data = json.humidityout;
          config.data.datasets.forEach(function(dataset) {
          dataset.data = dataset.data.map(function() {
           return new_data;
          });                   
        });
      });
      window.myRadialGauge.update();
    }, 5000);

  });
}
//AKHIR HUMIDITY-OUT GAUGE

//AWAL SUNSHINE GAUGE
function sunshine_gauge(){
    $.getJSON('get_gauge_data.php', function(json) {
      var data_gauge = json.sunshine;
      console.log('data_temp = ' +data_gauge);
      Chart.defaults.global.defaultFontFamily = "Verdana";
      var color = 'rgb(255,193,7)';
      var config = {
       type: "radialGauge",
       data: {
        labels: ["sunshine"],
        datasets: [
         {
          data: [data_gauge],
          backgroundColor: [color],
          borderWidth: 0,
          label: "Score"
         }
        ]
       },
       options: {
        responsive: true,
        legend: {},
        title: {
         display: false,
         text:''
        },
        centerPercentage: 80
       }
      };

    var ctx = document.getElementById("chart-area-sun").getContext("2d");
    window.myRadialGauge = new Chart(ctx, config);

      setInterval(function(){
        $.getJSON('get_gauge_data.php', function(json) {
          var new_data = json.sunshine;
          config.data.datasets.forEach(function(dataset) {
          dataset.data = dataset.data.map(function() {
           return new_data;
          });                   
        });
      });
      window.myRadialGauge.update();
    }, 5000);

  });
}
//AKHIR SUNSHINE GAUGE

//AWAL SOIL GAUGE
function soil_gauge(){
    $.getJSON('get_gauge_data.php', function(json) {
      var data_gauge = json.soil;
      console.log('data_temp = ' +data_gauge);
      Chart.defaults.global.defaultFontFamily = "Verdana";
      var color = 'rgb(218,178,143)';
      var config = {
       type: "radialGauge",
       data: {
        labels: ["soil"],
        datasets: [
         {
          data: [data_gauge],
          backgroundColor: [color],
          borderWidth: 0,
          label: "Score"
         }
        ]
       },
       options: {
        responsive: true,
        legend: {},
        title: {
         display: false,
         text:''
        },
        centerPercentage: 80
       }
      };

    var ctx = document.getElementById("chart-area-soil").getContext("2d");
    window.myRadialGauge = new Chart(ctx, config);

      setInterval(function(){
        $.getJSON('get_gauge_data.php', function(json) {
          var new_data = json.soil;
          config.data.datasets.forEach(function(dataset) {
          dataset.data = dataset.data.map(function() {
           return new_data;
          });                   
        });
      });
      window.myRadialGauge.update();
    }, 5000);

  });
}
//AKHIR SOIL GAUGE


 //AWAL  SOIL1
  function soil1_gauge(){
      $.getJSON('get_gauge_data.php', function(json) {
        var data_gauge = json.soil1;
        console.log('data_temp = ' +data_gauge);
        Chart.defaults.global.defaultFontFamily = "Verdana";
        var color = 'rgb(173,142,122)';
        var config = {
         type: "radialGauge",
         data: {
          labels: ["Soil1"],
          datasets: [
           {
            data: [data_gauge],
            backgroundColor: [color],
            borderWidth: 0,
            label: "Score"
           }
          ]
         },
         options: {
          responsive: true,
          legend: {},
          title: {
           display: false,
           text:''
          },
          centerPercentage: 80
         }
        };

      var ctx = document.getElementById("chart-soil1").getContext("2d");
      window.myRadialGauge = new Chart(ctx, config);

        setInterval(function(){
          $.getJSON('get_gauge_data.php', function(json) {
            var new_data = json.soil1;
            config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
             return new_data;
            });                   
          });
        });
        window.myRadialGauge.update();
      }, 5000);

    });
  }
//AKHIR  SOIL1

//AWAL  soil2
  function soil2_gauge(){
      $.getJSON('get_gauge_data.php', function(json) {
        var data_gauge = json.soil2;
        console.log('data_temp = ' +data_gauge);
        Chart.defaults.global.defaultFontFamily = "Verdana";
        var color = 'rgb(131,89,52)';
        var config = {
         type: "radialGauge",
         data: {
          labels: ["Soil2"],
          datasets: [
           {
            data: [data_gauge],
            backgroundColor: [color],
            borderWidth: 0,
            label: "Score"
           }
          ]
         },
         options: {
          responsive: true,
          legend: {},
          title: {
           display: false,
           text:''
          },
          centerPercentage: 80
         }
        };

      var ctx = document.getElementById("chart-soil2").getContext("2d");
      window.myRadialGauge = new Chart(ctx, config);

        setInterval(function(){
          $.getJSON('get_gauge_data.php', function(json) {
            var new_data = json.soil2;
            config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
             return new_data;
            });                   
          });
        });
        window.myRadialGauge.update();
      }, 5000);

    });
  }
//AKHIR  soil2

//AWAL  soil3
  function soil3_gauge(){
      $.getJSON('get_gauge_data.php', function(json) {
        var data_gauge = json.soil3;
        console.log('data_temp = ' +data_gauge);
        Chart.defaults.global.defaultFontFamily = "Verdana";
        var color = 'rgb(108,67,34)';
        var config = {
         type: "radialGauge",
         data: {
          labels: ["Soil3"],
          datasets: [
           {
            data: [data_gauge],
            backgroundColor: [color],
            borderWidth: 0,
            label: "Score"
           }
          ]
         },
         options: {
          responsive: true,
          legend: {},
          title: {
           display: false,
           text:''
          },
          centerPercentage: 80
         }
        };

      var ctx = document.getElementById("chart-soil3").getContext("2d");
      window.myRadialGauge = new Chart(ctx, config);

        setInterval(function(){
          $.getJSON('get_gauge_data.php', function(json) {
            var new_data = json.soil3;
            config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
             return new_data;
            });                   
          });
        });
        window.myRadialGauge.update();
      }, 5000);

    });
  }
//AKHIR  soil3



  window.onload = function(){
      setTimeout(function(){ temperature_gauge(); }, 500);
      setTimeout(function(){ humidity_gauge(); }, 600);
      setTimeout(function(){ sunshine_gauge(); }, 700);
      setTimeout(function(){ temperatureout_gauge(); }, 800);
      setTimeout(function(){ humidityout_gauge(); }, 900);
      setTimeout(function(){ soil_gauge(); }, 1000);
      setTimeout(function(){ soil1_gauge(); }, 1200);
      setTimeout(function(){ soil2_gauge(); }, 1400);
      setTimeout(function(){ soil3_gauge(); }, 1600);
    // temperature_gauge();
    // temperatureout_gauge();
    // humidity_gauge();
    // humidityout_gauge();
    // sunshine_gauge();
    // soil_gauge();
  };

</script>
      





      <!-- AWAL LINE CHART -->


       <div id="data-update">
          <?php 
            include 'dbh.php';
            $sql = "SELECT * FROM greenhouse WHERE `date` BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( ) ORDER BY date, time";
            $temperatures = $conn->query($sql);
            $humiditys = $conn->query($sql);
            $temperaturesout = $conn->query($sql);
            $humiditysout = $conn->query($sql);
            $soils =  $conn->query($sql);
            $sunshines = $conn->query($sql);
            $times = $conn->query($sql);
            $dates = $conn->query($sql);
            
          ?>
          <script type="text/javascript">
          var data_temperatures = [<?php while($a = mysqli_fetch_array($temperatures)) { echo '"' . $a['temperature'] . '",'; } ?>];
          var data_humiditys = [<?php while($b = mysqli_fetch_array($humiditys)) { echo '"' . $b['humidity'] . '",'; } ?>];
          var data_temperaturesout = [<?php while($g = mysqli_fetch_array($temperaturesout)) { echo '"' . $g['temperatureout'] . '",'; } ?>];
          var data_humiditysout = [<?php while($h = mysqli_fetch_array($humiditysout)) { echo '"' . $h['humidityout'] . '",'; } ?>];
          var data_soils = [<?php while($c = mysqli_fetch_array($soils)) { echo '"' . $c['soil'] . '",'; } ?>];
          var data_sunshines = [<?php while($d = mysqli_fetch_array($sunshines)) { echo '"' . $d['sunshine'] . '",'; } ?>];
          var data_times = [<?php while($e = mysqli_fetch_array($times)) { echo '"' . $e['time'] . '",'; } ?>];
          var data_dates = [<?php while($f = mysqli_fetch_array($dates)) { echo '"' . $f['date'] . '",'; } ?>];
          </script>
      </div>

      <script type="text/javascript">
        <?php  
          $sqlpush = "SELECT * FROM greenhouse ORDER BY id DESC LIMIT 1";
          $tmp = mysqli_query($conn, $sqlpush);
          while($a = mysqli_fetch_array($tmp)) { $last_id = $a['id'];}
        ?>
        var tmp = <?php echo $last_id; ?>;
      </script>


        <div id="pushdata">
            <?php  
              $sqlpush = "SELECT * FROM greenhouse ORDER BY id DESC LIMIT 1";
              $pushtemperature = mysqli_query($conn, $sqlpush);
              $pushhumidity = mysqli_query($conn, $sqlpush);
              $pushtemperatureout = mysqli_query($conn, $sqlpush);
              $pushhumidityout = mysqli_query($conn, $sqlpush);
              $pushsoil = mysqli_query($conn, $sqlpush);
              $pushsunshine = mysqli_query($conn, $sqlpush);
              $pushtime = mysqli_query($conn, $sqlpush);
              $pushdate = mysqli_query($conn, $sqlpush);
              $check_ids = mysqli_query($conn, $sqlpush);
              while ($a = mysqli_fetch_array($pushtemperature) ) { $pstemperature     = $a['temperature'];};
              while ($b = mysqli_fetch_array($pushhumidity) ) { $pshumidity           = $b['humidity'];};
              while ($h = mysqli_fetch_array($pushtemperatureout) ) { $pstemperatureout     = $h['temperatureout'];};
              while ($i = mysqli_fetch_array($pushhumidityout) ) { $pshumidityout           = $i['humidityout'];};
              while ($c = mysqli_fetch_array($pushsoil) ) { $pshsoil                  = $c['soil'];};
              while ($d = mysqli_fetch_array($pushsunshine) ) { $pshsunshine          = $d['sunshine'];};
              while ($e = mysqli_fetch_array($pushtime) ) { $pstime                   = $e['time'];};
              while ($f = mysqli_fetch_array($pushdate)) { $psdate                    = $f['date'];};
              while ($g = mysqli_fetch_array($check_ids)) { $check_id                 = $g['id'];};
            ?>
            <script type="text/javascript">
              function adddata(){
                var id = <?php echo $check_id; ?>;
                if (id > tmp ) {
                  myBarChart.data.labels.push(<?php echo '"'. $pstime.'",';?>);
                  data_dates.push(<?php echo '"'. $psdate.'",';?>);
                  myBarChart.data.datasets[0].data.push(<?php echo '"'. $pstemperature.'",';?>);
                  myBarChart.data.datasets[1].data.push(<?php echo '"'. $pshumidity.'",';?>);                  
                  myBarChart.data.datasets[2].data.push(<?php echo '"'. $pshsoil.'",';?>);
                  myBarChart.data.datasets[3].data.push(<?php echo '"'. $pshsunshine.'",';?>);
                  myBarChart.data.datasets[4].data.push(<?php echo '"'. $pstemperatureout.'",';?>);
                  myBarChart.data.datasets[5].data.push(<?php echo '"'. $pshumidityout.'",';?>);  
                  myBarChart.update();
                  tmp = id;
                };
              };    
            </script> 
          </div>



        <!-- UPDATE DATA LINE CHART Chart.js -->
          <script >
               setInterval(function(){
                  $('#pushdata').load('load-pushdata.php');
                  $('#pushdata_power').load('load-pushdata_power.php');
              }, 2000);   // this will run after every 2 seconds
              setInterval(function(){
                adddata();
              }, 3000);     

              $("#day").click(function() {
              $("#data-update").load("load-data-day-update.php", {
                  //   commentNewCount : commentCount
                });         
                          myBarChart.data.labels = data_dates;
                          myBarChart.data.datasets[0].data= data_temperatures;
                          myBarChart.data.datasets[1].data= data_humiditys;
                          myBarChart.data.datasets[2].data= data_soils;
                          myBarChart.data.datasets[3].data= data_sunshines;
                          myBarChart.data.datasets[4].data= data_temperaturesout;
                          myBarChart.data.datasets[5].data= data_humiditysout;
                          myBarChart.update(); 
                   });

               
                $("#week").click(function() {
              $("#data-update").load("load-data-week-update.php", {
                  //   commentNewCount : commentCount
                });         
                          myBarChart.data.labels = data_dates;
                          myBarChart.data.datasets[0].data= data_temperatures;
                          myBarChart.data.datasets[1].data= data_humiditys;
                          myBarChart.data.datasets[2].data= data_soils;
                          myBarChart.data.datasets[3].data= data_sunshines;
                          myBarChart.data.datasets[4].data= data_temperaturesout;
                          myBarChart.data.datasets[5].data= data_humiditysout;
                          myBarChart.update(); 
                  });

                
                $("#month").click(function() {
              $("#data-update").load("load-data-month-update.php", {
                  //   commentNewCount : commentCount
                });         
                    myBarChart.data.labels = data_dates;
                    myBarChart.data.datasets[0].data= data_temperatures;
                    myBarChart.data.datasets[1].data= data_humiditys;
                    myBarChart.data.datasets[2].data= data_soils;
                    myBarChart.data.datasets[3].data= data_sunshines;
                    myBarChart.data.datasets[4].data= data_temperaturesout;
                    myBarChart.data.datasets[5].data= data_humiditysout;
                    myBarChart.update();
                  });

            </script> 



            <!-- AWAL UPDATE DATA LINE CHART Chart.js -->
            <script type="text/javascript">
                var ctx = document.getElementById("linechart").getContext("2d");
                var data = {
                  labels: data_times,
                  datasets: [
                  {
                    label: "Temperature",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#E91F63",
                    borderColor: "#E91F63",
                    pointHoverBackgroundColor: "#E91F63",
                    pointHoverBorderColor: "#E91F63",
                    data: data_temperatures
                  },
                  {
                    label: "Humidity",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#01BCD6",
                    borderColor: "#01BCD6",
                    pointHoverBackgroundColor: "#01BCD6",
                    pointHoverBorderColor: "#01BCD6",
                    data: data_humiditys
                  },
                  {
                    label: "Soil",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#795548",
                    borderColor: "#795548",
                    pointHoverBackgroundColor: "#795548",
                    pointHoverBorderColor: "#795548",
                    data: data_soils
                  },
                  {
                    label: "Sunshine",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#FFC107",
                    borderColor: "#FFC107",
                    pointHoverBackgroundColor: "#FFC107",
                    pointHoverBorderColor: "#FFC107",
                    data: data_sunshines
                  },
                   {
                    label: "Temperature Outside",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#99ABD5",
                    borderColor: "#99ABD5",
                    pointHoverBackgroundColor: "#99ABD5",
                    pointHoverBorderColor: "#99ABD5",
                    data: data_temperaturesout
                  },
                   {
                    label: "Humidity Outside",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#8EB021",
                    borderColor: "#8EB021",
                    pointHoverBackgroundColor: "#8EB021",
                    pointHoverBorderColor: "#8EB021",
                    data: data_humiditysout
                  }
                  ]
                    
                };

                var myBarChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                          elements: {
                              point:{
                                  radius: 0
                              }
                          },
                           tooltips: {
                            mode: 'index',
                            intersect: false,
                          }, 
                        legend: {
                          display: true
                        },
                        barValueSpacing: 20,
                        scales: {
                          yAxes: [{
                            ticks: {
                              autoSkip: true,
                              // min: 5,
                            }
                          }],
                          xAxes: [{
                            ticks: {
                              /*Precisa autoSkip pra nao aparecer muitas informacoes*/
                                  autoSkip: true,
                            maxRotation: 45,
                            minRotation: 45,
                            maxTicksLimit: 10,
                            },
                            gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                            }
                          }]
                        },
                        maintainAspectRatio : false
                    }
                });

              linechart.update({
                duration: 800,
                easing: 'easeOutBounce'
              });

              </script>
      <!-- AKHIR LINE CHART -->




        <!-- Awal Power Linechart -->
       <div id="data_power_update">
          <?php 
            include 'dbh.php';
            $sql_power = "SELECT * FROM greenhouse WHERE `date` BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( ) ORDER BY date, time";
            $volt_batt = $conn->query($sql_power);
            $volt_solar = $conn->query($sql_power);
            $curr_solar = $conn->query($sql_power);
            $data_time_power = $conn->query($sql_power); 
            $solar_watt = $conn->query($sql_power);         
          ?>

          <script type="text/javascript">
          var data_volt_batt = [<?php while($v = mysqli_fetch_array($volt_batt)) { echo '"' . $v['volt_batt'] . '",'; } ?>];
          var data_volt_solar = [<?php while($x = mysqli_fetch_array($volt_solar)) { echo '"' . $x['volt_solar'] . '",'; } ?>];
          var data_curr_solar = [<?php while($y = mysqli_fetch_array($curr_solar)) { echo '"' . $y['curr_solar'] . '",'; } ?>];
          var data_times_power = [<?php while($z = mysqli_fetch_array($data_time_power)) { echo '"' . $z['time'] . '",'; } ?>];
          var data_watt_solar = [<?php while($z = mysqli_fetch_array($solar_watt)) { echo '"' . $z['power_solar'] . '",'; } ?>];
          </script>
      </div>


        <div id="pushdata_power">
            <?php  
              $sql_push_power = "SELECT * FROM greenhouse WHERE `date` BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( ) ORDER BY date, time";
              $data_power_push = mysqli_query($conn, $sql_push_power);
              while ($a = mysqli_fetch_array($data_power_push) ) { 
                $ps_data_volt_batt     = $a['volt_batt'];
                $ps_data_volt_solar    = $a['volt_solar'];
                $ps_data_curr_solar    = $a['curr_solar'];
                $ps_data_times_power   = $a['time'];
                $ps_data_watt_solar    = $a['power_solar'];
                $ps_power_id           = $a['id'];
              };
            ?>
            <script type="text/javascript">
              function adddata(){
                var id = <?php echo $check_id; ?>;
                if (id > tmp ) {
                  myBarChart.data.labels.push(<?php echo '"'. $ps_data_times_power.'",';?>);
                  myBarChart.data.datasets[0].data.push(<?php echo '"'. $ps_data_volt_batt.'",';?>);
                  myBarChart.data.datasets[1].data.push(<?php echo '"'. $ps_data_volt_solar.'",';?>);             
                  myBarChart.data.datasets[2].data.push(<?php echo '"'. $ps_data_curr_solar.'",';?>);
                  myBarChart.data.datasets[3].data.push(<?php echo '"'. $ps_data_watt_solar.'",';?>); 
                  myBarChart.update();
                  tmp = id;
                };
              };    
            </script> 
          </div>


            <!-- AWAL UPDATE DATA LINE CHART Chart.js -->
            <script type="text/javascript">
                var ctx_power = document.getElementById("linechart_power").getContext("2d");
                var data_power = {
                  labels: data_times_power,
                  datasets: [
                  {
                    label: "Batt Voltage",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#8EB021",
                    borderColor: "#8EB021",
                    pointHoverBackgroundColor: "#8EB021",
                    pointHoverBorderColor: "#8EB021",
                    data: data_volt_batt
                  },
                  {
                    label: "Solar Voltage",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#E91F63",
                    borderColor: "#E91F63",
                    pointHoverBackgroundColor: "#E91F63",
                    pointHoverBorderColor: "#E91F63",
                    data: data_volt_solar
                  },
                  {
                    label: "Solar Current",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#F8B62D",
                    borderColor: "#F8B62D",
                    pointHoverBackgroundColor: "#F8B62D", //data_watt_solar
                    pointHoverBorderColor: "#F8B62D",
                    data: data_curr_solar
                  },
                  {
                    label: "Solar Power",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#9570D0",
                    borderColor: "#9570D0",
                    pointHoverBackgroundColor: "#9570D0", //data_watt_solar
                    pointHoverBorderColor: "#9570D0",
                    data: data_watt_solar
                  }]    
                };

                var myBarChart_power = new Chart(ctx_power, {
                type: 'line',
                data: data_power,
                options: {
                          elements: {
                              point:{
                                  radius: 0
                              }
                          },
                          tooltips: {
                            mode: 'index',
                            intersect: false,
                          },  
                        legend: {
                          display: true
                        },
                        barValueSpacing: 20,
                        scales: {
                          yAxes: [{
                            ticks: {
                              //maxTicksLimit: 6,
                              autoSkip: true,
                              // min: 0, //nilai x minimal
                              // max: 6, //nilai x maksimal
                            }
                          }],
                          xAxes: [{
                            ticks: {
                              /*Precisa autoSkip pra nao aparecer muitas informacoes*/
                              autoSkip: true,
                              maxRotation: 45,
                              minRotation: 45,
                              maxTicksLimit: 5,
                            },
                            gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                            }
                          }]
                        },
                        maintainAspectRatio : false
                    }
                });

              linechart_power.update({
                duration: 900,
                easing: 'easeOutBounce'
              });

              </script>
      <!-- Akhir POwer Linechart -->


    

  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>

