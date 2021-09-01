<!DOCTYPE html>
<html>
<head>
	 <!-- UNTUK RADIAL CHART -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" language="JavaScript"></script>
    <script src="https://pandameister.github.io/chartjs-chart-radial-gauge/docs/js/Chart.RadialGauge.umd.js" language="JavaScript"></script>
    <script src="https://pandameister.github.io/chartjs-chart-radial-gauge/docs/samples/utils.js" language="JavaScript"></script>


    <!-- JQUERY AJAX UNTUK RELOAD DIV SANGAT-SANGAT DIPERLUKAN-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    

	<title>test01</title>
</head>
<body>
	<div id="canvas-holder" style="width:100%">
		<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
			<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
				<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
				</div>
			</div>
			<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
				<div style="position:absolute;width:200%;height:200%;left:0; top:0">
				</div>
			</div>
		</div>
		<canvas id="chart-area" width="513" height="256" class="chartjs-render-monitor" style="display: block; width: 513px; height: 256px;">
		</canvas>
	</div>


	<!-- RADIAL GAUGE  TEMOERATURE-->

    <div id="update-radial-gauge">
      <?php 
        include "dbh.php";
      ?>
         <script type="text/javascript">
              function data_gauge(){
                <?php 
                    $sqlpush = "SELECT temperature FROM greenhouse ORDER BY id DESC LIMIT 1";
                    $pushdata = mysqli_query($conn, $sqlpush);
                    while($a = mysqli_fetch_array($pushdata)) { $llabel = $a['temperature'];}    
                 ?>
                 var tmp = <?php echo $llabel; ?>;
                 return tmp;
              };
        </script>
    </div>

                  <!-- Reload div  update-radial-gauge-->
    <script type="text/javascript">

      function radialupdate() {
        config.data.datasets.forEach(function(dataset) {
          dataset.data = dataset.data.map(function() { 
            return data_gauge();
          });
        });
        window.myRadialGauge.update();
      };

      function load_data_radial(){
        $("#update-radial-gauge").load("load-update-radial-gauge.php", {
               //   commentNewCount : commentCount
        });
      };    

      setInterval(function(){
        radialupdate(),
        load_data_radial() // this will run after every 2 seconds
        }, 2500);
    </script>



    <script type="text/javascript">

      Chart.defaults.global.defaultFontFamily = "Verdana";

      var ctx = document.getElementById("chart-area").getContext("2d");
      var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
      gradientStroke.addColorStop(0, "#80b6f4");
      gradientStroke.addColorStop(1, "#f49080");

      var config = {
       type: "radialGauge",
       data: {
        labels: ["Temperature"],
        datasets: [
         {
          data: [data_gauge()],
          backgroundColor: '#E91F63',
          borderWidth: 0,
          label: "Score"
         }
        ]
       },
       options: {
        responsive: true,
         // the domain for the data, default is [0, 100]
        domain: [0, 40],
        legend: {},
        title: {
         display: false,  //UNTUK MENAMPILKAN TITLE GAUGE
         text: "Temperature"
        },
        centerPercentage: 80,
        centerArea: {
            text: function(value, options) {
              return value + '\xB0' + 'C';
            }
          }
       }
      };

      window.onload = function() {
       var ctx = document.getElementById("chart-area").getContext("2d");
       window.myRadialGauge = new Chart(ctx, config);
      };


      function updateradialgauge(){
        config.data.datasets.forEach(function(dataset) {
          dataset.data = dataset.data.map(function() {
           return data_gauge();
          });
       });
       window.myRadialGauge.update();
      };
    </script>
     <!-- AKHIR  RADIAL GAUGE TEMOERATURE-->
     
</body>
</html>