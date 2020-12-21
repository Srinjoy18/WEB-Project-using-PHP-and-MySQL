<?php 

include ("banner.php");
include ("menu.php");
require ("conn.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title> Add </title>
<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>




<?php

if (isset($_REQUEST['msg'])){
  print "<div style='color:#f00;' align='center'> 
  <b>$_REQUEST[msg]<b>
  </div>";
}
?>


        
<div class='container' align="center">
<h2>Add Station</h2>
<form action='addRecord.php' method='POST'>  
  <table class='table' border='1'>
       <tbody>
       
       <tr class='success'>
        
        <td> Station Name </td>

        <td> 
        <input type='text' name='stn_name' value="">  
        </td>

        <td> Division Name </td>
        
        <td> 
        <select name="div_name">
            <option value="Howrah">Howrah</option>
            <option value="Sealdah">Sealdah</option>
            <option value="Asansol">Asansol</option>
            <option value="Malda">Malda</option>
 
        </select>
        </td>

        <td> Station Category </td>

        <td> 
        <select name="stn_cat">
            <option value="NSG-1">NSG-1</option>
            <option value="NSG-2">NSG-2</option>
            <option value="SG-2">SG-2</option>
            <option value="H-1">H-1</option>
 
        </select>  
        </td>

        <td> Retiring Room </td>

        <td> 
        <input type="radio" name="retiring_room" value="y" > Yes<br>
        <input type="radio" name="retiring_room" value="n" checked> No<br>  
        </td>
</tr>

      <tr>
        <td colspan="8" align="center"> 
        <input type='submit' name='Add' value='Add'>  
        <input type="reset" name="Update" value="Clear">
        </td>

      </tr>

      
      

    </tbody>
  </table>
</form>
</div>
</body>
</html>