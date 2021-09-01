<!DOCTYPE html>
<html>
<head>
	<title>status</title>
</head>
<body>

<h3>CEK STATUS</h3>

<?php 
include "dbh.php";

	$sql = "SELECT fan, mist FROM greenhouse WHERE `date` BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 0 DAY ) AND CURDATE( ) ORDER BY id DESC LIMIT 1";
    $fan = $conn->query($sql);
    $mist = $conn->query($sql);
            
?>

<script type="text/javascript">

	var data_fan = [<?php while($a = mysqli_fetch_array($fan)) { echo '"' . $a['fan'] . '",'; } ?>];
	var data_mist = [<?php while($b = mysqli_fetch_array($mist)) { echo '"' . $b['mist'] . '",'; } ?>];

	 if (data_fan == 0 ) {
	 	document.write("FAN OFF ");
	 } else if (data_fan == 1){
	 	document.write("FAN ON \n ");
	 } else {
	 	document.write("VALUE IS NOT VALID \n ");
	 }

	 if (data_mist == 0 ) {
	 	document.write("\n MIST OFF");
	 } else if (data_mist == 1){
	 	document.write("MIST ON");
	 } else {
	 	document.write("VALUE IS NOT VALID");
	 }

</script>


</body>
</html>