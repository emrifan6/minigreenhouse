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

    <style type="text/css">       

        .gauge{
          font-size: 11px;
          font-weight: bold;
        }


        .temperature, .humidity, .soil, .sunshine{
          margin-top: 10px ;
          height: 120px;
          width: 120px;
          /*border: 3px solid #543535;*/
        }


        .temperature{
          position: absolute;
          left: 70px;
          top:  25px;
        }

        .humidity{
          position: absolute;
          left: 200px;
          top: 25px;
        }

        .soil{
          position: absolute;
          left: 70px;
          top: 150px;
        }

        .sunshine{
          position: absolute;
          left: 200px;
          top: 150px;
        }

        .status{
          position: absolute;
          top: 520px;
          left: 20px;
          right: : 10px;
          height: 50px;
          width: 350px;
          font-size: 13px;
          font-weight: bold;
        }


        #statusfan{
          position: absolute;
          left: 50px;
          top: 10px;
        }


        #statusmist{
          position: absolute;
          left: 150px;
          top: 10px;
        }

        #statuspump{
          position: absolute;
          left: 250px;
          top: 10px;
        }

        .lastdatain{
          position: absolute;
          right: 5px;
          top: 560px;
          font-size: 10px;
          font-style: italic;
        }

        .tombol{
          /*border: 3px solid #543535;*/
          position: absolute;
          right: 100px;
          top: 225px;
        }

         
        

      @media (min-width: 800px) { 
        .judul{
          font-family: Viga;
          /*border: 3px solid #543535;*/
        }

      .chart{
        height: 350px;
        width: 900px;
        /*border: 3px solid #543535;*/
        /*style=" border: 3px solid #2CAAE1;"*/
        }

        .temperature, .humidity, .soil, .sunshine{
          margin-top: 10px ;
          height: 180px;
          width: 180px;
          /*border: 3px solid #543535;*/
        }

        .temperature{
          position: absolute;
          left: 0px;
          top:  10px;
        }

        .humidity{
          position: absolute;
          left: 0px;
          top: 10px;
        }


        .soil{
          position: absolute;
          left: 0px;
          top: 210px;
        }

        .sunshine{
          position: absolute;
          left: 0px;
          top: 210px;
        }
       

        .status{
          position: absolute;
          top: 520px;
          left: 20px;
          right: : 10px;
          height: 50px;
          width: 350px;
          font-size: 15px;
          font-weight: bold;
        }


        #statusfan{
          position: absolute;
          left: 75px;
          top: 30px;
          width: 100px;
        }


        #statusmist{
          position: absolute;
          /*border: 3px solid #543535;*/
          width: 100px;
          left: 175px;
          top: 30px;
        }


        #statuspump{
          position: absolute;
          /*border: 3px solid #543535;*/
          width: 100px;
          left: 300px;
          top: 30px;
        }


        .lastdatain{
          position: absolute;
          right: 10px;
          top: 600px;
          font-size: 12px;
          font-style: italic;
        }

        .tombol{
          /*border: 3px solid #543535;*/
          position: absolute;
          left:350px;
          top: 500px;
        }


    }

    </style>

  <title>MINI GREENHOUSE</title>
  </head>
  <body> 

           
      <div class="judul mt-2">
        <h3 align="center" margin-top="40px">MINI GREENHOUSE</h3>
      </div>


    <div class="row">

      <div class="col-sm-8" >
        <div class="chart">
          <canvas id="linechart"></canvas>
        </div>
      </div>

      <div class="col-sm-4" >
        <div class="gauge">
        <div class="row">

          <div class="col-sm" >
              <div class="temperature">
                <div class="row justify-content-center">TEMPERATURE</div>
                <div class="row justify-content-center">
                  <canvas id="chart-area-tem" width="100" height="70" class="chartjs-render-monitor">
                  </canvas>
                </div>
              </div>

          </div>

          <div class="col-sm">
            <div class="humidity">
                <div class="row justify-content-center">HUMIDITY</div>
                <div class="row justify-content-cen180ter">
                   <canvas id="chart-area-hum" width="100" height="70" class="chartjs-render-monitor">
                   </canvas>
                </div>
              </div>
            </div>

        </div>

        <div class="row">
          <div class="col-sm">
            <div class="soil">
              <div class="row justify-content-center">SOIL</div>
              <div class="row justify-content-center">
                <canvas id="chart-area-soil" width="100" height="70" class="chartjs-render-monitor">
                 </canvas>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="sunshine">
              <div class="row justify-content-center">SUNLIGHT</div>
              <div class="row justify-content-center">
                <canvas id="chart-area-sun" width="100" height="70" class="chartjs-render-monitor">
                 </canvas>
              </div>
            </div>
          </div>

        </div>

      </div>
      </div>
    </div>

    <div class="tombol">
    <button class="btn btn-outline-primary btn-sm"   id="day"  type="button">DAY</button>
        <button class="btn btn-outline-secondary btn-sm"   id="week"   type="button">WEEK</button>
        <button class="btn btn-outline-success btn-sm"   id="month"  type="button">MONTH</button>
        </div>
        <canvas id="linechart"></canvas>
    </div>


    <div class="status">
      <div class="row">
        <div class="col-sm" >
          <p id="statusfan"> </p>
        </div>
        <div class="col-sm" >
          <p id="statusmist"> </p>
        </div>
        <div class="col-sm" >
          <p id="statuspump"> </p>
        </div>
      </div>
    </div>


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














<!-- AWAL CEK STATUS FAN MIST -->

<div id="cekstatus">
  <?php 
    include "dbh.php";
    $sql = "SELECT fan, mist, pump FROM greenhouse WHERE timestamp > date_sub(now(), interval 1 minute) ORDER BY id DESC LIMIT 1";
    $fan = $conn->query($sql);
    $mist = $conn->query($sql);
    $pump = $conn->query($sql);
   ?>  

   <script type="text/javascript">
     
      var data_fan = [<?php while($a = mysqli_fetch_array($fan)) { echo '"' . $a['fan'] . '",'; } ?>];
      var data_mist = [<?php while($b = mysqli_fetch_array($mist)) { echo '"' . $b['mist'] . '",'; } ?>];
      var data_pump = [<?php while($c = mysqli_fetch_array($pump)) { echo '"' . $b['pump'] . '",'; } ?>];

         if (data_fan == 0 ) {
          document.getElementById("statusfan").innerHTML = "FAN OFF";
         } else if (data_fan == 1){
          document.getElementById("statusfan").innerHTML = "FAN ON";
         } else {
          document.getElementById("statusfan").innerHTML = "OFFLINE";
         }

         if (data_mist == 0) {
          document.getElementById("statusmist").innerHTML = "MIST OFF";
         } else if (data_mist == 1){
         document.getElementById("statusmist").innerHTML = "MIST ON";
         } else {
          document.getElementById("statusmist").innerHTML = "OFFLINE";
         }

        if (data_pump == 0) {
          document.getElementById("statuspump").innerHTML = "PUMP OFF";
         } else if (data_pump == 1){
         document.getElementById("statuspump").innerHTML = "PUMP ON";
         } else {
          document.getElementById("statuspump").innerHTML = "OFFLINE";
         }

   </script>
</div>


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



      


      <!-- AWAL SUNSHINE RADIAL GAUGE -->
    
        <div id="update-radialsun-gauge">
                  <?php 
                    include "dbh.php";
                  ?>
                     <script type="text/javascript">
                          function datasun_gauge(){
                            <?php 
                                $sqlpush = "SELECT sunshine FROM greenhouse  WHERE timestamp > date_sub(now(), interval 5 minute) ORDER BY id DESC LIMIT 1";
                                $pushdata = mysqli_query($conn, $sqlpush);
                                while($a = mysqli_fetch_array($pushdata)) { $llabel = $a['sunshine'];}    
                             ?>
                             var tmp = <?php echo $llabel; ?>;
                             return tmp;
                          };
                    </script>
             </div>


            <script type="text/javascript">
                function radialsunupdate() {
                  configsun.data.datasets.forEach(function(dataset) {
                    dataset.data = dataset.data.map(function() { 
                      return datasun_gauge();
                    });
                  });
                  window.myRadialGaugesun.update();
                };

                function load_datasun_radial(){
                  $("#update-radialsun-gauge").load("load-update-radialsun-gauge.php", {
                         //   commentNewCount : commentCount
                  });
                };    

                setInterval(function(){
                  load_datasun_radial(),
                  radialsunupdate()
                  }, 5000);
              </script>

           
            <script>
              Chart.defaults.global.defaultFontFamily = 'Verdana';

              var ctxsun = document.getElementById('chart-area-sun').getContext('2d');
              
              var gradientStroke = ctxsun.createLinearGradient(500, 0, 100, 0);
              gradientStroke.addColorStop(0, '#80b6f4');
              gradientStroke.addColorStop(1, '#f49080');

              var configsun = {
                type: 'radialGauge',
                data: {
                  labels: ['Sunshine'],
                  datasets: [
                    {
                      data: [datasun_gauge()],
                      backgroundColor: '#F0AD4E',    //gradiiennt stroke '[gradientStroke]' tidak dipakai
                      borderWidth: 0,
                      label: 'Score'
                    }
                  ]
                },
                options: {
                  responsive: true,
                  legend: {},
                  title: {
                    display: false,   // TRUE, UNTUK MENAMPILKAN TITLE CHART
                    text: 'Radial gauge chart'
                  },
                  centerPercentage: 80,
                  centerArea: {
                    text: function(value, options) {
                      return value + '%';
                    }
                  }
                }
              };

            </script>

    <!-- AKHIR SUNSHINE RADIAL GAUGE --> 




      <!-- AWAL SOIL RAIDIAL GAUGE -->

      <div id="update-radialsoil-gauge">
                  <?php 
                    include "dbh.php";
                  ?>
                     <script type="text/javascript">
                          function datasoil_gauge(){
                            <?php 
                                $sqlpush = "SELECT soil FROM greenhouse  WHERE timestamp > date_sub(now(), interval 5 minute) ORDER BY id DESC LIMIT 1";
                                $pushdata = mysqli_query($conn, $sqlpush);
                                while($a = mysqli_fetch_array($pushdata)) { $llabel = $a['soil'];}    
                             ?>
                             var tmp = <?php echo $llabel; ?>;
                             return tmp;
                          };
                    </script>
             </div>


            <script type="text/javascript">
                function radialsoilupdate() {
                  configsoil.data.datasets.forEach(function(dataset) {
                    dataset.data = dataset.data.map(function() { 
                      return datasoil_gauge();
                    });
                  });
                  window.myRadialGaugesoil.update();
                };

                function load_datasoil_radial(){
                  $("#update-radialsoil-gauge").load("load-update-radialsoil-gauge.php", {
                         //   commentNewCount : commentCount
                  });
                };    

                setInterval(function(){
                  load_datasoil_radial(),
                  radialsoilupdate()
                  }, 5000);
              </script>

           
            <script>
              Chart.defaults.global.defaultFontFamily = 'Verdana';

              var ctxsoil = document.getElementById('chart-area-soil').getContext('2d');
              
              var gradientStroke = ctxsoil.createLinearGradient(500, 0, 100, 0);
              gradientStroke.addColorStop(0, '#80b6f4');
              gradientStroke.addColorStop(1, '#f49080');

              var configsoil = {
                type: 'radialGauge',
                data: {
                  labels: ['Soil'],
                  datasets: [
                    {
                      data: [datasoil_gauge()],
                      backgroundColor: '#795548',    //gradiiennt stroke '[gradientStroke]' tidak dipakai
                      borderWidth: 0,
                      label: 'Score'
                    }
                  ]
                },
                options: {
                  responsive: true,
                  legend: {},
                  title: {
                    display: false,   // TRUE, UNTUK MENAMPILKAN TITLE CHART
                    text: 'Radial gauge chart'
                  },
                  centerPercentage: 80,
                  centerArea: {
                    text: function(value, options) {
                      return value + '%';
                    }
                  }
                }
              };

            </script>

      <!-- AKHIR SOIL RAIDIAL GAUGE -->




      <!-- AWAL HUMIDITY RAIDIAL GAUGE -->

      <div id="update-radialhum-gauge">
                  <?php 
                    include "dbh.php";
                  ?>
                     <script type="text/javascript">
                          function datahum_gauge(){
                            <?php 
                                $sqlpush = "SELECT humidity FROM greenhouse WHERE timestamp > date_sub(now(), interval 5 minute) ORDER BY id DESC LIMIT 1";
                                $pushdata = mysqli_query($conn, $sqlpush);
                                while($a = mysqli_fetch_array($pushdata)) { $llabel = $a['humidity'];}    
                             ?>
                             var tmp = <?php echo $llabel; ?>;
                             return tmp;
                          };
                    </script>
             </div>


            <script type="text/javascript">
                function radialhumupdate() {
                  confighum.data.datasets.forEach(function(dataset) {
                    dataset.data = dataset.data.map(function() { 
                      return datahum_gauge();
                    });
                  });
                  window.myRadialGaugehum.update();
                };

                function load_datahum_radial(){
                  $("#update-radialhum-gauge").load("load-update-radialhum-gauge.php", {
                         //   commentNewCount : commentCount
                  });
                };    

                setInterval(function(){
                  load_datahum_radial(),
                  radialhumupdate()
                  }, 5000);
              </script>

           
            <script>
              Chart.defaults.global.defaultFontFamily = 'Verdana';

              var ctxhum = document.getElementById('chart-area-hum').getContext('2d');
              
              var gradientStroke = ctxhum.createLinearGradient(500, 0, 100, 0);
              gradientStroke.addColorStop(0, '#80b6f4');
              gradientStroke.addColorStop(1, '#f49080');

              var confighum = {
                type: 'radialGauge',
                data: {
                  labels: ['Humidity'],
                  datasets: [
                    {
                      data: [datahum_gauge()],
                      backgroundColor: '#01BCD6',    //gradiiennt stroke '[gradientStroke]' tidak dipakai
                      borderWidth: 0,
                      label: 'Score'
                    }
                  ]
                },
                options: {
                  responsive: true,
                  legend: {},
                  title: {
                    display: false,   // TRUE, UNTUK MENAMPILKAN TITLE CHART
                    text: 'Radial gauge chart'
                  },
                  centerPercentage: 80,
                  centerArea: {
                    text: function(value, options) {
                      return value + '%';
                    }
                  }
                }
              };

            </script>

        <!-- AKHIR HUMIDITY RADIAL GAUGE -->






        <!-- AWAL TEMPERATURE RADIAL GAUGE -->

        <div id="update-radialtem-gauge">
                  <?php 
                    include "dbh.php";
                  ?>
                     <script type="text/javascript">
                          function datatem_gauge(){
                            <?php 
                                $sqlpush = "SELECT temperature FROM greenhouse  WHERE timestamp > date_sub(now(), interval 5 minute) ORDER BY id DESC LIMIT 1";
                                $pushdata = mysqli_query($conn, $sqlpush);
                                while($a = mysqli_fetch_array($pushdata)) { $llabel = $a['temperature'];}    
                             ?>
                             var tmp = <?php echo $llabel; ?>;
                             return tmp;
                          };
                    </script>
             </div>


            <script type="text/javascript">
                function radialtemupdate() {
                  configtem.data.datasets.forEach(function(dataset) {
                    dataset.data = dataset.data.map(function() { 
                      return datatem_gauge();
                    });
                  });
                  window.myRadialGaugetem.update();
                };

                function load_datatem_radial(){
                  $("#update-radialtem-gauge").load("load-update-radialtem-gauge.php", {
                         //   commentNewCount : commentCount
                  });
                };    

                setInterval(function(){
                  load_datatem_radial(),
                  radialtemupdate()
                  }, 5000);
              </script>

           
            <script>
              Chart.defaults.global.defaultFontFamily = 'Verdana';

              var ctxtem = document.getElementById('chart-area-tem').getContext('2d');
              
              var gradientStroke = ctxtem.createLinearGradient(500, 0, 100, 0);
              gradientStroke.addColorStop(0, '#80b6f4');
              gradientStroke.addColorStop(1, '#f49080');

              var configtem = {
                type: 'radialGauge',
                data: {
                  labels: ['Temperature'],
                  datasets: [
                    {
                      data: [datatem_gauge()],
                      backgroundColor: '#E91F63',    //gradiiennt stroke '[gradientStroke]' tidak dipakai
                      borderWidth: 0,
                      label: 'Score'
                    }
                  ]
                },
                options: {
                  responsive: true,
                  legend: {},
                  title: {
                    display: false,   // TRUE, UNTUK MENAMPILKAN TITLE CHART
                    text: 'Radial gauge chart'
                  },
                  centerPercentage: 80,
                  centerArea: {
                    text: function(value, options) {
                      return value + '%';
                    }
                  }
                }
              };

            </script>

        <!-- AKHIR TEMPERATURE RADIAL GAUGE -->



      <!-- Awal Load gauge chart -->
      <script type="text/javascript">
            window.onload = function() {
             var ctxtem = document.getElementById('chart-area-tem').getContext('2d');
             window.myRadialGaugetem = new Chart(ctxtem, configtem);
             var ctxhum = document.getElementById('chart-area-hum').getContext('2d');
             window.myRadialGaugehum = new Chart(ctxhum, confighum);
             var ctxsoil = document.getElementById('chart-area-soil').getContext('2d');
             window.myRadialGaugesoil = new Chart(ctxsoil, configsoil);
             var ctxsun = document.getElementById('chart-area-sun').getContext('2d');
             window.myRadialGaugesun = new Chart(ctxsun, configsun);
            };
      </script>
      <!-- Akhir Load gauge chart -->
            




      <!-- AWAL LINE CHART -->


       <div id="data-update">
          <?php 
            include 'dbh.php';
            $sql = "SELECT * FROM greenhouse WHERE `date` BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( ) ORDER BY date, time";
            $temperatures = $conn->query($sql);
            $humiditys = $conn->query($sql);
            $soils =  $conn->query($sql);
            $sunshines = $conn->query($sql);
            $times = $conn->query($sql);
            $dates = $conn->query($sql);
            
          ?>
          <script type="text/javascript">
          var data_temperatures = [<?php while($a = mysqli_fetch_array($temperatures)) { echo '"' . $a['temperature'] . '",'; } ?>];
          var data_humiditys = [<?php while($b = mysqli_fetch_array($humiditys)) { echo '"' . $b['humidity'] . '",'; } ?>];
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
              $pushsoil = mysqli_query($conn, $sqlpush);
              $pushsunshine = mysqli_query($conn, $sqlpush);
              $pushtime = mysqli_query($conn, $sqlpush);
              $pushdate = mysqli_query($conn, $sqlpush);
              $check_ids = mysqli_query($conn, $sqlpush);
              while ($a = mysqli_fetch_array($pushtemperature) ) { $pstemperature     = $a['temperature'];};
              while ($b = mysqli_fetch_array($pushhumidity) ) { $pshumidity           = $b['humidity'];};
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
                  }
                  ]
                    
                };

                var myBarChart = new Chart(ctx, {
                    type: 'line',
                    data: data,
                    options: {
                                tooltips: {
                                 callbacks: {
                                       label: function(tooltipItem, data) {
                                        let lbtemperature = data.datasets[0].data[tooltipItem.index];
                          let lbhumidity = data.datasets[1].data[tooltipItem.index];
                          let lbhsoil = data.datasets[2].data[tooltipItem.index];
                          let lbhsunshine = data.datasets[3].data[tooltipItem.index];
                          let lbtime  = data_times[tooltipItem.index];
                          let lbdate  = data_dates[tooltipItem.index];
                            return ['Temperature = ' + lbtemperature, 'Humidity       = ' + lbhumidity, 'Soil       = ' + lbhsoil, 'Sunshine       = ' + lbhsunshine,  'Time             = ' + lbtime, 'Date             = ' + lbdate];
                                       }
                                  }
                                },
                      legend: {
                        display: true
                      },
                      barValueSpacing: 20,
                      scales: {
                        yAxes: [{
                          ticks: {
                            min: 0,
                          }
                        }],
                        xAxes: [{
                          ticks: {
                            /*Precisa autoSkip pra nao aparecer muitas informacoes*/
                            autoSkip: true,
                            maxRotation: 45,
                            minRotation: 45,
                            maxTicksLimit: 15,
                          },
                          gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                          }
                        }]
                      }
                    }
                  });

                  linechart.update({
                    duration: 800,
                    easing: 'easeOutBounce'
                  });
              </script>
      <!-- AKHIR LINE CHART -->
  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>

