<?php session_start(); ?>

<html >

<body>
<h2>Add new State info to the text file: </h2>
<form action="ailla3d.php" method="post">
<p>State_ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="State_ID"></p>
<p>State_Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="State_Name"></p>
<p>Largest_City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="Largest_City"></p>
<p>Population:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="Population"></p>
<p>Number_Of_US_Representatives:&nbsp; <input type="text" name="Number_Of_US"></p>
<p><input type="submit" value="submit"></p>

</form>

</body>
</html>