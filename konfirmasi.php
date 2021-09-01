<?php

include "dbh.php";

$api_key_value = "muchamadrifan";

$code = "";
$text = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if($api_key_value == $api_key) {
        $code = test_input($_GET["code"]);
        $text = test_input($_GET["text"]);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "INSERT INTO `konfirmasi` (`id`, `code`, `text`, `timestamp`) VALUES (NULL, '$code', '$text', CURRENT_TIMESTAMP);";
        
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