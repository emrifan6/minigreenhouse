<?php 
  include"dbh.php";
   $sql = "SELECT fan,mist,pump FROM greenhouse ORDER BY id DESC LIMIT 1";
   $fan = $conn->query($sql);
   while($a = mysqli_fetch_array($fan)){
   	$result = $a[1];
   }
   // echo ($last_fan);

   echo json_encode(array("result" => $result));
?>