<?php session_start(); ?>
<html>

<body>

<h1 align="Left">Result:</h1>

<?php

$con = mysqli_connect("localhost","aillak381", "","aillak381") or die("failed to connect to database " . mysqli_connect_error());

	
	$saleid = $_POST["SALEID"];
	$sql = "SELECT * FROM SALES WHERE SALEID = '" . $saleid . "';";
	$result = $con->query($sql);

	echo "<table border=1 style=width:50%><tr><th>Sale ID</th><th>Sale Date</th><th>Customer ID</th></tr>";

if($result->num_rows >0){
	while($row = $result->fetch_array())
	{
		echo "<tr>";
		echo "<td>" . $row['SALEID'] . "</td>";
		echo "<td>" . $row['SALEDATE'] . "</td>";
		echo "<td>" . $row['CUSTOMERID'] . "</td>";
		echo "</tr>";
	}
} else
{
	echo"no output";
}
	
	echo "</table>";
	$con->close();

?>

</body>

</html>
