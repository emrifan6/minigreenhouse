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