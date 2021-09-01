  <!-- Awal Power Linechart -->
       <div id="data_power_update">
          <?php 
            include 'dbh.php';
            $sql = "SELECT volt_batt,volt_solar,curr_solar FROM greenhouse WHERE `date` BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( ) ORDER BY date, time";
            $volt_batt = $conn->query($sql);
            $volt_solar = $conn->query($sql);
            $curr_solar = $conn->query($sql);
            
            
          ?>
          <script type="text/javascript">
          var volt_batt = [<?php while($a = mysqli_fetch_array($volt_batt)) { echo '"' . $a['volt_batt'] . '",'; } ?>];
          var volt_solar = [<?php while($b = mysqli_fetch_array($volt_solar)) { echo '"' . $b['volt_solar'] . '",'; } ?>];
          var curr_solar = [<?php while($c = mysqli_fetch_array($curr_solar)) { echo '"' . $c['curr_solar'] . '",'; } ?>];
          var power_solar = volt_solar*curr_solar;
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


        <div id="pushdata_power">
            <?php  
              $sqlpush = "SELECT * FROM greenhouse ORDER BY id DESC LIMIT 1";
              $push_volt_batt = mysqli_query($conn, $sqlpush);
              $push_volt_solar = mysqli_query($conn, $sqlpush);
              $push_curr_solar = mysqli_query($conn, $sqlpush);
              $check_solar_ids =  mysqli_query($conn, $sqlpush);
              $push_power_time = mysqli_query($conn, $sqlpush);
              $push_power_date =  mysqli_query($conn, $sqlpush);
              while ($a = mysqli_fetch_array($push_volt_batt) ) { $ps_volt_batt       = $a['volt_batt'];};
              while ($b = mysqli_fetch_array($push_volt_solar) ) { $ps_volt_solar     = $b['volt_solar'];};
              while ($c = mysqli_fetch_array($push_curr_solar) ) { $ps_curr_solar     = $c['curr_solar'];};
              while ($d = mysqli_fetch_array($check_power_ids)) { $ps_power_ids       = $d['id'];};
              while ($e = mysqli_fetch_array($push_power_time) ) { $pstime_power     = $e['time'];};
              while ($f = mysqli_fetch_array($push_power_date)) { $psdate_power       = $f['date'];};
            ?>
            <script type="text/javascript">
              function adddata(){
                var id = <?php echo $ps_power_ids; ?>;
                if (id > tmp ) {
                  myBarChart.data.labels.push(<?php echo '"'. $pstime_power.'",';?>);
                  data_dates.push(<?php echo '"'. $psdate_power.'",';?>);
                  myBarChart.data.datasets[0].data.push(<?php echo '"'. $ps_volt_batt.'",';?>);
                  myBarChart.data.datasets[1].data.push(<?php echo '"'. $ps_volt_solar.'",';?>);                  
                  myBarChart.data.datasets[2].data.push(<?php echo '"'. $ps_curr_solar.'",';?>);
                  myBarChart.data.datasets[3].data.push(<?php echo '"'. $ps_curr_solar*$ps_volt_solar.'",';?>);
                  myBarChart.update();
                  tmp = id;
                };
              };    
            </script> 
          </div>



        <!-- UPDATE DATA LINE CHART Chart.js -->
          <script >
               setInterval(function(){
                  $('#pushdata_power').load('load_pushdata_power.php');
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
                var ctx_power = document.getElementById("linechart-power").getContext("2d");
                var data_power = {
                  labels: data_power_times,
                  datasets: [
                  {
                    label: "Batt Voltage",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#E91F63",
                    borderColor: "#E91F63",
                    pointHoverBackgroundColor: "#E91F63",
                    pointHoverBorderColor: "#E91F63",
                    data: data_temperatures
                  },
                  {
                    label: "Solar Voltage",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#01BCD6",
                    borderColor: "#01BCD6",
                    pointHoverBackgroundColor: "#01BCD6",
                    pointHoverBorderColor: "#01BCD6",
                    data: data_humiditys
                  },
                  {
                    label: "Solar Current",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#795548",
                    borderColor: "#795548",
                    pointHoverBackgroundColor: "#795548",
                    pointHoverBorderColor: "#795548",
                    data: data_soils
                  },
                  {
                    label: "Solar Power",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#FFC107",
                    borderColor: "#FFC107",
                    pointHoverBackgroundColor: "#FFC107",
                    pointHoverBorderColor: "#FFC107",
                    data: data_sunshines
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
                           callbacks: {
                                 label: function(tooltipItem, data) {
                                  let lbtemperature = data.datasets[0].data[tooltipItem.index];
                                  let lbhumidity = data.datasets[1].data[tooltipItem.index];
                                  let lbhsoil = data.datasets[2].data[tooltipItem.index];
                                  let lbhsunshine = data.datasets[3].data[tooltipItem.index];
                                  let lbtemperatureout = data.datasets[4].data[tooltipItem.index];
                                  let lbhumidityout = data.datasets[5].data[tooltipItem.index];
                                  let lbtime  = data_times[tooltipItem.index];
                                  let lbdate  = data_dates[tooltipItem.index];
                                    return ['Temperature = ' + lbtemperature, 'Humidity       = ' + lbhumidity, 'Temperature out = ' + lbtemperaturout, 'Humidity out       = ' + lbhumidityout, 'Soil       = ' + lbhsoil, 'Sunshine       = ' + lbhsunshine,  'Time             = ' + lbtime, 'Date             = ' + lbdate];
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
                              min: 5,
                            }
                          }],
                          xAxes: [{
                            ticks: {
                              /*Precisa autoSkip pra nao aparecer muitas informacoes*/
                              autoSkip: false,
                              maxRotation: 45,
                              minRotation: 45,
                              maxTicksLimit: 5,
                            },
                            gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                            }
                          }]
                        },
                        maintainAspectRatio : true
                    }
                });

              linechart.update({
                duration: 800,
                easing: 'easeOutBounce'
              });

              </script>
      <!-- Akhir POwer Linechart -->