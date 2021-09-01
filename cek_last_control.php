<?php

 include"dbh.php";

   $sql = "SELECT fan,mist,pump FROM greenhouse_control ORDER BY id DESC LIMIT 1";
   $hasil = $conn->query($sql);
	while($a = mysqli_fetch_array($hasil)) { 
		$code = $a['id'];
		$fan = $a['fan'];
		$pump = $a['pump']; 
		$mist = $a['mist']; 
	}

	$array = array("fan" => $fan, "mist" => $mist, "pump" => $pump, "code" => $code);
	/* The JSON string created from the array. */
	$json = json_encode($array);
	echo $json;
?>