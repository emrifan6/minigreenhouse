<?php 
   include"dbh.php";
   $sqltemp_0day = "SELECT AVG(temperature) AS Averagetemperature FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqltemp_1day = "SELECT AVG(temperature) AS Averagetemperature FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqltemp_6day = "SELECT AVG(temperature) AS Averagetemperature FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 6 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqltemp_29day = "SELECT AVG(temperature) AS Averagetemperature FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 29 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";


   $sqlhum_0day = "SELECT AVG(humidity) AS Averagehumidity FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqlhum_1day = "SELECT AVG(humidity) AS Averagehumidity FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqlhum_6day = "SELECT AVG(humidity) AS Averagehumidity FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 6 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqlhum_29day = "SELECT AVG(humidity) AS Averagehumidity FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 29 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";


   $sqltempout_0day = "SELECT AVG(temperatureout) AS Averagetemperatureout FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqltempout_1day = "SELECT AVG(temperatureout) AS Averagetemperatureout FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqltempout_6day = "SELECT AVG(temperatureout) AS Averagetemperatureout FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 6 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqltempout_29day = "SELECT AVG(temperatureout) AS Averagetemperatureout FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 29 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";


   $sqlhumout_0day = "SELECT AVG(humidityout) AS Averagehumidityout FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqlhumout_1day = "SELECT AVG(humidityout) AS Averagehumidityout FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqlhumout_6day = "SELECT AVG(humidityout) AS Averagehumidityout FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 6 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";
   $sqlhumout_29day = "SELECT AVG(humidityout) AS Averagehumidityout FROM greenhouse WHERE (date BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 29 DAY ) AND CURDATE( )) AND (time>='09:00' AND time< '15:00')";


   $avgsqltemp_0day = $conn->query($sqltemp_0day);
   $avgsqltemp_1day = $conn->query($sqltemp_1day);
   $avgsqltemp_6day = $conn->query($sqltemp_6day);
   $avgsqltemp_29day = $conn->query($sqltemp_29day);

   $avgsqlhum_0day = $conn->query($sqlhum_0day);
   $avgsqlhum_1day = $conn->query($sqlhum_1day);
   $avgsqlhum_6day = $conn->query($sqlhum_6day);
   $avgsqlhum_29day = $conn->query($sqlhum_29day);

   $avgsqltempout_0day = $conn->query($sqltempout_0day);
   $avgsqltempout_1day = $conn->query($sqltempout_1day);
   $avgsqltempout_6day = $conn->query($sqltempout_6day);
   $avgsqltempout_29day = $conn->query($sqltempout_29day);

   $avgsqlhumout_0day = $conn->query($sqlhumout_0day);
   $avgsqlhumout_1day = $conn->query($sqlhumout_1day);
   $avgsqlhumout_6day = $conn->query($sqlhumout_6day);
   $avgsqlhumout_29day = $conn->query($sqlhumout_29day);




   while($a = mysqli_fetch_array($avgsqltemp_0day)) { 
   	$tempavg0d = $a['Averagetemperature']; 
   }
   while($a = mysqli_fetch_array($avgsqltemp_1day)) { 
   	$tempavg1d = $a['Averagetemperature']; 
   }
   while($a = mysqli_fetch_array($avgsqltemp_6day)) { 
   	$tempavg6d = $a['Averagetemperature']; 
   }
   while($a = mysqli_fetch_array($avgsqltemp_29day)) { 
   	$tempavg29d = $a['Averagetemperature']; 
   }


   while($a = mysqli_fetch_array($avgsqlhum_0day)) { 
   	$humavg0d = $a['Averagehumidity']; 
   }
   while($a = mysqli_fetch_array($avgsqlhum_1day)) { 
   	$humavg1d = $a['Averagehumidity']; 
   }
   while($a = mysqli_fetch_array($avgsqlhum_6day)) { 
   	$humavg6d = $a['Averagehumidity']; 
   }
   while($a = mysqli_fetch_array($avgsqlhum_29day)) { 
   	$humavg29d = $a['Averagehumidity']; 
   }


   while($a = mysqli_fetch_array($avgsqltempout_0day)) { 
   	$tempoutavg0d = $a['Averagetemperatureout']; 
   }
   while($a = mysqli_fetch_array($avgsqltempout_1day)) { 
   	$tempoutavg1d = $a['Averagetemperatureout']; 
   }
   while($a = mysqli_fetch_array($avgsqltempout_6day)) { 
   	$tempoutavg6d = $a['Averagetemperatureout']; 
   }
   while($a = mysqli_fetch_array($avgsqltempout_29day)) { 
   	$tempoutavg29d = $a['Averagetemperatureout']; 
   }


   while($a = mysqli_fetch_array($avgsqlhumout_0day)) { 
   	$humoutavg0d = $a['Averagehumidityout']; 
   }
   while($a = mysqli_fetch_array($avgsqlhumout_1day)) { 
   	$humoutavg1d = $a['Averagehumidityout']; 
   }
   while($a = mysqli_fetch_array($avgsqlhumout_6day)) { 
   	$humoutavg6d = $a['Averagehumidityout']; 
   }
   while($a = mysqli_fetch_array($avgsqlhumout_29day)) { 
   	$humoutavg29d = $a['Averagehumidityout']; 
   }





   // echo $tempavg;
   // echo round($tempavg0d);
   // echo "<br>";
   // echo round($tempavg6d);
   // echo "<br>";
   // echo round($tempavg29d);
   // echo "<br>";
   // echo "<br>";

   // echo round($humavg0d);
   // echo "<br>";
   // echo round($humavg6d);
   // echo "<br>";
   // echo round($humavg29d);
   // echo "<br>";
   // echo "<br>";

   // echo round($tempoutavg0d);
   // echo "<br>";
   // echo round($tempoutavg6d);
   // echo "<br>";
   // echo round($tempoutavg29d);
   // echo "<br>";
   // echo "<br>";

   // echo round($humoutavg0d);
   // echo "<br>";
   // echo round($humoutavg6d);
   // echo "<br>";
   // echo round($humoutavg29d);
   // echo "<br>";
   // echo "<br>";




    $tempavg0d = round($tempavg0d);

    $tempavg1d = round($tempavg1d);
   
    $tempavg6d = round($tempavg6d);
   
    $tempavg29d = round($tempavg29d);
   
   

    $humavg0d = round($humavg0d);

    $humavg1d = round($humavg1d);
   
    $humavg6d = round($humavg6d);
   
    $humavg29d = round($humavg29d);
   
   

    $tempoutavg0d = round($tempoutavg0d);

    $tempoutavg1d = round($tempoutavg1d);
   
    $tempoutavg6d = round($tempoutavg6d);
   
    $tempoutavg29d = round($tempoutavg29d);
   
   

    $humoutavg0d = round($humoutavg0d);

    $humoutavg1d = round($humoutavg1d);
   
    $humoutavg6d = round($humoutavg6d);
   
    $humoutavg29d = round($humoutavg29d);




   $array = array("tempavg0d" => $tempavg0d, "tempavg1d" => $tempavg1d, "tempavg6d" => $tempavg6d, "tempavg29d" => $tempavg29d,
   				  "humavg0d" => $humavg0d, "humavg1d" => $humavg1d, "humavg6d" => $humavg6d, "humavg29d" => $humavg29d,
   				  "tempoutavg0d" => $tempoutavg0d, "tempoutavg1d" => $tempoutavg1d, "tempoutavg6d" => $tempoutavg6d, "tempoutavg29d" => $tempoutavg29d,
   				  "humoutavg0d" => $humoutavg0d, "humoutavg1d" => $humoutavg1d, "humoutavg6d" => $humoutavg6d, "humoutavg29d" => $humoutavg29d );

   $json = json_encode($array);
	echo $json;

 ?>

