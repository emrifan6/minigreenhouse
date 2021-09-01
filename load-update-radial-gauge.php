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