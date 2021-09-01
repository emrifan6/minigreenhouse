<?php

include "dbh.php";

$api_key_value = "muchamadrifan";

$api_key = $soil= $temperature= $humidity = "";

    //Get current date and time
    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $time = date("H:i");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if($api_key_value == $api_key) {
        $soil = test_input($_GET["soil"]);
        $temperature = test_input($_GET["temperature"]);
        $humidity = test_input($_GET["humidity"]);
         $temperatureout = test_input($_GET["temperatureout"]);
        $humidityout = test_input($_GET["humidityout"]);
        $volt_batt = $_GET["volt_batt"];
        $volt_solar = $_GET["volt_solar"];
        $curr_solar = $_GET["curr_solar"];
        $power_solar = $curr_solar * $volt_solar;
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO greenhouse (`id`, `temperature`, `humidity`, `temperatureout`, `humidityout`, `soil`, `sunshine`, `volt_batt`, `volt_solar`, `curr_solar`, `power_solar`, `fan`, `mist`, `pump`, `time`, `date`, `timestamp`)  VALUES 
      (NULL, '$temperature', '$humidity',  '$temperatureout', '$humidityout', '$soil', NULL, $volt_batt, $volt_solar, $curr_solar, $power_solar,  NULL, NULL, NULL, '$time', '$date', current_timestamp())";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}