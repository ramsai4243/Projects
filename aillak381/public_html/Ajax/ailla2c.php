<?php session_start();?>
<html>
<body>

<table border="2">
<tr>
<th>Field</th><th>Data</th>
</tr>
<tr>
<td>First Name</td>
<td>
<?php if (isset($_SESSION["Fname"])) 
echo $_SESSION["Fname"];
else
	echo "No Entry";
?>
</td>
</tr>
<tr>
<td>Middle Name</td>
<td>
<?php if (isset($_SESSION["Mname"])) 
echo $_SESSION["Mname"];
else
	echo "No Entry";
?>

<tr>
<td>Last Name</td>
<td>
<?php if (isset($_SESSION["Lname"])) 
echo $_SESSION["Lname"];
else
	echo "No Entry";
?>
</td>
</tr>
<tr>
<td>Email</td>
<td>
<?php if(isset ($_SESSION["email"]))
echo $_SESSION["email"];
else
echo "No Entry";
	
?>
</td>
</tr>
<tr>
<td>Student</td>
<td>
<?php if (isset($_SESSION["student"]))
echo "Yes";
else
	echo "Not Chosen";
?>
</td>
</tr>
<tr>
<td>Working Proffesional</td>
<td>
<?php if (isset($_SESSION["working_proffesional"]))
echo	"Yes";
else
	echo "Not Chosen";
?>
</td>
</tr>
<tr>
<td>None</td>
<td>
<?php if (isset($_SESSION["none"]))
echo "Yes";
else
	echo "Not Chosen";
?>
</td>
</tr>






<?php
$selectedclub = $_POST['state'];
$statename = array("Ohio"=>array("Columbus", "Columbus", "11,613,423"), "Nebraska"=>array("Lincoln", "Omaha", "1,896,190"), "South_Dakota"=>array("Pierre", "Sioux Falls", "2,1889"), "North_Carolina"=>array("Raleigh", "Wichita", "10,042,802"), "Florida"=>array("Tallahassee", "Jacksonville", "	20,271,272") );

echo "<ul>";
if ($selectedclub == "Ohio")
{

echo " <li>Ohio";
echo "<ul>";
echo "<li>" . $statename["Ohio"][0] . "</li>";
echo "<li>" . $statename["Ohio"][1] . "</li>";
echo "<li>" . $statename["Ohio"][2] . "</li>";
echo "</ul>";
echo " </li>";
} 

else if ($selectedclub == "Nebraska")
{
echo " <li>Missouri";
echo "<ul>";
echo "<li>" . $statename["Nebraska"][0] . "</li>";
echo "<li>" . $statename["Nebraska"][1] . "</li>";
echo "<li>" . $statename["Nebraska"][2] . "</li>";
echo "</ul>";
echo " </li>";
}
else if ($selectedclub == "South_Dakota")
{
echo " <li>South_Dakota";
echo "<ul>";
echo "<li>" . $statename["South_Dakota"][0] . "</li>";
echo "<li>" . $statename["South_Dakota"][1] . "</li>";
echo "<li>" . $statename["South_Dakota"][2] . "</li>";
echo "</ul>";
echo " </li>";
}
else if ($selectedclub == "North_Carolina")
{
echo " <li>North_Carolina";
echo "<ul>";
echo "<li>" . $statename["North_Carolina"][0] . "</li>";
echo "<li>" . $statename["North_Carolina"][1] . "</li>";
echo "<li>" . $statename["North_Carolina"][2] . "</li>";
echo "</ul>";
echo " </li>";
}
else if ($selectedclub == "Florida")
{
echo " <li>Florida";
echo "<ul>";
echo "<li>" . $statename["Florida"][0] . "</li>";
echo "<li>" . $statename["Florida"][1] . "</li>";
echo "<li>" . $statename["Florida"][2] . "</li>";
echo "</ul>";
echo " </li>";
}
echo "</ul>";
?>
</body>
</html>