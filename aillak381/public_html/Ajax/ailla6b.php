<?php
$sale_id = $_GET["id"];
$con = mysqli_connect("localhost","aillak381","","aillak381") or die("Failed to connect to database " . mysqli_error());
$sql_command = "SELECT * FROM SALES WHERE SALEID LIKE '" . $sale_id . "%';";
$result = ($con -> query($sql_command));

$rowcount = ($result -> num_rows);
if ($rowcount != 0)
{
$id1_array = " new Array(";
$date_array = " new Array(";
$id2_array = " new Array(";
while($row = $result -> fetch_array())
{
$id1_array .= "'" . $row['SALEID'] . "'," ;
$date_array .= "'" . $row['SALEDATE'] . "'," ;
$id2_array .= "'" . $row['CUSTOMERID'] . "'," ;
}
if ($result -> num_rows > 0)
{

$id1_array = rtrim($id1_array, ",");
$date_array = rtrim($date_array, ",");
$id2_array = rtrim($id2_array, ",");

}

$id1_array .= ")" ;
$date_array .= ")" ;
$id2_array .= ")" ;
echo "there($id1_array, $date_array, $id2_array)";
}
else
{
echo "not_there()";
}

$con -> close();
?>