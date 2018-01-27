

<?php 
	$id=$_GET["id"];

   $con = mysqli_connect("localhost","aillak381","","aillak381") or die("Failed to connect to database " . mysqli_error());
   


	$sql_command = "SELECT CUSTOMERID, SALEID, SALEDATE  FROM SALES WHERE CUSTOMERID like '$id%'";
	$result = mysqli_query($con,$sql_command);
	$id_array = " new Array("; 
	$name_array = " new Array("; 
	$kind_array = " new Array("; 
	$type_array = " new Array(";

while($row = mysqli_fetch_array($result))
{
	$kind_array .= "'" . $row['CUSTOMERID'] . "'," ;
	$id_array .= "'" . $row['SALEID'] . "'," ;
	$name_array .= "'" . $row['SALEDATE'] . "'," ;
	

}

if (mysqli_num_rows($result) > 0)

{
	$kind_array = rtrim($kind_array, ",");
	$id_array = rtrim($id_array, ",");
	$name_array = rtrim($name_array, ",");
	
}

$kind_array .= ")" ;
$id_array .= ")" ;
$name_array .= ")" ;
$type_array .= ")" ;


if (mysqli_num_rows($result) > 0)
{
	echo "there($kind_array, $id_array, $name_array )";
}
else
{
	echo "not_there()";
}



mysqli_close($con);

?>
