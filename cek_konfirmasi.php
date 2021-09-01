<?php

 include"dbh.php";

   $sql = "SELECT * FROM konfirmasi ORDER BY id DESC LIMIT 1";
   $hasil = $conn->query($sql);
	while($a = mysqli_fetch_array($hasil)) { 
		$id = $a['id'];
		$code = $a['code'];
		$text = $a['text']; 
		$timestamp = $a['timestamp']; 
	}

	$array = array("id" => $id, "code" => $code, "text" => $text, "timestamp" => $timestamp);
	/* The JSON string created from the array. */
	$json = json_encode($array);
	echo $json;
?>