<?php
$con = mysqli_connect("localhost","aillak381","","stories") or die("Failed to connect to database ");

$nname=$_GET["name"];
$iname=$_GET["ID"];
$cname=$_GET["category"];


$sql_command = "UPDATE stories set name='$nname', category='$cname' where ID='$iname' ";

mysqli_query($con,$sql_command);
echo "<h2>Details Updated</h2>";
?>