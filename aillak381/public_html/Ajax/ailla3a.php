
<html>
<?php
$file_data=file("states.txt") or die("states.txt does not exist");
?>

<?php
	$file = fopen("states.txt","r") or die("states.txt does not exist");
	?>
<body>


<?php
	while(!feof($file))
	{
		echo"<tr>";
		$this_line = fgets($file);
		$this_line = rtrim($this_line);
		$array = explode("," , $this_line);
		foreach ($array as $data)
		{
			
		}
			echo "</tr>";
	}
	?>
<form action="ailla3b.php" method="post">

<select name="stateid" >
<?php
foreach ($file_data as $this_line)
{
$this_line = rtrim($this_line);
$array = explode(",", $this_line);
echo "<option value=\"" . $array[1] . "\">" . $array[1] . "</option>";
}
?>
</select>

<p><input type="submit" value="Get Data"></p>
</form>
</body>
</html>
