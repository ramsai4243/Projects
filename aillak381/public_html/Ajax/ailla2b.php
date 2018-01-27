<?php session_start(); ?>
<html>
<body>
<?php
if (! empty($_POST["Fname"])) 
{
$_SESSION["Fname"] = $_POST["Fname"];
}
else
{
unset($_SESSION["Fname"]);
}
if (! empty($_POST["Mname"])) 
{
$_SESSION["Mname"] = $_POST["Mname"];
}
else
{
unset($_SESSION["Lname"]);
}

if (! empty($_POST["Lname"])) 
{
$_SESSION["Lname"] = $_POST["Lname"];
}
else
{
unset($_SESSION["Lname"]);
}
if (! empty($_POST["email"])) 
{
$_SESSION["email"] = $_POST["email"];
}
else
{
unset($_SESSION["email"]);
}
if (isset($_POST["student"]))
{
$_SESSION["student"] = $_POST["student"];
}
else
{
unset($_SESSION["working_proffesional"]);
}
if (isset($_POST["working_proffesional"]))
{
$_SESSION["working_proffesional"] = $_POST["working_proffesional"];
}
else
{
unset($_SESSION["working_proffesional"]);
}
if (isset($_POST["none"]))
{
$_SESSION["none"] = $_POST["none"];
}
else
{
unset($_SESSION["none"]);
}

?>

<table border="2">
<tr>
<th>Field</th><th>Data</th>
</tr>
<tr>
<td>First Name</td>
<td>
<?php if (! empty($_POST["Fname"])) 
echo $_POST["Fname"];
else
	echo "No Entry";
?>
</td>
</tr>
<tr>
<td>Middle Name</td>
<td>
<?php if (! empty($_POST["Mname"])) 
echo $_POST["Mname"];
else
	echo "No Entry";
?>

<tr>
<td>Last Name</td>
<td>
<?php if (! empty($_POST["Lname"])) 
echo $_POST["Lname"];
else
	echo "No Entry";
?>
</td>
</tr>
<tr>
<td>Email</td>
<td>
<?php if ($_POST["email"] == "") 
echo "No Entry";
else
	echo $_POST["email"];
?>
</td>
</tr>
<tr>
<td>Student</td>
<td>
<?php if ($_POST["student"])
echo "Yes";
else
	echo "Not Chosen";
?>
</td>
</tr>
<tr>
<td>Working Proffesional</td>
<td>
<?php if ($_POST["working_proffesional"])
echo	"Yes";
else
	echo "Not Chosen";
?>
</td>
</tr>
<tr>
<td>None</td>
<td>
<?php if ($_POST["none"])
echo "Yes";
else
	echo "Not Chosen";
?>
</td>
</tr>

<form action="ailla2c.php" method="post">
<p>
The State Name:
    <select name="state">
	
    <option value ="Ohio">Ohio</option>
    <option value ="Nebraska">Nebraska</option>
	<option value ="South_Dakota">South Dakota</option>
	<option value ="North_Carolina">North Carolina</option>
	<option value ="Florida">Florida</option>
    </select>
    <input type="submit" name="submit" value="select" />
	</p>
</form>


</table>
</body>
</html> 
