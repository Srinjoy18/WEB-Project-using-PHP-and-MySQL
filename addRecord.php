<?php

require ("conn.php");
require ("session_security.php");

extract($_POST);
// print_r($_POST);
// die();

$sql = "INSERT INTO `stations`
		(`station_id`,`station_name`,
		`division_name`,`station_category`,`retiring_room`) 
		VALUES 
		('null','$stn_name','$div_name','$stn_cat','$retiring_room')";


mysqli_query($conn,$sql) or die ("error");
$res = mysqli_affected_rows($conn);

if ($res) {

header("location:add.php?msg=Station Added Successfully");
}

else {
	header("location:add.php?msg=Data not added");
}

?>
