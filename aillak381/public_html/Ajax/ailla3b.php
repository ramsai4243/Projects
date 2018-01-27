<?php session_start(); ?>
<html>
	
<?php 
	
	$clubno = $_POST['stateid'];
	$file_data = file("states.txt") or die("states.txt does not exist");
	$found = false;
	?>
<body>

<?php
	foreach ($file_data as $this_line)
	{
		$this_line = rtrim ($this_line);
		$array = explode(",", $this_line);
		if($clubno == $array[1])
		{
			$found = true;
			echo"<table border='2'>";
			echo"<tr>";
			echo"<th>State_ID</th><th>State_Name</th><th>Capital_City</th><th>Largest_City</th>";
			echo"<th>Population</th><th>Number_Of_US_Representatives</th>";
			echo"</tr>";
			echo"<tr>";
			
			foreach ($array as $data)
			{
				if($data !="")
					echo "<td>$data</td>";
			   else
			   		echo"<td>&nbsp;</td>";
		
		}
		echo "</tr>";
		echo"</table>";
		}
		}
		if(! $found)
		echo "Not found";
		
		?>
		<form action="ailla3c.php" method="post">
		<input type="submit" name="Add a new State" value="Add a new State"></form>

</body>

</html>
