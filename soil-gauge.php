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

<!-- AWAL SOIL RADIAL GAUGE -->

		<div id="update-radialhum-gauge">
		      <?php 
		        include "dbh.php";
		      ?>
		         <script type="text/javascript">
		              function datahum_gauge(){
		                <?php 
		                    $sqlpush = "SELECT soil FROM greenhouse ORDER BY id DESC LIMIT 1";
		                    $pushdata = mysqli_query($conn, $sqlpush);
		                    while($a = mysqli_fetch_array($pushdata)) { $llabel = $a['soil'];}    
		                 ?>
		                 var tmp = <?php echo $llabel; ?>;
		                 return tmp;
		              };
		        </script>
		 </div>


		<script type="text/javascript">
	      function radialhumupdate() {
	        config.data.datasets.forEach(function(dataset) {
	          dataset.data = dataset.data.map(function() { 
	            return datahum_gauge();
	          });
	        });
	        window.myRadialGauge.update();
	      };

	      function load_datahum_radial(){
	        $("#update-radialhum-gauge").load("load-update-radialsoil-gauge.php", {
	               //   commentNewCount : commentCount
	        });
	      };    

	      setInterval(function(){
	        radialhumupdate(),
	        load_datahum_radial() // this will run after every 2 seconds
	        }, 2500);
	    </script>

   
    <script>
      Chart.defaults.global.defaultFontFamily = 'Verdana';

      var ctx = document.getElementById('chart-area').getContext('2d');
      var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
      gradientStroke.addColorStop(0, '#80b6f4');
      gradientStroke.addColorStop(1, '#f49080');

      var config = {
        type: 'radialGauge',
        data: {
          labels: ['Humidity'],
          datasets: [
            {
              data: [datahum_gauge()],
              backgroundColor: '#795548',    //gradiiennt stroke '[gradientStroke]' tidak dipakai
              borderWidth: 0,
              label: 'Score'
            }
          ]
        },
        options: {
          responsive: true,
          legend: {},
          title: {
            display: false, 	// TRUE, UNTUK MENAMPILKAN TITLE CHART
            text: 'Radial gauge chart'
          },
          centerPercentage: 80,
          centerArea: {
            text: function(value, options) {
              return value + '%';
            }
          }
        }
      };

      window.onload = function() {
        var ctx = document.getElementById('chart-area').getContext('2d');
        window.myRadialGauge = new Chart(ctx, config);
      };

      document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
          dataset.data = dataset.data.map(function() {
            return datahum_gauge();
          });
        });

        window.myRadialGauge.update();
      });
    </script>

<!-- AKHIR SOIL RADIAL GAUGE -->

</body>
</html>