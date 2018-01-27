<html>
<body>

<?php
	$State_ID = $_POST['State_ID'];
	if(! is_numeric($State_ID))
	die ("Not a legal State ID");
	$file_data = file("states.txt") or die("File does not exist");
	$found = false;
	foreach ($file_data as $this_line)
	{
		$this_line = rtrim ($this_line);
		$array = explode(",", $this_line);
		if($State_ID == $array[0])
		{
			$found = true;
			}
		}
		if($found)
			echo"State ID already exists";
			else
	{
		$file = fopen("states.txt","a") or die("can't open states.txt");
		$State_ID = $_POST['State_ID'];
		$State_Name = $_POST['State_Name'];
		$Largest_City = $_POST['Largest_City'];
		$Population = $_POST['Population'];
		$Number_Of_US_Representatives = $_POST['Number_Of_US'];
		
		
		fputs($file,$State_ID.',' . $State_Name. ',' . $Club_Name .',' .$Largest_City . ',' .
		$Population .',' . $Number_Of_US ."\n");
		fclose($file);

		echo"State added!!";
		
	}
?>

</body>
</html>
<html>
<body>
<h1 align="center">New States.txt</h1>
<?php
$file_data=file("states.txt") or die("states.txt does not exist");
$outfile = fopen("states.sql", "w");
foreach ($file_data as $this_line)
{
$this_line = rtrim($this_line);
$array = explode(",", $this_line);
$sql_command = "(" . $array[0] . ",'" . $array[1] . "','" . $array[2] . "','" . $array[3] . "','" .
$array[4] . "','" . $array[5] . "','" . $array[6] . "'," . $array[7] . ");\n";
echo $sql_command . "<br>";
fputs($outfile, $sql_command);
}
fclose($outfile);
echo "states.txt created";
?>

</body></html>