<!DOCTYPE html>
<html>
<head>


	<!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	 <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <!-- JQUERY AJAX UNTUK RELOAD DIV SANGAT-SANGAT-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


    <style type="text/css">
    	.tombol {
    		text-align: center;
    		margin-bottom: 10px;

    	}

      .container {
        height: 200%;
        width: 200%;   
      }

    </style>

	<title>DHT CHART</title>
</head>
<body>
  <div class="container">
    <div class="row">

       <div class="col-sm-9">
        <div class="line">
                <canvas id="linechart"></canvas>\
        </div>
      </div>

      <div class="col-sm-2">
      		<div class="tombol">
            <div class="row mt-2">
      		      <button class="btn btn-outline-primary" 	id="day" 	type="button">DAY</button>
            </div>
            <div class="row mt-2">
               <button class="btn btn-outline-secondary" 	id="week" 	type="button">WEEK</button>
            </div>
            <div class="row mt-2">
               <button class="btn btn-outline-success" 	id="month" 	type="button">MONTH</button>
            </div>
          </div>
      </div>

    </div>
  </div>

        <!--  LINE CHART JS -->

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
              while ($a = mysqli_fetch_array($pushtemperature) ) { $pstemperature    = $a['temperature'];};
              while ($b = mysqli_fetch_array($pushhumidity) ) { $pshumidity    = $b['humidity'];};
              while ($c = mysqli_fetch_array($pushsoil) ) { $pshsoil    = $a['soil'];};
              while ($d = mysqli_fetch_array($pushsunshine) ) { $pshsunshine    = $b['sunshine'];};
              while ($e = mysqli_fetch_array($pushtime) ) { $pstime    = $c['time'];};
              while ($f = mysqli_fetch_array($pushdate)) { $psdate = $d['date'];};
              while ($g = mysqli_fetch_array($check_ids)) { $check_id = $d['id'];};
            ?>
            <script type="text/javascript">
              function adddata(){
                var id = <?php echo $check_id; ?>;
                if (id > tmp ) {
                  myBarChart.data.labels.push(<?php echo '"'. $psdate.'",';?>);
                  data_times.push(<?php echo '"'. $pstime.'",';?>);
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

            <!-- AKHIR UPDATE DATA LINE CHART Chart.js -->

            <script type="text/javascript">
                var ctx = document.getElementById("linechart").getContext("2d");
                var data = {
                  labels: data_dates,
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

      <!--  AKHIR LINE CHART JS -->




</body>
</html>