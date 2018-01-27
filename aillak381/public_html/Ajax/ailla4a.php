

<html>

<body>
<form action="ailla4b.php" method="post">
<p>
Sales Id: <input type="text" name="SALEID">
<select name="SALEID">
<?php

$con = mysqli_connect("localhost", "aillak381", "", "aillak381") or die("Failed to connect to database " . mysqli_connect_error());

 $sql = "SELECT * FROM SALES;";
 $result = $con->query($sql);

 
if ($result ->num_rows >0){
 while($row =$result -> fetch_array())

	{
		echo "<option value=\"". $row[0] . "\">". $row[0]."</option>";
	}
}
else
{
	echo "0 result";
}
$con->close($con);
?>

</select>
</p>

<p><input type="submit" value="Choose"></p>

</form>

</body>

</html>
