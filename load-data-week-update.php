<?php 
				include 'dbh.php';
				$sql = "SELECT * FROM greenhouse WHERE `date` BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 6 DAY ) AND CURDATE( ) ORDER BY date, time";
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
