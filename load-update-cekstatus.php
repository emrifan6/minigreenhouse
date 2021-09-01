 <?php 
    include "dbh.php";
    $sql = "SELECT fan, mist, pump FROM greenhouse WHERE timestamp > date_sub(now(), interval 1 minute) ORDER BY id DESC LIMIT 1";
    $fan = $conn->query($sql);
    $mist = $conn->query($sql);
    $pump = $conn->query($sql);
   ?>  

   <script type="text/javascript">
     
      var data_fan = [<?php while($a = mysqli_fetch_array($fan)) { echo '"' . $a['fan'] . '",'; } ?>];
      var data_mist = [<?php while($b = mysqli_fetch_array($mist)) { echo '"' . $b['mist'] . '",'; } ?>];
      var data_pump = [<?php while($c = mysqli_fetch_array($pump)) { echo '"' . $c['pump'] . '",'; } ?>];

         if (data_fan == 0 ) {
          document.getElementById("statusfan").innerHTML = "FAN OFF";
         } else if (data_fan == 1){
          document.getElementById("statusfan").innerHTML = "FAN ON";
         } else {
          document.getElementById("statusfan").innerHTML = "OFFLINE";
         }

         if (data_mist == 0) {
          document.getElementById("statusmist").innerHTML = "MIST OFF";
         } else if (data_mist == 1){
         document.getElementById("statusmist").innerHTML = "MIST ON";
         } else {
          document.getElementById("statusmist").innerHTML = "OFFLINE";
         }

        if (data_pump == 0) {
          document.getElementById("statuspump").innerHTML = "PUMP OFF";
         } else if (data_pump == 1){
         document.getElementById("statuspump").innerHTML = "PUMP ON";
         } else {
          document.getElementById("statuspump").innerHTML = "OFFLINE";
         }

   </script>