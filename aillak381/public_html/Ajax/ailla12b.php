
<?php

$con = mysqli_connect("localhost","aillak381","","stories") or die("Failed to connect to database ");
$sql_command = "SELECT * FROM stories";
$result = mysqli_query($con,$sql_command);
$data="<table border=1  ><tr><thead><th> ID </th><th> NAME </th><th> CATEGORY </th></thead><tbody>";

while($row = mysqli_fetch_array($result))
{
  $data .= "<tr>";
  $data .= "<th>" . $row['ID'] . "</th>" ;
  $data .= "<th>" .$row['name'] . "</th>" ;
  $data .= "<th>" .$row['category'] . "</th>" ; 
  $data .= "</tr>";
}

$data .= "</tbody></table>";


	echo "$data";


?>