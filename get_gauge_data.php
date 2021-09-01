<?php 
include"dbh.php";
$sqlpush = "SELECT * FROM greenhouse ORDER BY id DESC LIMIT 1"; //WHERE timestamp > date_sub(now(), interval 12 minute)
$pushdata = mysqli_query($conn, $sqlpush);
while($a = mysqli_fetch_array($pushdata)) {
	 $id = $a['id'];
	 $temperature = $a['temperature'];
	 $humidity = $a['humidity'];
	 $temperatureout = $a['temperatureout'];
	 $humidityout = $a['humidityout'];
	 $sunshine = $a['sunshine'];
	 $soil = $a['soil'];
	 $soil1 = $a['soil1'];
	 $soil2 = $a['soil2'];
	 $soil3 = $a['soil3'];
}  

$array = array("id" => $id, "temperature" => $temperature, "humidity" => $humidity, "temperatureout" => $temperatureout, "humidityout" => $humidityout, "sunshine" => $sunshine, "soil" => $soil, "soil1" => $soil1, "soil2" => $soil2, "soil3" => $soil3 );
$json = json_encode($array);
echo $json;
?>