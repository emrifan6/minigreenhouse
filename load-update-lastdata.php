<?php 
   include"dbh.php";
   $sql = "SELECT time, date FROM greenhouse ORDER BY id DESC LIMIT 1";
   $lasttime = $conn->query($sql);
   $lastdate = $conn->query($sql);
 ?>

 <script type="text/javascript">
   var last_time = [<?php while($a = mysqli_fetch_array($lasttime)) { echo '"' . $a['time'] . '",'; } ?>];
   var last_date = [<?php while($b = mysqli_fetch_array($lastdate)) { echo '"' . $b['date'] . '",'; } ?>];   
   document.getElementById("lastdata").innerHTML = "Last data in = " + last_time +" / "+ last_date;
 </script>