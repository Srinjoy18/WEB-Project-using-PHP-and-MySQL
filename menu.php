
<hr color='red'>
<div align='center' >
<font size='6'>
<span><a href='home.php'>|Home|</a></span>&emsp;
<span><a href='Search.php'>|Search|</a></span>&emsp;
<span><a href='Add.php'>|Add|</a></span>&emsp;
<span><a href='Update.php'>|Update|</a></span>&emsp;
<span><a href='Delete.php'>|Delete|</a></span>&emsp;
<span><a href='Reports.php'>|Reports|</a></span>&emsp;

<span><a href='logout.php'>|Logout|</a></span>
</font>
</div>

<!--START - welcome user -->
<div align='center' >
<font size='6'>
<span>Welcome

<?php
require ("session_security.php");
echo "<b>".$_SESSION['active_user']."</b>";
?>

</span>
</font>
</div>
<!--END - welcome user -->

<hr color='red'>

