<?php

$con = mysqli_connect("localhost","aillak381","", "stories") or die("Failed to connect to database ");


$nname=$_GET["name"];
$iname=$_GET["ID"];
$cname=$_GET["category"];

$sql_command = 
"INSERT INTO stories VALUES ('$nname','$iname','$cname')";
$res=mysqli_query($con,$sql_command);
if(!$res)
{
echo "<h1>Unable to insert details</h1>";
}
else
{
echo "<h1> Successfully book is added</h1>";
}
?>