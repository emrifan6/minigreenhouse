<!DOCTYPE html>
<html>
<head>
	    <!-- UNTUK WATER GAUGE -->
    <script src="http://d3js.org/d3.v3.min.js" language="JavaScript"></script>
    <script src="liquidFillGauge.js" language="JavaScript"></script> 

    <!-- JQUERY AJAX UNTUK RELOAD DIV SANGAT-SANGAT DIPERLUKAN-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

	<title>water gauge</title>
</head>
<body>

	 <svg id="fillgauge4" width="85%" height="85%" onclick="gauge4.update(NewValue());"></svg>




	 <!-- JS WATER GAUGE -->

    <div id="updategauge">
          <?php 
          include 'dbh.php';
          ?>

          <script type="text/javascript">
             function NewValue(){
                  <?php 
                      $sqlpush = "SELECT humidity FROM sensordata ORDER BY id DESC LIMIT 1";
                      $pushdata = mysqli_query($conn, $sqlpush);
                      while($a = mysqli_fetch_array($pushdata)) { $llabel = $a['humidity'];}    
                   ?>
                   var tmp = <?php echo $llabel; ?>;
                   return tmp;
              }
          </script>
      </div>

      <script language="JavaScript">
       var config4 = liquidFillGaugeDefaultSettings();
       config4.circleThickness = 0.15;
       config4.circleColor = "#808015";
       config4.textColor = "#555500";
       config4.waveTextColor = "#FFFFAA";
       config4.waveColor = "#AAAA39";
       config4.textVertPosition = 0.8;
       config4.waveAnimateTime = 1000;
       config4.waveHeight = 0.05;
       config4.waveAnimate = true;
       config4.waveRise = false;
       config4.waveHeightScaling = false;
       config4.waveOffset = 0.25;
       config4.textSize = 0.75;
       config4.waveCount = 3;
       var gauge4 = loadLiquidFillGauge("fillgauge4", NewValue(), config4);
      function loadlinkgauge(){
        $("#updategauge").load("load-updategauge.php", {
               //   commentNewCount : commentCount
        });
      }   
      loadlinkgauge(); 
      setInterval(function(){
        loadlinkgauge(),
        gauge4.update(NewValue()) // this will run after every 2 seconds
        }, 2500);
    </script>

    <!-- AKHIR JS WATER GAUGE -->


</body>
</html>