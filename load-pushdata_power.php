
            <?php  
            include "dbh.php";
              $sql_push_power = "SELECT * FROM greenhouse WHERE `date` BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( ) ORDER BY date, time";
              $data_power_push = mysqli_query($conn, $sql_push_power);
              while ($a = mysqli_fetch_array($data_power_push) ) { 
                $ps_data_volt_batt     = $a['volt_batt'];
                $ps_data_volt_solar    = $a['volt_solar'];
                $ps_data_curr_solar    = $a['curr_solar'];
                $ps_data_times_power   = $a['time'];
                $ps_data_watt_solar    = $a['power_solar'];
                $ps_power_id           = $a['id'];
              };
            ?>
            <script type="text/javascript">
              function adddata(){
                var id = <?php echo $check_id; ?>;
                if (id > tmp ) {
                  myBarChart.data.labels.push(<?php echo '"'. $ps_data_times_power.'",';?>);
                  myBarChart.data.datasets[0].data.push(<?php echo '"'. $ps_data_volt_batt.'",';?>);
                  myBarChart.data.datasets[1].data.push(<?php echo '"'. $ps_data_volt_solar.'",';?>);             
                  myBarChart.data.datasets[2].data.push(<?php echo '"'. $ps_data_curr_solar.'",';?>);
                  myBarChart.data.datasets[3].data.push(<?php echo '"'. $ps_data_watt_solar.'",';?>); 
                  myBarChart.update();
                  tmp = id;
                };
              };    
            </script> 

