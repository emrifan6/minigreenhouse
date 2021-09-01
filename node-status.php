<!--<form action="" method="post">-->
<!--  <button type="submit" name="submit">Click Me</button>-->
<!--</form>-->

<?php 
    
  date_default_timezone_set("Asia/Jakarta");
  
  $currentTimeinSeconds = time(); 

    $interval = 600;
    
    
    $currentDate = date('H-i', $currentTimeinSeconds); 
   // echo ($currentDate); 
    
    $deviation = $currentTimeinSeconds - $interval;
    
   // echo('   =   ');
    
    $currentDateDeviation = date('H-i', $deviation); 
    
    //echo($currentDateDeviation); 

  
  
   include"dbh.php";
   $sql = "SELECT * FROM greenhouse ORDER BY id DESC LIMIT 1";
   $lasttime = $conn->query($sql);
   
  $lasttemperature = $conn->query($sql);
  $lasthumidity = $conn->query($sql);
  $lasttemperatureout = $conn->query($sql);
  $lasthumidityout = $conn->query($sql);
  $lastsoil = $conn->query($sql);
  $lastsunshine = $conn->query($sql);
  $lasttime = $conn->query($sql);
  $lastdate = $conn->query($sql);
  $check_ids = $conn->query($sql);
   
   
   while($x = mysqli_fetch_array($lasttime)) { 
       $bufftime =  $x['timestamp']; 
   } 
   
  while ($a = mysqli_fetch_array($lasttemperature) ) { $datatemperature     = $a['temperature'];};
  while ($b = mysqli_fetch_array($lasthumidity) ) { $datahumidity           = $b['humidity'];};
  while ($h = mysqli_fetch_array($lasttemperatureout) ) { $datatemperatureout     = $h['temperatureout'];};
  while ($i = mysqli_fetch_array($lasthumidityout) ) { $datahumidityout           = $i['humidityout'];};
  while ($c = mysqli_fetch_array($lastsoil) ) { $datahsoil                  = $c['soil'];};
  while ($d = mysqli_fetch_array($lastsunshine) ) { $datahsunshine          = $d['sunshine'];};
  while ($e = mysqli_fetch_array($lasttime) ) { $datatime                   = $e['time'];};
  while ($f = mysqli_fetch_array($lastdate)) { $datadate                    = $f['date'];};
  while ($g = mysqli_fetch_array($check_ids)) { $check_id                 = $g['id'];};
  
   
   $lastdatain = ' Tempreture = ' . $datatemperature . ' Humidity = ' . $datahumidity . ' Temperature Luar = ' . $datatemperatureout . ' Humidity Luar = ' . $datahumidityout . ' Soil = ' . $datahsoil . ' Sunshine = ' . $datahsunshine . ' Date = ' . $datadate;
   //' Time = ' . $datatime . 
   
   $dbtime = strtotime($bufftime);
   
   $selisih = $currentTimeinSeconds-$dbtime;
   
   
   
   if(($selisih >= 60) && ($selisih <= 60000)){
    require_once('function.php');
        $to       = 'muchamad.rifan@polytron.co.id';
        $subject  = 'GREENHOUSE NODE STATUS IS OFFLINE SINCE '.$bufftime ;
        $message  = "   The Last data in : ". $lastdatain ;
        smtp_mail($to, $subject, $message, '', '', 0, 0, true);
        echo ('The email has been sent');
   }else{
       echo('Selisih = '.$selisih);
   }
   
   echo($d);
 ?>