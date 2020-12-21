<?php 

include ("banner.php");
include ("menu.php");
require ("conn.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title> Update </title>
<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>


<div align="center"> 
<form action="update.php" method="post">
 
    <label>Search : </label>
    <input type="text" name="search" id="search"
    placeholder="Station Name, Division etc." required style="width:400px">

  	<p>
 		<input type="submit" value="Search">
	</p>

</form>
</div>

<?php

if (isset($_REQUEST['msg'])){
  print "<div style='color:#f00;' align='center'> 
  <b>$_REQUEST[msg]<b>
  </div>";
}
?>

<?php

if(isset($_POST['search'])){

  $search = $_POST['search'];

  // echo "$search";
  // die();
                   
        $sql=  "SELECT * 
               	FROM `stations` 
                WHERE
                `station_name` LIKE '%$search%' ||
                `division_name` LIKE '%$search%'
                 
                AND `is_active`='y'";

         	$res = mysqli_query($conn, $sql) or die("Data not found");
		  	$count = mysqli_affected_rows($conn);
			
			if($count) {

				echo "<table align='center'>
           		<tr>
                	<td>Search result for $search</td>
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
        <th>Update ?</th>

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
        <td>
        <a href='update.php?id=$row[station_id]'>
        <img src='images/edit.png' style='height:30px;width:30px'></a> </td>

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



<?php

if(isset($_REQUEST['id'])){

  $id = $_REQUEST['id'];

  // echo "$id";
  // die();
                   
        $sql=  "SELECT * 
                FROM `stations` 
                WHERE
                `station_id`='$id'";

        $res = mysqli_query($conn, $sql) or die("Data not found");
        $count = mysqli_affected_rows($conn);
      
      if($count) {

        
echo "<div class='container'>
  <h2>Update Station</h2>
<form action='updateRecord.php' method='POST'>  
  <table class='table' border='1'>
       <tbody>";
       
      
        while($row = mysqli_fetch_assoc($res))
        {
        
        echo "<tr class='success'>
        
        <td> Station Name </td>

        <td> 
        <input type='text' name='stn_name' value='$row[station_name]'>  
        </td>

        <td> Division Name </td>
        
        <td> 
        <input type='text' name='div_name' value='$row[division_name]'>  
        </td>


        <input type='hidden' name='stn_id' value='$row[station_id]'>  

        <td> 
        <input type='submit' name='Update' value='Update'>  
        </td>

        <td> 
        <a herf='delete.php'>
        <input type='reset' name='clear' value='Clear'>
        </a> 
        </td>
        

      </tr>";

      
      }

    echo "</tbody>
  </table>
</form>
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