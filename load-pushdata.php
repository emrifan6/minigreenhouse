<?php  
  include "dbh.php";
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