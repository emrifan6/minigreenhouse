<?php 
                    include "dbh.php";
                  ?>
                     <script type="text/javascript">
                          function datasoil_gauge(){
                            <?php 
                                $sqlpush = "SELECT soil FROM greenhouse  WHERE timestamp > date_sub(now(), interval 12 minute) ORDER BY id DESC LIMIT 1";
                                $pushdata = mysqli_query($conn, $sqlpush);
                                while($a = mysqli_fetch_array($pushdata)) { $llabel = $a['soil'];}    
                             ?>
                             var tmp = <?php echo $llabel; ?>;
                             return tmp;
                          };
                    </script>