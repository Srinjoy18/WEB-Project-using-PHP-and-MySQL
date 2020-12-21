<?php

require ("conn.php");
require ("session_security.php");

extract($_POST);

// print_r($_POST);
// die();

$sql = "UPDATE `stations`
		SET `station_name`='$stn_name',
	    	`division_name`='$div_name'
	    WHERE `station_id`='$stn_id'";

mysqli_query($conn,$sql) or die ("error");
$res = mysqli_affected_rows($conn);

if ($res) {

header("location:update.php?msg=Station Updated Successfully");
}

else {
	header("location:update.php?msg=Data not updated");
}

?>
