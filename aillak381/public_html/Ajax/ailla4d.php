<html>
<body>

<?php

$con = new mysqli("localhost","aillak381","","aillak381") or die("Failed to connect to database " . mysqli_connect_error());



$id = $_POST["ID"];
$date = $_POST["date"];
$date_format=date("n/j/y",strtotime($date));


$sql_command = "INSERT INTO SALES(SALEDATE, CUSTOMERID) VALUES ('$date_format', '$id')";

if ( $con->connect_error)
{
	die('Fail to insert SALES record: ' . $con->connect_error);
}

if ($con->query($sql_command) === TRUE)
{
echo "New Sale added!!";
}
else
{
	echo "ERROR:" .$sql_command . "<br>" . $con->error;
}
$con->close();

?>
</body>
</html> 
