<?php
      include "dbh.php";
      $temperature  = $_REQUEST['temperature'];
      $humidity  = $_REQUEST['humidity'];
      $temperatureout  = $_REQUEST['temperatureout'];
      $humidityout  = $_REQUEST['humidityout'];
      $soil =  $_REQUEST['soil'];
      $sunshine = $_REQUEST['sunshine'];
      $fan  = $_REQUEST['fan'];
      $mist = $_REQUEST['mist'];
      $pump = $_REQUEST['pump'];
      $volt_batt = $_REQUEST['battery_volatge'];
      $volt_solar = $_REQUEST['solar_voltage'];
      $curr_solar = $_REQUEST['solar_current'];
      $power_solar = $volt_solar*$curr_solar;
      $soil1 =  $_REQUEST['soil1'];
      $soil2 =  $_REQUEST['soil2'];
      $soil3 =  $_REQUEST['soil3'];
      
    //Get current date and time
    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $time = date("H:i");
      
      $mysqli  = "INSERT INTO `greenhouse` (`id`, `temperature`, `humidity`, `temperatureout`, `humidityout`, `soil`, `sunshine`, `volt_batt`, `volt_solar`, `curr_solar`, `power_solar`, `fan`, `mist`, `pump`, `time`, `date`, `timestamp`, `soil1`, `soil2`, `soil3`) VALUES ('', '$temperature', '$humidity', '$temperatureout', '$humidityout', '$soil', '$sunshine', '$volt_batt', '$volt_solar', '$curr_solar', '$power_solar', '$fan', '$mist', '$pump', '$time', '$date', current_timestamp(), '$soil1', '$soil2', '$soil3')";






      $result  = mysqli_query($conn, $mysqli);
      if ($result) {echo "
		<script>
			document.location.href = 'form.php';
		</script>";
      } else {
        echo "Input gagal";
      }

      $mysqlicontrol = "INSERT INTO `greenhouse_control` (`id`, `fan`, `mist`, `pump`, `timestamp`) VALUES (NULL, '$fan', '$mist', '$pump', current_timestamp())";
      $resultcontrol  = mysqli_query($conn, $mysqlicontrol);
      if ($resultcontrol) {
            echo "
    <script>
      document.location.href = 'form.php';
    </script>
  ";
      } else {
        echo "Input gagal";
      }

      mysqli_close($conn);
    ?>