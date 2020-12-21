
<?php 

include ("banner.php");
include ("menu.php");
require ("conn.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reports</title>
</head>
<body>
<div align="center"><b><font color="blue" align="center" size="">Stations Reports</font></b></div>
<p></p>
<form action="reports.php" method="POST" align="center">

<select name="reports">
  <option value="HWH">List of Stations of Howrah Division</option>
  <option value="NSG-1">List of Stations under NSG Category</option>

  <option value="retiring_room">Stations having Retiring Rooms</option>
  <option value="pwd">Stations having PWD facilities</option>
 
</select>
<br>
		<p>
 			<input type="submit" value="Generate">
		</p>
</form>

<?php

extract($_POST);
// print_r($_POST);
// die();



if(isset($_POST['reports'])){

	$select = $_POST['reports'];
	// print_r($select);
	// die();

	if($select == "HWH"){

		$q = "`division_code` = 'HWH'";

	}
	elseif ($select == "NSG-1") {

		$q = "`station_category` = 'NSG-1'";

	}
	elseif ($select == "retiring_room") {
		$q = "`retiring_room` = 'y'";
		
	}
	elseif ($select =="pwd") {
		$q = "`pwd` = 'y'";
		
	}
	else{
	header("location:reports.php?msg=Reports can not be generated");
		
	}
	

                   
        $sql=  "SELECT * 
               	FROM `stations` 
                WHERE $q";

         	$res = mysqli_query($conn, $sql) or die("Data not found");
		  	$count = mysqli_affected_rows($conn);
			
			if($count) {

				echo "<table align='center'>
           		<tr>
                	<td>Reports</td>
            	</tr>
        		</table>"; 



						echo "<div class='container'>
						  <h2>Result</h2>
						  
						  <table class='table' border='1'>
						    <thead>

						    	<tr>
						        <th>Sl No.</th>
						        <th>Station Name</th>
						        <th>Division</th>
						      </tr>
						    </thead>
						    <tbody>";
						       
								$i =1;
						        while($row = mysqli_fetch_assoc($res))
						        {
						      echo "<tr class='success'>
						        <td> $i </td>
						        <td> $row[station_name] </td>
						        <td> $row[division_name] </td>
						      </tr>";

						      $i++;
						      }

						    echo "</tbody>
						  </table>
						</div>";


			}

			else{
			echo "<table align='center'>
           			<tr>
                		<td>No result found</td>
            		</tr>
        		  </table>";

				exit();
			}   

}
?>   



</body>
</html>