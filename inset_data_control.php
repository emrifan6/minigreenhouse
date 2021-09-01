<?php
      include "dbh.php";
      $fan  = $_POST['fan'];
      $mist = $_POST['mist'];
      $pump = $_POST['pump'];
      
    //Get current date and time
    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $time = date("H:i");
      
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